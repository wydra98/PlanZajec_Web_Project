<?php

class Day {
    private $name;
    private $lessonCollection[];

    public function __construct(
        string $name
    ) {
        $this->name = $name;
    }
    
    public function addLesson(Lesson lesson)
    {
        lessonCollection[] = lesson;
    }

    public function getName()
    {
        return $this->name;
    }
}
