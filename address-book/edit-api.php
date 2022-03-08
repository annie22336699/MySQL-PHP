<?php 
require __DIR__.'/parts/01 connect_db-debug.php';
$output=[
    'success' => false,
    'code' => 0,
    'error' => '',
];

// 先行檢查sid資料做確認，確認sid有值，若沒有則掛0，接著判斷空值的狀況跳出錯誤(0與false及''都為empty)
$sid=isset($_POST['sid'])?intval($_POST['sid']):0;
if(empty($sid)){
    $output['code']= 400;
    $output['error']='沒有該sid';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};



$name=$_POST['name'] ?? '';
$email=$_POST['email'] ?? '';
$mobile=$_POST['mobile'] ?? '';

// 檢查欄位資料
    if(empty($name)){
        $output['code']= 401;
        $output['error']='請輸入正確的姓名';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    };
    if(empty($email) or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $output['code'] = 405;
        $output['error'] = '請輸入正確的email';
        echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
    }
    if(empty($mobile) or !preg_match("/^09\d{2}-?\d{3}-?\d{3}$/", $mobile)) {
        $output['code'] = 407;
        $output['error'] = '請輸入正確的手機號碼';
        echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
    }


$sql="UPDATE `address_book` SET
        `name`=?,
        `email`=?,
        `mobile`=?,
        `birthday`=?,
        `address`=?
    WHERE `sid`=?";


$stmt=$pdo->prepare($sql);

$stmt->execute([
    $name,
    $email,
    $mobile,
    $_POST['birthday']??'',
    $_POST['address']??'',
    $sid,
]);

if($stmt->rowCount()==0){
    $output['error'] ='您的資料未修改';
    header('Location: list.php?page='. $tatlepage);
}else{
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);