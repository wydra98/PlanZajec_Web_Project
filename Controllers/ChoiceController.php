<?php

require_once 'AppController.php';
require_once 'PlanController.php';
require_once __DIR__.'//..//Connection//ChoiceConnection.php';

class ChoiceController extends AppController {

    public function choice()
    {   
        $_SESSION['day_id'] = $_GET['day_id'];
        $this->render('choice');
    }

    public function verifylesson()
    {   
        $day = $_SESSION['day_id'];
        $name = $_POST['lessonName'];
        $startHour= $_POST['startHour'];
        $startMinute = $_POST['startMinute'];
        $endHour= $_POST['endHour'];
        $endMinute = $_POST['endMinute'];
        $color = $_POST['color'];
        $connection = new ChoiceConnection();
        $planController = new PlanController();

        if(!$connection->checkHours($startHour,$startMinute,$endHour,$endMinute,$day)){
            $this->render('choice', ['messages' => ['W tych godzinach odbywają się już inne zajęcia!']]);
            return;
        } 

        $days = $this->readDay($day);
        $planController->addNewLesson($days,$name,$startHour,$startMinute,$endHour,$endMinute,$color);
    }

    public function readDay($day)
    {
        if($day=="1") $dayToRead="MONDAY";
        else if($day=="2") $dayToRead="TUESDAY";
        else if($day=="3") $dayToRead="WEDNESDAY";
        else if($day=="4") $dayToRead="THURSDAY";
        else if($day=="5") $dayToRead="FRIDAY";
        else if($day=="6") $dayToRead="SATURDAY";
        else $dayToRead="SUNDAY";

        return $dayToRead;
    }


}