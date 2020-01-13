<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//Lesson.php';
require_once __DIR__.'//..//Connection//MainConnection.php';
require_once __DIR__.'//..//Connection//PlanConnection.php';

class MainController extends AppController {

    public function mainFunction()
    {  
        $_SESSION['weekNumber']=1;
        $connection = new MainConnection();
        $connection->readWeekName();
        $this->render('main');
    }

    public function verifyNewPlan()
    {
        $namePlan = $_POST['namePlan']; 
        $code = uniqid();
        $connection = new MainConnection();

        if ($_SESSION['numberOfUserWeeks']==10) {
            $this->render('main', ['messages' => ['Osiągnięto maksymalną liczbę planów!']]);
            return;
        }

        if ($connection->checkNamePlanUniqueness($namePlan)) {
            $this->render('main', ['messages' => ['Już posiadasz plan o takiej nazwie!']]);
            return;
        }

        $connection->addNewWeek($namePlan,$code);
        $connection->readWeekName();
        $this->render('main', ['messages' => ['Dodano nowy plan!']]);
    }

    public function verifySharePlan()
    {
        $code = $_POST['code'];
        $newPlanName = $_POST['newPlanName'];
        $connection = new MainConnection();

        if ($_SESSION['numberOfUserWeeks']==10) {
            $this->render('main', ['messages' => ['Osiągnięto maksymalną liczbę planów!']]);
            return;
        }

        if ($connection->checkNamePlanUniqueness($newPlanName)) {
            $this->render('main', ['messages' => ['Już posiadasz plan o takiej nazwie!']]);
            return;
        }

        if (!$connection->checkCode($code)) {
            $this->render('main', ['messages' => ['Podany kod jest niepoprawny!']]);
            return;
        }

        $newCode = uniqid();
        $sharePlanWeek = $connection->findSharePlanWeek($code);
        $connection->addSharePlan($newPlanName,$newCode,$sharePlanWeek['week_id']);
        $connection->readWeekName();
        $this->render('main', ['messages' => ['Dodano udostępniony plan!']]);
    }

    public function delete()
    {
        $connection = new MainConnection();
        $connection->removeWeek();
        $connection->readWeekName();
        $this->render('main', ['messages' => ['Usunięto plan!']]);
    }

}