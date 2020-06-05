#!/usr/bin/php
<?php
    function ft_time($a) {
        return preg_match("/^[0-9][0-9]:[0-9][0-9]:[0-9][0-9],[0-9][0-9][0-9] --> [0-9][0-9]:[0-9][0-9]:[0-9][0-9],[0-9][0-9][0-9]$/", $a);
    }
    if ($argc != 2 || !file_exists($argv[1]))
        exit();
    $file = fopen($argv[1], 'r');
    while ($file && !feof($file))
        $array[] = fgets($file);
    foreach($array as $key => $value)
    {
        if (ft_time($value))
            $clock[$key] = $value;
    }
    sort($clock);
    $i = 0;
    foreach($array as $key => $value)
    {
        if (ft_time($value)) 
        {
            echo $clock[$i];
            $i++;
        } 
        else 
            echo $value;
    }
    ?>