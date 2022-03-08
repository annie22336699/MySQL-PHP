<?php
$db_host='localhost';
$db_name='mfee23';
$db_user='cloud';
$db_pw='123210';

$dsn="mysql:host={$db_host};dbname={$db_name};charset=utf8";
$pdo=new PDO($dsn,$db_user,$db_pw);

// 抓取資料庫登入，頁面開啟啥都沒有，起碼沒有打錯QQ