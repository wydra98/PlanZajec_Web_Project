<?php
require_once "Connection.php";
require_once __DIR__.'//..//Models//Lesson.php';

class ChoiceConnection extends Connection {

    public function checkHours($startHour,$startMinute,$endHour,$endMinute,$day)
    {
        $flag = true;
        if($day == "Poniedziałek") $day_id = 1;
        else if($day == "Wtorek") $day_id = 2;
        else if($day == "Środa") $day_id = 3;
        else if($day == "Czwartek") $day_id = 4;
        else if($day == "Piątek") $day_id = 5;
        else if($day == "Sobota") $day_id = 6;
        else $day_id = 7;

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = :day_id AND week_number = :week_number');
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->bindParam(':day_id', $day_id, PDO::PARAM_STR);
        $stmt->bindParam(':week_number', $_SESSION['weekNumber'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($users)>0){
                foreach($users as $user)
                {
                    $hours = $this->readHours($user['hour_id']);
                    $minutes = $this->readMinutes($user['minute_id']);

                    $start_time = ($hours['hour_start']*60 + $minutes['minute_start']);
                    $end_time = ($hours['hour_end']*60 + $minutes['minute_end']);

                    $current_start_time = ($startHour)*60 + $startMinute;
                    $current_end_time = ($endHour)*60 + $endMinute;

                    if (($start_time<$current_start_time && $end_time>$current_start_time)||
                        ($current_start_time<$start_time && $current_end_time>$start_time)||
                        ($current_start_time<=$start_time && $current_end_time>$end_time)||
                        ($current_start_time<$start_time && $current_end_time>=$end_time)||
                        ($start_time<$current_start_time && $end_time>=$current_end_time)||
                        ($start_time<=$current_start_time && $end_time>$current_end_time)||
                        ($start_time==$current_start_time && $end_time==$current_end_time)){
                            $flag = false;
                            break;
                    }
                }
            }
        return $flag;
    }

    public function readHours($hourId)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM hour WHERE hour_id = :hour_id');
        $stmt->bindParam(':hour_id', $hourId, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        return $users;
    }  
   
    public function readMinutes($minuteId)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM minute WHERE minute_id = :minute_id');
        $stmt->bindParam(':minute_id', $minuteId, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        return $users;
    }  

}
