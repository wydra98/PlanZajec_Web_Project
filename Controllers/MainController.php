<?php

require_once 'AppController.php';

class MainController extends AppController {

    public function main()
    {   
        $read = new Read();
        $read->readOwner();
        
        $this->render('main');
    }
}