<?php

class Lesson {
    private $name;
    private $start_hour;
    private $end_hour;
    private $start_minute;
    private $end_minute;
    private $color;
    private $weekNumber;
    private $week_name;
    private $dayId;

    public function __construct(
        string $name,
        $startHour,
        $endHour,
        $startMinute,
        $endMinute,
        string $color,
        string $borderColor,
        $weekNumber,
        string $day
    ) {
        $this->name = $name;
        $this->startHour = $startHour;
        $this->endHour = $endHour;
        $this->startMinute = $startMinute;
        $this->endMinute = $endMinute;
        $this->color = $color;
        $this->borderColor = $borderColor;
        $this->weekNumber = $weekNumber;
        $this->day = $day;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStartHour()
    {
        return $this->startHour;
    }

    public function getEndHour()
    {
        return $this->endHour;
    }

    public function getStartMinute()
    {
        return $this->startMinute;
    }

    public function getEndMinute()
    {
        return $this->endMinute;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getBorderColor()
    {
        return $this->borderColor;
    }

    public function getWeekNumber()
    {
        return $this->weekNumber;
    }

    public function getDay()
    {
        return $this->day;
    }

}
