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
    'success'=> 0,
    'error'=>[],
    'files'=>[],
];

if(!empty($_FILES['aaas']) and !empty($_FILES['aaas']['name'])){
    // 需要兩個都有拿到時才執行
    foreach($_FILES['aaas']['name'] as $i=>$name){

        $ext=$exts[$_FILES['aaas']['type'][$i]] ?? '';  // 拿到檔案的副檔名，若沒有則留空(例如上傳錯檔案導致錯誤)

        if(! empty($ext)){
            $filename=sha1($name. rand()).$ext;
            // 因為$_FILES['aaas']['name']已經以$name的值輸出了
    
            $target=$upload_floder.'/'.$filename;  // 設定放置的位置↓並放到那裏
            if(move_uploaded_file($_FILES['aaas']['tmp_name'][$i],$target)){
                $output['success'] ++;
                $output['files'][] = $filename;  // 將檔名push進去array內
            }else{
                // $output['error']='無法移動檔案';
            }
        }else{
            // $output['error']='檔案類型不合規定';
        }
    }
}else{
    $output['error']='請上傳檔案';
};


echo json_encode($output, JSON_UNESCAPED_UNICODE);