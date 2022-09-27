<?php

require_once('connection.php');

echo '<ul>';

$stmt = $pdo->query('SELECT * FROM books');
while ($row = $stmt->fetch())
{
    echo '<li><a href="book.php?id=' . $row['id'] . '">' . $row['title'] . '</li>';
}

echo '</ul>';


