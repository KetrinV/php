<?php
    var_dump($authors);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisa autor</title>
</head>
<body>
    <h2>Uue autori lisamine</h2>
    <form action="add_author.php" method="post">
        <input type="text" name="first-name" placeholder="Eesnimi">
        <br>
        <input type="text" name="last-name" placeholder="Perenimi">
        <br>
        <input type="submit" name="add_author" value="Lisa">
    </form>
</body>
</html>