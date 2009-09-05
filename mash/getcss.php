<?php
$url = urldecode($_GET['l']);

if (strpos($url, '360.yahoo.com') === false) {
    die('500');
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$src = curl_exec($ch);
curl_close($ch);

echo $src;

?>