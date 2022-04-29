<?php
$index = 0;
$data = [
    [
        "nama" => "Ridho",
        "mk" => [
            [
                "nama_mk" => "Pemrograman I",
                "sks" => 2
            ],
            [
                "nama_mk" => "Praktikum Pemrograman I",
                "sks" => 1
            ],
            [
                "nama_mk" => "Pengantar Lingkungan Lahan Basah",
                "sks" => 2
            ],
            [
                "nama_mk" => "Arsitektur Komputer",
                "sks" => 3
            ]
        ]
    ],
    [
        "nama" => "Ratna",
        "mk" => [
            [
                "nama_mk" => "Basis Data I",
                "sks" => 2
            ],
            [
                "nama_mk" => "Praktikum Basis Data I",
                "sks" => 1
            ],
            [
                "nama_mk" => "Kalkulus",
                "sks" => 3
            ]
        ]
    ],
    [
        "nama" => "Tono",
        "mk" => [
            [
                "nama_mk" => "Rekayasa Perangkat Lunak",
                "sks" => 3
            ],
            [
                "nama_mk" => "Analisis dan Perancangan Sistem",
                "sks" => 3
            ],
            [
                "nama_mk" => "Komputasi Awan",
                "sks" => 3
            ],
            [
                "nama_mk" => "Kecerdasan Bisnis",
                "sks" => 3
            ]
        ]
    ]

];


for ($i = 0; $i < count($data); $i++) {
    $total_sks = 0;
    $revisi = false;

    foreach ($data[$i]['mk'] as $mk) {
        $total_sks += $mk['sks'];
    }
    if ($total_sks < 7) {
        $revisi = true;
    }

    $data[$i]['total_sks'] = $total_sks;
    $data[$i]['revisi'] = $revisi;
}

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {

            padding-right: 20px;
            padding-bottom: 20px;
        }

        th {
            background-color: gainsboro;

        }

        td.revisi {
            background-color: red;
        }

        td.tidak_revisi {
            background-color: lawngreen;
        }
    </style>
</head>

<body>
    <table>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
        <?php foreach ($data as $row) {
            for ($i = 0; $i < count($row['mk']); $i++) {
                echo "<tr>";
                if ($i == 0) {
                    $index++;
                    echo "<td>" . $index . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['mk'][$i]['nama_mk'] . "</td>";
                    echo "<td>" . $row['mk'][$i]['sks'] . "</td>";
                    echo "<td>" . $row['total_sks'] . "</td>";
                    if ($row['revisi']) {
                        echo "<td class=\"revisi\">Revisi KRS</td>";
                    } else {
                        echo "<td class=\"tidak_revisi\">Tidak Revisi</td>";
                    }
                } else {
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>" . $row['mk'][$i]['nama_mk'] . "</td>";
                    echo "<td>" . $row['mk'][$i]['sks'] . "</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                }
                echo "</tr>";
            }
        } ?>

    </table>
</body>

</html>