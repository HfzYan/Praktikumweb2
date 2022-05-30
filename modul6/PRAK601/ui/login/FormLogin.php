<!DOCTYPE html>
<html>
<?php
require '../../model/Login.php';
require '../../config/Koneksi.php';

if (!isset($_SESSION['path'])) {
    $_SESSION['path'] = '../buku/FormBuku.php';
}

if (isset($_POST['btn_login'])) {
    if (login(
        $_POST['nomor_member'],
        $_POST['password'],
        $koneksi
    )) {
        $_SESSION['login'] = 1;
        echo "<script> alert(\"Berhasil login\") </script>";
        echo "<script>window.location.href='" . $_SESSION['path'] . "'</script>";
    } else {
        echo "<script> alert(\"Nomor/password salah!\") </script>";
        unset($_POST['btn_login']);
    }
}

if (isset($_SESSION['login'])) {
    echo "<script>window.location.href='" . $_SESSION['path'] . "'</script>";
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
            <h1>Login</h1>
            <br>
            <div class="mb-3">
                <label for="nomor_member" class="form-label">Nomor</label>
                <br>
                <input type="text" class="form-control" name="nomor_member" id="nomor_member" required>
                <br><br>
                <label for="password" class="form-label">Password</label>
                <br>
                <input type="text" class="form-control" name="password" id="password" required>
                <br><br>
                <button type="submit" class="btn btn-success" name="btn_login" value="login">Login</button>
            </div>
        </form>
    </div>
</body>

</html>