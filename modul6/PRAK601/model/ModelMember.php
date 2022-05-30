

<?php

function addMember(
    $nama,
    $nomor,
    $password,
    $alamat,
    $tglMendaftar,
    $tglTerakhirBayar,
    $koneksi
) {

    $mendaftarDate = strtotime($tglMendaftar);
    $mendaftarDate = date('Y-m-d H:i:s', $mendaftarDate);


    $bayarDate = strtotime($tglTerakhirBayar);
    $bayarDate = date('Y-m-d', $bayarDate);


    $query = "INSERT INTO member(
            nama_member,
            nomor_member,
            password_member,
            alamat,
            tgl_mendaftar,
            tgl_terakhir_bayar
        ) VALUES ('$nama', '$nomor','$password', '$alamat', '$mendaftarDate', '$bayarDate')";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}

function updateMember(
    $id,
    $nama,
    $nomor,
    $password,
    $alamat,
    $tglMendaftar,
    $tglTerakhirBayar,
    $koneksi
) {

    $mendaftarDate = strtotime($tglMendaftar);
    $mendaftarDate = date('Y-m-d H:i:s', $mendaftarDate);


    $bayarDate = strtotime($tglTerakhirBayar);
    $bayarDate = date('Y-m-d', $bayarDate);

    $query = "UPDATE member
        SET nama_member = '$nama',
            nomor_member = '$nomor',
            password_member = '$password',
            alamat = '$alamat',
            tgl_mendaftar = '$mendaftarDate',
            tgl_terakhir_bayar = '$bayarDate'
        WHERE id_member = $id";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}

function getAllMembers($koneksi)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM member");
    $i = 0;
    while ($row = mysqli_fetch_assoc($fetch)) {
        $rows[$i] = $row;
        $i++;
    }
    if ($i != 0) {
        return $rows;
    } else {
        return false;
    }
}

function getAMember($koneksi, $id)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM member WHERE id_member=$id");
    $row = mysqli_fetch_assoc($fetch);
    return $row;
}

function deleteMember($id, $koneksi)
{
    $query = "DELETE FROM member WHERE id_member=$id";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}
