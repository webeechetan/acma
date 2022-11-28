<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../aftermarket-channel/db.php');
require 'vendor/autoload.php';
$fileName = "aftermarket_channel_directory.xls";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;



$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$headers = ["name", "address", "city", "pincode", "state", "mobile", "company", "email", "service", "segment", "broad_product_category"];
$res = db("select name, address, city, pincode, state, mobile, company, email, service, segment, broad_product_category from after_market_channel_directory order by id desc");
while($row = mysqli_fetch_assoc($res)){
    $temp = explode('#', input_decode($row['broad_product_category']));
    $row['broad_product_category'] = implode(",", $temp);
    $data[] = $row;
}

for ($i = 0, $l = sizeof($headers); $i < $l; $i++) {
    $sheet->setCellValueByColumnAndRow($i + 1, 1, $headers[$i]);
}

for ($i = 0, $l = sizeof($data); $i < $l; $i++) { // row $i
    $j = 0;
    foreach ($data[$i] as $k => $v) { // column $j
        $sheet->setCellValueByColumnAndRow($j + 1, ($i + 1 + 1), $v);
        $j++;
    }
}

$writer = new Xls($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
$writer->save('php://output');




// $flag = false;
// $excelData;
// $res = db("select name, address, city, pincode, state, mobile, company, email, service, segment, broad_product_category from after_market_channel_directory order by id desc");
// while($row = mysqli_fetch_assoc($res)){
//     $temp = explode('#', input_decode($row['broad_product_category']));
//     $row['broad_product_category'] = implode(",", $temp);
//     if(!$flag){
//         $excelData = implode("\t", array_keys($row)) . "\n"; 
//         $flag = true; 
//     }

//     $excelData .= implode("\t", array_values($row)) . "\n"; 

// }
// header( 'Content-Type: text/html; charset=utf-8' ); 
// header("Content-Disposition: attachment; filename=\"$fileName\""); 
// header("Content-Type: application/vnd.xlsx");

// echo $excelData; 
?>