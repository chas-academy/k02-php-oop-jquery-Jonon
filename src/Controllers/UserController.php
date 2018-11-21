<?php

namespace TwitterClone\Controllers;

use TwitterClone\Exceptions\NotFoundException;
use TwitterClone\Models\UserModel;
use TwitterClone\Models\TweetModel;

class UserController extends AbstractController
{
    public function register()
    {
        if ($this->request->isGet()) {
            return $this->render('views/register.php', []);
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
            $user = $userModel->getProfileByUsername($username);
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
      
        return $this->render('views/profile.php', $properties);
    }

    public function home()
    {
        if ($this->request->isGet()) {
            return $this->render('views/home.php', []);
        } elseif ($this->request->isPost()) {
            $params = $this->request->getParams();
            //  get id from logged in user
            $userId = $_SESSION['user']->getId();
            $tweetModel = new TweetModel();

            $properties = [
                'tweet' => $params->get('tweet'),
                'id' => $userId
            ];
            //  send to model
            $createTweet = $tweetModel->CreateTweet($properties);
            return $this->render('views/home.php', []);
        }
    }
}
