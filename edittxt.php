<!-- if changed copy from here -->

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