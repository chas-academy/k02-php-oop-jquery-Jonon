<?php

namespace TwitterClone\Models;

use TwitterClone\Domain\Follower;
use TwitterClone\Exceptions\NotFoundException;
use PDO;

class FollowerModel extends AbstractModel
{
    const CLASSNAME = '\TwitterClone\Domain\Follower';

    public function getIfFollowing(array $params)
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
