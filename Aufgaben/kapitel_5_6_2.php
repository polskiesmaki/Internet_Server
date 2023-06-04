/**
Schreiben Sie eine Funktion, die ein Formularfeld erzeugt. Als Standard soll das Formularfeld eine Länge von 15 Zeichen
haben.

echo "<input type=\"text\" name=\"$name\" size=\"$size\" id=\"$name\">";
Rufen Sie das Formularfeld aus dem Hauptprogramm auf und erstellen Sie somit ein Formular mit den Feldern Name, Vorname,
Straße, PLZ, Ort. Das Formularfeld PLZ soll eine size=5 haben. Alle anderen Felder sollen den Default 15 nutzen.
*/


<?php

function erzeugeFormularfeld($name, $size = 15)
{
    echo "<input type=\"text\" name=\"$name\" size=\"$size\" id=\"$name\">";
}

erzeugeFormularfeld("Dennis", 10);

?>