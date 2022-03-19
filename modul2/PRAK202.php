<!DOCTYPE html>
<html>

<body>
    <form method="post">

        <?php
        if (isset($_POST['submit'])) {
            if ($_POST['nama'] == "") {
                $emptyNama = "nama tidak boleh kosong";
                $noPrint = true;
            }
            if ($_POST['nim'] == "") {
                $emptyNim = "nim tidak boleh kosong";
                $noPrint = true;
            }
            if (!isset($_POST['kelamin'])) {
                $emptyKelamin = "jenis kelamin tidak boleh kosong";
                $noPrint = true;
            }
        }
        ?>

        Nama: <input type="text" name="nama">
        <font color="red">*
            <?php if (isset($emptyNama)) {
                echo $emptyNama;
            } ?>
        </font>
        <br>

        Nim: <input type="text" name="nim">
        <font color="red">*
            <?php if (isset($emptyNim)) {
                echo $emptyNim;
            } ?>
        </font>
        <br>

        Jenis Kelamin:
        <font color="red">*
            <?php if (isset($emptyKelamin)) {
                echo $emptyKelamin;
            } ?>
        </font>
        <br>

        <input type="radio" name="kelamin" value="Laki-Laki">Laki-Laki<br>
        <input type="radio" name="kelamin" value="Perempuan">Perempuan<br>
        <input type="submit" value="Submit" name="submit"><br>

        <?php
        if (isset($_POST['submit']) && !isset($noPrint)) {
            echo
            "<br><h2>Output :</h2>"
                . $_POST['nama'] . "<br>"
                . $_POST['nim'] . "<br>"
                . $_POST['kelamin'] . "<br>";
        } ?>

    </form>
</body>

</html>