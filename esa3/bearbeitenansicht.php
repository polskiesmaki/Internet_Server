<?php declare(strict_types=1);
require_once __DIR__ . DIRECTORY_SEPARATOR . 'db.php';

// Datenbankabfrage über die Klasse StudentRepository() vornehmen
$kontaktRepository = new KontaktRepository($pdo);

$id = $_GET['id'];

$person = $kontaktRepository->getPersonById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Aktualisieren Sie die Personendaten
	$vorname = $_POST['vorname'];
	$nachname = $_POST['nachname'];
	$email = $_POST['email'];
	$telefonnummer = $_POST['telefonnummer'];

	// Überprüfen, ob bereits ein Kontakt mit derselben E-Mail-Adresse vorhanden ist
	$contacts = $kontaktRepository->showKontacts();
	foreach ($contacts as $contact) {
		if ($contact->email == $email && $contact->id != $id) {
			echo "<script>
            alert('E-Mail-Adresse bereits vorhanden!');
            window.history.back();
        </script>";
			exit();
		}
	}

	// Aktualisieren Sie die Daten in der Datenbank
	$kontaktRepository->updatePerson($id, $vorname, $nachname, $email, $telefonnummer);

	// Weiterleitung zur bearbeiteten Person
	header('Location: index.php?id=' . $id);
	exit();
}

?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Projektkontakt Bearbeiten</title>
</head>

<body>
	<header>
		<h1>Projektkontakt Bearbeiten</h1>
	</header>
	<div>
		<h2>
			<?php echo $person->vorname . ' ' . $person->nachname; ?>
		</h2>
		<form action="form_checker.php" method="post">
			<p>
				<label for="vorname">Vorname:</label>
				<input type="text" id="vorname" name="vorname" value="<?php echo $person->vorname; ?>" required>
			</p>
			<p>
				<label for="nachname">Nachname:</label>
				<input type="text" id="nachname" name="nachname" value="<?php echo $person->nachname; ?>" required>
			</p>
			<p>
				<label for="email">E-Mail:</label>
				<input type="email" id="email" name="email" value="<?php echo $person->email; ?>" required>
			</p>
			<p>
				<label for="telefonnummer">Telefonnummer:</label>
				<input type="tel" id="telefonnummer" name="telefonnummer" value="<?php echo $person->telefonnummer; ?>"
					required>
			</p>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<button class="extra" type="submit">Speichern</button>
			<button><a href="index.php">Zurück</a></button>
		</form>
	</div>
</body>

</html>