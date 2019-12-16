<?php

require_once 'AppController.php';

class MainController extends AppController {

    public function main()
    {   
        $this->render('main');
    }
}