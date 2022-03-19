<!DOCTYPE html>
<html>

<body>
    <form method="post">
        Nilai: <input type="text" name="nilai"><br>
        <input type="submit" name="konversi" value="Konversi">
        <h2>
            <?php
            if (isset($_POST['konversi'])) {

                $nilai = (int)$_POST['nilai'];

                echo "Hasil: ";
                if ($nilai == 0) echo "Nol";
                elseif ($nilai > 0 && $nilai <= 10) echo "Satuan";
                elseif ($nilai > 10 && $nilai <= 19) echo "Belasan";
                elseif ($nilai > 19 && $nilai <= 99) echo "Puluhan";
                elseif ($nilai > 99 && $nilai <= 999) echo "Ratusan";
                else echo "Anda Menginput Melebihi Limit Bilangan";
            }
            ?>
        </h2>

    </form>
</body>

</html>