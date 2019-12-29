<?php

class Week {
    private $id;
    private $name;

    public function __construct(
        $id,
        $name
    ) {
        $this->name = $name;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}