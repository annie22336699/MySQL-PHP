<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>get</title>
</head>
<body>


<?php
$age = isset($_GET['age']) ? intval($_GET['age']) : 0;
if($age>=18){
?>
<p>Hello</p>

<?php
} else {
?>
<p>nono</p>

<?php
}
// 網頁後.php後+'?age=222'查看
// PHP可截斷分開寫ㄉ
?>
</body>
</html>