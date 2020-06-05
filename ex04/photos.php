#!/usr/bin/php
<?php
if ($argc < 2)
    exit(1);
$URL = curl_init();
$options = array (
    CURLOPT_URL => $argv[1],
    CURLOPT_HEADER => false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true
);
curl_setopt_array($URL, $options);
$body = curl_exec($URL);
curl_close($URL);
if (!$body)
    exit();
$website = $argv[1];
$website = substr($website, strlen('http://') + (strpos($website, 'https') !== false));
if (substr($website, -1) !== '/')
    $website .= '/';
if (!preg_match_all('/<img[^>]+\/?>/i', $body, $matches))
    exit(0);
foreach ($matches[0] as $match)
{
    if (!preg_match('/src\s*=\s*("|\')(.+?)("|\')/i', $match, $url) || !isset($url[2]) || empty($url[2]))
        continue;
    $url = $url[2];
    if (strpos($url, 'http') === false)
        $url = $argv[1] . '/' . $url;
    $URL = curl_init();
    $options[CURLOPT_URL] = $url;
    curl_setopt_array($URL, $options);
    $body = curl_exec($URL);
    curl_close($URL);
    if (!is_dir($website))
        mkdir($website);
    $img_name = basename($url);
    file_put_contents($website . $img_name, $body);
}
?>