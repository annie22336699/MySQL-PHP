<?php 
session_start();
$users=[
    'Cloud'=>[
        'nickname'=>'可可',
        'pw'=>'123210',
    ],
    'John'=>[
        'nickname'=>'乙一',
        'pw'=>'12345677',
    ],
    'Elie'=>[
        'nickname'=>'妮妮',
        'pw'=>'1111',
    ],
];

$badLogin = false;

if(isset($_POST['account']) and isset($_POST['password'])){
    $badLogin = true;
    if(isset($users[$_POST['account']])){
        $item=$users[$_POST['account']];
        if($item['pw']==$_POST['password']){
            $_SESSION['user_ar']=[
                'account'=>$_POST['account'],
                'nickname'=>$item['nickname'],
            ];
            $badLogin = false;
        }
    }
}

?>
<?php require './17.head.php'; ?>
<!-- 做出輸出錯誤後跳回原頁面但值保留的功能 -->
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                <?php if(isset($_SESSION['user_ar'])): ?>
                    <h5 class="card-title">Welcome, <?= ($_SESSION['user_ar']['nickname']) ?>.</h5>
                    <h6>Have a nice day.</h6>
                    <a href="./31.bs-form-post-Logout.php"><button button type="submit" class="btn btn-primary">Logout</button></a>
                    <?php else: ?>
            <h5 class="card-title">Login</h5>
            <?php if($badLogin): ?>
                <div class="alert alert-danger" role="alert">
                    帳號或密碼錯誤
                </div>
            <?php endif; ?>
            <form method="post">
            <div class="mb-3">
                <label for="account" class="form-label">Account</label>
                <input type="text" class="form-control" id="account"  name="account" value="<?= isset($_POST['account']) ? htmlentities($_POST['account']) : '' ?>">
                <!-- 添加一個值，判斷如果有輸入，則輸入原先輸出的值。
                但因為如果一開始沒有填寫資料進去會出現提示空值錯誤，所以用三元運算子強制顯示空白。
                怕原先輸入的文字有特殊字元存留，所以用了htmlentities做跳脫 -->
            </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?= isset($_POST['password']) ? htmlentities($_POST['password']) : '' ?>">
                <!-- 同上 -->
                </div>
                <button button type="submit" class="btn btn-primary">Login</button>
            </form>
            <?php endif ?>
  </div>
</div>
        </div>
    </div>
</div>
<?php include ('17.scripts.php'); ?>
<?php require __DIR__. '/17.foot.php'; ?>