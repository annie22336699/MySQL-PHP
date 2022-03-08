<?php
$db_host='localhost';
$db_name='mfee23';
$db_user='cloud';
$db_pw='123210';

$dsn="mysql:host={$db_host};dbname={$db_name};charset=utf8";
// $pdo=new PDO($dsn,$db_user,$db_pw);

// 以下除錯用

$db_options=[
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
];

try{
    $pdo=new PDO($dsn,$db_user,$db_pw,$db_options);
}catch(PDOException $lalala){
    echo '******* *******'. $lalala->getMessage();
}