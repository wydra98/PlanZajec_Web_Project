<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//Lesson.php';
require_once __DIR__.'//..//Connection//MainConnection.php';

class MainController extends AppController {

    public function mainFunction()
    {  
        $foo = new MainConnection();
        $foo->readWeekName();
        $this->render('main');
    }

    public function verifyNewPlan()
    {
        $namePlan = $_POST['namePlan']; 
        $foo = new MainConnection();
        
        if (strlen($namePlan)==0) {
            $this->render('main', ['messages' => ['Nie podano nazwy nowego planu!']]);
            return;
        }

        if (strlen($namePlan)>15) {
            $this->render('main', ['messages' => ['Długość planu nie może mieć więcej niż 15 znaków!']]);
            return;
        }

        if ( $foo->checkNumberWeeks()) {
            $this->render('main', ['messages' => ['Osiągnięto maksymalną liczbę planów!']]);
            return;
        }

        if ( $foo->check($namePlan)) {
            $this->render('main', ['messages' => ['Już posiadasz plan o takiej nazwie!']]);
            return;
        }

        $foo->addNewWeek($namePlan);
        $foo->readWeekName();
        $this->render('main', ['messages' => ['Dodano nowy plan!']]);
        return;
    }

    public function verifySharePlan()
    {
        $nickMail = $_POST['nickMail'];
        $planName = $_POST['planName'];
        $foo = new MainConnection();

        if (strlen($nickMail)==0 || strlen($planName)==0) {
            $this->render('main', ['messages' => ['Uzupełnij wszystkie dane!']]);
            return;
        }

        if ($foo->checkNumberWeeks()) {
            $this->render('main', ['messages' => ['Osiągnięto maksymalną liczbę planów!']]);
            return;
        }

        if (!$foo->checkNickMail($nickMail)) {
            $this->render('main', ['messages' => ['Użytkownik o podanych danych nie istnieje!']]);
            return;
        }

        if (!$foo->checkPlan($planName)) {
            $this->render('main', ['messages' => ['Podany użytkownik nie ma takiego planu!']]);
            return;
        }

        if (!$foo->checkShare()) {
            $this->render('main', ['messages' => ['Podany plan jest nieudostępniony!']]);
            return;
        }

        $foo->addShareWeek($planName);
        //$foo->readWeekName();
        $this->render('main', ['messages' => ['Dodano udostępniony plan!']]);
        return;

    }
}