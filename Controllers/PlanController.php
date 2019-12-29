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
        var_dump($_SESSION['lessons']);
        $this->render('plan');
    }

    public function weekOne()
    {   
        $_SESSION['weekNumber']=1;
        $this->render('plan');
        return;
    }

    public function weekTwo()
    {   
        $_SESSION['weekNumber']=2;
        var_dump($_SESSION['lessons']);
        foreach($_SESSION['lessons'] as $lesson)
                echo $lesson->getName();
        $this->render('plan');
        return;
    }

    function addNewLesson()
    {
        // tu by pasowało zrobic obiekt nowej klasy chyba         
        $this->render('plan');
    }
}