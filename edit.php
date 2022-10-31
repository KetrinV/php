<?php

require_once('connection.php');

$id = $_GET['id'];

if ( isset($_POST['edit']) && $_POST['edit']== "Salvesta" ) {
    $stmt = $pdo->prepare('UPDATE books SET title = :title, stock_saldo = :stock_saldo, price = :price WHERE id = :id');
    $stmt->execute(['title' => $_POST['title'], 'stock_saldo' => $_POST['stock-saldo'], 'price' => str_replace(',', '.', $_POST['price']), 'id' => $id]);

    header('Location: book.php?id=' . $id);
}

$stmtBook = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmtBook->execute(['id' => $id]);
$book = $stmt->fetch();

$stmtBookAuthors = $pdo->prepare('SELECT * FROM authors LEFT JOIN book_authors ON authors.id=book_authors.author_id WHERE book_authors.book_id = :id');
$stmtBookAuthors->execute(['id' => $id]);

// var_dump($book);
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

<form action="edit.php?id=<?=$id;?>" method="POST">
    <label for="title">Title:</label> <input type="text" name="title" value="<?=$book['title'];?>" style="width: 320px;">
    <br>
    <br>
    <label for="title">Stock saldo:</label> <input type="text" name="stock-saldo" value="<?=$book['stock_saldo'];?>">
    <br>
    <br>
    <label for="title">Authors:</label> <input type="text" name="author" value="<?=$authors['authors'];?>">
    <br>
    <select name="authors" id="">
        <?php while ($book = $stmt->fetch()) { ?>
                <li>
                    <a href="book.php?id=<?=$book['id'];?>"><?=$book['title'];?></a>
                </li>
        <?php } ?>
    </select>
    <br>
    <input type="submit" value="Save" name="edit">
</form>

</body>
</html>