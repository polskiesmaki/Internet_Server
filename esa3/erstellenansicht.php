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
		<form action="form_checker.php" method="post">
			<p>
				<label for="vorname">Vorname:</label>
				<input placeholder='Texteingabe' type="text" id="vorname" name="vorname" required>
			</p>
			<p>
				<label for="nachname">Nachname:</label>
				<input placeholder='Texteingabe' type="text" id="nachname" name="nachname" required>
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
			<button class="extra" type="submit">Speichern</button>
			<button><a href="index.php">Zurück</a