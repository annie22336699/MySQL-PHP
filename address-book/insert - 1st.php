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
                            <input type="text" class="form-control" id="name" name="name" required>
                            <!-- required欄位必填 -->
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">email <small>*</small></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile <small>*</small></label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required pattern="09\d{2}-?\d{3}-?\d{3}">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">address</label>
                            <!-- <input type="text" class="form-control" id="address" name="address"> -->
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
    function sendData() {
        const fd = new FormData(document.forminsert);
        //  https://developer.mozilla.org/zh-TW/docs/Web/API/FormData
    
        fetch('./insert-api.php',{
            method:'POST', // 需要告知這個東西是用甚麼傳送，預設值好像是get
            body: fd,  // FormData會自行處理表頭那些的
        }).then(rt=>rt.json())
        .then(obj=>{
            console.log(obj);
        });
    }


</script>
<?php include __DIR__.'/parts/05 foot.php' ?>