<?php

require_once 'AppController.php';

class InformationController extends AppController {

    public function information()
    {   
        $this->render('information');
    }
}