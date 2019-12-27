<?php
require_once 'Day.php';

class Week {
    private $name;
    private $monday;
    private $tuesday;
    private $wendesday;
    private $thursday;
    private $friday;
    private $saturday;
    private $sunday;

    public function __construct(
        string $name
    ) {
        $this->name = $name;
        $this->monday = new Day("monday");
        $this->tuesday = new Day("tuesday");
        $this->wednesday = new Day("wednesday");
        $this->thursday = new Day("thursday");
        $this->friday = new Day("friday");
        $this->saturday = new Day("saturday");
        $this->sunday = new Day("sunday");
    }

    public function getName(){    
        return $this->name;
    }

    public function getMonday(){    
        return $this->monday;
    }

    public function getTuesday()
    {
        return $this->tuesday;
    }

    public function getWednesday()
    {
        return $this->wednesday;
    }

    public function getThursday()
    {
        return $this->thursday;
    }

    public function getFriday()
    {
        return $this->friday;
    }

    public function getSaturday()
    {
        return $this->saturday;
    }

    public function getSunday()
    {
        return $this->sundday;
    }

}
