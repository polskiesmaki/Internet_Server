<?php

$text = [
    "Er hat 122,50 € auf dem Konto",
    "Er hat 122€ auf dem Konto",
    "Er hat 0,5 €",
    "Er hat 1220000000 € auf dem Konto",
    "Er hat nix",
    "Er hat 5€"
];

$such = '/^([A-Z\s]*?)(\d{1,6},?(\d{1,2})?\s?€)(.*)$/i';
$ersetz = '($1)($2)($4)';

$b = preg_replace($such, $ersetz, $text);
foreach ($b as $value) {
    echo "$value <br \> ";
}
?>