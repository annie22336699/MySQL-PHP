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
            <form method="post">
            <div class="mb-3">
                <label for="account" class="form-label">Account</label>
                <input type="text" class="form-control" id="account"  name="account">
            </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
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