<?php session_start(); ?>

<?php

function login($no, $pass, $koneksi)
{
    $query = "SELECT password_member FROM member WHERE nomor_member = $no;";
    $result = mysqli_query($koneksi, $query);
    $queryPass = mysqli_fetch_assoc($result);
    if ($queryPass != false) {
        if ($queryPass['password_member'] == $pass) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function loginAndRedirect($path)
{
    $_SESSION['path'] = $path;
    echo "<script>window.location.href='../login/ErrorPage.php'</script>";
}
?>
