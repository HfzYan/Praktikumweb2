<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <form method="post">
        Batas Bawah:
        <input type="text" name="floor"><br>
        Batas Atas:
        <input type="text" name="ceil"><br>
        <input type="submit" name="submit" value="Cetak">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $i = $_POST['floor'];
        $path = "star.png";
        do {
            if (($i + 7) % 5 == 0) {
                echo "<img src=\"$path\" height=\"20\" width=\"20\"> ";
            } else {
                echo $i . " ";
            }
            $i++;
        } while ($i <= $_POST['ceil']);
    }
    ?>
</body>

</html>