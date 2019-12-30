<?php
require_once "Connection.php";
require_once __DIR__.'//..//Models//Week.php';

class MainConnection extends Connection {

    public function checkNumberWeeks(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM owner WHERE user_id = :user_id');
        $stmt->bindParam(':user_id', $_SESSION["userId"], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($users)>10){
            $flag = true;
        }
        else $flag = false;

        return $flag;
    }

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

        
    public function check(string $name)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT w.week_id FROM week w 
        join owner o on o.week_id=w.week_id
        WHERE w.week_name = :week_name AND o.user_id = :user_id');
        $stmt->bindParam(':week_name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $_SESSION['userId'], PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            $flag = false;
        }
        else $flag = true;
    
        return $flag;
    }


    public function addNewWeek($week_name){
    
        $stmt = $this->database->connect()->prepare('
        INSERT INTO `week` (week_id,week_name) VALUES(NULL,:week_name)');
        $stmt->bindParam(':week_name', $week_name, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
        SELECT week_id FROM week WHERE week_id = (
        SELECT MAX(week_id) FROM week)');
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->database->connect()->prepare('
        INSERT INTO `owner` (owner_id,user_id,week_id,status) VALUES(NULL,:user_id,:week_id,"no")');
        $stmt->bindParam(':user_id', $_SESSION['userId'], PDO::PARAM_STR);
        $stmt->bindParam(':week_id', $user['week_id'], PDO::PARAM_STR);
        $stmt->execute();
    } 

    public function checkNickMail(string $nickMail)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM user WHERE (email = :email OR nick = :nick)');
        $stmt->bindParam(':email', $nickMail, PDO::PARAM_STR);
        $stmt->bindParam(':nick', $nickMail, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == true) {
            $_SESSION['shareUserNick'] = $user['nick'];
            $_SESSION['shareUser'] = $user['user_id'];
            $flag = true;
        }
        else $flag = false;
       
        return $flag;
    }

    public function checkPlan(string $planName)
     {  
        $stmt = $this->database->connect()->prepare('
        SELECT w.week_id FROM week w 
        join owner o on o.week_id=w.week_id
        WHERE w.week_name = :week_name AND o.user_id = :user_id');
        $stmt->bindParam(':week_name', $planName, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $_SESSION['shareUser'] , PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == true) {
            $_SESSION['shareWeekId']=$user['week_id'];
            $flag = true;
        }
        else $flag = false;
    
        return $flag;
    }

    public function checkShare(){
        $stmt = $this->database->connect()->prepare('
        SELECT status FROM owner
        WHERE week_id = :week_id AND user_id = :user_id');
        $stmt->bindParam(':week_id', $_SESSION['shareWeekId'], PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $_SESSION['shareUser'] , PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user['status'] == "yes") {
            $flag = true;
        }
        else $flag = false;
    
        return $flag;
    }

    public function addShareWeek($planName){
    
        $planName = $planName.' - '.$_SESSION['shareUserNick'];
        // msimy skopiować wszystko z lekcji gdzie week_id =

        $stmt = $this->database->connect()->prepare('
        INSERT INTO `week` (week_id,week_name) VALUES(NULL,:week_name)');
        $stmt->bindParam(':week_name', $planName, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
        SELECT week_id FROM week WHERE week_id = (
        SELECT MAX(week_id) FROM week)');
        $stmt->execute();
        $number = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id');
        $stmt->bindParam(':week_id',  $_SESSION['shareWeekId'], PDO::PARAM_STR);
        $stmt->execute();
        $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($lessons as $lesson)
        {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO `lesson` (lesson_id,day_id,week_id,lesson_name_id,hour_id,minute_id,color,week_number) 
            VALUES(NULL,:day_id,:week_id,:lesson_name_id,:hour_id,:minute_id,:color,:week_number)');
            $stmt->bindParam(':day_id', $lessons[''], PDO::PARAM_STR);
            $stmt->bindParam(':week_id', $lessons[''], PDO::PARAM_STR);
            $stmt->bindParam(':lesson_name_id', $lessons[''], PDO::PARAM_STR);
            $stmt->bindParam(':hour_id', $lessons[''], PDO::PARAM_STR);
            $stmt->bindParam(':minute_id', $lessons[''], PDO::PARAM_STR);
            $stmt->bindParam(':color', $lessons[''], PDO::PARAM_STR);
            $stmt->bindParam(':week_number', $lessons[''], PDO::PARAM_STR);
            $stmt->execute();
        }

        $stmt = $this->database->connect()->prepare('
        INSERT INTO `week` (week_id,week_name) VALUES(NULL,:week_name)');
        $stmt->bindParam(':week_name', $planName, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
        SELECT week_id FROM week WHERE week_id = (
        SELECT MAX(week_id) FROM week)');
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->database->connect()->prepare('
        INSERT INTO `owner` (owner_id,user_id,week_id,status) VALUES(NULL,:user_id,:week_id,"no")');
        $stmt->bindParam(':user_id', $_SESSION['userId'], PDO::PARAM_STR);
        $stmt->bindParam(':week_id', $user['week_id'], PDO::PARAM_STR);
        $stmt->execute();
    } 
}