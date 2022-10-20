<?php

require_once('connection.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('UPDATE books $4 is_deleted=$ WHERE id = :id');
$stmt->execute(['id' => $id]);