<!DOCTYPE html>
<html>
<?php
require '../../model/Login.php';
require '../../model/ModelMember.php';
require '../../config/Koneksi.php';

if (!isset($_SESSION['login'])) {
    loginAndRedirect("../member/FormMember.php");
}

if (isset($_POST['tambah'])) {
    $action = "Tambah";
} elseif (isset($_POST['edit'])) {
    $action = "Edit";
    $member = getAMember($koneksi, $_POST['edit']);
} elseif (isset($_POST['hapus'])) {
    $action = "Hapus";
    $member = getAMember($koneksi, $_POST['hapus']);
} elseif (isset($_POST['submit_tambah'])) {
    $result = addMember(
        $_POST['nama_member'],
        $_POST['nomor_member'],
        $_POST['password'],
        $_POST['alamat'],
        $_POST['tgl_mendaftar'],
        $_POST['tgl_terakhir_bayar'],
        $koneksi
    );
    if ($result == 1) {
        echo "<script> alert(\"Member telah ditambahkan ke database\"); 
                        window.location.href='Member.php';</script>";
    } else {
        echo "<script> alert(\"Gagal menambahkan: $result \"); 
        window.location.href='Member.php';</script>";
    }
} elseif (isset($_POST['submit_edit'])) {
    $result = updateMember(
        $_POST['submit_edit'],
        $_POST['nama_member'],
        $_POST['nomor_member'],
        $_POST['password'],
        $_POST['alamat'],
        $_POST['tgl_mendaftar'],
        $_POST['tgl_terakhir_bayar'],
        $koneksi
    );
    if ($result == 1) {
        echo "<script> alert(\"Member telah diedit\"); 
                        window.location.href='Member.php';</script>";
    } else {
        echo "<script> alert(\"Gagal mengedit\");
         
                        </script>";
    }
} elseif (isset($_POST['submit_hapus'])) {
    $result = deleteMember($_POST['submit_hapus'], $koneksi);
    if ($result == 1) {
        echo "<script> alert(\"Member telah dihapus\"); 
                        window.location.href='Member.php';</script>";
    } else {
        echo "<script> alert(\"Gagal menghapus\"); 
        window.location.href='Member.php';</script>";
    }
    echo $result;
} else {
    header('Location: Member.php');
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
            <h1><?= $action ?> Data Member</h1>
            <br>
            <div class="mb-3">
                <label for="nama_member" class="form-label">Nama</label>

                <?php if ($action == "Edit") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"nama_member\" id=\"nama_member\" value=\"" . $member['nama_member'] . "\" required>";
                } elseif ($action == "Hapus") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"nama_member\" id=\"nama_member\" value=\"" . $member['nama_member'] . "\" disabled>";
                } else {
                    echo "<input type=\"text\" class=\"form-control\" name=\"nama_member\" id=\"nama_member\" required>";
                } ?>

                <br>
                <label for="nomor_member" class="form-label">Nomor Telepon</label>

                <?php if ($action == "Edit") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"nomor_member\" id=\"nomor_member\" value=\"" . $member['nomor_member'] . "\" required>";
                } elseif ($action == "Hapus") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"nomor_member\" id=\"nomor_member\" value=\"" . $member['nomor_member'] . "\" disabled>";
                } else {
                    echo "<input type=\"text\" class=\"form-control\" name=\"nomor_member\" id=\"nomor_member\" required>";
                } ?>

                <br>

                <label for="password" class="form-label">Password</label>

                <?php if ($action == "Edit") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"password\" id=\"password\" value=\"" . $member['password'] . "\" required>";
                } elseif ($action == "Hapus") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"password\" id=\"password\" value=\"" . $member['password'] . "\" disabled>";
                } else {
                    echo "<input type=\"text\" class=\"form-control\" name=\"password\" id=\"password\" required>";
                } ?>

                <br>
                <label for="alamat" class="form-label">Alamat</label>

                <?php if ($action == "Edit") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"alamat\" id=\"alamat\" value=\"" . $member['alamat'] . "\" required>";
                } elseif ($action == "Hapus") {
                    echo "<input type=\"text\" class=\"form-control\" name=\"alamat\" id=\"alamat\" value=\"" . $member['alamat'] . "\" disabled>";
                } else {
                    echo "<input type=\"text\" class=\"form-control\" name=\"alamat\" id=\"alamat\" required>";
                } ?>

                <br>
                <label for="tgl_mendaftar" class="form-label">Tanggal Mendaftar</label>

                <?php if ($action == "Edit") {
                    echo "<input type=\"datetime-local\" class=\"form-control\" name=\"tgl_mendaftar\" id=\"tgl_mendaftar\" value=\"" . $member['tgl_mendaftar'] . "\" required>";
                } elseif ($action == "Hapus") {
                    echo "<input type=\"datetime-local\" class=\"form-control\" name=\"tgl_mendaftar\" id=\"tgl_mendaftar\" value=\"" . $member['tgl_mendaftar'] . "\" disabled>";
                } else {
                    echo "<input type=\"datetime-local\" class=\"form-control\" name=\"tgl_mendaftar\" id=\"tgl_mendaftar\" required>";
                } ?>

                <br>
                <label for="tgl_terakhir_bayar" class="form-label">Tanggal Terakhir Bayar</label>

                <?php if ($action == "Edit") {
                    echo "<input type=\"date\" class=\"form-control\" name=\"tgl_terakhir_bayar\" id=\"tgl_terakhir_bayar\" value=\"" . $member['tgl_terakhir_bayar'] . "\" required>";
                } elseif ($action == "Hapus") {
                    echo "<input type=\"date\" class=\"form-control\" name=\"tgl_terakhir_bayar\" id=\"tgl_terakhir_bayar\" value=\"" . $member['tgl_terakhir_bayar'] . "\" disabled>";
                } else {
                    echo "<input type=\"date\" class=\"form-control\" name=\"tgl_terakhir_bayar\" id=\"tgl_terakhir_bayar\" required>";
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