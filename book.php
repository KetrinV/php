<?php

require_once('connection.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

$stmt = $pdo->prepare('SELECT * FROM authors LEFT JOIN book_authors ON authors.id=book_authors.author_id WHERE book_authors.book_id = :id');
$stmt->execute(['id' => $id]); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$book['title'];?></title>
</head>
<body>
    <h1><?=$book['title'];?></h1>
    <img src="<?=$book['cover_path'];?>">
    <br>
    <p><span>Laos:</span> <span><?=$book['stock_saldo'];?></span></p>
    <div>
        <span><a href="edit.php?id=<?=$id;?>">Muuda</a></span>
        <span><a href="delete.php?id=<?=$id;?>">Kustuta</a></span>
    </div>
    Authors: 
    <?php
    while ($author = $stmt->fetch())
    {
        echo '<li>' . $author['first_name'] . ' ' . $author['last_name'] . '</li>';
    }
    ?>
    <h2>Realease date: <?=$book['release_date'];?> </h2>
    <h2>Language: <?=$book['language'];?> </h2>
    <h2>Pages: <?=$book['pages'];?> </h2>
    <h2>Type: <?=$book['type'];?> </h2>
    <h2>Price: <?=$book['price'];?> € </h2>
    <h3>Summary: <?=$book['summary'];?> </h3>
</body>
</html>