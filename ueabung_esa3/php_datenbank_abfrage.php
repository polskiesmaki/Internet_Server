<?php

// Verbindung zum Datenbankserver und der Datenbank "example" herstellen
$pdo = new PDO('mysql:host=localhost; charset=utf8; dbname=example', 'StudAdmin', 'N5..kunrwFIqp)qn');
// Sicherheiteinstellung für Prepared Statements
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
// Abfrage der Tabelle "php"
$pdo->query("UPDATE php SET name = 'Dupa' WHERE matnr = 5009999");
$result = $result = $pdo->query("SELECT name, semester FROM php");


// Nachsehen, was in $result enthalten ist
print_r($result);
echo "<hr>";

// Ausgeben der Inhalte
foreach ($result as $row) {
    echo $row['name']
        . " ist im Semester: "
        . $row['semester']
        . "<br>";
}

/**
 * Prepared Statements
 */

if (isset($_POST['start']) && isset($_POST['end'])) {
    // Variablen für Prepared Statements
    $start = $_POST['start'];
    $end = $_POST['end'];
    // Prepared Statement
    $statement = $pdo->prepare("SELECT * FROM php WHERE matnr BETWEEN :start and :end");
    // Parameter binden
    $statement->bindParam(':start', $start);
    $statement->bindParam(':end', $end);
    // Prepared Statement ausführen
    $statement->execute();
    // Ergebnis ausgeben
    foreach ($statement as $row) {
        echo $row['name']
            . " hat die Matrikelnummer: "
            . $row['matnr']
            . "<br>";
    }
}


//Schreibe ein Webformular mit zwei Formularfeldern, in die der Benutzer eine Start- und eine Endmatrikelnummer eingeben kann.
//Nach dem Absenden des Formulars soll eine Liste aller Studenten ausgegeben werden, die eine Matrikelnummer zwischen Start- und Endmatrikelnummer haben.
//Verwende dazu ein Prepared Statement.
?>
<form action="php_datenbank_abfrage.php" method="post">
    <p><label>Startmatrikelnummer <input id='start' name='start' type='text' placeholder='Startmatrikelnummer'
                required /></label>
    </p>
    <p><label>Endmatrikelnummer <input id='end' name='end' type='text' placeholder='Endmatrikelnummer'
                required /></label>
    </p>
    <input type='submit' value='Submit' />
</form>