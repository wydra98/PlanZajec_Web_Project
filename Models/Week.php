<?php

class Week {
    private $name;
    private $monday = new Day("monday");
    private $monday = new Day("tuesday");
    private $tuesday = new Day("wednesday");
    private $wendesday = new Day("thursday");
    private $thursday = new Day("friday");
    private $saturday = new Day("saturday");
    private $sunday = new Day("sunday");

    public function __construct(
        string $name,
    ) {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
