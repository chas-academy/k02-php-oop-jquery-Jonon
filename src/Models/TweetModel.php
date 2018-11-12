<?php

namespace TwitterClone\Models;

use TwitterClone\Domain\Tweet;
use TwitterClone\Exceptions\NotFoundException;
use PDO;

class TweetModel extends AbstractModel
{
    const CLASSNAME = '\TwitterClone\Domain\Tweet';

    public function getTweets($username)
    {
        $query = 'SELECT * FROM users
        INNER JOIN tweets
        ON users.id = tweets.id
        WHERE users.username = :username;';

        $sth = $this->db->prepare($query);

        $params = [
            'username' => $username
        ];

        $sth->execute($params);

        //$tweets = $sth->fetchObject(self::CLASSNAME);
        //$tweets = $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
        $tweets = $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);

        // foreach ($tweets as $tweet) {
        //     echo $tweet->getTweet();
        // }
        
        

        // if (empty($tweets)) {
        //     throw new NotFoundException();
        // }
        
        return $tweets;
      
    }
}
