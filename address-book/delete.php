<?php 
require __DIR__.'/parts/01 connect_db-debug.php';

if(isset($_GET['sid'])){
    $sid=intval($_GET['sid']);  // 回傳整數
    $pdo->query("DELETE FROM `address_book` WHERE sid=$sid");  // 以query語法刪除資料
};

$come_from=$_SERVER['HTTP_REFERER']??'list.php';  // 設定一個變數讓刪除後跳回原頁數
header("Location: $come_from");  // 執行

// 僅有刪除功能