<?php

require_once 'AppController.php';
require_once 'PlanController.php';
require_once __DIR__.'//..//Connection//ChoiceConnection.php';

class ChoiceController extends AppController {

    public function choice()
    {   
        $this->render('choice');
    }

    public function verifylesson()
    {   
        $day = $_POST['dayName'];
        $name = $_POST['lessonName'];
        $startHour= $_POST['startHour'];
        $startMinute = $_POST['startMinute'];
        $endHour= $_POST['endHour'];
        $endMinute = $_POST['endMinute'];
        $color = $_POST['color'];
        $connection = new ChoiceConnection();
        $planController = new PlanController();

        if (strlen($name)==0 || strlen($startHour)==0 || strlen($startMinute)==0
           || strlen($endHour)==0 || strlen($endMinute)==0) {
            $this->render('choice', ['messages' => ['Uzupełnij wszystkie dane!']]);
            return;
        } 
        
        if(!is_numeric($startHour) || !is_numeric($endHour) || !is_numeric($startMinute) || !is_numeric($endHour)){
            $this->render('choice', ['messages' => ['Godziny i minuty muszą być liczbami!']]);
            return;
        }

        if(strlen($startHour)>2 || strlen($endHour)>2 || strlen($startMinute)>2  || strlen($endMinute)>2 ){
            $this->render('choice', ['messages' => ['Nie poprawna ilość znaków w czasie!']]);
            return;
        }

        if($startHour<0 || $startHour>23 || $endHour<0 || $endHour>23){
            $this->render('choice', ['messages' => ['Niepoprawna godzina!']]);
            return;
        }

        if($startMinute<0 || $startMinute>60 || $endMinute<0 || $endMinute>60){
            $this->render('choice', ['messages' => ['Niepoprawna minuta!']]);
            return;
        }

        if(!$this->checkTime($startHour,$startMinute,$endHour,$endMinute)){
            $this->render('choice', ['messages' => ['Czas rozpoczęcia  mniejszy od czasu zakończenia!']]);
            return;
        }

        if(!$connection->checkHours($startHour,$startMinute,$endHour,$endMinute,$day)){
            $this->render('choice', ['messages' => ['W tych godzinach odbywają się już inne zajęcia!']]);
            return;
        } 

        $dayEnglish = $this->changeNameToEnglish($day);
        $planController->addNewLesson($dayEnglish,$name,$startHour,$startMinute,$endHour,$endMinute,$color);
    }

    public function checkTime($startHour,$startMinute,$endHour,$endMinute){
        $flag = true;
        $start_time = ($startHour)*60 + $startMinute;
        $end_time = ($endHour)*60 + $endMinute;
        if($end_time<=$start_time) $flag = false;
        return $flag;
    }

    public function changeNameToEnglish($day)
    {
        if($day=="Poniedziałek") $dayEnglish="MONDAY";
        else if($day=="Wtorek") $dayEnglish="TUESDAY";
        else if($day=="Środa") $dayEnglish="WEDNESDAY";
        else if($day=="Czwartek") $dayEnglish="THURSDAY";
        else if($day=="Piątek") $dayEnglish="FRIDAY";
        else if($day=="Sobota") $dayEnglish="SATURDAY";
        else $dayEnglish="SUNDAY";

        return $dayEnglish;
    }


}