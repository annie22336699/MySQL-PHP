<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>測試</title>
</head>
<body>
    
<div>
<?php

echo '<div><h1>';
echo 123;
echo '</h1></div>';

echo '<br>';
echo 123+456;
echo '<br>';
echo 555;
echo 666;
echo '5955'. '<br>';

echo __DIR__. '<br>';  // 本資料的資料夾
echo __FILE__. '<br>';  // 本資料文件檔
echo __LINE__. '<br>';   // 這一行數目


define('MY_CONST', 345);
echo MY_CONST;

?>
</div>

</body>
</html>