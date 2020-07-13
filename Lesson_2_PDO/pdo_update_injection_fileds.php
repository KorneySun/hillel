<?php

/** @var PDO $pdo */

require_once __DIR__ . '/pdo.php';

$id = $_GET['id'] ?? null;
$title = $_GET['title']; // ?title=test%27%2C%20status%3D%270&id=1%27%20OR%20%271

$sql = "UPDATE blog_article SET title = '$title' WHERE id = '$id'";

$pdo->exec($sql);
