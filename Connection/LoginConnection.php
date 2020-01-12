<?php
require_once "Connection.php";

class LoginConnection extends Connection {

    //<---------------------------------CHECK IF NICK/EMAIL EXIST IN BASE----------------------------------->

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

}
