<!DOCTYPE html>
<?php
require '../../model/ModelPeminjaman.php';
require '../../config/Koneksi.php';
$data = getAllPeminjaman($koneksi); ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">

</head>

<body>
    <h1>Data Peminjaman Perpustakaan</h1>
    <div class="container-fluid">
        <form method="POST" action="FormPeminjaman.php">
            <button type="submit" class="btn btn-success" name="tambah" value="1">Tambah</button> <br><br>
            <br><br>
            <table class="table table-striped border">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php ?>
                    <?php if ($data != false) {
                        foreach ($data as $data) : ?>
                            <tr>
                                <th scope="row"><?= $data['id_peminjaman'] ?></th>
                                <td><?= $data['tgl_pinjam'] ?></td>
                                <td><?= $data['tgl_kembali'] ?></td>
                                <td>
                                    <button type="submit" class="btn btn-primary" name="edit" value="<?= $data['id_peminjaman'] ?>">Edit</button>
                                    <button type="submit" class="btn btn-danger" name="hapus" value="<?= $data['id_peminjaman'] ?>">Hapus</button>
                                </td>
                            </tr>
                    <?php endforeach;
                    } ?>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>