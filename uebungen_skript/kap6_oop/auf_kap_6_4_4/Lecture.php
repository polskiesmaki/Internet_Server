<?php

class Lecture extends Modul
{
    protected $lectureName; // Eigenschaft von "Lecture"

    public function __construct(string $newLectureName) // Konstruktor von "Lecture"
    {
        $this->lectureName = $newLectureName;
        parent::__construct("Denio");
    }

    public function getLecture(): string
    {
        return $this->lectureName;
    }

    public function getLectureWithTeacher(): string
    {
        return $this->lectureName . " " . $this->teacher;
    }
}