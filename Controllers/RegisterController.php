<?php

require_once 'AppController.php';
require_once 'LoginController.php';

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

            if (strlen($email)==0 || strlen($nick)==0 || strlen($password1)==0 || strlen($password2)==0) {
                $this->render('registration', ['messages' => ['Uzupełnij wszystkie dane!']]);
                return;
            }
           
            if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
            {
                $this->render('registration', ['messages' => ['Niepoprawny email!']]);
                return;
            }

            if (strlen($nick)<3 || strlen($nick)>15) {
                $this->render('registration', ['messages' => ['Nick musi posiadać od 3 do 15 znaków!']]);
                return;
            }

            if(ctype_alnum($nick)==false){
                $this->render('registration', ['messages' => ['Nick może składać się tylko z liter i cyfr(bez polskich znaków)!']]);
                return;
            }

            if((strlen($password1))<6 || (strlen($password1))>15){
                $this->render('registration', ['messages' => ['Hasło musi posiadać od 6 do 15 znaków!']]);
                return;
            }

            if($password1 != $password2){
                $this->render('registration', ['messages' => ['Podane hasła nie są identyczne!']]);
                return;
            }

            //tutaj musza być metody czy dane znajdują się w bazie danych!
            // i jak wszystko ok to dodanie do bazy danych nowego użytkownika
        
        $login = new LoginController();
        $login->successregistration();
    }

}