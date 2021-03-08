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
        $this->user = User::getCurrentUser();
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

        $this->view->user    = $this->user;

        echo $this->view->render('/user/profile.php');
    }

    public function update() //TODO update
    {
        $alerts = [];

        //Check fields
        switch (false) {
            case Validator::checkInput($_POST['name']):
                $alerts['name'] = 'Поле "Имя" не заполнено';
            case Validator::checkEmail($_POST['email']):
                $alerts['email'] = 'Некорректно введен Email';
            case Validator::checkInput($_POST['phone']):
                $alerts['phone_number'] = 'Поле "Телефон" не заполнено';
        }


        if (!empty($alerts)) {

            $this->view->alerts = $alerts;

            $response = [
                'status' => 'error',
                'html'   => $this->view->render('/contacts/form.php')
            ];

            echo json_encode($response);
            die;
        }

        //Create a contact
        $contact = new Contact;

        $contact->name         = strval(htmlspecialchars($_POST['name']));
        $contact->surname      = strval(htmlspecialchars($_POST['surname']));
        $contact->phone_number = strval(htmlspecialchars($_POST['phone_number']));
        $contact->email        = strval(htmlspecialchars($_POST['email']));
        $contact->picture      = $_FILES['picture']['name'];
        $contact->user_id      = $this->user->id;

        //Check if the file is uploaded
        $isFileUploaded = move_uploaded_file(
            $_FILES['picture']['tmp_name'],
            __DIR__ . '/../../public/uploads/' . $contact->picture
        );

        if (false === $isFileUploaded) {
            $alerts[] = 'Произошла ошибка с загрузкой файла';

            $this->view->alerts = $alerts;

            $response = [
                'status' => 'error',
                'html'   => $this->view->render('/contacts/form.php')
            ];

            echo json_encode($response);
            die;
        }

        //Save a contact
        $contact->save();

        $this->view->count   = Contact::getCount();
        $this->view->contact = $contact;

        $response = [
            'status' => 'success',
            'html'   => $this->view->render('/contacts/add.php')
        ];

        echo json_encode($response);
        die;
    }
}