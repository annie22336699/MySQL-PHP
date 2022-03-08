<pre>
<?php


// 關聯式陣列
$ar1 = array(
    555=>444,
    'name'=>'John',
    'age'=>'26'
);
$ar2 =[
    555=>444,
    'name'=>'John',
    'age'=>'26'
];

print_r($ar1);

$ar2[]=2362;   // push值進去
$ar2[]=false;   // push值進去，這種用法無法一次push一個以上的值進去
// 原因是因為前面的[]相當於空白鍵值=右方值，所以只能推一個進去
var_dump($ar2);

?>
</pre>