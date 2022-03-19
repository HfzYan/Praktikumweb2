<!DOCTYPE html>
<html>

<body>
    <form method="post">
        Nama: 1
        <input type="text" name="nama1"><br>
        Nama: 2
        <input type="text" name="nama2"><br>
        Nama: 3
        <input type="text" name="nama3"><br>
        <input type="submit" name="urutkan" value="Urutkan"><br><br>
        <?php
        if (isset($_POST['urutkan'])) {


            $arr = $_POST;

            if ($arr['nama2'] < $arr['nama1']) {
                $temp = $arr['nama1'];
                $arr['nama1'] = $arr['nama2'];
                $arr['nama2'] = $temp;
            }
            if ($arr['nama3'] < $arr['nama2']) {
                $temp = $arr['nama2'];
                $arr['nama2'] = $arr['nama3'];
                $arr['nama3'] = $temp;
                if ($arr['nama2'] < $arr['nama1']) {
                    $temp = $arr['nama1'];
                    $arr['nama1'] = $arr['nama2'];
                    $arr['nama2'] = $temp;
                }
            }
            echo $arr['nama1'] . "<br>"
                . $arr['nama2'] . "<br>"
                . $arr['nama3'];
        }
        ?>


    </form>
</body>

</html>