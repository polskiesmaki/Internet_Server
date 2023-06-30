<?php

$datei = file_get_contents('list.txt');

# Leerzeilen entfernen aus der Datei mit preg_replace
$datei = preg_replace('/^\s*$/m', '', $datei);

# Löscht alle einzeiligen Kommentarzeilen einer Datei
$datei = preg_replace('/^#.*$/m', '', $datei);

#Entfernt in absoluten Pfaden die Verzeichnisse und lässt den Dateinamen übrig pfad mit __DIR__ ermitteln

$pfad = __DIR__ . '/list.txt';
$pfad_new = preg_replace('/^.*\//m', '', $pfad);

$text = 'Zwischen 1.220 und 2,230 Euro';


$muster = preg_match('/.\./', $text, $treffer);

#Datei im Browser ausgeben
echo "<pre>";
echo $datei;
echo "<hr \>";
echo $pfad;
echo "<hr \>";
echo $pfad_new;
echo "</pre>";
echo "<hr \>";
echo $muster;
echo "<hr \>";
print_r($treffer);




?>