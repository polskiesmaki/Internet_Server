<?php
// Laden der Daten aus der JSON-Datei
$data = json_decode(file_get_contents('data.json'), true);

// Verarbeiten des Formulars für das Erstellen eines neuen Kontakts
if (isset($_POST['create'])) {
    $person = array(
        'vorname' => $_POST['vorname'],
        'nachname' => $_POST['nachname'],
        'telefon' => $_POST['telefon'],
        'email' => $_POST['email']
    );
    array_push($data['personen'], $person);
    file_put_contents('data.json', json_encode($data));
    header('Location: aufgabe_c.php');
    exit;
}

// Verarbeiten des Formulars für das Bearbeiten eines Kontakts
if (isset($_POST['update'])) {
    $person = array(
        'vorname' => $_POST['vorname'],
        'nachname' => $_POST['nachname'],
        'telefon' => $_POST['telefon'],
        'email' => $_POST['email']
    );
    $data['personen'][$_POST['id']] = $person;
    file_put_contents('data.json', json_encode($data));
    header('Location: aufgabe_c.php');
    exit;
}

// Verarbeiten des Löschens eines Kontakts
if (isset($_GET['delete'])) {
    array_splice($data['personen'], $_GET['delete'], 1);
    file_put_contents('data.json', json_encode($data));
    header('Location: aufgabe_c.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Projektkontakt</title>
</head>

<body>
    <header>
        <h1>Projektkontakte Liste</h1>
    </header>
    <table id="personen-tabelle">
        <thead>
            <tr>
                <th>Name</th>

            </tr>
        </thead>
        <tbody>
            <?php $json_data = file_get_contents('data.json');
            $data = json_decode($json_data, true);
            ?>
            <?php foreach ($data['personen'] as $key => $person) { ?>
                <tr>
                    <td><a href="aufgabe_c_bearbeitenansicht.php?id=<?php echo $key; ?>">
                            <?php echo $person['nachname'] . ', ' . $person['vorname']; ?></a></td>
                    <td>
                        <form action="aufgabe_c_bearbeitenansicht.php" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $key; ?>">
                            <button type="submit">
                                <img src="img\bearbeiten.png" alt="Bearbeiten" title="Bearbeiten">
                            </button>
                        </form>
                        <form action="aufgabe_c.php" method="get" style="display: inline;">
                            <input type="hidden" name="delete" value="<?php echo $key; ?>">
                            <button type="submit">
                                <img src="img\loeschen.png" alt="Löschen" title="Löschen">
                            </button>
                        </form>
                </tr>
            <?php } ?>