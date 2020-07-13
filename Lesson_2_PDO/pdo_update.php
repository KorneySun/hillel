<?php

/** @var PDO $pdo */

require_once __DIR__ . '/pdo.php';

$id = $_GET['id'] ?? null;

$sql = "UPDATE blog_article SET title = 'Lorem Ipsum new', status = rand() WHERE id = '$id'";

$pdo->exec($sql);
