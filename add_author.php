<?php
    // var_dump($authors);
    require_once('connection.php');
    var_dump($_POST);
    // INSERT INTO authors(first-name, last-name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add author</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Add new author</h2>
    <form action="add_author.php" method="post">
        <input type="text" name="first-name" placeholder="First name">
        <br>
        <br>
        <input type="text" name="last-name" placeholder="Last name">
        <br>
        <br>
        <input type="submit" name="add_author" value="Add">
    </form>
</body>
</html>