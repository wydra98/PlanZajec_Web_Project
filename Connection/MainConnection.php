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


    public function addNewWeek($week_name,$code){
    
        $stmt = $this->database->connect()->prepare('
        INSERT INTO `week` (week_id,week_name,code) VALUES(NULL,:week_name,:code)');
        $stmt->bindParam(':week_name', $week_name, PDO::PARAM_STR);
        $stmt->bindParam(':code', $week_name, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
        SELECT week_id FROM week WHERE week_id = (
        SELECT MAX(week_id) FROM week)');
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->database->connect()->prepare('
        INSERT INTO `owner` (owner_id,user_id,week_id) VALUES(NULL,:user_id,:week_id)');
        $stmt->bindParam(':user_id', $_SESSION['userId'], PDO::PARAM_STR);
        $stmt->bindParam(':week_id', $user['week_id'], PDO::PARAM_STR);
        $stmt->execute();
    } 

    public function checkCode(string $code)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT w.code FROM week w  
        join owner o on o.week_id=w.week_id
        WHERE code = :code AND o.user_id = :user_id');
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $_SESSION['userId'], PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            $flag = false;
        }
        else $flag = true;
    
        return $flag;
    }

    public function addShareWeek($sharePlanName,$code){
        $stmt = $this->database->connect()->prepare('
        INSERT INTO `week` (week_id,week_name,code) VALUES(NULL,:week_name,:code)');
        $stmt->bindParam(':week_name', $sharePlanName, PDO::PARAM_STR);
        $stmt->bindParam(':code', $week_name, PDO::PARAM_STR);
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
            INSERT INTO `lesson` (lesson_id,day_id,week_id,lesson_name_id,hour_id,minute_id,color_id,week_number) 
            VALUES(NULL,:day_id,:week_id,:lesson_name_id,:hour_id,:minute_id,:color_id,:week_number)');
            $stmt->bindParam(':day_id', $lesson['day_id'], PDO::PARAM_STR);
            $stmt->bindParam(':week_id', $number['week_id'], PDO::PARAM_STR);
            $stmt->bindParam(':lesson_name_id', $lesson['lesson_name_id'], PDO::PARAM_STR);
            $stmt->bindParam(':hour_id', $lesson['hour_id'], PDO::PARAM_STR);
            $stmt->bindParam(':minute_id', $lesson['minute_id'], PDO::PARAM_STR);
            $stmt->bindParam(':color_id', $lesson['color_id'], PDO::PARAM_STR);
            $stmt->bindParam(':week_number', $lesson['week_number'], PDO::PARAM_STR);
            $stmt->execute();
        }

        $stmt = $this->database->connect()->prepare('
        INSERT INTO `owner` (owner_id,user_id,week_id) VALUES(NULL,:user_id,:week_id)');
        $stmt->bindParam(':user_id', $_SESSION['userId'], PDO::PARAM_STR);
        $stmt->bindParam(':week_id', $number['week_id'], PDO::PARAM_STR);
        $stmt->execute();

    } 

    public function removeWeek(){

        $stmt = $this->database->connect()->prepare('
        DELETE FROM lesson WHERE week_id = :week_id');
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
        DELETE FROM owner WHERE week_id = :week_id');
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
        DELETE FROM week WHERE week_id = :week_id');
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->execute();
    }
}