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
        $query = 'INSERT INTO users (name, username, password, email, joinDate)
        VALUES (:name, :username, :password, :email, CURDATE())';

        $sth = $this->db->prepare($query);

        $sth->bindValue(':name', $formData['name']);
        $sth->bindValue(':username', $formData['username']);
        $sth->bindValue(':email', $formData['email']);
        $sth->bindValue(':password', password_hash($formData['password'], PASSWORD_DEFAULT));

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

    public function getByUsername(string $username): User
    {
        $query = 'SELECT * FROM users WHERE username = :username';
        $sth = $this->db->prepare($query);
        
        $params = [
            'username' => $username
        ];

        $sth->execute($params);

        $users = $sth->fetchObject(self::CLASSNAME);
        
        if (empty($users)) {
            throw new NotFoundException();
        }

        return $users;
    }

    public function updateDescription(array $properties): void
    {
        $query = 'UPDATE users
        SET name = :name, description = :description
        WHERE id = :id';

        $sth = $this->db->prepare($query);

        $sth->bindValue(':name', $properties['name']);
        $sth->bindValue(':description', $properties['description']);
        $sth->bindValue(':id', $properties['id']);

        $sth->execute();
    }

    public function follow(array $properties): void
    {
        $query = 'INSERT INTO followers(userId, followerId)
        VALUES(:id, :followerId)';

        $sth = $this->db->prepare($query);

        $sth->bindValue(':id', $properties['id']);
        $sth->bindValue(':followerId', $properties['followerId']);

        $sth->execute();
    }

    public function unfollow(array $properties): void
    {
        $query = 'DELETE FROM followers 
        where userid =:id AND followerId = :followerId';

        $sth = $this->db->prepare($query);
        $sth->bindValue(':id', $properties['id']);
        $sth->bindValue(':followerId', $properties['followerId']);

        $sth->execute();
    }

    public function getUsersFollowingById(int $profileUserId): array
    {
        $query = 'SELECT * FROM users 
        INNER JOIN followers ON users.id = followers.userId
        WHERE followers.followerId = :followerId';

        $sth = $this->db->prepare($query);

        $params = [
            'followerId' => $profileUserId
        ];

        $sth->execute($params);

        $following = $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
        
        return $following;
    }

    public function getUsersFollowersById(int $profileUserId): array
    {
        $query = 'SELECT * FROM users 
        INNER JOIN followers ON users.id = followers.followerId
        WHERE followers.userId = :userId';

        $sth = $this->db->prepare($query);

        $params = [
            'userId' => $profileUserId
        ];

        $sth->execute($params);

        $followers = $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
        
        return $followers;
    }

    public function search(string $search): array
    {
        $query = 'SELECT * FROM users
        WHERE name LIKE :search OR username LIKE :search';

        $sth = $this->db->prepare($query);
        $sth->bindValue('search', "%$search%");
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }

    public function updateAccount(array $properties): void
    {
        $query = 'UPDATE users
        SET username = :username, email = :email
        WHERE id = :id';

        $sth = $this->db->prepare($query);

        $sth->bindValue(':id', $properties['id']);
        $sth->bindValue(':username', $properties['username']);
        $sth->bindValue(':email', $properties['email']);

        $sth->execute();
    }

    public function deleteAccount(int $id): void
    {
        $query = 'DELETE FROM users
        WHERE id = :id';

        $sth = $this->db->prepare($query);

        $sth->bindValue(':id', $id);

        $sth->execute();
    }
}
