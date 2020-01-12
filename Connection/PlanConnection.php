<?php
require_once "Connection.php";
require_once __DIR__.'//..//Models//Lesson.php';

class PlanConnection extends Connection {
    

    //<---------------------------------READ USERS LESSON FROM BASE----------------------------------->

    public function read($day_id)
    {
        $array = array();
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = :day_id');
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->bindParam(':day_id', $day_id, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($users)>0){
            foreach($users as $user){
                $lesson = $this->readNameLesson($user['lesson_name_id']);
                $hours = $this->readHours($user['hour_id']);
                $minutes = $this->readMinutes($user['minute_id']);
                $colors = $this->readColor($user['color_id']);
                $startTime = ($hours['hour_start'])*60 + $minutes['minute_start'];

                array_push($array,
                new Lesson($lesson['lesson_names'],
                $hours['hour_start'],
                $hours['hour_end'],
                $minutes['minute_start'],
                $minutes['minute_end'],
                $colors['colors'],
                $colors['border_color'],
                $user['week_number'],
                $user['lesson_id'],
                $startTime)
                );
            }
        }
        return $array;
    }  

    private function readHours($hourId)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM hour WHERE hour_id = :hour_id');
        $stmt->bindParam(':hour_id', $hourId, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        return $users;
    }  
   
    private function readMinutes($minuteId)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM minute WHERE minute_id = :minute_id');
        $stmt->bindParam(':minute_id', $minuteId, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        return $users;
    }  

    private function readNameLesson($lessonId)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson_name WHERE lesson_name_id = :lesson_name_id');
        $stmt->bindParam(':lesson_name_id', $lessonId, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        return $users;
    }  

    private function readColor($colorId)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM color WHERE color_id = :colorId');
        $stmt->bindParam(':colorId', $colorId, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        return $users;
    }  



    //<---------------------------------ADD LESSON TO BASE----------------------------------->

    public function addNewLesson($day,$lessonName,$startHour,$startMinute,$endHour,$endMinute,$color)
    {
        $minute_id = $this->readMinutesId($startMinute,$endMinute);
        $hour_id = $this->readHoursId($startHour,$endHour);
        $lesson_name_id = $this->readNameId($lessonName);
        $color_id = $this->readColorId($color);
        $day_id = $this->readDayId($day);
        
        $stmt = $this->database->connect()->prepare('
        INSERT INTO `lesson` (lesson_id,day_id,week_id,lesson_name_id,hour_id,minute_id,color_id,week_number) 
        VALUES(NULL,:day_id,:week_id,:lesson_name_id,:hour_id,:minute_id,:color_id,:week_number)');
        $stmt->bindParam(':day_id', $day_id['day_id'], PDO::PARAM_STR);
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->bindParam(':lesson_name_id', $lesson_name_id['lesson_name_id'], PDO::PARAM_STR);
        $stmt->bindParam(':hour_id', $hour_id['hour_id'], PDO::PARAM_STR);
        $stmt->bindParam(':minute_id', $minute_id['minute_id'], PDO::PARAM_STR);
        $stmt->bindParam(':color_id', $color_id['color_id'], PDO::PARAM_STR);
        $stmt->bindParam(':week_number', $_SESSION['weekNumber'], PDO::PARAM_STR);
        $stmt->execute();
    }

    private function readMinutesId($startMinute,$endMinute)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT readMinuteId(:minute_start,:minute_end) as minute_id');
        $stmt->bindParam(':minute_start', $startMinute, PDO::PARAM_STR);
        $stmt->bindParam(':minute_end', $endMinute, PDO::PARAM_STR);
        $stmt->execute();
        $minute = $stmt->fetch(PDO::FETCH_ASSOC);
       
        if($minute == false){
            $stmt = $this->database->connect()->prepare('
            INSERT INTO `minute` (minute_id,minute_start,minute_end) VALUES(NULL,:minute_start,:minute_end)');
            $stmt->bindParam(':minute_start', $startMinute, PDO::PARAM_STR);
            $stmt->bindParam(':minute_end', $endMinute, PDO::PARAM_STR);
            $stmt->execute();
    
            $stmt = $this->database->connect()->prepare('
            SELECT minute_id FROM minute WHERE minute_id = (
            SELECT MAX(minute_id) FROM minute)');
            $stmt->execute();
            $minute = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $minute;
    }  

    private function readHoursId($startHour,$endHour)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT readHoursId(:hour_start,:hour_end) as hour_id');
        $stmt->bindParam(':hour_start', $startHour, PDO::PARAM_STR);
        $stmt->bindParam(':hour_end', $endHour, PDO::PARAM_STR);
        $stmt->execute();
        $hour = $stmt->fetch(PDO::FETCH_ASSOC);

        if($hour == false){
            $stmt = $this->database->connect()->prepare('
            INSERT INTO `hour` (hour_id,hour_start,hour_end) VALUES(NULL,:hour_start,:hour_end)');
            $stmt->bindParam(':hour_start', $startHour, PDO::PARAM_STR);
            $stmt->bindParam(':hour_end', $endHour, PDO::PARAM_STR);
            $stmt->execute();
    
            $stmt = $this->database->connect()->prepare('
            SELECT hour_id FROM hour WHERE hour_id = (
            SELECT MAX(hour_id) FROM hour)');
            $stmt->execute();
            $hour = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $hour;
    }  

    private function readNameId($lessonName)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT readNameId(:lesson_names) as lesson_name_id');
        $stmt->bindParam(':lesson_names', $lessonName, PDO::PARAM_STR);
        $stmt->execute();
        $name = $stmt->fetch(PDO::FETCH_ASSOC);

        if($name == false){
            $stmt = $this->database->connect()->prepare('
            INSERT INTO `lesson_name` (lesson_name_id,lesson_names) VALUES(NULL,:lesson_names)');
            $stmt->bindParam(':lesson_names', $lessonName, PDO::PARAM_STR);
            $stmt->execute();
    
            $stmt = $this->database->connect()->prepare('
            SELECT lesson_name_id FROM lesson_name WHERE lesson_name_id = (
            SELECT MAX(lesson_name_id) FROM lesson_name)');
            $stmt->execute();
            $name = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $name;
    }  

    private function readColorId($color)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT readColorId(:colors) as color_id');
        $stmt->bindParam(':colors', $color, PDO::PARAM_STR);
        $stmt->execute();
        $color = $stmt->fetch(PDO::FETCH_ASSOC);
        return $color;
    }  

    private function readDayId($day)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT readDayId(:name_day) as day_id');
        $stmt->bindParam(':name_day', $day, PDO::PARAM_STR);
        $stmt->execute();
        $day = $stmt->fetch(PDO::FETCH_ASSOC);
        return $day;
    } 



    //<---------------------------------REMOVE LESSON FROM BASE----------------------------------->

    public function removeLesson($lessonId)
    {
        $stmt = $this->database->connect()->prepare('
        DELETE FROM lesson WHERE lesson_id = :lessonId');
        $stmt->bindParam(':lessonId', $lessonId, PDO::PARAM_STR);
        $stmt->execute();
    }  


    //<---------------------------------READ WEEK CODE FROM BASE----------------------------------->

    public function readCode()
    {
        $stmt = $this->database->connect()->prepare('
        SELECT code FROM week WHERE week_id = :week_id');
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->execute();
        $day = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $_SESSION['code']= $day['code'];
    }  
   

}