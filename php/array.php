<?php
/* objectif: tester les tableaux */

$line = "toto titi tata tutu";
$noms = explode(" ", $line, 3); // "toto", "titi", "tata tutu"

$line = "2015-03-25;Nicolas;Corbeaux";
list($date, $observateur, $taxon) = explode(";", $line);

$line = "http://solinate.net/ol3";
list($protocole, $url)  = explode("://", $line);

echo $protocole . "\n";
echo $url . "\n";
