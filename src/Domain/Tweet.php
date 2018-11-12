<?php

namespace TwitterClone\Domain;

class Tweet
{
    private $tweetId;
    private $tweet;

    public function getTweetId()
    {
        return $this->tweetId;
    }

    public function getTweet()
    {
        return $this->tweet;
    }
}
