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

        <form action='form_checker.php' method="post">
            <p><label>Vorname <input id='vname' name='vname' type='text' placeholder='Texteingabe' required /></label>
            </p>
            <p><label>Nachname <input id='nname' name='nname' type='text' placeholder='Texteingabe' required /></label>
            </p>
            <p><label>E-Mail <input id='email' name='email' type='email' placeholder='Eingabe einer E-Mailadresse'
                        required /></label></p>
            <p><label>Telefonnummer <input id='tnr' name='tnr' type='tel'
                        placeholder='Eingabe v. Ortsvorwahl und Anschluss' required /></label></p>
            <input type='submit' value='Submit' />
        </form>
    </section>
</body>

</html>