#!/usr/bin/php
<?php
    if ($argc != 3)
        exit();
    if (!file_exists($argv[1]))
        exit();
    $file = fopen($argv[1], 'r');
    while ($file && !feof($file))
        $array[] = explode(";", fgets($file));
    $title = $array[0];

    unset($array[0]);
    foreach ($title as $key => $value)
        $title[$key] = trim($value);
    $i = array_search($argv[2], $title);
    if ($i === false)
        exit();
    foreach ($title as $title_k => $title_v)
    {
        $tmp = array();
        foreach ($array as $value) 
        {
            if (isset($value[$i]))
                $tmp[trim($value[$i])] = trim($value[$title_k]);
        }
        $$title_v = $tmp;
    }
    $stdin = fopen("php://stdin", "r");
    while ($stdin && !feof($stdin)) 
    {
        echo "Enter your command: ";
        $order = fgets($stdin);
        if ($order)
            eval($order);
    }
    fclose($stdin);
    echo "\n";
?>