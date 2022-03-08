<?php
require __DIR__ . '/parts/01 connect_db-debug.php';
$sqlcount = "SELECT COUNT(1) FROM address_book";   // 抓取資料庫數據筆數(陣列)
$totalrows = $pdo->query($sqlcount)->fetch(PDO::FETCH_NUM)[0];   // 計算筆數

$pagenation = 5;   // 設定幾筆數據一頁
$tatlepage = ceil($totalrows / $pagenation);

$page= isset($_GET['page']) ? intval($_GET['page']):1;   // 訪問網址時跳第一頁
if($page < 1){
    header('Location: list.php');
    exit;
}
// 若頁數點擊或者手動改到小於1時，跳到list頁面


$sql = sprintf("SELECT * FROM address_book LIMIT %s,%s" , ($page-1)*$pagenation, $pagenation);
if($page > $tatlepage){
    header('Location: list.php?page='. $tatlepage);
    exit;
}
// 若頁數點擊或者手動改到大於最後頁數時，跳到最後頁

$rows = $pdo->query($sql)->fetchAll();
?>


<?php include __DIR__ . '/parts/02 head.php' ?>
<div class="container">
    <?php include __DIR__ . '/parts/03 navbar.php' ?>
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
                        <!-- <?= 1==$page ? 'disabled' : '' ?> 為當到第一頁時顯示不作用 -->
                        <!-- href="?page=<?= $page+1 ?>" 為當點擊左頁時當前頁-1(相當於跳到前一頁) -->
                    </li>

                    
                    <?php for($i=1;$i<=$tatlepage;$i++): ; ?>
                    <li class="page-item <?= $i==$page ? 'active' : '' ?>"><a class="page-link" href="?page=<?=$i ?>"><?=$i ?></a></li>
                    <?php endfor; ?>
                        <!-- <?= $i==$page ? 'active' : '' ?> 為，當i等於當前頁數，則高亮(套用BS自己的css...) -->
                        <!-- href="?page=<?=$i ?>"><?=$i ?> 這個a標籤內的連結為當跳轉到當前頁數i時則顯示i -->


                    <li class="page-item <?= $tatlepage==$page ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page+1 ?>"><i class="fas fa-arrow-right"></i></a>
                        <!-- <?= $tatlepage==$page ? 'disabled' : '' ?> 為當到最底頁時顯示不作用 -->
                        <!-- href="?page=<?= $page+1 ?>" 為當點右頁時當前頁+1(等於跳到下一頁) -->
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/04 scripts.php' ?>
<?php include __DIR__ . '/parts/05 foot.php' ?>