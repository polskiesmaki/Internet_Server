<?php
declare(strict_types=1);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'db.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'KontaktRepository.php';

$kontaktRepository = new KontaktRepository($pdo);
$kontakt = $kontaktRepository->showKontacts();

// Verarbeiten des Löschens eines Kontakts
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $kontaktRepository->deletePerson($id);

    header('Location: index.php');
    exit();
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
            <?php foreach ($kontakt as $person) { ?>
                <tr>
                    <td>
                        <a href="detailansicht.php?id=<?php echo $person->id; ?>">
                            <?php echo $person->nachname . ', ' . $person->vorname; ?>
                        </a>
                    </td>
                    <td>
                        <form action="bearbeitenansicht.php" method="get" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $person->id; ?>">
                            <button class="ausnahme" type="submit">
                                <img src="img\bearbeiten.png" alt="Bearbeiten" title="Bearbeiten">
                            </button>
                        </form>
                        <form action="index.php" method="get" style="display: inline;">
                            <input type="hidden" name="delete" value="<?php echo $person->id; ?>">
                            <button class="ausnahme" type="submit">
                                <img src="img\loeschen.png" alt="Löschen" title="Löschen">
                            </button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <form action="erstellenansicht.php" method="get" style="display: inline;">
        <input type="hidden" name="create" value="<?php echo htmlspecialchars(json_encode($kontakt)); ?>">
        <button class="ausnahme" type="submit">
            <img src="img\plus.png" alt="Erstellen" title="Erstellen">
        </button>
    </form>
</body>

</html>