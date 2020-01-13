<?php

require_once 'AppController.php';
require_once 'LoginController.php';
require_once __DIR__.'//..//Connection//RegistrationConnection.php';

class RegistrationController extends AppController {

    public function registration()
    {   
        $this->render('registration');
    }

    public function verifyregistration()
    {   
            $email = $_POST['email'];
            $nick = $_POST['nick'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
            $connection = new RegistrationConnection();
           
            if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
            {
                $this->render('registration', ['messages' => ['Niepoprawny email!']]);
                return;
            }

            if(ctype_alnum($nick)==false){
                $this->render('registration', ['messages' => ['Nick może składać się tylko z liter i cyfr(bez polskich znaków)!']]);
                return;
            }

            if($connection->checkEmail($email)){
                $this->render('registration', ['messages' => ['Użytkownik o podanym e-maliu już istnieje!']]);
                return;
            }

            if($connection->checkNick($nick)){
                $this->render('registration', ['messages' => ['Użytkownik o podanym nicku już istnieje!']]);
                return;
            }
            $hashPassword= password_hash($password1,PASSWORD_DEFAULT);
            $connection->addNewUser($email,$nick,$hashPassword);
            
            $login = new LoginController();
            $login->successregistration();
    }

}