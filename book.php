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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?=$book['title'];?></h1>
    <img src="<?=$book['cover_path'];?>">
    <br>
    <h2><span>Stock saldo:</span> <span><?=$book['stock_saldo'];?></span></h2>

    <h2>Authors: </h2> 
    <?php
    while ($author = $stmt->fetch())
    {
        echo '<li>' . $author['first_name'] . ' ' . $author['last_name'] . '</li>';
    }
    ?>
    <div>

        <h2>Realease date: <?=$book['release_date'];?> </h2>
        <h2>Language: <?=$book['language'];?> </h2>
        <h2>Pages: <?=$book['pages'];?> </h2>
        <h2>Type: <?=$book['type'];?> </h2>
        <h2>Price: <?=number_format(round($book['price']), 2, ',',  '');?>€</h2>
        <span><a class="changetext"href="edit.php?id=<?=$id;?>">Change</a></span>
        <br>
        <br>
        <form action="delete.php" method="POST">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" value="Delete" name="Delete">
        </form>

    </div>
</body>
</html>