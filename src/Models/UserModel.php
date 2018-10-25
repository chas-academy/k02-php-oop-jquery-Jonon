<?php

namespace TwitterClone\Models;

use TwitterClone\Domain\User;
use TwitterClone\Exceptions\NotFoundException;
use PDO;

class UserModel extends AbstractModel
{
    const CLASSNAME = '\TwitterClone\Domain\User';

    public function register(array $formData): string
    {
        $query = 'INSERT INTO users (name, username, password, email)
        VALUES (:name, :username, :password, :email)';

        $sth = $this->db->prepare($query);

        $sth->bindValue(':name', $formData['name']);
        $sth->bindValue(':username', $formData['username']);
        $sth->bindValue(':password', password_hash($formData['password'], PASSWORD_DEFAULT));
        $sth->bindValue(':email', $formData['email']);

        $row = $sth->execute();

        $success = '';

        if ($row) {
            $success = 'true';
        } else {
            throw new Exception('Somethingwent wrong');
        }

        return $success;
    }
    
    public function getByEmail(string $email): User
    {
        $query = 'SELECT * FROM users WHERE email = :email';
        $sth = $this->db->prepare($query);

        $params = [
            'email' => $email
        ];

        
        $sth->execute($params);

        $row = $sth->fetchObject(self::CLASSNAME);
        
        if (empty($row)) {
            throw new NotFoundException();
        }

        return $row;
    }
}
