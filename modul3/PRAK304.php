<?php

$path = "star.png";
$isInputted = false;
if (isset($_POST['submit'])) {
    $isInputted = true;
    $n = (int) $_POST['jumlah'];
}
if (isset($_POST['tambah'])) {
    $isInputted = true;
    $n = (int) $_POST['tambah'];
    $n++;
}
if (isset($_POST['kurang'])) {
    $isInputted = true;
    $n = (int) $_POST['kurang'];
    if ($n != 0) {
        $n--;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php if (!$isInputted) : ?>
        <form method="post">
            Jumlah bintang
            <input type="text" name="jumlah"><br>
            <button type="submit" name="submit" value="submit">Submit</button>
        </form>
    <?php
    endif ?>

    <?php
    if ($isInputted) :
        echo "Jumlah bintang " . $n . "<br>";
        for ($i = 0; $i < $n; $i++) {
            echo "<img src=\"$path\" height=\"100\" width=\"100\"> ";
        }
        echo "<br>"; ?>
        <form method="post">
            <button type="submit" name="tambah" value="<?= $n ?>">
                Tambah
            </button>
            <button type="submit" name="kurang" value="<?= $n ?>">
                Kurang
            </button>
        </form>

    <?php

    endif;

    ?>

</body>

</html>