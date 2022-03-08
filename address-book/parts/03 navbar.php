<style>
  .navbar-light .navbar-nav .nav-link.active {
    color: white;
    background-color: #aaa;
    border-radius: 5px;
    
  };

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="./index_.php">表單</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link  <?= $pageName=='list' ? 'active disabled' : '' ?>" aria-current="page" href="./list.php">列表</a>
                <!-- <?= $pageName=='list' ? 'active disabled' : '' ?> 這串是當設定的pageName為頁籤內的名稱時，則套用三元運算子，是的時候就不可以點，否則空字串 -->
              </li>
              <li class="nav-item">
                <a class="nav-link  <?= $pageName=='insert' ? 'active disabled' : '' ?>" aria-current="page" href="./insert.php">新增資料</a>
              </li>
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">
              <?php if(isset($_SESSION['admin'])): ?>
                  <li class="nav-item">
                  <a class="nav-link"><?= $_SESSION['admin']['nickname'].'，歡迎' ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./admin-Logout.php">登出</a>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="./admin-Login.php">登入</a>
              <?php endif; ?>

              </li>
            </ul>
          </div>
        </div>
      </nav>