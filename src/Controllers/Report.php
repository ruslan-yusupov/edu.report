<?php

namespace App\Controllers;

use App\Controller;

class Report extends Controller
{
    public function index()
    {
        echo $this->view->render('/reports/list.php');
    }
}