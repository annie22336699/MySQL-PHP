<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for迴圈</title>
</head>
<body>
    <table>
        <tr>
        <?php for($i=1;$i<10;$i++): ?>
            <td>
            <!-- <?php echo $i; ?> -->
            </td>
            <td>
            <?php printf('%s * %s = %s', $i, $i, $i*$i) ?>
            </td>
        <?php endfor ?>
        </tr>
    </table>


</body>
</html>