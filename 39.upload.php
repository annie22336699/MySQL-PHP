<?php

header('Content-Type: application/json');

$upload_floder= __DIR__. './uploaded';  // 設置檔案要上傳到的資料夾

$exts=[
    'image/jpeg'=>'.jpg',
    'image/png'=>'.png',
    'image/gif'=>'.gif',
];
// 設定判定讀取的副檔名類型

$output=[
    'success'=> false,
    'error'=>'',
];
// 預設個參數成功為fales且錯誤訊息是空值

if(!empty($_FILES['myfile'])){
    // ↑myfile是38.upload.php內的name名稱，需相同
    // 若上傳檔案非空=若有上傳檔案?
    $ext=$exts[$_FILES['myfile']['type']];  // 拿到檔案的副檔名

    if(! empty($ext)){
        $filename=sha1($_FILES['myfile']['name']. rand()).$ext;
        // 把檔名重新編碼+亂數後重新取名(不然上傳同名可能會造成檔案覆蓋)

        $target=$upload_floder.'/'.$filename;
        // 等於整個檔案名稱接起來
        if(move_uploaded_file($_FILES['myfile']['tmp_name'],$target)){
            $output['success']=true;
            $output['filename'] = $filename;
        }else{
            $output['error']='無法移動檔案';
        }
    }else{
        $output['error']='檔案類型不合規定';
    }
}else{
    $output['error']='請上傳檔案';
};


echo json_encode($output, JSON_UNESCAPED_UNICODE);