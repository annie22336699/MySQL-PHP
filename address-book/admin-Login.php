<?php
session_start();

?>

<?php include __DIR__ . '/parts/02 head.php' ?>
<div class="container">
    <?php include __DIR__ . '/parts/03 navbar.php' ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <form name="adminform" onsubmit="dologin(); return false;">
                        <div class="mb-3">
                            <label for="account" class="form-label">Account</label>
                            <input type="text" class="form-control" id="account" name="account">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <button button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/04 scripts.php' ?>
<script>
    function dologin() {
        const fd=new FormData(document.adminform);

        fetch('adminlogin-api.php',{
            method:'POST',
            body: fd,
        }).then(abc=>abc.json()).then(obj=>{
            console.log(obj);
            if(obj.success){
                location.href='list.php';
            }else{
                alert(obj.error);
            }
        });
    }

</script>
<?php include __DIR__ . '/parts/05 foot.php' ?>