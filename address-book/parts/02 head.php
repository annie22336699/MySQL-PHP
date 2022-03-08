<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
        echo !empty($title) ? "$title - 練習網站" : '練習網站';
        // 設定網站名稱為 該分頁頁籤-練習網站，如果在首頁則叫做練習網站
        // 後續在每個分頁頭再設置title名稱
        ?>
    </title>
    <link rel="stylesheet" href="./../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./../fontawesome/css/all.css">
</head>
<body>