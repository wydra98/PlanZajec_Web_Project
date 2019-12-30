<?php
require_once "Connection.php";
require_once __DIR__.'//..//Models//Lesson.php';

class PlanConnection extends Connection {
    
    public function read(){
        $_SESSION['lessons'] = array();
        
        $this->readLessonsMonday();
        $this->readLessonsTuesday();
        $this->readLessonsWednesday();
        $this->readLessonsThursday();
        $this->readLessonsFriday();   
        $this->readLessonsSaturday();          
        $this->readLessonsSunday();         
    }

    public function readLessonsMonday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 1' );
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($users)>0){
            $this->checkLessons($users);}
        }  

    public function readLessonsTuesday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 2' );
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'] , PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($users)>0){
            $this->checkLessons($users);}
    }  

    public function readLessonsWednesday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 3' );
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($users)>0)
            $this->checkLessons($users);
    }  

    public function readLessonsThursday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 4' );
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($users)>0)
            $this->checkLessons($users);
    }  

    public function readLessonsFriday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 5' );
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($users)>0)
            $this->checkLessons($users);
    }  

    public function readLessonsSaturday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 6' );
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($users)>0)
            $this->checkLessons($users);
    }  

    public function readLessonsSunday(){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson WHERE week_id = :week_id AND day_id = 7' );
        $stmt->bindParam(':week_id', $_SESSION['chooseWeek'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($users)>0)
            $this->checkLessons($users);
    }  


    public function readHours()
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM hour WHERE lesson_id = :lesson_id');
        $stmt->bindParam(':lesson_id', $_SESSION['lesson_id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['hour_end'] = $users['hour_end'];
        $_SESSION['hour_start'] = $users['hour_start']; 
    }  
   
    public function readMinutes()
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM minute WHERE lesson_id = :lesson_id');
        $stmt->bindParam(':lesson_id', $_SESSION['lesson_id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['minute_end'] = $users['minute_end'];
        $_SESSION['minute_start'] = $users['minute_start']; 
    }  

    public function readNameLesson()
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM lesson_name WHERE lesson_id = :lesson_id');
        $stmt->bindParam(':lesson_id', $_SESSION['lesson_id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['lesson_name']= $users['lesson_name'];
    }  

    public function addLessons(){  
            array_push($_SESSION['lessons'],
            new Lesson($_SESSION['lesson_name'],
            $_SESSION['hour_start'],
            $_SESSION['hour_end'],
            $_SESSION['minute_start'],
            $_SESSION['minute_end'],
            $_SESSION['color'],
            $_SESSION['week_number'],
            $_SESSION['day_id']));
    }

    public function checkLessons($users){
        foreach($users as $user){
            $_SESSION['lesson_id'] = $user['lesson_id'];
            $_SESSION['color']= $user['color'];
            $_SESSION['week_number'] = $user['week_number'];
            $_SESSION['day_id'] = $user['day_id'];
            $this->readNameLesson();
            $this->readHours();
            $this->readMinutes();
            $this->addLessons();
        }
    }

}