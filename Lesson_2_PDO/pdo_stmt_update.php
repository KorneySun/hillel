<?php

/** @var PDO $pdo */

require_once __DIR__ . '/pdo.php';

$id = $_GET['id'] ?? null;

$sql = 'UPDATE blog_article SET title=:title, status=:status WHERE id = :id';

$params = [
    'id' => $id,
    'title' => 'Lorem Ipsum',
    'status' => true,
];

$stmt = $pdo->prepare($sql);

$stmt->execute($params);
