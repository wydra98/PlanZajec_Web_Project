<?php
require_once "Connection.php";

class RegistrationConnection extends Connection {

//<---------------------------------VALIDATION: CHECK IF THE SAME EMAIL EXIST IN BASE----------------------------------->

    public function checkEmail(string $email)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM user WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            $flag = false;
        }
        else $flag = true;
    
        return $flag;
    }


//<---------------------------------VALIDATION: CHECK IF THE SAME NICK EXIST IN BASE----------------------------------->

    public function checkNick(string $nick)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM user WHERE nick = :nick');
        $stmt->bindParam(':nick', $nick, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            $flag = false;
        }
        else $flag = true;
    
        return $flag;
    }

    //<--------------------------------------------ADD NEW USER TO BASE---------------------------------------------->

    public function addNewUser(string $email, string $nick,string $password)
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO `user` (user_id,email,nick,password) VALUES(NULL,:email,:nick,:password)');
        $stmt->bindParam(':nick', $nick, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    }


}