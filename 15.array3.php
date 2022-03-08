<pre>
<?php

// 索引式陣列
$ar1 = array('akd',25,9,true);
foreach($ar1 as $abc){
    echo "$abc \n";
}


// 關聯式陣列
$ar2 = array(
    555=>444,
    'name'=>'John',
    'age'=>'26'
);
$ar3 =[
    555=>444,
    'name'=>'John',
    'age'=>'26'
];


$ar2[]=2362;   // 鍵值直接抓取數字最大的開始往後++
$ar2[]=false;   // 這個顯示是空白
$ar2[]=true;
foreach($ar2 as $h333 => $cde){
    echo "$h333 => $cde \n";
}

?>
</pre>