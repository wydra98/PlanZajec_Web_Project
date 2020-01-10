<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//Lesson.php';
require_once __DIR__.'//..//Connection//MainConnection.php';
require_once __DIR__.'//..//Connection//PlanConnection.php';

class MainController extends AppController {

    public function mainFunction()
    {  
        $foo = new MainConnection();
        $foo->readWeekName();
        $this->render('main');
        return;
    }

    public function verifyNewPlan()
    {
        $namePlan = $_POST['namePlan']; 
        $code = uniqid();
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

        $foo->addNewWeek($namePlan,$code);
        $foo->readWeekName();
        $this->render('main', ['messages' => ['Dodano nowy plan!']]);
        return;
    }

    public function verifySharePlan()
    {
        $code = $_POST['code'];
        $newPlanName = $_POST['newPlanName'];
        $newCode = uniqid();
        $foo = new MainConnection();


        if (strlen($newPlanName)==0) {
            $this->render('main', ['messages' => ['Uzupełnij wszystkie dane!']]);
            return;
        }

        if ($foo->checkNumberWeeks()) {
            $this->render('main', ['messages' => ['Osiągnięto maksymalną liczbę planów!']]);
            return;
        }

        if ( $foo->check($newPlanName)) {
            $this->render('main', ['messages' => ['Już posiadasz plan o takiej nazwie!']]);
            return;
        }

        if (!$foo->checkCode($code)) {
            $this->render('main', ['messages' => ['Podany kod jest niepoprawny!']]);
            return;
        }

        $sharePlanWeek = $foo->findSharePlanWeek($code);
        $foo->addSharePlan($newPlanName,$newCode,$sharePlanWeek['week_id']);
        $foo->readWeekName();
        $this->render('main', ['messages' => ['Dodano udostępniony plan!']]);
        return;
    }

    public function delete()
    {
        $foo = new MainConnection();
        $foo->removeWeek();
        $foo->readWeekName();
        $this->render('main', ['messages' => ['Usunięto plan!']]);

    }

    public function emptyPlans()
    {
        $this->render('main', ['messages' => ['Nie masz żadnego planu!']]);
        return;
    }
}