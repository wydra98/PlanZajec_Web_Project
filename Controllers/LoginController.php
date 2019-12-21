<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Repository//UserRepository.php';
session_start();

class LoginController extends AppController {

    public function login()
    {   
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $emailNick = $_POST['emailNick'];
            $password = $_POST['password'];

            if (strlen($emailNick)==0 || strlen($password)==0) {
                $this->render('login', ['messages' => ['Uzupełnij wszystkie dane!']]);
                return;
            }
           
            if (!$userRepository->checkData($emailNick,$password)) {
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