#!/usr/bin/php
<?php
if ($argc < 2)
    exit;
elseif ($argc >= 2){
    $s = preg_replace("/\s{2,}/", " ", $argv[1]);
    $s = trim($s);}
    echo "$s\n";
?>