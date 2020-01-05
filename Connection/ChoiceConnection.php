<?php
require_once "Connection.php";
require_once __DIR__.'//..//Models//Lesson.php';

class ChoiceConnection extends Connection {

    public function checkHours($startHour,$startMinute,$endHour,$endMinute,$day)
    {
        $flag = true;
        if (count($_SESSION['lessons'.$day.''])>0){
            foreach($_SESSION['lessons'.$day.''] as $lesson)
            {
                if($lesson->getWeekNumber()==$_SESSION['weekNumber']){

                    $start_time = ($lesson->getStartHour())*60 + $lesson->getStartMinute();
                    $end_time = ($lesson->getEndHour())*60 + $lesson->getEndMinute();

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
        }
        return $flag;
    }

}
