<?php
require_once "Connection.php";

class LoginRegister extends Connection {

    public function checkData(string $emailNick, string $password)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM user WHERE (email = :email OR nick = :nick)');
        $stmt->bindParam(':email', $emailNick, PDO::PARAM_STR);
        $stmt->bindParam(':nick', $emailNick, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == true && password_verify($password,$user['password'])) {
            $_SESSION['userId'] = $user['user_id'];
            $flag = true;
        }
        else $flag = false;
       
        return $flag;
    }

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
