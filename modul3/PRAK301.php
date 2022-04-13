<!DOCTYPE html>

<html>

<head>

</head>

<body>
    <form method="post">
        Jumlah Peserta:
        <input type="text" name="jumlah"><br>
        <input type="submit" name="submit" value="Cetak"><br>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $jumlah = (int) $_POST['jumlah'];
        $i = 1;
        while ($i <= $jumlah) {
            if ($i % 2 == 0) {
                echo "<h2 style=\"color:green\">Peserta Ke-$i</h2>";
            } elseif ($i % 2 == 1) {
                echo "<h2 style=\"color:red\">Peserta Ke-$i</h2>";
            }
            $i++;
        }
    }
    ?>
</body>

</html>