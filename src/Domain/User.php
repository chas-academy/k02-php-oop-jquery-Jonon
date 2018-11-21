<?php

namespace TwitterClone\Domain;

class User
{
    private $id;
    private $name;
    private $username;
    private $password;
    private $email;
    private $joinDate;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDateJoined(): string
    {
        return $this->joinDate;
    }
}
