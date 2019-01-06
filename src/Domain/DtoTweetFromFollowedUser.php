<?php

namespace TwitterClone\Domain;

class DtoTweetFromFollowedUser
{
    private $name;
    private $username;
    private $tweetId;
    private $tweet;

    public function getName(): string
    {
        return $this->name;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getTweetId()
    {
        return $this->tweetId;
    }

    public function getTweet()
    {
        return $this->tweet;
    }
}
