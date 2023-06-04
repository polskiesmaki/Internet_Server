<?php

$vnameTrue = false;
$nnameTrue = false;
$emailTrue = false;
$tnrTrue = false;

if (isset($_POST['vname'])) {
    // Regular Expression für die Überprüfung des Vornamens
    $pattern = '/^[A-Z][a-z]{1,30}$/';
    if (preg_match($pattern, $_POST['vname'])) {
        $vnameTrue = true;
    } else {
        echo "<script>alert('Der Vorname soll mit eine Großbuchstaben anfangen und soll nur Buchstaben enthalten');</script>";
        // Zurück zur vorherigen Seite
        echo "<script>window.history.back();</script>";
        // Beende die weitere Ausführung des Skripts
        exit;
    }
}


if (isset($_POST['nname'])) {
    // Regular Expression für die Überprüfung des Nachnamens
    $pattern = '/^[A-Z][a-z]{1,30}$/';
    if (preg_match($pattern, $_POST['nname'])) {
        $nnameTrue = true;
    } else {
        echo "<script>alert('Der Nachname soll mit eine Großbuchstaben anfangen und soll nur Buchstaben enthalten. Max 30 Zeichen.');</script>";
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
        echo "<script>alert('Die Email muss mit der Domain ostfalia.com oder ostfalia.de enden. Max 30 Zeichen');</script>";
        // Zurück zur vorherigen Seite
        echo "<script>window.history.back();</script>";
        // Beende die weitere Ausführung des Skripts
        exit;
    }
}

if (isset($_POST['tnr'])) {
    // Regular Expression für die Überprüfung der Vorwahl und der Ortsvorwahl
    $pattern = '/^(015|016|017[15678])\d{6,}$/';

    // Überprüfung der Vorwahl und der Ortsvorwahl mit Regular Expression
    if (preg_match($pattern, $_POST['tnr'])) {
        // Telefonnummer ist gültig
        $tnrTrue = true;
    } else {
        echo "<script>alert('Die Telefonnummer muss mit 015, 016 oder 0171-0179 anfangen und muss mindestens 9 Ziffern enthalten.');</script>";
        // Zurück zur vorherigen Seite
        echo "<script>window.history.back();</script>";
        // Beende die weitere Ausführung des Skripts
        exit;
    }
}
// Wenn alle Daten gültig sind, dann wird die Seite aufgerufen
if ($vnameTrue && $nnameTrue && $emailTrue && $tnrTrue) {
    echo "<script>alert('Die Daten wurden erfolgreich übermittelt');</script>";
    echo "<script>window.location.href='aufgabe_a.php';</script>";
}
?>