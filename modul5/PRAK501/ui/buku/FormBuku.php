<!DOCTYPE html>
<html>
<?php
require '../../model/ModelBuku.php';
require '../../config/Koneksi.php';

if (isset($_POST['tambah'])) {
    $action = "Tambah";
} elseif (isset($_POST['edit'])) {
    $action = "Edit";
    $buku = getABuku($koneksi, $_POST['edit']);
} elseif (isset($_POST['hapus'])) {
    $action = "Hapus";
    $buku = getABuku($koneksi, $_POST['hapus']);
} elseif (isset($_POST['submit_tambah'])) {
    $result = addBuku(
        $_POST['judul'],
        $_POST['penulis'],
        $_POST['penerbit'],
        $_POST['tahun_terbit'],
        $koneksi
    );
    if ($result == 1) {
        echo "<script> alert(\"Buku telah ditambahkan ke database\"); 
                        window.location.href='Buku.php';</script>";
    } else {
        echo "<script> alert(\"Gagal menambahkan\"); 
                        window.location.href='Buku.php';</script>";
    }
} elseif (isset($_POST['submit_edit'])) {
    $result = updateBuku(
        $_POST['submit_edit'],
        $_POST['judul'],
        $_POST['penulis'],
        $_POST['penerbit'],
        $_POST['tahun_terbit'],
        $koneksi
    );
    if ($result == 1) {
        echo "<script> alert(\"Buku telah diedit\"); 
                        window.location.href='Buku.php';</script>";
    } else {
        echo "<script> alert(\"Gagal mengedit\"); 
                        </script>";
    }
} elseif (isset($_POST['submit_hapus'])) {
    $result = deleteBuku($_POST['submit_hapus'], $koneksi);
    if ($result == 1) {
        echo "<script> alert(\"Buku telah dihapus\"); 
                        window.location.href='Buku.php';</script>";
    } else {
        echo "<script> alert(\"Gagal menghapus\"); 
        window.location.href='Buku.php';</script>";
    }
    echo $result;
} else {
    header('Location: Buku.php');
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
            <h1><?= $action ?> Data Buku</h1>
            <br>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>

                <?php if ($action == "Edit") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"judul\" id=\"judul\" value=\"" . $buku['judul_buku'] . "\" required>";
                } elseif ($action == "Hapus") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"judul\" id=\"judul\" value=\"" . $buku['judul_buku'] . "\" disabled>";
                } else {
                    echo "<input type=\"text\" class=\"form-control\" name=\"judul\" id=\"judul\" required>";
                } ?>

                <br>
                <label for="penulis" class="form-label">Penulis</label>

                <?php if ($action == "Edit") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"penulis\" id=\"penulis\" value=\"" . $buku['penulis'] . "\" required>";
                } elseif ($action == "Hapus") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"penulis\" id=\"penulis\" value=\"" . $buku['penulis'] . "\" disabled>";
                } else {
                    echo "<input type=\"text\" class=\"form-control\" name=\"penulis\" id=\"penulis\" required>";
                } ?>

                <br>
                <label for="penerbit" class="form-label">Penerbit</label>

                <?php if ($action == "Edit") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"penerbit\" id=\"penerbit\" value=\"" . $buku['penerbit'] . "\" required>";
                } elseif ($action == "Hapus") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"penerbit\" id=\"penerbit\" value=\"" . $buku['penerbit'] . "\" disabled>";
                } else {
                    echo "<input type=\"text\" class=\"form-control\" name=\"penerbit\" id=\"penerbit\" required>";
                } ?>

                <br>
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>

                <?php if ($action == "Edit") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"tahun_terbit\" id=\"tahun_terbit\" value=\"" . $buku['tahun_terbit'] . "\" required>";
                } elseif ($action == "Hapus") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"tahun_terbit\" id=\"tahun_terbit\" value=\"" . $buku['tahun_terbit'] . "\" disabled>";
                } else {
                    echo "<input type=\"text\" class=\"form-control\" name=\"tahun_terbit\" id=\"tahun_terbit\" required>";
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