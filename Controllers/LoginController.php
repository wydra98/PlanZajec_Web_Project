<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Connection//LoginConnection.php';
require_once __DIR__.'//..//Connection//PlanConnection.php';
require_once __DIR__.'//..//Models//Lesson.php';



class LoginController extends AppController {

    public function login()
    {   
        $login = new LoginConnection();

        if ($this->isPost()) {
            $emailNick = $_POST['emailNick'];
            $password = $_POST['password'];
           
            if (!$login->checkData($emailNick,$password)) {
                $this->render('login', ['messages' => ['Użytkownik o podanych danych nie istnieje!']]);
                return;
            }
            
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=main");
            return;
        }
        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('login', ['messages' => ['Zostałeś wylogowany!']]);
    }

    public function successregistration()
    {
        $this->render('login', ['messages' => ['Rejestracja przebiegła pomyslnie! Zaloguj się!']]);
    }

}