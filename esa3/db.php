<?php
// Verbindung zur Datenbank herstellen
try {
    $pdo = new PDO(
        'mysql:host=localhost; charset=utf8; dbname=example',
        'StudAdmin',
        'N5..kunrwFIqp)qn'
    );
} catch (Exception $e) {
    echo "Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage();
}

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// Laden der benötigten Klassen
require_once __DIR__ . DIRECTORY_SEPARATOR . 'KontaktRepository.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'IntPKontakt.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Projektkontakt.php';