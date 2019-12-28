<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Connection//LoginRegister.php';
require_once __DIR__.'//..//Connection//Read.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Models//Week.php';
require_once __DIR__.'//..//Models//Lesson.php';
require_once __DIR__.'//..//Models//Day.php';
require_once __DIR__.'//..//Models//Singleton.php';


class LoginController extends AppController {

    public function login()
    {   
        $loginRegister = new LoginRegister();

        if ($this->isPost()) {
            $emailNick = $_POST['emailNick'];
            $password = $_POST['password'];

            if (strlen($emailNick)==0 || strlen($password)==0) {
                $this->render('login', ['messages' => ['Uzupełnij wszystkie dane!']]);
                return;
            }
           
            if (!$loginRegister->checkData($emailNick,$password)) {
                $this->render('login', ['messages' => ['Użytkownik o podanych danych nie istnieje!']]);
                return;
            }

            $read = new Read();
            $user = $read->readOwner();

            $_SESSION['user']=serialize($user);
            
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