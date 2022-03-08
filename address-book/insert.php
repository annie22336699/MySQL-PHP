<?php 
require __DIR__.'/parts/01 connect_db-debug.php';
$title = '新增資料列表';
$pageName = 'insert';
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
                    <h5 class="card-title">新增資料</h5>
                    <p>有<small>*</small>的欄位為必填</p>
<!--  `name`, `email`, `mobile`, `birthday`, `address` -->
                    <form name="forminsert" onsubmit="sendData(); return false;">  <!-- 拿到資料先不要傳，等待呼叫 -->
                        <div class="mb-3">
                            <label for="name" class="form-label">name <small>*</small></label>
                            <input type="text" class="form-control" id="name" name="name" >
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">email <small>*</small></label>
                            <input type="text" class="form-control" id="email" name="email" >
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile <small>*</small></label>
                            <input type="text" class="form-control" id="mobile" name="mobile" >
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">address</label>
                            <textarea class="form-control" id="address" name="address" cols="30" rows="3"></textarea>
                            <div class="form-text"></div>
                        </div>

                        <button type="submit" class="btn btn-primary">新增</button>

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
        // nextElementSibling 為選取該class或id的下一個物件(?

        // 以下檢查表單資料：邏輯是讓他預設是通過的，當不通過時則欄位錯誤
        let isPass=true;
        
        if(name.value.length<2){
            isPass=false;
            name.nextElementSibling.innerHTML='請輸入正確的姓名';
        }
        if(!email_role.test(email.value)){
            // email.value && !email_role.test(email.value)
            // ↑原先老師寫法：當有填寫，且「不」符合規定則↓(出錯)，但因有下required所以直接拔掉前面
            isPass=false;
            email.nextElementSibling.innerHTML='請輸入正確的E-mail';
        }
        if(!mobile_role.test(mobile.value)){
            // 同上
            isPass=false;
            mobile.nextElementSibling.innerHTML='請輸入正確的手機號碼';
        }

        if(isPass){
            // 以下將值輸出
            const fd = new FormData(document.forminsert);
            //  https://developer.mozilla.org/zh-TW/docs/Web/API/FormData
    
            fetch('./insert-api.php',{
                method:'POST', // 需要告知這個東西是用甚麼傳送，預設值好像是get
                body: fd,  // FormData會自行處理表頭那些的
            }).then(rt=>rt.json())
            .then(obj=>{
                console.log(obj);
                if(obj.success){
                    alert('新增成功');
                    location.href='list.php'
                }else{
                    alert(obj.error||'你輸入錯惹QQ');
                }
            });
        }
    }


</script>
<?php include __DIR__.'/parts/05 foot.php' ?>