<?php

/** @var PDO $pdo */

require_once __DIR__ . '/pdo.php';

$id = $_GET['id'] ?? null;
$title = $_GET['title']; // ?title=test&id=1%27%3B%20DELETE%20FROM%20blog_article%20WHERE%20id%20%3D%20%279

$sql = "UPDATE blog_article SET title = '$title' WHERE id = '$id'";

$pdo->exec($sql);
