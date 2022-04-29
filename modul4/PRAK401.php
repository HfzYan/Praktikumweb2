<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {

            height: 20px;
            width: 20px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <form method="post">
        Panjang :
        <input type="text" name="panjang"><br>
        Lebar :
        <input type="text" name="lebar"><br>
        Nilai :
        <input type="text" name="nilai"><br>
        <input type="submit" name="submit" value="submit">
    </form>
    <?php if (isset($_POST['submit'])) {
        $angka = explode(" ", $_POST['nilai']);
        $panjang = (int) $_POST['panjang'];
        $lebar = (int) $_POST['lebar'];
        if (count($angka) == $panjang * $lebar) {
            echo "<table>";
            $index = 0;
            for ($i = 0; $i < $lebar; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $panjang; $j++) {
    ?>
                    <td> <?= $angka[$index] ?> </td>
    <?php
                    $index++;
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        }
    } ?>
</body>

</html>