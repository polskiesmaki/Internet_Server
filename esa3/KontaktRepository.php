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
    }

    public function updatePerson(
        string $id,
        string $vorname,
        string $nachname,
        string $email,
        string $telefonnummer
    ) {
        $id = (int) $id; // Cast the $id to an integer
        $stmt = $this->pdo->prepare(
            "UPDATE personen 
            SET vorname = :vorname, nachname = :nachname, email = :email, telefonnummer = :telefonnummer 
            WHERE id = :id"
        );
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":vorname", $vorname);
        $stmt->bindParam(":nachname", $nachname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":telefonnummer", $telefonnummer);
        $stmt->execute();
    }

    public function deletePerson($id)
    {
        $id = (int) $id; // Cast the $id to an integer

        $stmt = $this->pdo->prepare("DELETE FROM personen WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    //getPersonById Funtion
    public function getPersonById($id)
    {
        $id = (int) $id; // Cast the $id to an integer

        $stmt = $this->pdo->prepare("SELECT * FROM personen WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Projektkontakt');
        $person = $stmt->fetch();

        return $person;
    }



    public function showKontacts()
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM personen"
        );
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Projektkontakt');
        $student = $stmt->fetchAll(PDO::FETCH_CLASS, "Projektkontakt");



        return $student;

    }
}