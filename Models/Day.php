<?php

class Day {
    public $name;
    public $lessonCollection;

    public function __construct(
        string $name
    ) {
        $this->name = $name;
    }
    
    public function addLesson(Lesson $lesson)
    {
        global $lessonCollection;
        $lessonCollection[] = $lesson;
    }


}
