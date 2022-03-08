<?php 
require __DIR__.'/parts/01 connect_db-debug.php';
$title = '修改資料列表';

if(! isset($_GET['sid'])){
    // 檢查環節：如果沒有↑該sid值，則↓跳回去原列表離開執行api
    header('Location: list.php');
    exit;
};
$sid=intval($_GET['sid']);
$row=$pdo->query("SELECT * FROM `address_book` WHERE sid=$sid")->fetch();
// 以query方式找該sid，找到後取得一列結果回傳
if(empty($row)){
    // 檢查回傳的sid內容若為空則跳回去原列表並離開執行api
    header('Location: list.php');
    exit;
};

?>

<?php include __DIR__.'/parts/02 head.php' ?>
<style>
    small{
        color:red;
    }
    .form-text{
        color: red;
    }
</style>

<div class="container">
    <?php include __DIR__.'/parts/03 navbar.php' ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">修改資料</h5>
                    <p>有<small>*</small>的欄位為必填</p>
                    <form name="forminsert" onsubmit="sendData(); return false;">
                    <input type="hidden" name="sid" value="<?= $row['sid'] ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">name <small>*</small></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= htmlentities($row['name']) ?>">
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">email <small>*</small></label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= htmlentities($row['email']) ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile <small>*</small></label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?= htmlentities($row['mobile']) ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="<?= htmlentities($row['birthday']) ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">address</label>
                            <textarea class="form-control" id="address" name="address" cols="30" rows="3"><?= $row['address'] ?></textarea>
                            <div class="form-text"></div>
                        </div>
                        <!-- 加value是為了將原先設定的值塞回去方便修改，並做htmlentities跳脫字元，不要因為特殊字元後面直接消失，但address因為是塞在text area的關係，所以不用跳脫 -->
                        <button type="submit" class="btn btn-primary">修改</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__.'/parts/04 scripts.php' ?>
<script>
    const name=document.querySelector('#name');
    const email=document.querySelector('#email');
    const mobile=document.querySelector('#mobile');

    // 判斷規則
    const email_role = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_role = /^09\d{2}-?\d{3}-?\d{3}$/;

    function sendData() {
        name.nextElementSibling.innerHTML='';
        email.nextElementSibling.innerHTML='';
        mobile.nextElementSibling.innerHTML='';

        let isPass=true;
        
        if(name.value.length<2){
            isPass=false;
            name.nextElementSibling.innerHTML='請輸入正確的姓名';
        }
        if(!email_role.test(email.value)){
            isPass=false;
            email.nextElementSibling.innerHTML='請輸入正確的E-mail';
        }
        if(!mobile_role.test(mobile.value)){
            isPass=false;
            mobile.nextElementSibling.innerHTML='請輸入正確的手機號碼';
        }

        if(isPass){
            const fd = new FormData(document.forminsert);
    
            fetch('./edit-api.php',{
                method:'POST',
                body: fd,
            }).then(rt=>rt.json())
            .then(obj=>{
                console.log(obj);
                if(obj.success){
                    location.href='list.php'
                    alert('修改成功');
                }else{
                    alert(obj.error||'你輸入錯惹QQ');
                }
            });
        }
    }


</script>
<?php include __DIR__.'/parts/05 foot.php' ?>