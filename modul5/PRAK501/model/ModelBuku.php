<?php
function addBuku(
    $judul,
    $penulis,
    $penerbit,
    $thnTerbit,
    $koneksi
) {
    $query = "INSERT INTO buku(
            id_buku, judul_buku, penulis, penerbit, tahun_terbit
        ) VALUES (
            NULL, '$judul', '$penulis', '$penerbit', $thnTerbit
            )";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}



function updateBuku(
    $id,
    $judul,
    $penulis,
    $penerbit,
    $thnTerbit,
    $koneksi
) {
    $query = "UPDATE buku
        SET judul_buku = '$judul',
            penulis = '$penulis',
            penerbit = '$penerbit',
            tahun_terbit = $thnTerbit
        WHERE id_buku = $id";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}

function getAllBuku($koneksi)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM buku");
    $i = 0;
    while ($row = mysqli_fetch_assoc($fetch)) {
        $rows[$i] = $row;
        $i++;
    }
    return $rows;
}

function getABuku($koneksi, $id)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku=$id");
    $row = mysqli_fetch_assoc($fetch);
    return $row;
}

function deleteBuku($id, $koneksi)
{
    $query = "DELETE FROM buku WHERE id_buku = $id";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}
