<?php

/** @var PDO $pdo */

require_once __DIR__ . '/pdo.php';

$id = $_GET['id'] ?? null;
$title = $_GET['title']; // ?id=1&title=test%27%2C%20status%3D%270

$sql = "UPDATE blog_article SET title = '$title' WHERE id = '$id'";

$pdo->exec($sql);
