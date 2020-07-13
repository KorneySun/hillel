<?php

/** @var PDO $pdo */

require_once __DIR__ . '/pdo.php';

$id = $_GET['id'] ?? null;

$sql = 'SELECT * FROM blog_article WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'id' => $id
]);

$data = $stmt->fetch(); // Выбор только одной строки

echo 'ID: '.$data['id'].'<br/>';
echo 'Title: '.$data['title'].'<br/>';
echo 'Status: '.$data['status'].'<br/>';
echo 'Created At: '.$data['created_at'].'<br/>';
