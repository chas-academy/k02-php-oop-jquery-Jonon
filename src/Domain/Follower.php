<?php

namespace TwitterClone\Domain;

class Follower
{
    private $userId;
    private $followerId;

    public function getUserId()
    {
        return $this->userId();
    }

    public function getFollowerId()
    {
        return $this->followerId();
    }
}