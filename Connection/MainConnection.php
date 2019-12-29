<?php
require_once "Connection.php";
require_once __DIR__.'//..//Models//Week.php';

class MainConnection extends Connection {

    public function readWeekName(){
        $_SESSION['weeks'] = array();
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM owner WHERE user_id = :user_id');
        $stmt->bindParam(':user_id', $_SESSION["userId"], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($users as $user){
            $this->readWeek($user["week_id"]);
            array_push($_SESSION['weeks'],new Week($user["week_id"],$_SESSION['week_name']));
        }
    }

        public function readWeek($id){
            $stmt = $this->database->connect()->prepare('
            SELECT week_name FROM week WHERE week_id = :week_id');
            $stmt->bindParam(':week_id', $id , PDO::PARAM_STR);
            $stmt->execute();
            $users = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $_SESSION['week_name'] = $users['week_name'];
        } 
    }