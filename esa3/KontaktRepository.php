<?php declare(strict_types=1);

class KontaktRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertKontakt(
        string $vorname, string $nachname
        , string $email, string $telefonnummer
    ) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO personen (vorname, nachname, email, telefonnummer, rolle) 
            VALUES (:vorname, :nachname, :email, :telefonnummer, 'keine')"
        );
        $stmt->bindParam(":vorname", $vorname);
        $stmt->bindParam(":nachname", $nachname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":telefonnummer", $telefonnummer);
        $stmt->execute();

        // Ergebnis soll in "StudentModel" gefüllt werden
        // Objekt "$student" der Klasse "StudentModel" wird 
        // automatisch erstellt, ohne "$student = new StudentModel()" 
        /// $stmt->setFetchMode(PDO::FETCH_CLASS, 'Projektkonatkt');
    }

    public function showKontacts()
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM personen"
        );
        $stmt->execute();

        // Ergebnis soll in "StudentModel" gefüllt werden
        // Objekt "$student" der Klasse "StudentModel" wird 
        // automatisch erstellt, ohne "$student = new StudentModel()" 
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Projektkontakt');
        $student = $stmt->fetchAll(PDO::FETCH_CLASS, "Projektkontakt");



        return $student;

    }
}