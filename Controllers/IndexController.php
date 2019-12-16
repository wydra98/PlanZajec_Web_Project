<?php

require_once 'AppController.php';

class IndexController extends AppController {

    public function login()
    {   
        $this->render('index');
    }
}