<?php

require_once('connection.php');

$id = $_GET['id'];

if ( isset($_POST['edit']) && $_POST['edit'] == 'Salvesta' ) {
    // var_dump($_POST);

    $stmt = $pdo->prepare('UPDATE books SET title = :title, stock_saldo = :stock_saldo WHERE id = :id');
    $stmt->execute(['title' => $_POST['title'], 'stock_saldo' => $_POST['stock-saldo'], 'id' => $id]);

    header('Location: book.php?id=' . $id);
}

$stmtBook = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmtBook->execute(['id' => $id]);
$book = $stmtBook->fetch();

$stmtBookAuthors = $pdo->prepare('SELECT * FROM book_authors ba LEFT JOIN authors a ON a.id=ba.author_id  WHERE ba.book_id = :book_id');
$stmtBookAuthors->execute(['book_id' => $id]);

$stmtAuthors = $pdo->prepare('SELECT * FROM authors WHERE id NOT IN (SELECT author_id FROM book_authors WHERE book_id = :book_id)');
$stmtAuthors->execute(['book_id' => $id]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,0,0" />
    <title><?=$book['title'];?></title>
</head>
<body>

<form action="edit.php?id=<?=$id;?>" method="POST">
    <label for="title">Title:</label> <input type="text" name="title" value="<?=$book['title'];?>" style="width: 320px;">
    <br>
    <br>
    <label for="title">Stock saldo:</label> <input type="text" name="stock-saldo" value="<?=$book['stock_saldo'];?>">
    <br>
    <br>
    <div style="font-weight: bold;">Authors:</div>
    <select name="authors" id="author-dd">
        <option value=""></option>
        <?php while ($author = $stmtAuthors->fetch()) { ?>
            <option value="<?=$author['id'];?>"><?=$author['first_name'];?> <?=$author['last_name'];?></option>
        <?php } ?>
    </select>
    <br>
    <?php while ($bookAuthor = $stmtBookAuthors->fetch()) { ?>
        <div class="author-row">
            <span class="author-name">
                <?=$bookAuthor['first_name'];?> <?=$bookAuthor['last_name'];?>
            </span>
            <span class="material-symbols-outlined" style="font-size: 16px; vertical-align: text-bottom;">delete</span>
            <input class="author-id" type="hidden" name="author[]" value="<?=$bookAuthor['id'];?>">
        </div>
    <?php } ?>
    <br>
    <input type="submit" value="Save" name="edit">
</form>
<script src="app.js"></script>
</body>
</html>