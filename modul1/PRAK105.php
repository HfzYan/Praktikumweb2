<!DOCTYPE html>
<html>

<body>
    <?php
    $samsungs = [
        'S22' => "Samsung Galaxy S22",
        'S22+' => "Samsung Galaxy S22+",
        'A03' => "Samsung Galaxy A03",
        'XC5' => "Samsung Galaxy Xcover 5"
    ]; ?>
    <table border="1px">
        <tr>
            <th style="background-color:red; padding: 5px;">
                <h2>Daftar Smartphone Samsung</h2>
            </th>
        </tr>
        <tr>
            <td>
                <?= $samsungs['S22']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $samsungs['S22+']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $samsungs['A03']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $samsungs['XC5']; ?>
            </td>
        </tr>

    </table>
</body>

</html>