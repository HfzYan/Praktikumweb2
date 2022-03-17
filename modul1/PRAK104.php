<!DOCTYPE html>
<html>

<body>
    <?php
    $samsungs = [
        "Samsung Galaxy S22",
        "Samsung Galaxy S22+",
        "Samsung Galaxy A03",
        "Samsung Galaxy Xcover 5"
    ]; ?>
    <table border="1px">
        <tr>
            <th>
                Daftar Smartphone Samsung
            </th>
        </tr>
        <tr>
            <td>
                <?= $samsungs[0]; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $samsungs[1]; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $samsungs[2]; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $samsungs[3]; ?>
            </td>
        </tr>
    </table>
</body>

</html>