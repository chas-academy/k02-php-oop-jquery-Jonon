<?php

namespace TwitterClone\Controllers;

use TwitterClone\Exceptions\NotFoundException;
use TwitterClone\Models\UserModel;

class UserController extends AbstractController
{
    public function login(): string
    {
        //  checks if the request is a post request
        if (!$this->request->isPost()) {
            return $this->render('views/login.php');
        }

        //  get the parameters from the form
        $params = $this->request->getParams();
        var_dump($params);

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

        // check if password matches
        if ($password != $user->getPassword()) {
            $params = ['errorMessage' => 'Password not valid.'];
            return $this->render('views/error.php', $params);
        }

        
        $_SESSION['user'] = $user;
        var_dump($_SESSION);

        //header('Location: /profile');
        return "";
    }
}
