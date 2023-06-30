<html>

<header>
    <title>Dupa</title>
</header>

<body>

    <form method="post">
        <label for="vorname">Vorname: </label>
        <input type="text" name="vorname" id="vorname">
        <button type="submit">Abschicken</button>
    </form>

    <?php
    $textIn = "Dies ist ein Beispiel-Text.\nZweite Zeile";

    // Text in Datei a.txt schreiben
    file_put_contents("a.txt", $textIn);

    // Text aus der Datei a.txt auslesen 
    $textOut = file_get_contents("a.txt");
    print_r($textOut);
    ?>

</body>

</HTML>