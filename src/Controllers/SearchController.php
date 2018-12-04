<?php

namespace TwitterClone\Controllers;

use TwitterClone\Exceptions\NotFoundException;
use TwitterClone\Models\UserModel;

class SearchController extends AbstractController
{
    public function search()
    {
        $search = $this->request->getParams()->getString('search');

        // check if string is empty
        if (empty($search)) {
            return $this->render('views/search_empty.php', []);
        }

        $userModel = new UserModel();
        $users = $userModel->search($search);

        $properties = [
            'users' => $users
        ];

        return $this->render('views/search.php', $properties);
    }
}
