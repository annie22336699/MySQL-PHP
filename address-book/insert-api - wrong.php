<?php 
require __DIR__.'/parts/01 connect_db-debug.php';
$output=[
    'success' => false,     // 判斷有無成功
    'code' => 0,
    'error' => '',  // 如果有錯，則告知的錯誤訊息
];

// 錯誤的做法
$sql=sprintf("INSERT INTO `address_book`( `name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES ('%s','%s','%s','%s','%s',NOW() )",
$_POST['name'],
$_POST['email'],
$_POST['mobile'],
$_POST['birthday'],
$_POST['address'],
);

$stmt=$pdo->query($sql);

$output['rowCount']=$stmt->rowCount();


// echo json_encode($_POST);
echo json_encode($output);