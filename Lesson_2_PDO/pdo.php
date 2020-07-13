<?php

$driver = 'mysql';
$host = 'mysql';
$port = '3306';
$database = 'app';

$username = 'root';
$password = 'root';
$charset = 'utf8mb4';

$dsn = "$driver:host=$host;port=$port;dbname=$database;charset=$charset";

$pdo = new PDO($dsn, $username, $password, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // вывод только данных в виде ассоциативного массива
]);
