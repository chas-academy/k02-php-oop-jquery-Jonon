<?php

namespace TwitterClone\Controllers;

use TwitterClone\Exceptions\NotFoundException;
use TwitterClone\Models\UserModel;
use TwitterClone\Models\TweetModel;
use TwitterClone\Models\FollowerModel;

class UserController extends AbstractController
{
    public function register()
    {
        // Check if request is a get request
        if ($this->request->isGet()) {
            return $this->render('views/register.php', []);
            // Check if request is a post request
        } elseif ($this->request->isPost()) {
            $params = $this->request->getParams();
            $userModel = new UserModel();

            $properties = [
                'name' => $params->get('name'),
                'username' => $params->get('username'),
                'email' => $params->get('email'),
                'password' => $params->get('password')
            ];

            $success = $userModel->register($properties);
            return $this->render('views/login.php', ['success' => $success]);
        }
    }

    public function login(): string
    {
        //  checks if the request is a post request
        if (!$this->request->isPost()) {
            return $this->render('views/login.php', []);
        }

        //  get the parameters from the form
        $params = $this->request->getParams();

        //  check if the parameters exist
        if (!$params->has('email') && !$params->has('password')) {
            $params = ['errorMessage' => 'No info provided.'];
            return $this->render('views/error.php', $params);
        }

        //
        $email = $params->getString('email');
        $password = $params->getString('password');

        //  Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $params = ['errorMessage' => 'Email not valid.'];
            return $this->render('views/error.php', $params);
        }

        //  Send to model
        $userModel = new UserModel();
       
        try {
            $user = $userModel->getByEmail($email);
        } catch (NotFoundException $e) {
            $params = ['errorMessage' => 'Email not found.'];
            return $this->render('views/error.php', $params);
        }
        
        if (!password_verify($password, $user->getPassword())) {
            $params = ['errorMessage' => 'Password not valid.'];
            return $this->render('views/error.php', $params);
        }
        
        $_SESSION['user'] = $user;

        header('Location: /profile/'.$user->getUsername());
        return "";
    }

    public function logout()
    {
        session_unset();
        unset($_SESSION["user"]);
        session_destroy();
        header('Location: /');
        return '';
    }

    public function getProfileByUsername($username)
    {
        $userModel = new UserModel();
        $tweetModel = new TweetModel();
        
        try {
            $user = $userModel->getByUsername($username);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'User not found!'];
            return $this->render('views/error.php', $properties);
        }

        try {
            $tweets = $tweetModel->getTweets($username);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Please tweet something!'];
            return $this->render('views/profile.php', $properties);
        }

        $properties = [
            'user' => $user,
            'tweets' => $tweets
        ];

        // Check if user is not logged in
        if (!$this->isAuthenticated()) {
            return $this->render('views/profile/profile_website_user.php', $properties);
        }

        $followerModel = new FollowerModel();

        $params = [
            'userId' => $user->getId(),
            'followerId' => $this->getAuthenticatedUserId()
        ];

        // Check if logged in user is following profile user
        $isFollowing = $followerModel->getIfFollowing($params);

        
        // Check if logged in user is the same as the profile user and if logged in user is not following the profile user
        if (!$this->authenticatedUserIsSameAsProfileUser($user->getId()) && empty($isFollowing)) {
            return $this->render('views/profile/profile_logged_in_user.php', $properties);
        }

        // Check if logged in user is the same as the profile user and if logged in user is following the profile user
        if (!$this->authenticatedUserIsSameAsProfileUser($user->getId()) && !empty($isFollowing)) {
            return $this->render('views/profile/profile_logged_in_user_unfollow.php', $properties);
        }
            
        return $this->render('views/profile/profile_profile-user.php', $properties);
    }

    public function updateDescription()
    {
        $params = $this->request->getParams();

        $userModel = new UserModel();

        $properties =
        [
            'id' => $params->get('id'),
            'name' => $params->get('name'),
            'description' => $params->get('description')
        ];

        $UpdateDescription = $userModel->updateDescription($properties);

        header("location: /profile/". $this->getAuthenticatedUser());
    }

    public function follow()
    {
        $params = $this->request->getParams();
        
        $getUsername = $this->request->getParams()->getString('username');

        $userModel = new UserModel();

        $properties =
        [
            'id' =>  $params->get('id'),
            'followerId' => $this->getAuthenticatedUserId()
        ];

        $followUser = $userModel->follow($properties);

        header("location: /profile/". $getUsername);
    }

    public function unfollow()
    {
        $params = $this->request->getParams();
        
        $getUsername = $this->request->getParams()->getString('username');

        $userModel = new UserModel();

        $properties =
        [
            'id' =>  $params->get('id'),
            'followerId' => $this->getAuthenticatedUserId()
        ];

        $unfollowUser = $userModel->unfollow($properties);

        header("location: /profile/". $getUsername);
    }
    
    public function getFollowing($username)
    {
        $userModel = new UserModel();
        $user = $userModel->getByUsername($username);
        $properties = [
            'user' => $user
        ];
        // id from user profile
        $profileUserId = $user->getId();

        $userModel = new userModel();
        $following = $userModel->getUsersFollowingById($profileUserId);
        $properties = [
            'following' => $following,
            'user' => $user
        ];
        
        return $this->render('views/profile/profile_following.php', $properties);
    }

    public function getFollowers($username)
    {
        $userModel = new UserModel();
        $user = $userModel->getByUsername($username);
        $properties = [
            'user' => $user
        ];
        // id from user profile
        $profileUserId = $user->getId();

        $userModel = new userModel();
        $followers = $userModel->getUsersFollowersById($profileUserId);
        $properties = [
            'followers' => $followers,
            'user' => $user
        ];

        return $this->render('views/profile/profile_followers.php', $properties);
    }

    public function home()
    {
        // redirect to frot page if not an athenticated user
        if (!$this->isAuthenticated()) {
            header('Location: /');
        }

        $tweetModel = new TweetModel();
        $userModel = new UserModel();

         //  get id from logged in user
        $userId = $this->getAuthenticatedUserId();
        
        try {
            $tweets = $tweetModel->getTweetsByUsersFollowing($userId);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Something went wrong!'];
            return $this->render('views/error.php', $properties);
        }

        $properties = [
            'tweets' => $tweets
        ];

        $params = $this->request->getParams();

        $userProperties = [
            'tweet' => $params->get('tweet'),
            'id' => $userId
        ];

        try {
            $createTweet = $tweetModel->CreateTweet($userProperties);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Something went wrong!'];
            return $this->render('views/error.php', $properties);
        }

        return $this->render('views/home.php', $properties);
    }

    public function viewSettings()
    {
        if (!$this->isAuthenticated()) {
            $this->redirect("/home");
        };
        
        return $this->render('views/viewSettings.php', []);
    }

    public function updateAccountSettings()
    {
        $params = $this->request->getParams();
        
        $userModel = new UserModel();

        $id = $this->getAuthenticatedUserId();

        $properties =
        [
            'id' => $id,
            'username' => $params->get('username'),
            'email' => $params->get('email')
        ];

        try {
            $updateAccount = $userModel->updateAccount($properties);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Something went wrong!'];
            return $this->render('views/error.php', $properties);
        }

        $this->redirect("/settings");
    }

    public function deleteAccount()
    {
        $userModel = new UserModel();

        $id = $this->getAuthenticatedUserId();

        try {
            $deleteAccount = $userModel->deleteAccount($id);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Something went wrong!'];
            return $this->render('views/error.php', $properties);
        }

        $this->redirect("/home");
    }

    private function authenticatedUserIsSameAsProfileUser(int $id): bool
    {
        return $_SESSION['user']->getId() == $id;
    }
}
