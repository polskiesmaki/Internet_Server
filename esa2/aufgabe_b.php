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
	<a href="index.html">Zurück</a><br>
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
                    <td><a href="aufgabe_b_detailansicht.php?id=<?php echo $key; ?>">
                            <?php echo $person['nachname'] . ', ' . $person['vorname']; ?></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>


</html>