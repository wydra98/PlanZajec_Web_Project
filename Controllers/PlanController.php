<?php
require_once 'AppController.php';
require_once __DIR__.'//..//Connection//PlanConnection.php';
require_once __DIR__.'//..//Models//Lesson.php';
require_once 'LoginController.php';

class PlanController extends AppController {

    public function plan()
    {   
        if(isset($_POST['id'])){
            $_SESSION['chooseWeek'] = $_POST['id'];
            $connection = new PlanConnection();
            $connection -> readCode();
            $this->render('plan');
        }
        else
            $this->render('plan');
    }

    public function weekOne()
    {   	      
        $_SESSION['weekNumber'] = 1;	        
        $this->render('plan');	        
    }	    

    public function weekTwo()	   
    {   	     
        $_SESSION['weekNumber'] = 2;	       
        $this->render('plan');	        
    }	 

    function addNewLesson($day,$lessonName,$startHour,$startMinute,$endHour,$endMinute,$color)
    {
        $connection = new PlanConnection();
        $connection->addNewLesson($day,$lessonName,$startHour,$startMinute,$endHour,$endMinute,$color);
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=plan");
        return;
    }

    function removeLesson()
    {
        $lessonId = $_POST['lessonId'];
        $connection= new PlanConnection();
        $connection -> removeLesson($lessonId);
    }
}