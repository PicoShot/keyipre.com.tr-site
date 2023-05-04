<?php

$random_key = '';
$length = 32;
for ($i = 0; $i < $length; $i++) {
    $random_key .= chr(mt_rand(48, 57));
}

$secret_key = $random_key;
$json_file = 'dynamic_key.json';

if (file_exists($json_file)) {
    $keys = json_decode(file_get_contents($json_file), true);
} else {
    $keys = array();
}

$keys[] = $secret_key;

file_put_contents($json_file, json_encode($keys));

?>
