<?php

require __DIR__.'./vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !')->setCellValue('B2', '我就測試!');
$sheet->setCellValue('A2', 'Hola 你好');

$writer = new Xlsx($spreadsheet);
//  $writer->save('./../img/我測試測試.xlsx');   // 丟到上一層的img資料夾內
$writer->save('./我測試測試.xlsx');
// echo '啟動';