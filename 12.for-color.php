<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>色碼測試</title>
    <style>
        td{
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>
<table>
        <tr>
        <?php for($i=0;$i<=255;$i+=17): ?>
            <td style="background-color:#0000<?= sprintf("%'.02X",$i)?>">
            </td>
        <?php endfor ?>
        </tr>
    </table>


</body>
</html>