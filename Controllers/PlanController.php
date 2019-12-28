<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Connection//LoginRegister.php';
require_once __DIR__.'//..//Connection//Read.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Models//Week.php';
require_once __DIR__.'//..//Models//Lesson.php';
require_once __DIR__.'//..//Models//Day.php';

class PlanController extends AppController {

    public function plan()
    {   
        //$this->render('plan');
        //foreach($_SESSION['user']->getWeekArray() as $week){
           // echo $week->getName();}
    }

    public function addNewLesson()
    {
        // tu by pasowało zrobic obiekt nowej klasy chyba         
        $this->render('plan');
    }
}