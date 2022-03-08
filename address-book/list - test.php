<?php
// 作業：把分頁按鍵縮略到剩5個
require __DIR__ . '/parts/connect_db-debug.php';
$sqlcount = "SELECT COUNT(1) FROM address_book";   // 抓取資料庫數據筆數(陣列)
$totalrows = $pdo->query($sqlcount)->fetch(PDO::FETCH_NUM)[0];   // 計算筆數

$pagenation = 2;   // 設定幾筆數據一頁
$tatlepage = ceil($totalrows / $pagenation);

$page= isset($_GET['page']) ? intval($_GET['page']):1;   // 訪問網址時跳第一頁
if($page < 1){
    header('Location: list.php');
    exit;
}
// 若頁數點擊或者手動改到小於1時，跳到當前頁面


$sql = sprintf("SELECT * FROM address_book LIMIT %s,%s" , ($page-1)*$pagenation, $pagenation);
if($page > $tatlepage){
    header('Location: list.php?page='. $tatlepage);
    exit;
}
// 若頁數點擊或者手動改到大於最後頁數時，跳到最後頁

$rows = $pdo->query($sql)->fetchAll();
?>


<?php include __DIR__ . '/parts/head.php' ?>
<div class="container">
    <?php include __DIR__ . '/parts/navbar.php' ?>
    <div class="row">
        <div class="col">
            <!-- <?= "$totalrows,$tatlepage" ?> // 把筆數跟頁數先列出來看看，沒有實質用處 -->
            <table class="table table-hover table-striped">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $abc) : ?>
                        <tr>
                            <td><?= $abc['sid'] ?></td>
                            <td><?= $abc['name'] ?></td>
                            <td><?= $abc['email'] ?></td>
                            <td><?= $abc['mobile'] ?></td>
                            <td><?= $abc['birthday'] ?></td>
                            <td><?= $abc['address'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">

                    <li class="page-item <?= 1==$page ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page-1 ?>"><i class="fas fa-arrow-left"></i></a>
                    </li>


                    <?php for($i=1;$i<=$tatlepage;$i++): ; ?>
                    <li class="page-item <?= $i==$page ? 'active' : '' ?>"><a class="page-link" href="?page=<?=$i ?>"><?=$i ?></a></li>
                    <?php endfor; ?>


                    <li class="page-item <?= $tatlepage==$page ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page+1 ?>"><i class="fas fa-arrow-right"></i></a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/scripts.php' ?>
<?php include __DIR__ . '/parts/foot.php' ?>