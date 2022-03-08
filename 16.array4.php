<pre>
<?php

// 關聯式陣列
$ar = [
    555=>444,
    'name'=>'John',
    'age'=>26,
];

$ar2 = $ar;  // 相當於深層複製
print_r($ar);
print_r($ar2);

$ar3=$ar;
$ar['name']='Ray';
print_r($ar);  // 在下面更改後重印才會變更
print_r($ar3);

$ar4=&$ar;  // 設定位置，相當於參照
print_r($ar4);

?>
</pre>