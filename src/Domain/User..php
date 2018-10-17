<?php

namespace TwitterClone\Domain;

class User
{
    private $id;
    private $name;
    private $userName;
    private $password;
    private $email;

    public function __construct($id, $name, $userName, $password, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
