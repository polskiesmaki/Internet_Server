<?php
// Laden Sie den Inhalt der JSON-Datei in eine Variable
$json_file = 'data.json';
$json_data = file_get_contents($json_file);
$data = json_decode($json_data, true);

$id = $_GET['id'];

$person = $data['personen'][$id];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Aktualisieren Sie die Personendaten
	$data['personen'][$id]['vorname'] = $_POST['vorname'];
	$data['personen'][$id]['nachname'] = $_POST['nachname'];
	$data['personen'][$id]['email'] = $_POST['email'];
	$data['personen'][$id]['telefonnummer'] = $_POST['telefonnummer'];

	// Speichern Sie die aktualisierten Daten in der JSON-Datei
	$json_data = json_encode($data);
	file_put_contents($json_file, $json_data);

	// Weiterleitung zur bearbeiteten Person
	header('Location: aufgabe_c_bearbeitenansicht.php?id=' . $id);
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
		<h1>Projektkontakt Bearbeiten</h1>
	</header>
	<div>
		<h2>
			<?php echo $person['vorname'] . ' ' . $person['nachname']; ?>
		</h2>
		<form action="" method="post">
			<p>
				<label for="vorname">Vorname:</label>
				<input type="text" id="vorname" name="vorname" value="<?php echo $person['vorname']; ?>" required>
			</p>
			<p>
				<label for="nachname">Nachname:</label>
				<input type="text" id="nachname" name="nachname" value="<?php echo $person['nachname']; ?>" required>
			</p>
			<p>
				<label for="email">E-Mail:</label>
				<input type="email" id="email" name="email" value="<?php echo $person['email']; ?>" required>
			</p>
			<p>
				<label for="telefonnummer">Telefonnummer:</label>
				<input type="tel" id="telefonnummer" name="telefonnummer"
					value="<?php echo $person['telefonnummer']; ?>" required>
			</p>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<button class="extra" type="submit">Speichern</button>
			<button><a href="aufgabe_c.php">Zurück</a></button>
		</form>
	</div>
</body>

</html>