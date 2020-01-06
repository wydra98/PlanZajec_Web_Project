<?php
require_once 'AppController.php';
require_once __DIR__.'//..//Connection//PlanConnection.php';
require_once __DIR__.'//..//Models//Lesson.php';
require_once 'LoginController.php';

class PlanController extends AppController {

    public function plan()
    {   
        if(isset($_POST['id']))
        {
            $_SESSION['chooseWeek']=$_POST['id'];
            $_SESSION['weekNumber']=1;
            $this->render('plan');
        }
            
        else{
            $foo = new MainController();
            $foo -> emptyPlans();
        }
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

    function addNewLesson($day,$name,$startHour,$startMinute,$endHour,$endMinute,$color)
    {
        if($color == "#2E4053" ) $border = "#002633" ;
        else if($color == 	"#3c0044" ) $border =  "rgb(51, 0, 38)";
        else if($color == 	"#85144b" ) $border = "#80002a";
        else if($color == 	"#006213") $border = "rgb(0, 58, 0)";
        else $border = "rgb(58, 0, 0)";
        $connection = new PlanConnection();
        $connection->addNewLesson($day,$name,$startHour,$startMinute,$endHour,$endMinute,$color,$border);
        
        $this->render('plan');
    }

    function removeLesson()
    {
        $lessonId = $_POST['lessonId'];
    

        $connection= new PlanConnection();
        $connection -> removeLesson($lessonId);
    }
}