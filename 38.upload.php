<?php

header('Content-Type: application/json');  // php預設的擋頭為html擋頭，因此會預設查看到文字檔

echo json_encode($_FILES);  // 一定要加這個才能上傳檔案