<?php

/** @var PDO $pdo */

require_once __DIR__ . '/pdo.php';

$sql = "INSERT blog_article (title, status) VALUES ('Lorem Ipsum', rand())";

$pdo->exec($sql);
