<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaan');
if (!$koneksi) {
    echo 'Gagal terhubung';
}
