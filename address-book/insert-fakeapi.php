<?php 
require __DIR__.'/parts/01 connect_db-debug.php';
$output=[
    'success' => false,     // 判斷有無成功
    'code' => 0,
    'error' => '',  // 如果有錯，則告知的錯誤訊息
];


$sql="INSERT INTO `address_book`( `name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES (?,?,?,?,?,NOW())";

// 關閉自動提交
$pdo->beginTransaction();

$stmt=$pdo->prepare($sql);

for($i=0;$i<10;$i++){
    $stmt->execute([
        '洛神'.$i,
        str_shuffle('abcdeFGHL289').'@aaa'.str_shuffle('1234').'.com',
        '09'. str_shuffle('12345678'),
        date("Y-m-d", rand(100000, 1640570263)),
        '台北市'.str_shuffle('1234').'號',
    ]);   // 發送假資料
}


// 直接點這隻api執行並回傳ok
$pdo->commit();
echo 'ok';