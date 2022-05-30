
<?php
function addPeminjaman(
    $tglPinjam,
    $tglKembali,
    $koneksi
) {

    $pinjamDate = strtotime($tglPinjam);
    $pinjamDate = date('Y-m-d', $pinjamDate);


    $kembaliDate = strtotime($tglKembali);
    $kembaliDate = date('Y-m-d', $kembaliDate);

    $query = "INSERT INTO peminjaman(
            tgl_pinjam,
            tgl_kembali
        ) VALUES ('$pinjamDate', '$kembaliDate')";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}


function updatePeminjaman(
    $id,
    $tglPinjam,
    $tglKembali,
    $koneksi
) {
    $pinjamDate = strtotime($tglPinjam);
    $pinjamDate = date('Y-m-d', $pinjamDate);


    $kembaliDate = strtotime($tglKembali);
    $kembaliDate = date('Y-m-d', $kembaliDate);

    $query = "UPDATE peminjaman
        SET tgl_pinjam = '$pinjamDate',
            tgl_kembali = '$kembaliDate'
        WHERE id_peminjaman = $id";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}

function getAllPeminjaman($koneksi)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM peminjaman");
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

function getPeminjaman($koneksi, $id)
{
    $fetch = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman=$id");
    $row = mysqli_fetch_assoc($fetch);
    return $row;
}

function deletePeminjaman($id, $koneksi)
{
    $query = "DELETE FROM peminjaman WHERE id_peminjaman=$id";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        return mysqli_error($koneksi);
    } else {
        return 1;
    }
}
