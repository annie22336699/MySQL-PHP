<?php 
require __DIR__.'/parts/01 connect_db-debug.php';
$output=[
    'success' => false,     // 判斷有無成功
    'code' => 0,
    'error' => '',  // 如果有錯，則告知的錯誤訊息
];

$name=$_POST['name'] ?? '';   // 如果沒有就空字串
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


$sql="INSERT INTO `address_book`( `name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES (?,?,?,?,?,NOW())";


$stmt=$pdo->prepare($sql);  // 先準備，到這邊還沒發送
$stmt->execute([
    $name,
    $email,
    $mobile,
    $_POST['birthday']??'',   // 不做空值他會死亡
    $_POST['address']??'',  // 不做空值他會死亡
]);   // 發送

// ↑ 可保留空值的狀況也可打成： empty($_POST['birthday']) ? NULL : $_POST['birthday'],
// 三元運算子，留空值或者輸入值，然後資料庫的部分需要勾選NULL，不然無法空值(與空字串不相同)

$output['success'] = $stmt->rowCount()==1;
$output['rowCount']=$stmt->rowCount();

echo json_encode($output, JSON_UNESCAPED_UNICODE);