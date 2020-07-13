<?php

/** @var PDO $pdo */

require_once __DIR__ . '/pdo.php';

$sql = 'INSERT blog_article (title, status) VALUES (:title, :status)';

$params = [
    'title' => 'Lorem Ipsum',
    'status' => true,
];

$stmt = $pdo->prepare($sql);

$stmt->execute($params);
