<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Wähle ein Pojektkontakt</title>
	</head>
	<body>
		<header> <h1>Wähle ein Pojektkontakt</h1> </header>
		<nav>
		 <ul>
			<li><?php echo"<a href='index.php'>Main</a>"; ?></li>
			<li><?php echo"<a href='next.php'>Projektkontakt</a>"; ?></li>
			<li><?php echo"<a href='next2.php'>Fill Data</a>"; ?></li>
			
		 </ul>
		</nav>
		
		<section>
		
        <form action="next.php" method="GET">
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


