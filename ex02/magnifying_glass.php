#!/usr/bin/php
<?php
if ($argc == 2)
{
    $html = fopen($argv[1], 'r');
    while (!feof($html))
    {
        $line = fgets($html);
        $line = preg_replace_callback('/<a.*?title="(.*?)">/', function ($matches) {
            return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
        }, $line);
        $line = preg_replace_callback('/<a.*?>(.*?)</', function ($matches) {
            return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
        }, $line);
        echo $line;
    }
}
?>