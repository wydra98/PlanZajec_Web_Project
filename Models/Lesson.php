<?php

class Lesson {
    private $name;
    private $startHour;
    private $endHour;
    private $startMinute;
    private $endMinute;
    private $color;
    private $borderColor;
    private $weekNumber;
    private $lessonId;
    private $startTime;

    public function __construct(
        string $name,
        $startHour,
        $endHour,
        $startMinute,
        $endMinute,
        string $color,
        string $borderColor,
        $weekNumber,
        $lessonId,
        $startTime
    ) {
        $this->name = $name;
        $this->startHour = $startHour;
        $this->endHour = $endHour;
        $this->startMinute = $startMinute;
        $this->endMinute = $endMinute;
        $this->color = $color;
        $this->borderColor = $borderColor;
        $this->weekNumber = $weekNumber;
        $this->lessonId = $lessonId;
        $this->startTime = $startTime;
    }

    public function getName()
    {
        return $this->name;
    }

    
    public function getStartTime()
    {
        return $this->startTime;
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

    public function getLessonId()
    {
        return $this->lessonId;
    }

    public function setStartHour($startHour)
    {
        $this->startHour = $startHour;
    }

    public function setEndHour($endHour)
    {
        $this->endHour = $endHour;
    }

    public function setStartMinute($startMinute)
    {
        $this->startMinute = $startMinute;
    }

    public function setEndMinute($endMinute)
    {
        $this->endMinute = $endMinute;
    }


}
