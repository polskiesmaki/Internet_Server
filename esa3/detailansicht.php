<?php declare(strict_types=1);
require_once __DIR__ . DIRECTORY_SEPARATOR . 'db.php';

// Datenbankabfrage über die Klasse StudentRepository() vornehmen
$kontaktRepository = new KontaktRepository($pdo);

$id = $_GET['id'];

$person = $kontaktRepository->getPersonById($id);
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
			<?php echo $person->vorname . ' ' . $person->nachname; ?>
		</h2>
		<form action="" method="post">
			<p>
				<label for="vorname">Vorname:</label>
				<input readonly type="text" id="vorname" name="vorname" value="<?php echo $person->vorname; ?>"
					required>
			</p>
			<p>
				<label for="nachname">Nachname:</label>
				<input readonly type="text" id="nachname" name="nachname" value="<?php echo $person->nachname; ?>"
					required>
			</p>
			<p>
				<label for="email">E-Mail:</label>
				<input readonly type="email" id="email" name="email" value="<?php echo $person->email; ?>" required>
			</p>
			<p>
				<label for="telefonnummer">Telefonnummer:</label>
				<input readonly type="tel" id="telefonnummer" name="telefonnummer"
					value="<?php echo $person->telefonnummer; ?>" required>
			</p>
			<input type="hidden" name="id" value="<?php echo $id; ?>">


			<button><a href="index.php">Zurück</a></button>


		</form>

	</div>
</body>

</html>