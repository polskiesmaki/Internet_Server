<?php
// Laden Sie den Inhalt der JSON-Datei in eine Variable
$json_file = 'data.json';
$json_data = file_get_contents($json_file);
$data = json_decode($json_data, true);

//Variablen für die Überprüfung der Eingaben
$vornameTrue = false;
$nachnameTrue = false;
$emailTrue = false;
$telefonnummerTrue = false;

/**
 * Wenn Vorname, Nachname, Email und Telefonnummer gesetzt sind,
 * dann überprüfen Sie die Eingaben
 * */
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
    // Überprüfen, ob bereits ein Kontakt mit derselben E-Mail-Adresse vorhanden ist
    foreach ($data['personen'] as $contact) {
        if ($contact['email'] == $_POST['email']) {
            echo "<script>
            alert('E-Mail-Adresse bereits vorhanden!');
            window.history.back();
        </script>";
            exit();
        }
    }
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
    $pattern = '/^(015|016|017[15678])\d{6,}$/';

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
// Wenn alle Daten gültig sind, dann fügen Sie den neuen Kontakt hinzu
if ($vornameTrue && $nachnameTrue && $emailTrue && $telefonnummerTrue) {

    $new_contact = [
        'vorname' => $_POST['vorname'],
        'nachname' => $_POST['nachname'],
        'email' => $_POST['email'],
        'telefonnummer' => $_POST['telefonnummer']
    ];

    // Hinzufügen des neuen Kontakts zur Liste der Kontakte
    $data['personen'][] = $new_contact;

    // Speichern Sie die aktualisierten Daten in der JSON-Datei
    $json_data = json_encode($data);
    file_put_contents($json_file, $json_data);
    echo "<script>alert('Die Daten wurden erfolgreich übermittelt');</script>";
    echo "<script>window.location.href='index.php';</script>";
}
?>