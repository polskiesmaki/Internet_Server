<?php
declare(strict_types=1);
require_once __DIR__ . DIRECTORY_SEPARATOR . 'db.php';

// Datenbankabfrage über die Klasse StudentRepository() vornehmen
$kontaktRepository = new KontaktRepository($pdo);

//Variablen für die Überprüfung der Eingaben
$vornameTrue = false;
$nachnameTrue = false;
$emailTrue = false;
$telefonnummerTrue = false;

/**
 * Wenn Vorname, Nachname, Email und Telefonnummer gesetzt sind,
 * dann überprüfen Sie die Eingaben
 */
if (isset($_POST['vorname'])) {
    // Regular Expression für die Überprüfung des Vornamens
    $pattern = '/^[A-Z][a-z]{1,30}$/';
    if (preg_match($pattern, $_POST['vorname'])) {
        $vornameTrue = true;
    } else {
        echo "<script>alert('Der Vorname soll mit einem Großbuchstaben anfangen und nur Buchstaben enthalten. Max 30 Zeichen!');</script>";
        // Zurück zur vorherigen Seite
        echo "<script>window.history.back();</script>";
        // Beende die weitere Ausführung des Skripts
        exit;
    }
}

if (isset($_POST['nachname'])) {
    // Regular Expression für die Überprüfung des Nachnamens
    $pattern = '/^[A-Z][a-z]{1,30}$/';
    if (preg_match($pattern, $_POST['nachname'])) {
        $nachnameTrue = true;
    } else {
        echo "<script>alert('Der Nachname soll mit einem Großbuchstaben anfangen und nur Buchstaben enthalten. Max 30 Zeichen!');</script>";
        // Zurück zur vorherigen Seite
        echo "<script>window.history.back();</script>";
        // Beende die weitere Ausführung des Skripts
        exit;
    }
}

if (isset($_POST['email'])) {
    // Regular Expression für die Überprüfung der Email
    $pattern = '/\w{1,30}@ostfalia\.(com|de)$/';
    if (preg_match($pattern, $_POST['email'])) {
        $emailTrue = true;
    } else {
        echo "<script>alert('Die Email muss mit der Domain ostfalia.com oder ostfalia.de enden. Max 30 Zeichen!');</script>";
        // Zurück zur vorherigen Seite
        echo "<script>window.history.back();</script>";
        // Beende die weitere Ausführung des Skripts
        exit;
    }
}

if (isset($_POST['telefonnummer'])) {
    // Regular Expression für die Überprüfung der Vorwahl und der Ortsvorwahl
    $pattern = '/^(015|016|017[15678])\d{6,30}$/';

    // Überprüfung der Vorwahl und der Ortsvorwahl mit Regular Expression
    if (preg_match($pattern, $_POST['telefonnummer'])) {
        // Telefonnummer ist gültig
        $telefonnummerTrue = true;
    } else {
        echo "<script>alert('Die Telefonnummer muss mit 015, 016 oder 0171-0179 anfangen und muss mindestens 9 Ziffern enthalten!');</script>";
        // Zurück zur vorherigen Seite
        echo "<script>window.history.back();</script>";
        // Beende die weitere Ausführung des Skripts
        exit;
    }
}

// Wenn alle Daten gültig sind, dann aktualisieren Sie den Kontakt
if ($vornameTrue && $nachnameTrue && $emailTrue && $telefonnummerTrue) {
    $id = $_POST['id'];
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $email = $_POST['email'];
    $telefonnummer = $_POST['telefonnummer'];

    // Aktualisieren Sie die Daten in der Datenbank
    $kontaktRepository->updatePerson($id, $vorname, $nachname, $email, $telefonnummer);

    echo "<script>alert('Die Daten wurden erfolgreich übermittelt');</script>";
    echo "<script>window.location.href='index.php';</script>";
}
?>