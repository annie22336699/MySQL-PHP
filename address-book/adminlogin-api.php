<?php 
require __DIR__.'/parts/01 connect_db-debug.php';
$output=[
    'success' => false,
    'code' => 0,
    'error' => '',
];

$account=$_POST['account'] ?? '';
$password=$_POST['password'] ?? '';

// 檢查欄位資料
if(empty($account) or empty($password)){
    $output['code']= 412;
    $output['error']='請輸入完整資料';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

$sql=sprintf("SELECT * FROM `admins` WHERE `account`=%s", $pdo->quote($account));

$row=$pdo->query($sql)->fetch();

if(empty($row)) {
    $output['code'] = 413;
    $output['error'] = '帳號或密碼錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if(password_verify($password,$row['password'])){
    $output['success']=true;
    $_SESSION['admin']=[
        'account'=>$row['account'],
        'nickname'=>$row['nickname'],
    ];
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);