<?php

class Day {
    private $name;
    private $lessonCollection;

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

    public function getLessonCollection($x)
    {
        global $lessonCollection;
        return $lessonCollection($x);
    }

}
