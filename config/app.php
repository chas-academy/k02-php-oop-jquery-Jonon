<?php
$path = "config/credentials.php";
// check if credentials exist
if (file_exists($path)) {
    require_once('credentials.php');
}



return [
    'dsn' => getenv('DB_DSN'),
    'user' => getenv('DB_USER'),
    'password' => getenv('DB_PASSWORD')
];
