<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;
use Exception;

class Profile extends Controller
{
    /**
     * @param array $params
     * @throws Exception
     */
    public function index(array $params)
    {
        if (empty($params['id'])) {
            throw new Exception('ID is missed', 404);
        }

        $user = User::getCurrentUser();

        if ($user->id !== $params['id']) {
            throw new Exception('Page is forbidden', 403);
        }

        $this->view->user    = $user;

        echo $this->view->render('/user/profile.php');
    }
}