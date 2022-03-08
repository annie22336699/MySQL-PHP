<?php

setcookie('測試寫在同一支內','設定一個cookie給網頁存');
echo $_COOKIE['測試寫在同一支內'];


// 第一次拜訪會帶cookie，但因為沒有吃到所以顯示錯誤