<?php
// Laden Sie den Inhalt der JSON-Datei in eine Variable
$json_file = 'data.json';
$json_data = file_get_contents($json_file);
$data = json_decode($json_data, true);

// Prüfen, ob das Formular gesendet wurde
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$new_contact = [
		'vorname' => $_POST['vorname'],
		'nachname' => $_POST['nachname'],
		'email' => $_POST['email'],
		'telefonnummer' => $_POST['telefonnummer']
	];

	// Überprüfen, ob bereits ein Kontakt mit derselben E-Mail-Adresse vorhanden ist
	foreach ($data['personen'] as $contact) {
		if ($contact['email'] == $new_contact['email']) {
			echo "<script>
			alert('E-Mail-Adresse bereits vorhanden!');
			window.history.back();
		</script>";
			exit();
		}
	}

	// Hinzufügen des neuen Kontakts zur Liste der Kontakte
	$data['personen'][] = $new_contact;

	// Speichern Sie die aktualisierten Daten in der JSON-Datei
	$json_data = json_encode($data);
	file_put_contents($json_file, $json_data);

	// Weiterleitung zur Liste der Personen
	header('Location: aufgabe_c_erstellenansicht.php');
	exit();
}
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Projektkontakt erstellen</title>
</head>

<body>
	<header>
		<h1>Projektkontakt Bearbeiten</h1>
	</header>
	<div>
		<h2>
			Neuer Kontakt
		</h2>
		<form action="" method="post">
			<p>
				<label for="vorname" placeholder='Vorname'>Vorname:</label>
				<input type="text" id="vorname" name="vorname" required>
			</p>
			<p>
				<label for="nachname">Nachname:</label>
				<input type="text" id="nachname" name="nachname" required>
			</p>
			<p>
				<label for="email">E-Mail:</label>
				<input placeholder='Eingabe einer E-Mailadresse' type="email" id="email" name="email" required>
			</p>
			<p>
				<label for="telefonnummer">Telefonnummer:</label>
				<input placeholder='Eingabe v. Ortsvorwahl und Anschluss' type="tel" id="telefonnummer"
					name="telefonnummer" required>
			</p>
			<button type="submit">Speichern</button>
			<button><a href="aufgabe_c.php">Zurück</a