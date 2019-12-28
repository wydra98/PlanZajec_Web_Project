<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Models//Week.php';
require_once __DIR__.'//..//Models//Lesson.php';
require_once __DIR__.'//..//Models//Day.php';
require_once __DIR__.'//..//Models//Singleton.php';


class MainController extends AppController {

    public function main()
    {  
        $user = unserialize($_SESSION['user']);
        $user->hej();
        if ($user->getWeekArray()) {
        foreach($user->getWeekArray() as $week){
            echo $week->getName();}}
            else 
            echo "dupa";
        //$this->render('main');
    }

    public function verifyNewPlan()
    {
        $namePlan = $_POST['namePlan']; 
        
        if (strlen($namePlan)==0) {
            $this->render('main', ['messages' => [''.$user->getWeekArray(0)->getName().'Nie podano nazwy nowego planu!']]);
            return;
        }

        if (strlen($namePlan)>15) {
            $this->render('main', ['messages' => ['Długość planu nie może mieć więcej niż 15 znaków!']]);
            return;
        }

        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=plan");
        return;
    }

    public function verifySharePlan()
    {
        
    }
}