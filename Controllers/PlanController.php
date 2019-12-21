<?php

require_once 'AppController.php';

class PlanController extends AppController {

    public function plan()
    {   
        $this->render('plan');
    }

    public function addNewLesson()
    {
        // tu by pasowało zrobic obiekt nowej klasy chyba         
        $this->render('plan');
    }
}