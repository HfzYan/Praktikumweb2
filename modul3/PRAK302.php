<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <form method="post">
        Tinggi:
        <input type="text" name="tinggi"><br>
        Alamat Gambar:
        <input type="text" name="url"><br>
        <input type="submit" name="submit" value="Cetak">
    </form>
    <table>
        <?php
        if (isset($_POST['submit'])) {
            $tinggi = (int) $_POST['tinggi'];
            $const_h = $tinggi;
            $url = $_POST['url'];
            while ($tinggi > 0) {
                $lebar = $const_h;
                echo "<tr>";
                while ($lebar > 0) {
                    if ($lebar <= $tinggi) {
                        echo "<td><img src=\"$url\" height=\"42\" width=\"42\"></td>";
                    } else {
                        echo "<td></td>";
                    }
                    $lebar--;
                }
                echo "</tr>";
                $tinggi--;
            }
        }
        ?>
    </table>
</body>

</html>