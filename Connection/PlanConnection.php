<?php
require_once "Connection.php";
require_once __DIR__.'//..//Models//Lesson.php';

class PlanConnection extends Connection {
    
    public function read($day_id){
        $array = array();

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = :day_id');
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->bindParam(':day_id', $day_id, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($users)>0){
            foreach($users as $user){
                $_SESSION['week_id'] = $user['week_id'];

                $this->readNameLesson($user['lesson_name_id']);
                $this->readHours($user['hour_id']);
                $this->readMinutes($user['minute_id']);
                $this->readColor($user['color_id']);

                array_push($array,
                new Lesson($_SESSION['lesson_name'],
                $_SESSION['hour_start'],
                $_SESSION['hour_end'],
                $_SESSION['minute_start'],
                $_SESSION['minute_end'],
                $_SESSION['color'],
                $_SESSION['border_color'],
                $user['week_number'],
                $user['lesson_id'])
                );
            }
        }
        return $array;
    }  

    public function readHours($hourId)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM hour WHERE hour_id = :hour_id');
        $stmt->bindParam(':hour_id', $hourId, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['hour_end'] = $users['hour_end'];
        $_SESSION['hour_start'] = $users['hour_start']; 
    }  
   
    public function readMinutes($minuteId)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM minute WHERE minute_id = :minute_id');
        $stmt->bindParam(':minute_id', $minuteId, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['minute_end'] = $users['minute_end'];
        $_SESSION['minute_start'] = $users['minute_start']; 
    }  

    public function readNameLesson($lessonId)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson_name WHERE lesson_name_id = :lesson_name_id');
        $stmt->bindParam(':lesson_name_id', $lessonId, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        return $users;
        $_SESSION['lesson_name']= $users['lesson_name'];
    }  

    /*
    public function readDay($dayId)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM day WHERE day_id = :day_id');
        $stmt->bindParam(':day_id', $dayId, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['day']= $users['name_day'];
    }  */

    public function readColor($colorId)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM color WHERE color_id = :color_id');
        $stmt->bindParam(':color_id', $colorId, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['color']= $users['color'];
        $_SESSION['border_color']= $users['border_color'];
    }  

    public function removeLesson($lesson_id)
    {
        $stmt = $this->database->connect()->prepare('
        DELETE FROM lesson WHERE lesson_id = :lesson_id');
        $stmt->bindParam(':lesson_id', $lesson_id, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);
    }  

   

}