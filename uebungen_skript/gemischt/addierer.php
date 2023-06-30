<?php

function addiere_drittelbare(int $zahl1, int $zahl2, int $zahl3, int $zahl4): int
{
    $sum = 0;
    if ($zahl1 % 3 == 0) {
        $sum += $zahl1;
    }
    if ($zahl2 % 3 == 0) {
        $sum += $zahl2;
    }
    if ($zahl3 % 3 == 0) {
        $sum += $zahl3;
    }
    if ($zahl4 % 3 == 0) {
        $sum += $zahl4;
    }
    return $sum;
}

$zahl1 = 3;
$zahl2 = 5;
$zahl3 = 6;
$zahl4 = 10;

echo "Die Summe nur der durch drei teilbaren zahlen aus $zahl1, $zahl2, $zahl3 und $zahl4 ist " . addiere_drittelbare($zahl1, $zahl2, $zahl3, $zahl4);

?>