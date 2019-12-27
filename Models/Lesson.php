<?php

class Lesson {
    private $name;
    private $start_hour;
    private $end_hour;
    private $start_minute;
    private $end_minute;
    private $color;
    private $week_number;

    public function __construct(
        string $name,
        $startHour,
        $endHour,
        $startMinute,
        $endMinute,
        string $color,
        $week_number
    ) {
        $this->name = $name;
        $this->$startHour = $startHour;
        $this->$endHour = $endHour;
        $this->$startMinute = $startMinute;
        $this->$endMinute = $endMinute;
        $this->$color = $color;
        $this->$week_number = $week_number;
    }

}
