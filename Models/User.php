<?php
require_once 'Week.php';

class User {
    private $userId;
    private $weekArray;

    public function __construct(
        string $id
    ) {
        $this->id = $id;
    }

    public function addWeek(Week $week)
    {
        global $weekArray;
        $weekArray[] = $week;
        
    }

    public function getWeekArray($x)
    {
        global $weekArray;
        return $weekArray[$x];
    }
}