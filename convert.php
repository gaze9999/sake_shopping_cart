<?php
require_once('./vendor/autoload.php');
require_once('./db.inc.php');

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// $spreadsheet = new Spreadsheet();
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');
// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx');
// $cellValue = $spreadsheet->getActiveSheet()->getCell('A1')->getValue();
// echo $cellValue;


$inputFileName = './sakeItems.xlsx';
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

// echo "<pre>";
// print_r($inputFileName);
// echo $inputFileName;
// echo "</pre>";
// exit;

$highestRow = $spreadsheet->getActiveSheet()->getHighestRow();
// $sheetRegions = $spreadsheet->getSheet(0);
// $sheetPrefectures = $spreadsheet->getSheet(1);
// $sheetBreweries = $spreadsheet->getSheet(2);
// $sheetItems = $spreadsheet->getSheet(0);
// $sheetItems = $spreadsheet->getSheet(0);
// $sheetRice = $spreadsheet->getSheet(2);
//$sheetVar = $spreadsheet->getSheet(0);
// $sheetVar = $spreadsheet->getSheet(1);
$sheetVar = $spreadsheet->getSheet(2);
// $sheetVar = $spreadsheet->getSheet(3);

// echo "Sheet Count: ".$spreadsheet->getSheetCount().
// "<br>";

// for($i = 2; $i <= $highestRow; $i++) {
//     //若是某欄位值為空，代表那一列可能都沒資料，便跳出迴圈
//     if( $sheetRegions->getCell('A'.$i)->getValue() === '' || $sheetRegions->getCell('A'.$i)->getValue() === null ) break;

//     echo "rId: ".$sheetRegions->getCell('A'.$i)->getValue()." / ".
//     "regionName: ".$sheetRegions->getCell('B'.$i)->getValue().
//     "<br>";
//     }

// echo "<hr>";

// for($i = 2; $i <= $highestRow; $i++) {
//     //若是某欄位值為空，代表那一列可能都沒資料，便跳出迴圈
//     if( $sheetPrefectures->getCell('A'.$i)->getValue() === '' || $sheetPrefectures->getCell('A'.$i)->getValue() === null ) break;

//     // echo "pId: ".$sheetPrefectures->getCell('A'.$i)->getValue()." / ".
//     echo "prefName: ".$sheetPrefectures->getCell('B'.$i)->getValue()." / ".
//     "rId: ".$sheetPrefectures->getCell('C'.$i)->getValue().
//     "<br>";
//     }

// echo "<hr>";

// for($i = 2; $i <= $highestRow; $i++) {
//     //若是某欄位值為空，代表那一列可能都沒資料，便跳出迴圈
//     if( $sheetBreweries->getCell('A'.$i)->getValue() === '' || $sheetBreweries->getCell('A'.$i)->getValue() === null ) break;

//     // echo "bId: ".$sheetBreweries->getCell('A'.$i)->getValue()." / ".
//     echo "breName: ".$sheetBreweries->getCell('B'.$i)->getValue()." / ".
//     "rId: ".$sheetBreweries->getCell('c'.$i)->getValue()." / ".
//     "pId: ".$sheetBreweries->getCell('d'.$i)->getValue().
//     "<br>";
//     }
//

//====================sake_items=======================
// $varSql = "INSERT INTO `sake_items` (`regId`, `preId`, `breId`, `itemName`, `vId`, `aminosando`,
//                                     `sando`, `seimaibuai`, `nihonshudo`, `alcohol`, `capacity`,
//                                     `price`, `riceId`, `description`, `howTo`, `nearby`)
//            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// for($i = 2; $i <= $highestRow; $i++) {
//     if( $sheetVar->getCell('A'.$i)->getValue() === '' || $sheetVar->getCell('A'.$i)->getValue() === null ) break;

//     $varParam = [
//         $sheetVar->getCell('B'.$i)->getValue(),
//         $sheetVar->getCell('C'.$i)->getValue(),
//         $sheetVar->getCell('D'.$i)->getValue(),
//         $sheetVar->getCell('E'.$i)->getValue(),
//         $sheetVar->getCell('F'.$i)->getValue(),
//         $sheetVar->getCell('G'.$i)->getValue(),
//         $sheetVar->getCell('H'.$i)->getValue(),
//         $sheetVar->getCell('I'.$i)->getValue(),
//         $sheetVar->getCell('J'.$i)->getValue(),
//         $sheetVar->getCell('K'.$i)->getValue(),
//         $sheetVar->getCell('L'.$i)->getValue(),
//         $sheetVar->getCell('M'.$i)->getValue(),
//         $sheetVar->getCell('N'.$i)->getValue(),
//         $sheetVar->getCell('O'.$i)->getValue(),
//         $sheetVar->getCell('P'.$i)->getValue(),
//         $sheetVar->getCell('Q'.$i)->getValue(),
//     ];
        
//     $stmtVar = $pdo->prepare($varSql);

//     // echo "<pre>";
//     // print_r($stmtVar);
//     // echo "</pre>";
//     // exit;
    
//     $stmtVar->execute($varParam);
// }

//====================sake_varieties=======================
//  $varSql = "INSERT INTO `sake_varieties` (`varieties`, `vCatag`)
//             VALUES (?, ?)";

//  for($i = 2; $i <= $highestRow; $i++) {
//      if( $sheetVar->getCell('A'.$i)->getValue() === '' || $sheetVar->getCell('A'.$i)->getValue() === null ) break;

//      $varParam = [
//          $sheetVar->getCell('B'.$i)->getValue(),
//          $sheetVar->getCell('C'.$i)->getValue(),
//      ];
        
//      $stmtVar = $pdo->prepare($varSql);

//      // echo "<pre>";
//      // print_r($stmtVar);
//      // echo "</pre>";
//      // exit;
    
//      $stmtVar->execute($varParam);
//  }

//====================sake_rice=======================
// $varSql = "INSERT INTO `sake_rice` (`riceName`)
//             VALUES (?)";

// for($i = 2; $i <= $highestRow; $i++) {
// if( $sheetVar->getCell('A'.$i)->getValue() === '' || $sheetVar->getCell('A'.$i)->getValue() === null ) break;

// $varParam = [
// $sheetVar->getCell('B'.$i)->getValue(),
// ];

// $stmtVar = $pdo->prepare($varSql);

// // echo "<pre>";
// // print_r($stmtVar);
// // echo "</pre>";
// // exit;

// $stmtVar->execute($varParam);
// }

//====================sake_breweries=======================
// $varSql = "INSERT INTO `sake_breweries` (`breName`, `regId`, `prefId`, `breWeb`, `bAddress`, `bDescription`)
//             VALUES (?, ?, ?, ?, ?, ?)";

// for($i = 2; $i <= $highestRow; $i++) {
// if( $sheetVar->getCell('A'.$i)->getValue() === '' || $sheetVar->getCell('A'.$i)->getValue() === null ) break;

// $varParam = [
// $sheetVar->getCell('B'.$i)->getValue(),
// $sheetVar->getCell('C'.$i)->getValue(),
// $sheetVar->getCell('D'.$i)->getValue(),
// $sheetVar->getCell('E'.$i)->getValue(),
// $sheetVar->getCell('F'.$i)->getValue(),
// $sheetVar->getCell('G'.$i)->getValue(),
// ];

// $stmtVar = $pdo->prepare($varSql);

// // echo "<pre>";
// // print_r($stmtVar);
// // echo "</pre>";
// // exit;

// $stmtVar->execute($varParam);
// }