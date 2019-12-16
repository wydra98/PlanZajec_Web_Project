<?php

require_once 'AppController.php';

class PlanController extends AppController {

    public function plan()
    {   
        $this->render('plan');
    }
}