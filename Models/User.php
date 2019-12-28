<?php
require_once 'Week.php';

class User {
    private $weekArray;

    public function addWeek(Week $week)
    {
        global $weekArray;
        $weekArray[] = $week;  
    }

    public function getWeekArray()
    {
        global $weekArray;
        return $weekArray;
    }

    public function hej()
    {
        echo'hej';
    }
}