<?php

require_once 'AppController.php';

class ChoiceController extends AppController {

    public function choice()
    {   
        $this->render('choice');
    }
}