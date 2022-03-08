<?php
require __DIR__.'./32.connect_db-debug.php';  // 叫資料庫
$sql="SELECT * FROM address_book";      // 定義哪個資料表
$stmt = $pdo->query($sql);              // 定義一個代理，透過代理拿到物件
$row=$stmt->fetch();                    // 一筆筆將資料拿出來
echo json_encode($row);
// echo json_encode($row, JSON_UNESCAPED_UNICODE);