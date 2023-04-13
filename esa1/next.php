<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Projektkontakt</title>
	</head>
	<body>
		<header> <h1>Projektkontakt</h1> </header>
		<nav>
		 <ul>
			<li><?php echo"<a href='index.php'>Main</a>"; ?></li>
			<li><?php echo"<a href='next.php'>Projektkontakt</a>"; ?></li>
		 </ul>
		</nav>
		
		<section>
		<form action = ''> 
			 
			<p><label>Vorname <input id='vname' type='text'  placeholder='Texteingabe' required /></label></p>
			<p><label>Nachname <input id='nname' type='text'required placeholder='Texteingabe' /></label></p>
			
			<p><label>Telefonnummer <input id='tnr' type='tel' placeholder="Eingabe v. Ortsvorwahl und Anschluss"/></label></p>
			<p><label>E-Mail <input id='email' type='email' placeholder="Eingabe einer E-Mailadresse" required /></label></p>
			
			<p><label>Firma:  <input id='firma' value='<?php echo"Ostfalia"; ?>' type='text'/></label></p>
			<button type='button' onclick='alert("Hallo Welt")'>Klick mich</button>
			<input type='submit' value='Submit'/>
		</form>
		</section>
	</body>
</html>