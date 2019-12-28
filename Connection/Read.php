<?php
require_once "Connection.php";
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Models//Week.php';
require_once __DIR__.'//..//Models//Lesson.php';
require_once __DIR__.'//..//Models//Day.php';
require_once __DIR__.'//..//Models//Singleton.php';

class Read extends Connection {
    
    public function readOwner(){
        $user = new User();
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM owner WHERE user_id = :user_id');
        $stmt->bindParam(':user_id', $_SESSION["userId"], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['users'] = count($users);

            for($x=0;$x<count($users);$x++){
                $_SESSION['week_id'] = $users[$x]['week_id'];
                $_SESSION['status'] = $users[$x]['status']; 
                $this->readWeekName();
                $week  = new Week($_SESSION['week_name'],$x);

                $this->readLessonsMonday();
                $this->addLessons('Monday',$week);
              
                $this->readLessonsTuesday();
                $this->addLessons('Tuesday',$week);

                $this->readLessonsWednesday();
                $this->addLessons('Wednesday',$week);

                $this->readLessonsThursday();
                $this->addLessons('Thursday',$week);

                $this->readLessonsFriday();
                $this->addLessons('Friday',$week);
            
                $this->readLessonsSaturday();
                $this->addLessons('Satuday',$week);
                
                $this->readLessonsSunday();
                $this->addLessons('Sunday',$week);
             
                $user ->addWeek($week);
            }
            Singleton::setInstance($user);
            return $user;
            
    } 

    public function readWeekName(){
        $stmt = $this->database->connect()->prepare('
        SELECT week_name FROM week WHERE week_id = :week_id');
        $stmt->bindParam(':week_id', $_SESSION['week_id'] , PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['week_name'] = $users['week_name'];
    } 

    public function readLessonsMonday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 1' );
        $stmt->bindParam(':week_id', $_SESSION['week_id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['users'] = count($users);
        $this->checkLessons();
    }  

    public function readLessonsTuesday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 2' );
        $stmt->bindParam(':week_id', $_SESSION['week_id'] , PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['users'] = count($users);
        $this->checkLessons();
    }  

    public function readLessonsWednesday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 3' );
        $stmt->bindParam(':week_id', $_SESSION['week_id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['users'] = count($users);
        $this->checkLessons();
    }  

    public function readLessonsThursday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 4' );
        $stmt->bindParam(':week_id', $_SESSION['week_id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['users'] = count($users);
        $this->checkLessons();
    }  

    public function readLessonsFriday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 5' );
        $stmt->bindParam(':week_id', $_SESSION['week_id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['users'] = count($users);
        $this->checkLessons();
    }  

    public function readLessonsSaturday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 6' );
        $stmt->bindParam(':week_id', $_SESSION['week_id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['users'] = count($users);
        $this->checkLessons();
    }  

    public function readLessonsSunday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 7' );
        $stmt->bindParam(':week_id', $_SESSION['week_id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['users'] = count($users);
        $this->checkLessons();
    }  


    public function readHours($x)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM hour WHERE lesson_id = :lesson_id');
        $stmt->bindParam(':lesson_id', $_SESSION['lesson_id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['hour_end'][$x] = $users['hour_end'];
        $_SESSION['hour_start'][$x] = $users['hour_start']; 
    }  
   
    public function readMinutes($x)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM minute WHERE lesson_id = :lesson_id');
        $stmt->bindParam(':lesson_id', $_SESSION['lesson_id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['minute_end'][$x] = $users['minute_end'];
        $_SESSION['minute_start'][$x] = $users['minute_start']; 
    }  

    public function readNameLesson($x)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson_name WHERE lesson_id = :lesson_id');
        $stmt->bindParam(':lesson_id', $_SESSION['lesson_id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['lesson_name'][$x]= $users['lesson_name'];
    }  

    public function addLessons($name, $week){  
        $function = 'get'.$name.'()';
        for($z=0;$z<$_SESSION['users'];$z++){
            $week->getMonday()
            ->addLesson(new Lesson(
            $_SESSION['lesson_name'][$z],
            $_SESSION['hour_start'][$z],
            $_SESSION['hour_end'][$z],
            $_SESSION['minute_start'][$z],
            $_SESSION['minute_end'][$z],
            $_SESSION['color'][$z],
            $_SESSION['week_number'][$z]));
        }
    }

    public function checkLessons(){
        if($_SESSION['users']>0){
            for($x=0;$x<$_SESSION['users'];$x++){
                $_SESSION['lesson_id'][$x] = $users[$x]['lesson_id'];
                $_SESSION['color'][$x]= $users[$x]['color'];
                $_SESSION['week_number'][$x] = $users[$x]['week_number'];
                $_SESSION['week_number'][$x] = $users[$x]['week_number'];
                $this->readNameLesson($x);
                $this->readHours($x);
                $this->readMinutes($x);
            }
        }
    }

}