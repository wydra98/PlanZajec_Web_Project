<?php

require_once 'AppController.php';

class RegistrationController extends AppController {

    public function registration()
    {   
        $this->render('registration');
    }
}