<?php

class Plan {
    private $name;
    private $monday = new Day("monday");
    private $monday = new Day("tuesday");
    private $tuesday = new Day("wednesday");
    private $wendesday = new Day("thursday");
    private $thursday = new Day("friday");
    private $saturday = new Day("saturday");
    private $sunday = new Day("sunday");
    private $weekNumber;

    public function __construct(
        string $name,
        $weekNumber
    ) {
        $this->name = $name;
        $this->weekNumber = $weekNumber;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setNumber()
    {
        return $this->name;
    }
}
