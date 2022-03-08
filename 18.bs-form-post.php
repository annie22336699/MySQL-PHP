<?php require './17.head.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
            <form method="post" action="18.bs-form_post.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <!-- 若type為e-mail會自動判讀是否為mail格式，但測試麻煩先改成text -->
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="ob1" value="RRRRRR">
                    <label label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button button type="submit" class="btn btn-primary">Submit</button>
            </form>
  </div>
</div>
        </div>
    </div>
</div>
<?php include ('17.scripts.php'); ?>
<?php require __DIR__. '/17.foot.php'; ?>