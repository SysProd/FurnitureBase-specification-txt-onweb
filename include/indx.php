
<?php
//error_reporting(0);
header('Content-Type: text/html; charset=cp1251');
require_once('../fpdf/mc_table.php');

$price = new PDF_MC_Table('L', 'mm', 'A4'); 			//	Настройки PDF страницы
$data 	= $price->LoadData("./../files/dd.txt");		//	Выборка данных с текстового файла
// var_dump($data['tb_bottom']); exit;
$price->Open();											//	Открытие документа
$price->AddFont('ArialMT','','arial.php'); 				//	Добавление нового шрифта
$price->AddFont('Arial-BoldMT','','arial_bold.php'); 	//	Добавление нового шрифта
$price->AddFont('Tahoma','','tahoma.php'); 				//	Добавление нового шрифта
$price->SetFont( 'Tahoma', '', 10 );					// 	Вывод шрифта
$price->AliasNbPages();									//	Сумма кол-во страниц в файле
$price->AddPage(); 										//	Добавляем страничку в документ
$price->ImprovedTable($data);							//	Обработка таблицы
$price->Output();										//	Выводим документ в браузер 
  
?>
