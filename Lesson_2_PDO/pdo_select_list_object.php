<?php

/** @var PDO $pdo */

require_once __DIR__ . '/pdo.php';

$sql = "SELECT * FROM blog_article";

foreach ($pdo->query($sql)->fetchAll(PDO::FETCH_CLASS) as $data) {
    echo 'ID: '.$data->id.'<br/>';
    echo 'Title: '.$data->title.'<br/>';
    echo 'Status: '.$data->status.'<br/>';
    echo 'Created At: '.$data->created_at.'<br/>';

    echo '<hr/>';
}
