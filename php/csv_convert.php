<?php
/* prend le fichier data.cvs dont les fin de ligne sont des (cr) 0x0d et 
   converti ces dernières en (new line) dans data_conv.csv */

$data = file_get_contents("./data.csv");  // charge tout le fichier dans une string
$lines = explode(chr(0x0D), $data);       // decoupe le contenu du fichier et mets les morceau dans un tableau 

$data_conv = implode("\n", $lines);       // recole les morceaux avec des \n
$file_conv = fopen("./data_conv.csv","w"); // on ecrit le resultat dans un fichier
fwrite($file_conv, $data_conv);
