<?php
# Unterschied zwischen /Ha.?s/ und /Ha.+s/

$regex1 = '/[0-9]\d/';


$text1 = "Ich fische 20 Fische aus dem See";


preg_match($regex1, $text1, $treffer1);

echo "<pre>";
print_r($treffer1);
echo "</pre>";