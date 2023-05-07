<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Projektkontakt</title>
</head>

<body>
	<header>
		<h1>Projektkontakt</h1>
	</header>
	<nav>
	<a href="index.html">Zurück</a><br>
	</nav>

	<section>
		<form action=''>

			<?php
			if (isset($_GET['personen'])) {
				// Get the selected index from the URL
				$selected_index = $_GET['personen'];

				// Load the contents of data.json into a string variable
				$json_string = file_get_contents('data.json');

				// Parse the JSON string into a PHP object
				$json_object = json_decode($json_string);

				// Get the value of "vname" from the parsed JSON object for the selected person
				$vname = $json_object->personen[$selected_index]->vorname;
				$nname = $json_object->personen[$selected_index]->nachname;
				$email = $json_object->personen[$selected_index]->email;
				$tnr = $json_object->personen[$selected_index]->telefonnummer;

				// Output the HTML code with the input field pre-filled with the value of "vname"
				echo "<p><label>Vorname <input id='vname' type='text' placeholder='Texteingabe' required value='$vname' /></label></p>";
				echo "<p><label>Nachname <input id='nname' type='text' placeholder='Texteingabe' required value='$nname' /></label></p>";
				echo "<p><label>E-Mail <input id='email' type='email' placeholder='Eingabe einer E-Mailadresse' required value='$email' /></label></p>";
				echo "<p><label>Telefonnummer <input id='tnr' type='tel' placeholder='Eingabe v. Ortsvorwahl und Anschluss' required value='$tnr' /></label></p>";

			} else {
				echo "<p><label>Vorname <input id='vname' type='text' placeholder='Texteingabe' required /></label></p>";
				echo "<p><label>Nachname <input id='nname' type='text' placeholder='Texteingabe' required /></label></p>";
				echo "<p><label>E-Mail <input id='email' type='email' placeholder='Eingabe einer E-Mailadresse' required /></label></p>";
				echo "<p><label>Telefonnummer <input id='tnr' type='tel' placeholder='Eingabe v. Ortsvorwahl und Anschluss' required /></label></p>";
			}

			?>
			<input type='submit' value='Submit' />



		</form>

		<form action="aufgabe_a.php" method="GET">
			<label id="wahl" for="personen">Wähle ein Projektkontakt:</label>
			<select id="personen" name="personen">

				<option value="0">1</option>
				<option value="1">2</option>
				<option value="2">3</option>
				<option value="3">4</option>
				<option value="4">5</option>
			</select>
			<button type="submit" id="button_load">Kontakt laden</button>
		</form>


	</section>
</body>

</html>