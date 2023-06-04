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
    header('Location: index.php');
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
    header('Location: index.php');
    exit;
}

// Verarbeiten des Löschens eines Kontakts
if (isset($_GET['delete'])) {
    $data = json_decode(file_get_contents('data.json'), true);
    array_splice($data['personen'], $_GET['delete'], 1);
    file_put_contents('data.json', json_encode($data));
    header('Location: index.php');
    exit;
}
?>


<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Projektkontakt</title>
</head>

<body>
    <header>
        <h1>Projektkontakte Liste</h1>
    </header>
    <nav>

    </nav>
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
                    <td><a href="detailansicht.php?id=<?php echo $key; ?>">
                            <?php echo $person['nachname'] . ', ' . $person['vorname']; ?></a></td>
                </tr>
                <td>
                    <form action="bearbeitenansicht.php?id=<?php echo $key; ?>" method="get" style="display: inline;">
                        <input type="hidden" name="id" value="<?php echo $key; ?>">
                        <button class="ausnahme" type="submit">
                            <img src="img\bearbeiten.png" alt="Bearbeiten" title="Bearbeiten">
                        </button>
                    </form>
                    <form action="index.php" method="get" style="display: inline;">
                        <input type="hidden" name="delete" value="<?php echo $key; ?>">
                        <button class="ausnahme" type="submit">
                            <img src="img\loeschen.png" alt="Löschen" title="Löschen">
                        </button>
                    </form>
                <?php } ?>
        </tbody>
    </table>

    <form action="erstellenansicht.php" method="get" style="display: inline;">
        <input type="hidden" name="create">
        <button class="ausnahme" type="submit">
            <img src="img\plus.png" alt="Erstellen" title="Erstellen">
        </button>
    </form>
</body>


</html>