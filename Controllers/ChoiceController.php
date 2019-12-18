<?php

require_once 'AppController.php';

class ChoiceController extends AppController {

    public function choice()
    {   
        $this->render('choice');
    }

    public function verifylesson()
    {   
        $day = $_POST['day'];
        $name = $_POST['name'];
        $startHour= $_POST['startHour'];
        $startMinute = $_POST['startMinute'];
        $endHour= $_POST['endHour'];
        $endMinute = $_POST['endMinute'];
        $color = $_POST['color'];
           
        if(!is_numeric($startHour) || !is_numeric($endHour) || !is_numeric($startMinute) || !is_numeric($endHour))
        {
            $this->render('choice', ['messages' => ['Niepoprawny email!']]);
            return;
        }

        if($startHour<0 || $startHour>23 || $endHour<0 || $endHour<23)
        {
            $this->render('choice', ['messages' => ['Niepoprawny email!']]);
            return;
        }

        if($startHour<0 || $startHour>23 || $endHour<0 || $endHour<23)
        {
            $this->render('choice', ['messages' => ['Niepoprawny email!']]);
            return;
        }

        $login = new LoginController();
        $login->successregistration();
    }
}