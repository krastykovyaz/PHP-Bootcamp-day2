#!/usr/bin/php
<?php
if ($argc != 2)
    exit;
date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, 'fr_FR');

$form = '%a %d %B %Y %H:%M:%S';
$date = strptime($argv[1], $form);
//echo "$date\n";
//var_dump($date);
if ($date){
    $g = mktime( $date["tm_hour"], $date["tm_min"], $date["tm_sec"], $date["tm_mon"] + 1, $date["tm_mday"], $date["tm_year"] + 1900);
    echo "$g\n";
}
else
    echo "Wrong Format\n"
?>
