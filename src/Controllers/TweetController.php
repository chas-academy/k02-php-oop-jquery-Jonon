<?php

namespace TwitterClone\Controllers;

use TwitterClone\Exceptions\NotFoundException;
use TwitterClone\Models\UserModel;
use TwitterClone\Models\TweetModel;

class TweetController extends AbstractController
{
    public function delete()
    {
        $params = $this->request->getParams();
        $tweetModel = new TweetModel();

        $properties =
        [
            'userId' => $params->get('Id'),
            'tweetId' => $params->get('tweetId')
        ];

        $deleteTweet = $tweetModel->deleteTweet($properties);

        header("location: /profile/". $this->getAuthenticatedUser());
    }
}
