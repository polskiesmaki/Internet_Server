<?php
// Laden der Daten aus der JSON-Datei
$data = json_decode(file_get_contents('data.json'), true);

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
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Projektkontakt</title>
</head>

<body>
	<header>
		<h1>Projektkontakt</h1>
	</header>
	<div>
		<h2>
			<?php echo $person['vorname'] . ' ' . $person['nachname']; ?>
		</h2>
		<form action="aufgabe_c.php" method="post">
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
			<button><a href="aufgabe_b.php">Zurück</a></button>

		</form>

	</div>
</body>

</html>