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
        WHERE users.username = :username 
        ORDER BY tweetId DESC;';

        $sth = $this->db->prepare($query);

        $params = [
            'username' => $username
        ];

        $sth->execute($params);

        $tweets = $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
        
        return $tweets;
    }

    public function createTweet($properties)
    {
        $query = 'INSERT INTO tweets (tweet, id)
        VALUES(:tweet, :id)';

        $sth = $this->db->prepare($query);

        $sth->bindValue(':tweet', $properties['tweet']);
        $sth->bindValue(':id', $properties['id']);

        $sth->execute();
    }

    public function deleteTweet($properties)
    {
        $query = 'DELETE FROM tweets
        WHERE id = :userId AND tweetId = :tweetId';

        $sth = $this->db->prepare($query);
        $sth->bindValue(':userId', $properties['userId']);
        $sth->bindValue(':tweetId', $properties['tweetId']);
        
        $sth->execute();
    }
}
