<?php

require_once('connection.php');

$q= $_GET['q'];

if (isset($q) && $q) {
    $stmt = $pdo->prepare('SELECT * FROM books WHERE is_deleted=0 AND title LIKE :q ');
    $stmt->execute(['q' => "%{$q}%"]);
} else {
    $stmt = $pdo->query('SELECT * FROM books WHERE is_deleted=0');
# while ($row = $stmt->fetch())
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raamatupood</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav style="display: flex; justify-content: space-between;">
        <a href="add_author.php" class="authorstext">Add author</a>

        <form action="index.php" method="get">
            <input type="text" name="q" placeholder="Searching" value="<?=$q;?>">
            <input type="submit" name="search" value="Search">
        </form>
    </nav>

    <main>
        <ul>
            <?php while ($book = $stmt->fetch()) { ?>
                <li>
                    <a href="book.php?id=<?=$book['id'];?>"><?=$book['title'];?></a>
                </li>
            <?php } ?>
        </ul>
    </main>

</body>
</html>