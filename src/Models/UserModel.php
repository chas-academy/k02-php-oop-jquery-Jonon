<?php

namespace TwitterClone\Models;

use TwitterClone\Domain\User;
use TwitterClone\Exceptions\NotFoundException;
use PDO;

class UserModel extends AbstractModel
{
    const CLASSNAME = '\TwitterClone\Domain\User';

    public function getByEmail(string $email): User
    {
        $query = 'SELECT * FROM users WHERE email = :email';
        $sth = $this->db->prepare($query);

        $params = [
            'email' => $email
        ];

        
        $sth->execute($params);

        $row = $sth->fetchObject(self::CLASSNAME);
        //return $row = $sth->fetch(self::CLASSNAME, 'User');
        //return $row = $sth->fetch();
        
        
        if (empty($row)) {
            throw new NotFoundException();
        }

        return $row;
    }
}
