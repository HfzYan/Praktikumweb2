<?php
$data = [
    [
        "nama" => "Andi",
        "nim" => 2101001,
        "uts" => 87,
        "uas" => 65
    ],
    [
        "nama" => "Budi",
        "nim" => 2101002,
        "uts" => 76,
        "uas" => 79
    ],
    [
        "nama" => "Tono",
        "nim" => 2101003,
        "uts" => 50,
        "uas" => 41
    ],
    [
        "nama" => "Jessica",
        "nim" => 2101004,
        "uts" => 60,
        "uas" => 75
    ]
];
for ($i = 0; $i < count($data); $i++) {
    $nilai = 40 / 100 * $data[$i]['uts'] + 60 / 100 * $data[$i]['uas'];
    $data[$i]['nilai'] = $nilai;

    if ($nilai >= 80) {
        $data[$i]['huruf'] = 'A';
    } elseif ($nilai >= 70 && $nilai < 80) {
        $data[$i]['huruf'] = 'B';
    } elseif ($nilai >= 60 && $nilai < 70) {
        $data[$i]['huruf'] = 'C';
    } elseif ($nilai >= 50 && $nilai < 60) {
        $data[$i]['huruf'] = 'D';
    } elseif ($nilai >= 0 && $nilai < 50) {
        $data[$i]['huruf'] = 'E';
    }
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
    </style>
</head>

<body>
    <table>
        <tr>
            <th><b>Nama</b></th>
            <th><b>NIM</b></th>
            <th><b>Nilai UTS</b></th>
            <th><b>Nilai UAS</b></th>
            <th><b>Nilai Akhir</b></th>
            <th><b>Huruf</b></th>
        </tr>
        <?php
        foreach ($data as $data) {
            echo "<tr>
            <td>" . $data['nama'] . "</td>
            <td>" . $data['nim'] . "</td>
            <td>" . $data['uts'] . "</td>
            <td>" . $data['uas'] . "</td>
            <td>" . $data['nilai'] . "</td>
            <td>" . $data['huruf'] . "</td>
        </tr>";
        } ?>
    </table>
</body>

</html>