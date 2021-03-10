<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Contact;
use App\Models\User;
use App\Validator;
use Exception;

class Profile extends Controller
{

    protected $user;

    public function __construct() {
        parent::__construct();
        $this->view->user = $this->user = User::getCurrentUser();
    }

    /**
     * @param array $params
     * @throws Exception
     */
    public function index(array $params)
    {
        if (empty($params['id'])) {
            throw new Exception('ID is missed', 404);
        }

        if ($this->user->id !== $params['id']) {
            throw new Exception('Page is forbidden', 403);
        }

        echo $this->view->render('/user/profile.php');
    }

    public function update() //TODO update
    {
        $email           = trim($_POST['email']);
        $name            = trim($_POST['name']);
        $oldPassword     = trim($_POST['old_password']);
        $password        = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirm_password']);
        $alerts          = [];

        //Check fields
        switch (false) {
            case Validator::checkEmail($email):
                $alerts[] = 'Некорректный адрес электронной почты';
            /*case Validator::checkPassword($password):
                $alerts[] = 'Пароль должен состоять из цифр, латинских символов разных регистров
                и быть не меньше 6-ти знаков';*/
            case $password === $confirmPassword:
                $alerts[] = 'Пароли не совпадают';
            case !empty($name):
                $alerts[] = 'ФИО не может быть пустым';
            default:
                break;
        }

        /*if (false !== User::findByEmail($email)) {
            $alerts[] = 'Пользователь с таким Email уже существует';
        }*/


        if (!empty($alerts)) {
            $this->view->alerts = $alerts;
            echo $this->view->render('/user/profile.php');
            die;
        }

        $this->user->email = $email;
        $this->user->name = $name;
        $this->user->save();

        echo $this->view->render('/user/profile.php');
    }
}