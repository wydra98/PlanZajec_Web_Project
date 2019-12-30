<?php

require_once 'AppController.php';
require_once 'PlanController.php';

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
           
        if (strlen($name)==0 || strlen($startHour)==0 || strlen($startMinute)==0
           || strlen($endHour)==0 || strlen($endMinute)==0) {
            $this->render('choice', ['messages' => ['Uzupełnij wszystkie dane!']]);
            return;
        }

        if(!is_numeric($startHour) || !is_numeric($endHour) || !is_numeric($startMinute) || !is_numeric($endHour))
        {
            $this->render('choice', ['messages' => ['Godziny i minuty muszą być liczbami!']]);
            return;
        }

        if($startHour<0 || $startHour>23 || $endHour<0 || $endHour>23)
        {
            $this->render('choice', ['messages' => ['Niepoprawna godzina!']]);
            return;
        }

        if($startMinute<0 || $startMinute>60 || $endMinute<0 || $endMinute>60)
        {
            $this->render('choice', ['messages' => ['Niepoprawna minuta!']]);
            return;
        }

        if($startHour>$endHour)
        {
            $this->render('choice', ['messages' => ['Godzina rozpoczęcia musi być równa lub mniejsza od godziny zakończenia!']]);
            return;
        }

        if()
        {
            $this->render('choice', ['messages' => ['Godzina rozpoczęcia musi być równa lub mniejsza od godziny zakończenia!']]);
            return;
        }

        if($startHour>$endHour)
        {
            $this->render('choice', ['messages' => ['Godzina rozpoczęcia musi być równa lub mniejsza od godziny zakończenia!']]);
            return;
        }

        $newLesson = new PlanController();
       // $newLesson->addNewLesson();
    }
}