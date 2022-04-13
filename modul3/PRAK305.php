<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <form method="post">
        <input type="text" name="string">
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $string = $_POST['string'];
        $len = strlen($string);
        for ($index = 0; $index < $len; $index++) {
            $letter = $string[$index];
            for ($i = 0; $i < $len; $i++) {
                if ($i == 0) {
                    echo strtoupper($letter);
                } else {
                    echo strtolower($letter);
                }
            }
        }
    }
    ?>
</body>

</html>