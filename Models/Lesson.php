<?php

class Lesson {
    private $name;
    private $start_hour;
    private $end_hour;
    private $start_minute;
    private $end_minute;
    private $color;

    public function __construct(
        string $name,
        string $startHour,
        string $endHour,
        string $startMinute,
        string $endMinute,
        string $color
    ) {
        $this->name = $name;
        $this->$startHour = $startHour;
        $this->$endHour = $endHour;
        $this->$startMinute = $startMinute;
        $this->$endMinute = $endMinute;
        $this->$color = $color;
    }

    public function getName()
    {
        return $this->$name;
    }

    public function getName()
    {
        return $this->$startHour;
    }

    public function getendHour()
    {
        return $this->$endHour;
    }

    public function getstartMinute()
    {
        return $this->$startMinute;
    }

    public function getendMinute()
    {
        return $this->$endMinute;
    }

    public function getColor()
    {
        return $this->$color;
    }
}
