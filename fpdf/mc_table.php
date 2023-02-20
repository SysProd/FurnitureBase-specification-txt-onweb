<?php
require('fpdf.php');

class PDF_MC_Table extends FPDF
{
	
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data,$position,$color)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		//$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : $position[$i];
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		$this->Rect($x,$y,$w,$h,$color[$i]);
		//Print the text
		$this->MultiCell($w,4,$data[$i],0,$a,$color[$i]);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

function Header() {
	
	global $data;
	
	$order 			= trim($data['tb_hat']['order']);			// Заказ
	$product		= trim($data['tb_hat']['product']);			// Изделие
	$type_of_work 	= trim($data['tb_hat']['type_of_work']);	// Вид работы
	$head 			= trim($data['tb_hat']['head']);			// Руководитель проекта
	
	// настройки шапки таблицы
	$w1 = array(20,40,6,7,26,26,26,10,28,28,28,28,20); 
    $w  = array(20,40,6,7,13,13,13,13,13,13,10,28,28,28,28,20,4); 
	$header1 = array("Поз","Наименование","АТР","Кол","Заготовка","Деталь без обл.","Готовая деталь","Паз","Облицовка[L1]","Облицовка[L2]","Облицовка[W1]","Облицовка[W2]","Примечание"); 
	$header2 = array("","","","","Дл. [L]","Шир. [W]","Длина","Ширина","Длина","Ширина","","","","","",""); 
	$SetLine='0.7';	
	
	$this->SetLineWidth(0);							// Ширина линии
	//$this->SetXY(5,5);
	$this->SetFillColor(209,204,244);				// Цвет фона
	$this->SetFont('Arial-BoldMT','',8);			// Шрифт
	$this->Image('./../img/logo.png',130,1,85);		// Логотип
	// Положение и вывод  'Руководитель Проекта'
	$this->Ln(-9);	$this->Cell(-3);	$this-> SetFont('Arial-BoldMT','',7); 	$this->MultiCell(20,2,'Руководитель Проекта'); 	$this->Ln(-5.3);	$this->Cell(15);	$this-> SetFont('Arial-BoldMT','',11); 	$this->Cell(35,5,$head ,0,1,'L',0);
	// Положение и вывод  'Заказ'
	$this->Ln(0);	$this->Cell(-12);	$this-> SetFont('Arial-BoldMT','',7); 	$this->Cell(30,5,'ЗАКАЗ: ',0,1,'C',0);			$this->Ln(-5.4);	$this->Cell(12);	$this-> SetFont('Arial-BoldMT','',11); 	$this->Cell(50,5,$order,0,1,'L',0);
	// Положение и вывод  'Изделие'
	$this->Ln(0);	$this->Cell(-8);	$this-> SetFont('Arial-BoldMT','',7); 	$this->Cell(25,5,'ИЗДЕЛИЕ: ',0,1,'C',0);		$this->Ln(-5.4);	$this->Cell(11);	$this-> SetFont('Arial-BoldMT','',11); 	$this->Cell(45,5,$product,0,1,'L',0);
	// Положение и вывод 'Спецификация'
	$this->SetXY(257,3);	$this-> SetFont('Arial-BoldMT','',7);	$this->Cell(38,6,'СПЕЦИФИКАЦИЯ','0','0','L',1);	$this->SetXY(254,10);								$this-> SetFont('Arial-BoldMT','',12);	$this->Cell(3,5,substr_replace($type_of_work, '', strrpos($type_of_work, ',')),0,1,'C',0);
	// Положение и вывод линии под шапокой листа
	$this->Ln(1);	$this->Cell(0,0,'',1,1,'LRBT',1); 	$this->Ln(4);	$this-> SetFont('Arial-BoldMT','',7);

/*
	*
	*	Вывод шапки таблицы на каждой новой страницы 
	*
*/	
		if($this->PageNo()!='' && $col==0){
	 
	$this->Ln();
	$this->Cell(-8);
	$this-> SetFont('Arial-BoldMT','',7.5); 
		    //Выводим заголовки столбцов 
			
    for($i=0;$i<count($header1);$i++){
		
		if($i==4 or $i==5 or $i==6){	$this->SetLineWidth($SetLine);	$this->Cell(-26);    $this->Cell($w1[$i],5,'','R',0,'L',0); 	}
	
		$this->SetLineWidth(0);    $this->Cell($w1[$i],5,$header1[$i],'LRBT',0,'C',0); 
	
									}
    $this->Ln();    $this->Cell(-8);
	
	for($r=0;$r<count($header2);$r++) {
		
		if($r==4 or $r==6 or $r==8){	$this->SetLineWidth($SetLine);	$this->Cell(-13);    $this->Cell($w[$r],5,'','R',0,'L',0); 				}
				
		$this->SetLineWidth(0);	$this->Cell($w[$r],5,$header2[$r],'LRBT','C',0);
										}
	$this->Ln();	 $this->SetX(2);
				}
											}
				
				
function Footer() {
	
	global $data;
	$designer 		= trim($data['tb_hat']['designer']);		// Конструктор
	$to_date 		= date("d.m.Y H:i:s");
	
    $this->SetFont('Arial-BoldMT','',8);
	 
    //Позиционирование в  1.5 см от нижней границы 
    $this->SetY(-15); 
    //TimesNewRomanPSMT italic 8 
    $this->SetFont('Arial-BoldMT','',8); 
			//рисуем линию
			
	$this->Line(10,195,288,195);
    //Номер страницы
    $this->Cell(0,10,'Страница '.$this->PageNo().'/{nb}',0,0,'C');
	$this->SetXY(270,-15);    
	$this->Cell(1,10,'Конструктор: '.$designer,0,0,'C');
	$this->Ln();
	$this->SetXY(270,-10);    
	$this->Cell(1,10,'Дата: '.$to_date,0,0,'C');
	
				}
				
function LoadData($file) {
		
		$lines	= file($file);	// Получаем данные в массив строк 
		$data	= array(); 		// Создание массива
		$r		= array(); 		// Создание массива
		$m		= '';			// Номер строки на которой закончился массив
   
   
    // разбиение строки на массив
	$lnk			= explode("\t", iconv('utf-8', 'cp1251',$lines[0]));
	$product		= iconv('utf-8', 'cp1251',trim($lines[1]));
	
    $data['tb_hat']=array(
    'order'					=> $lnk[0], 	// Заказ
	'product'				=> $product, 	// Изделие
	'type_of_work'			=> $lnk[1], 	// Вид работы
	'head'					=> $lnk[3], 	// Руководитель проекта
	'designer'				=> $lnk[2]	 	// Конструктор
					);
					
									foreach($lines as $id => $line) {
										
		$ln			= explode("\t", iconv('utf-8', 'cp1251',$line));
					
		if(trim($ln[0])=='№' && trim($ln[1])=='Облицовка' && trim($ln[2])=='Расшифровка' && trim($ln[3])=='Кол-во в М.'){ $m = $id+1; break; }
		
		if(count($ln) == 1 && $id >= 2 && trim($ln[0]) != ''){
					$data['tb_body'][$id]=array(
					'material'					=> $ln[0]	// Материал
									);									
														}
		if(count($ln)>2 && $id >=2 && $ln[3] == 'Чистовые'){
			
			$data['tb_body'][$id]=array(
			
			'position'					=> $ln[0], 	// Позиция
			'name'						=> $ln[1],	// Найменование
			'number'					=> $ln[2],	// Кол-во
			'blank_lgth_L'				=> $ln[3],	// Длина [L]	- Заготовка
			'blank_width_W'				=> $ln[5],	// Ширина [W]	- Заготовка
			'without_facing_lgth_L'		=> $ln[6],	// Длина [L]	- Деталь без Облицовок
			'without_facing_width_W'	=> $ln[7],	// Ширина [W]	- Деталь без Облицовок
			'ready_lgth_L'				=> $ln[8],	// Длина [L]	- Готовая деталь
			'ready_width_W'				=> $ln[9],	// Ширина [W]	- Готовая деталь
			'slot'						=> $ln[10],	// Паз
			'facing_L1'					=> $ln[11],	// Облицовка [L1]
			'facing_L2'					=> $ln[12],	// Облицовка [L2]
			'facing_W1'					=> $ln[13],	// Облицовка [W1]
			'facing_W2'					=> $ln[14],	// Облицовка [W2]
			'note'						=> $ln[15]	// Примечание
			
						);

		}									
		if(count($ln)>2 && $id >=2 && $ln[3] != 'Чистовые'){
			
			if( trim($ln[0])==0 && trim($ln[1])==0 && trim($ln[2])==0 && trim($ln[3])==0 && trim($ln[4])==0 && trim($ln[5])==0 && trim($ln[6])==0 && trim($ln[7])==0 && trim($ln[8])==0 && trim($ln[9])==0 && (trim($ln[10])!='' || trim($ln[11])!='' || trim($ln[12])!='' || trim($ln[13])!='' ) ){
				
				$i = ($id-1);
				$r[$i]['facing_L1'][10] = trim($ln[10]);					
				$r[$i]['facing_L2'][11] = trim($ln[11]);	
				$r[$i]['facing_W1'][12] = trim($ln[12]);	
				$r[$i]['facing_W2'][13] = trim($ln[13]);	
				
			}else{
			
			
			$data['tb_body'][$id]=array(
			
			'position'					=> $ln[0], 	// Позиция
			'name'						=> $ln[1],	// Найменование
			'number'					=> $ln[2],	// Кол-во
			'blank_lgth_L'				=> $ln[3],	// Длина [L]	- Заготовка
			'blank_width_W'				=> $ln[4],	// Ширина [W]	- Заготовка
			'without_facing_lgth_L'		=> $ln[5],	// Длина [L]	- Деталь без Облицовок
			'without_facing_width_W'	=> $ln[6],	// Ширина [W]	- Деталь без Облицовок
			'ready_lgth_L'				=> $ln[7],	// Длина [L]	- Готовая деталь
			'ready_width_W'				=> $ln[8],	// Ширина [W]	- Готовая деталь
			'slot'						=> $ln[9],	// Паз
			'facing_L1'					=> $ln[10],	// Облицовка [L1]
			'facing_L2'					=> $ln[11],	// Облицовка [L2]
			'facing_W1'					=> $ln[12],	// Облицовка [W1]
			'facing_W2'					=> $ln[13],	// Облицовка [W2]
			'note'						=> $ln[14]	// Примечание
			
			);
					
					}
									}
											}						
/*
	*
	*	Проверка, есть ли двойная облицовка в названии и добавить ее в нужную позицию
	*
*/					
					if(is_array($r)){
								
								foreach($r as $i => $ln) {
								
								if($ln['facing_L1'][10] != '0') {	$data['tb_body'][$i]['facing_L1'] = $data['tb_body'][$i]['facing_L1'].'//'.$ln['facing_L1'][10];	}
								if($ln['facing_L2'][11] != '0') {	$data['tb_body'][$i]['facing_L2'] = $data['tb_body'][$i]['facing_L2'].'//'.$ln['facing_L2'][11];	}
								if($ln['facing_W1'][12] != '0') {	$data['tb_body'][$i]['facing_W1'] = $data['tb_body'][$i]['facing_W1'].'//'.$ln['facing_W1'][12];	}
								if($ln['facing_W2'][13] != '0') {	$data['tb_body'][$i]['facing_W2'] = $data['tb_body'][$i]['facing_W2'].'//'.$ln['facing_W2'][13];	}
									
								}
								
								}
if($m!=''){									
						for($i=$m;$i<count($lines);$i++)
{
	$ln			= explode("\t", iconv('utf-8', 'cp1251',$lines[$i]));
	if(	$ln[2] == '0'	)	{	$ln[2] = '';	}		// Проверка чтоб в расшифровке небыло 0
	
	$data['tb_bottom'][$i]	= array(
	'lng_number'					=> $ln[0], 	// №
	'lng_lining'					=> $ln[1], 	// Облицовка
	'lng_transcript'				=> $ln[2], 	// Расшифровка
	'lng_amount'					=> $ln[3] 	// Кол-во в метрах
									);
	
}		}							return $data; 				}

function show_tpr($array,$hat)
{

	
}

function ImprovedTable($data) {

	$tx				= array('Техический процесс (Примечание):','0-Чистовой раскрой','1-Раскрой черновой','2-ЧПУ','3-Кромка','4-Сборка','5-Кромка ручн.','6-Запил','7-Склейка','8-Присадка ручн.','9-Облицовка','10-Окраска','11-Металлоучасток','Сокращения после номера детали:','ч-чистовая деталь','к-деталь облицованная кожей','п-деталь облицованная пластиком','т-деталь облицованная тканью','ш-деталь облицованная шпоном','ф-фрезеровка(заготовка которую после ЧПУ необходимо распилить на две и более частей)');

/*
	*
	*	Тело таблицы
	*
*/					
			foreach ( $data['tb_body'] as $id => $val ) {
				
			if(isset($val['material']))
										{
											
					$this->SetFont		( 'Arial-BoldMT', '', 10 );
					$this->SetFillColor	( 209,204,244 );
					$this->SetWidths	(	array( 260 )	);
					$material = trim($val['material']);
					$this->Ln	( 1 );
					$this->Cell	( 280, 5, 	$material, 'LRBT', '0', 'L', 1 );
					$this->Ln	( 5 );		$this->Cell( -8 );
					
										}
										
					$this->SetFont( 'Tahoma', '', 8 );
			if(isset($val['position']))
			{
				
//	Позиции столбцов на странице
					$this->SetWidths(	array(	20,40,6,7,13,13,13,13,13,13,10,28,28,28,28,20	)	);
/*
	*
	*	Обработка "slot"-Паз массива
	*
*/
						if($val['slot']=='0')		{	$val['slot'] = '';		}
						if(preg_match("/паз/i", trim($val['slot'])))		{	$val['slot'] = 'Паз.';		}
						if(preg_match("/четв/i", trim($val['slot'])))		{	$val['slot'] = 'Чтв.';		}
						if(preg_match("/выбор/i", trim($val['slot'])))		{	$val['slot'] = 'Вбр.';		}
						if( !preg_match("/паз/i", trim($val['slot'])) && !preg_match("/четв/i", trim($val['slot'])) && !preg_match("/выбор/i", trim($val['slot'])))		{	$val['slot'] = substr($val['slot'],0,5);		}
/*
	*
	*	Обработка "Облицовок" массива
	*
*/			
						if($val['facing_L1']=='0')	{	$val['facing_L1'] = '';	}
						if($val['facing_L2']=='0')	{	$val['facing_L2'] = '';	}
						if($val['facing_W1']=='0')	{	$val['facing_W1'] = '';	}
						if($val['facing_W2']=='0')	{	$val['facing_W2'] = '';	}
/*
	*	
	*	Рисуем строку с данными "Заготовка"
	*
*/
					if(preg_match("/Заготовка/i", trim($val['name'])))
						{
					$this->Row(	array(	$val['position'],$val['name'],' ',$val['number'],$val['blank_lgth_L'],$val['blank_width_W'],$val['without_facing_lgth_L'],$val['without_facing_width_W'],'','',$val['slot'],$val['facing_L1'],$val['facing_L2'],$val['facing_W1'],$val['facing_W2'],$val['note']),array(	'L','C','L','L','L','L','L','L','L','L','L','L','L','L','L','L'	), array(	true,true,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type ));
					$this->SetX(2);
						}
/*
	*	
	*	Рисуем строку с данными "Из Заготовки"
	*
*/
						if(preg_match("/Из Заготовки:/i", trim($val['blank_lgth_L'])))
						{
					$this->SetWidths(	array(20,40,6,7,26,13,13,13,13,10,28,28,28,28,20)	);
					$this->Row(	array(	$val['position'],$val['name'],' ',$val['number'],$val['blank_lgth_L'],$val['without_facing_lgth_L'],$val['without_facing_width_W'],$val['ready_lgth_L'],$val['ready_width_W'],$val['slot'],$val['facing_L1'],$val['facing_L2'],$val['facing_W1'],$val['facing_W2'],$val['note']),array(	'L','L','L','L','C','L','L','L','L','L','L','L','L','L','L','L'	), array(	$type,$type,$type,$type,true,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type )	);
					$this->SetX(2);	
						}
/*
	*	
	*	Рисуем строку с данными "Чистовые"
	*
*/
						if(preg_match("/Чистовые/i", trim($val['blank_lgth_L'])))
						{
					$this->SetWidths(	array(20,40,6,7,26,13,13,13,13,10,28,28,28,28,20)	);
					$this->Row(	array(	$val['position'],$val['name'],' ',$val['number'],$val['blank_lgth_L'],$val['without_facing_lgth_L'],$val['without_facing_width_W'],$val['ready_lgth_L'],$val['ready_width_W'],$val['slot'],$val['facing_L1'],$val['facing_L2'],$val['facing_W1'],$val['facing_W2'],$val['note']),array(	'L','L','L','L','C','L','L','L','L','L','L','L','L','L','L','L'	), array(	$type,$type,$type,$type,true,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type )	);
					$this->SetX(2);	
						}
/*
	*	
	*	Рисуем Остальные строки таблицы
	*
*/
						if(!preg_match("/Чистовые/i", trim($val['blank_lgth_L'])) && !preg_match("/Из Заготовки:/i", trim($val['blank_lgth_L'])) && !preg_match("/Заготовка/i", trim($val['name'])))
						{
					$this->Row(	array(	$val['position'],$val['name'],' ',$val['number'],$val['blank_lgth_L'],$val['blank_width_W'],$val['without_facing_lgth_L'],$val['without_facing_width_W'],$val['ready_lgth_L'],$val['ready_width_W'],$val['slot'],$val['facing_L1'],$val['facing_L2'],$val['facing_W1'],$val['facing_W2'],$val['note']),array(	'L','L','L','L','L','L','L','L','L','L','L','L','L','L','L','L'	), array(	$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type ));
					$this->SetX(2);
						}
			}
							}
/*
	*	
	*	Рисуем строки с облицовками и расшифровками буквеных обозначений
	*
*/
						if(is_array($data['tb_bottom']))
						{
/*
	*	
	*	Начало параметров расшифровки
	*
*/		
		$this->Ln( 1 );
		$this->SetWidths	( 	array(50) );
		$c_f=8;
						  foreach ($tx as $ii => $vl)
    {
				switch(true){
					
// Шапка "Технический процесс" 
		case  $ii == 0			:	if($this->GetY()>144){	$col=1;	$this->AddPage();}		$this->SetFont	( 'Arial-BoldMT', '', 10 );		$this->Ln(1);	$this->Cell(-5);	$this->Cell(120,5,$vl,'0','0','C',1);	break;
// 0-Чистовой Раскрой до 3-Кромка
		case  $ii>0 && $ii<5	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(-3);	$this->Cell(5,4,$vl,'0','0','L');		break;
// 4-Сборка
		case  $ii==5			:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(-12);		$this->Cell(45); 	$this->Cell(5,4,$vl,'0','0','L');		break;
// 5-Кромка ручн. до 7-Склейка		
		case  $ii>5 && $ii<9	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(45); 	$this->Cell(5,4,$vl,'0','0','L');		break;
// 8-Присадка ручн.	
		case  $ii==9			:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(-12);		$this->Cell(80);	$this->Cell(5,4,$vl,'0','0','L');		break;
// 9-Облицовка до 11-Металлоучасток	
		case  $ii>9 && $ii<13	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(80);	$this->Cell(5,4,$vl,'0','0','L');		break;
//	Шапка "сокращение после номера детали"
		case  $ii==13			:	$this->SetFont	( 'Arial-BoldMT', '', 10 );	$this->Ln(5);		$this->Cell(-5); 	$this->Cell(120,5,$vl,'0','0','C',1);	break;
//	ч-чистовая деталь до п-деталь облицованная пластиком
		case  $ii>13 && $ii<17	: 	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(-5);	$this->Cell(5,4,$vl,'0','0','L');		break;
//	ш-деталь облицованная шпоном до т-деталь облицованная тканью
		case  $ii>16 && $ii<19	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(-4);		$this->Cell(50);	$this->Write(4,chop($vl),'0','0','L');	break;
//	ф-фрезеровка(заготовка которую после ЧПУ необходимо распилить на две и более частей)
		case  $ii==19			:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(8.4);		$this->Cell(50);	$this->MultiCell(57,3,chop($vl));		break;	
							
							}
	}
							
/*
	*	
	*	Начало параметров облицовки
	*
*/
					$this->SetFont		( 'Arial-BoldMT', '', 9 );
					$this->SetFillColor	( 209,204,244 );
					
			 $this->Ln( -44 );	 $this->Cell( 144 );	
			 $this->Cell		(	6,		10,	'№',			'LRBT','0','L',1 );	//№
			 $this->Cell		(	40,		10,	'Облицовка',	'LRBT','0','C',1 );	//Облицовка
			 $this->Cell		(	80,		10,	'Расшифровка',	'LRBT','0','C',1 );	//Расшифровка
			 $this->MultiCell	(	15,		5,	'Кол-во (метр)','LRBT','C',1	 );	//Кол-во в Метрах
			 $this->SetWidths	(	array(6,40,80,15)	);
			
					  foreach ($data['tb_bottom'] as $id => $val) 
		{
		$this->Cell( 144 );
		$this->SetFont	( 'Arial-BoldMT', '', 8 );
		$this->Row		(	array($val['lng_number'],$val['lng_lining'],$val['lng_transcript'],$val['lng_amount']), array('L','C','L','C'), array(false,false,false,false) );
		}			 		/*--->>>	### Конец ###	<<<---*/
						}else{

/*
	*	
	*	Начало параметров расшифровки без облицовки
	*
*/		
		$this->Ln( 1 );
		$this->SetWidths	( 	array(50) );
		$c_f=8;
						  foreach ($tx as $ii => $vl)
    {
				switch(true){
					
// Шапка "Технический процесс" 
		case  $ii == 0			:	if($this->GetY()>164){	$col=1;	$this->AddPage();}		$this->SetFont	( 'Arial-BoldMT', '', 10 );		$this->Ln(1);	$this->Cell(-5);	$this->Cell(120,5,$vl,'0','0','C',1);	break;
// 0-Чистовой Раскрой до 3-Кромка
		case  $ii>0 && $ii<5	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(-3);	$this->Cell(5,4,$vl,'0','0','L');		break;
// 4-Сборка
		case  $ii==5			:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(-12);		$this->Cell(45); 	$this->Cell(5,4,$vl,'0','0','L');		break;
// 5-Кромка ручн. до 7-Склейка		
		case  $ii>5 && $ii<9	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(45); 	$this->Cell(5,4,$vl,'0','0','L');		break;
// 8-Присадка ручн.	
		case  $ii==9			:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(-12);		$this->Cell(80);	$this->Cell(5,4,$vl,'0','0','L');		break;
// 9-Облицовка до 11-Металлоучасток	
		case  $ii>9 && $ii<13	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(80);	$this->Cell(5,4,$vl,'0','0','L');		break;
//	Шапка "сокращение после номера детали"
		case  $ii==13			:	$this->SetFont	( 'Arial-BoldMT', '', 10 );	$this->Ln(-17);		$this->Cell(162); 	$this->Cell(120,5,$vl,'0','0','C',1);	break;
//	ч-чистовая деталь до п-деталь облицованная пластиком
		case  $ii>13 && $ii<17	: 	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(165);	$this->Cell(5,4,$vl,'0','0','L');		break;
//	ш-деталь облицованная шпоном до т-деталь облицованная тканью
		case  $ii>16 && $ii<19	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(-4);		$this->Cell(225);	$this->Write(4,chop($vl),'0','0','L');	break;
//	ф-фрезеровка(заготовка которую после ЧПУ необходимо распилить на две и более частей)
		case  $ii==19			:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(8.4);		$this->Cell(225);	$this->MultiCell(57,3,chop($vl));		break;	
							
							}
	}	
							
						}
																		}

}
?>
