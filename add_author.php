<?php

require_once('connection.php');

if ( isset($_POST['add-author']) ) {

    $stmt = $pdo->prepare('INSERT INTO authors (first_name, last_name) VALUES (:first_name, :last_name)');
    $stmt->execute(['first_name' => $_POST['first-name'], 'last_name' => $_POST['last-name']]);

    header('Location: index.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisa autor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Uue autor lisamine</h2>

    <form action="add_author.php" method="post">
        <input type="text" name="first-name" placeholder="Eesnimi">
        <br>
        <input type="text" name="last-name" placeholder="Perenimi">
        <br>
        <input class="authorstext" type="submit" name="add-author" value="Lisa">
    </form>
</body>
</html>