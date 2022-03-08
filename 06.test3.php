<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>測試3</title>
</head>
<body>
<?php    
$abc='ABC';

echo '<p>單引號中間不能有變數會直接輸出$ABC</p>';
echo "<p>但是雙引號中間變數會是可以使用的$abc</p>";
echo "<p>變數寫法2 {$abc}</p>";
echo "<p>變數寫法3 ${abc}</p>";  // 長得很像JS的寫法XD

?>
</body>
</html>