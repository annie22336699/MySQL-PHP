<?php

setcookie('先不設定跟目錄跟網域', '咩咩的咩', time()+10, '/');
// setcookie('設定跟目錄跟網域', '咩咩的咩', 0, '/', '127.0.0.1');


echo $_COOKIE['先不設定跟目錄跟網域'];
// echo $_COOKIE['設定跟目錄跟網域'];

// cookie是可以跨頁面的