<?php declare(strict_types=1);

class StudentRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchStudentByMatnr(int $start, int $end)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM php WHERE matnr BETWEEN :start AND :end"
        );
        $stmt->bindParam(":start", $start);
        $stmt->bindParam(":end", $end);
        $stmt->execute();

        // Ergebnis soll in "StudentModel" gefüllt werden
        // Objekt "$student" der Klasse "StudentModel" wird 
        // automatisch erstellt, ohne "$student = new StudentModel()" 
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'StudentModel');

        $student = $stmt->fetchAll(PDO::FETCH_CLASS, "StudentModel");


        return $student;

    }
}