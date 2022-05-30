<!DOCTYPE html>
<html>
<?php
require '../../model/Login.php';
require '../../model/ModelPeminjaman.php';
require '../../config/Koneksi.php';

if (!isset($_SESSION['login'])) {
    loginAndRedirect("../peminjaman/FormPeminjaman.php");
}

if (isset($_POST['tambah'])) {
    $action = "Tambah";
} elseif (isset($_POST['edit'])) {
    $action = "Edit";
    $peminjaman = getPeminjaman($koneksi, $_POST['edit']);
} elseif (isset($_POST['hapus'])) {
    $action = "Hapus";
    $peminjaman = getPeminjaman($koneksi, $_POST['hapus']);
} elseif (isset($_POST['submit_tambah'])) {
    $result = addPeminjaman(
        $_POST['tgl_pinjam'],
        $_POST['tgl_kembali'],
        $koneksi
    );
    if ($result == 1) {
        echo "<script> alert(\"Data peminjaman telah ditambahkan ke database\"); 
                        window.location.href='Peminjaman.php';</script>";
    } else {
        echo "<script> alert(\"Gagal menambahkan\"); 
        window.location.href='Peminjaman.php';</script>";
        echo $result;
    }
} elseif (isset($_POST['submit_edit'])) {
    $result = updatePeminjaman(
        $_POST['submit_edit'],
        $_POST['tgl_pinjam'],
        $_POST['tgl_kembali'],
        $koneksi
    );
    if ($result == 1) {
        echo "<script> alert(\"Data peminjaman telah diedit\"); 
                        window.location.href='Peminjaman.php';</script>";
    } else {
        echo "<script> alert(\"Gagal mengedit\");
         
        window.location.href='Peminjaman.php';</script>";
        echo $result;
    }
} elseif (isset($_POST['submit_hapus'])) {
    $result = deletePeminjaman($_POST['submit_hapus'], $koneksi);
    if ($result == 1) {
        echo "<script> alert(\"Data peminjaman telah dihapus\"); 
                        window.location.href='Peminjaman.php';</script>";
    } else {
        echo "<script> alert(\"Gagal menghapus\"); 
        window.location.href='Peminjaman.php';</script>";
    }
    echo $result;
} else {
    header('Location: Peminjaman.php');
}


?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">

</head>

<body>
    <div class="container-fluid">
        <form method="POST" class="border form">
            <h1><?= $action ?> Data Peminjaman</h1>
            <br>
            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>

                <?php if ($action == "Edit") {
                    echo "<input type=\"date\" class=\"form-control\" name=\"tgl_pinjam\" id=\"tgl_pinjam\" value=\"" . $peminjaman['tgl_pinjam'] . "\" required>";
                } elseif ($action == "Hapus") {
                    echo "<input type=\"date\" class=\"form-control\" name=\"tgl_pinjam\" id=\"tgl_pinjam\" value=\"" . $peminjaman['tgl_pinjam'] . "\" disabled>";
                } else {
                    echo "<input type=\"date\" class=\"form-control\" name=\"tgl_pinjam\" id=\"tgl_pinjam\" required>";
                } ?>

                <br>
                <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>

                <?php if ($action == "Edit") {
                    echo "<input type=\"date\" class=\"form-control\" name=\"tgl_kembali\" id=\"tgl_kembali\" value=\"" . $peminjaman['tgl_kembali'] . "\" required>";
                } elseif ($action == "Hapus") {
                    echo "<input type=\"date\" class=\"form-control\" name=\"tgl_kembali\" id=\"tgl_kembali\" value=\"" . $peminjaman['tgl_kembali'] . "\" disabled>";
                } else {
                    echo "<input type=\"date\" class=\"form-control\" name=\"tgl_kembali\" id=\"tgl_kembali\" required>";
                } ?>

                <br>
            </div>
            <?php if ($action == "Edit") {
                echo "<button type=\"submit\" class=\"btn btn-success\" name=\"submit_edit\" value=\"" . $_POST['edit'] . "\">Submit</button>";
            } elseif ($action == "Hapus") {
                echo "<button type=\"submit\" class=\"btn btn-danger\" name=\"submit_hapus\" value=\"" . $_POST['hapus'] . "\">Hapus</button>";
            } else {
                echo "<button type=\"submit\" class=\"btn btn-success\" name=\"submit_tambah\" value=\"Submit\">Submit</button>";
            } ?>

            <input type="submit" class="btn btn-primary" name="kembali" value="Kembali">

        </form>
    </div>
</body>

<?php ?>

</html>