<?php
require_once 'AppController.php';
require_once __DIR__.'//..//Connection//PlanConnection.php';
require_once __DIR__.'//..//Models//Lesson.php';

class PlanController extends AppController {

    public function plan()
    {   
        $_SESSION['chooseWeek']=$_POST['id'];
        $_SESSION['weekNumber']=1;
        $plan= new PlanConnection();
        $plan->read();
        $this->render('plan');
    }

    public function newPlan()
    {   
        $_SESSION['weekNumber']=1;
        $_SESSION['lessons'] = array();
        $this->render('plan');
    }

    public function weekOne()
    {   
        $_SESSION['weekNumber']=1;
        $this->render('plan');
    }

    public function weekTwo()
    {   
        $_SESSION['weekNumber']=2;
        $this->render('plan');
    }

    function addNewLesson()
    {
        // tu by pasowało zrobic obiekt nowej klasy chyba         
        $this->render('plan');
    }
}