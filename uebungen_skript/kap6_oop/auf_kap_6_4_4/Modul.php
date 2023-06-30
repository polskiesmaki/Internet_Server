<?php

class Modul
{
    protected $teacher; // Eigenschaft der Basisklasse

    public function __construct(string $newTeacher) // Konstruktor der Basisklasse
    {
        $this->teacher = $newTeacher;
    }
}