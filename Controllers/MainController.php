<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//Lesson.php';
require_once __DIR__.'//..//Connection//MainConnection.php';



class MainController extends AppController {

    public function main()
    {  
        $foo = new MainConnection();
        $foo->readWeekName();
        $this->render('main');
    }

    public function verifyNewPlan()
    {
        $namePlan = $_POST['namePlan']; 
        
        if (strlen($namePlan)==0) {
            $this->render('main', ['messages' => ['Nie podano nazwy nowego planu!']]);
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