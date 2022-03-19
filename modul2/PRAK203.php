<!DOCTYPE html>
<html>

<body>
    <form method="post">
        Nilai : <input type="text" name="nilai" required><br>
        Dari : <br>
        <input type="radio" name="dari" value="C">Celcius<br>
        <input type="radio" name="dari" value="F">Fahrenheit<br>
        <input type="radio" name="dari" value="R">Rheamur<br>
        <input type="radio" name="dari" value="K">Kelvin<br>
        Ke : <br>
        <input type="radio" name="ke" value="C">Celcius<br>
        <input type="radio" name="ke" value="F">Fahrenheit<br>
        <input type="radio" name="ke" value="R">Rheamur<br>
        <input type="radio" name="ke" value="K">Kelvin<br>

        <input type="submit" value="Konversi" name="konversi"><br>

        <?php
        if (isset($_POST['konversi'])) {
            $nilai = (float) $_POST['nilai'];

            if ($_POST['dari'] == $_POST['ke']) {
                if ($_POST['dari'] == "K") {
                    echo "<h2>Hasil Konversi : " . $nilai . " " . $_POST['dari'];
                } else {
                    echo "<h2>Hasil Konversi : " . $nilai . " °" . $_POST['dari'];
                }
            } else {

                switch ($_POST['dari']) {
                    case "C":
                        break;
                    case "F":
                        $nilai = 5 / 9 * ($nilai - 32);
                        break;
                    case "R":
                        $nilai = 5 / 4 * $nilai;
                        break;
                    case "K":
                        $nilai = $nilai - 273.15;
                        break;
                }

                switch ($_POST['ke']) {
                    case "C":
                        echo "<h2>Hasil Konversi : " . $nilai . " °C";
                        break;
                    case "F":
                        $nilai = (9 / 5) * $nilai + 32;
                        echo "<h2>Hasil Konversi : " . $nilai . " °F";
                        break;
                    case "R":
                        $nilai = 4 / 5 * $nilai;
                        echo "<h2>Hasil Konversi : " . $nilai . " °R";
                        break;
                    case "K":
                        $nilai = $nilai + 273.15;
                        echo "<h2>Hasil Konversi : " . $nilai . " K";
                        break;
                }
            }
        }
        ?>
    </form>
</body>

</html>