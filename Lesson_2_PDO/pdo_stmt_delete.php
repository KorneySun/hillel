<?php

/** @var PDO $pdo */

require_once __DIR__ . '/pdo.php';

$id = $_GET['id'] ?? null;

$sql = 'DELETE FROM blog_article WHERE id = :id';

$params = [
    'id' => $id,
];

$stmt = $pdo->prepare($sql);

$stmt->execute($params);
