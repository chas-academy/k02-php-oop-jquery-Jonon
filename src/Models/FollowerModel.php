<?php

namespace TwitterClone\Models;

use TwitterClone\Domain\Follower;
use TwitterClone\Exceptions\NotFoundException;
use PDO;

class FollowerModel extends AbstractModel
{
    const CLASSNAME = '\TwitterClone\Domain\Follower';

    public function getUsersFollowing($profileUserId)
    {
        $query = 'SELECT * FROM followers
        WHERE followerId = :followerId';

        $sth = $this->db->prepare($query);

        $params = [
            'followerId' => $profileUserId
        ];

        $sth->execute($params);

        $followers = $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);

        if (empty($followers)) {
            throw new NotFoundException();
        }

        return $followers;
    }

    public function getIfFollowing($params)
    {
        $query = 'SELECT * FROM followers 
        where userId = :userId AND followerId = :followerId';

        $sth = $this->db->prepare($query);
        $sth->bindValue(':userId', $params['userId']);
        $sth->bindValue(':followerId', $params['followerId']);
        $sth->execute();

        $following = $sth->fetchObject(self::CLASSNAME);

        return $following;
    }
}
