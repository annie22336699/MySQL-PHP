<pre>
<?php
$abc=[
    'name'=>'拉拉',
    'age'=>23,
    '地址'=>'我只是想知道key484可以放中文'
];

echo json_encode($abc);
echo '<br>';
echo json_encode($abc, JSON_UNESCAPED_UNICODE);  // 編碼不要轉成unicode
echo '<br>';
echo json_encode($abc, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);  // 追加斜線不要轉




?>
</pre>
