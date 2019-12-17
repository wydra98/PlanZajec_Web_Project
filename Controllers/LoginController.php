<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
session_start();

class LoginController extends AppController {

    public function login()
    {   
        $user = new User('johnny@pk.edu.pl', 'admin', 'Johnny');

        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($user->getEmail() !== $email) {
                $this->render('login', ['messages' => ['Użytkownik o podanym mailu/nicku nie istnieje!']]);
                return;
            }

            if ($user->getPassword() !== $password) {
                $this->render('login', ['messages' => ['Złe hasło!']]);
                return;
            }

            $_SESSION["id"] = $user->getEmail();

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
}