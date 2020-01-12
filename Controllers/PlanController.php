<?php
require_once 'AppController.php';
require_once __DIR__.'//..//Connection//PlanConnection.php';
require_once __DIR__.'//..//Models//Lesson.php';
require_once 'LoginController.php';

class PlanController extends AppController {

    public function plan()
    {   
        $_SESSION['weekNumber'] = $_GET['weekNumber'];
        $_SESSION['chooseWeek'] = $_POST['id'];
        $connection = new PlanConnection();
        $connection -> readCode();
        $this->render('plan');
    }

    function addNewLesson($day,$lessonName,$startHour,$startMinute,$endHour,$endMinute,$color)
    {
        $connection = new PlanConnection();
        $connection->addNewLesson($day,$lessonName,$startHour,$startMinute,$endHour,$endMinute,$color);
        $this->render('plan');
    }

    function removeLesson()
    {
        $lessonId = $_POST['lessonId'];
        $connection= new PlanConnection();
        $connection -> removeLesson($lessonId);
    }
}