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
	
	$order 			= trim($data['tb_hat']['order']);			// �����
	$product		= trim($data['tb_hat']['product']);			// �������
	$type_of_work 	= trim($data['tb_hat']['type_of_work']);	// ��� ������
	$head 			= trim($data['tb_hat']['head']);			// ������������ �������
	
	// ��������� ����� �������
	$w1 = array(20,40,6,7,26,26,26,10,28,28,28,28,20); 
    $w  = array(20,40,6,7,13,13,13,13,13,13,10,28,28,28,28,20,4); 
	$header1 = array("���","������������","���","���","���������","������ ��� ���.","������� ������","���","���������[L1]","���������[L2]","���������[W1]","���������[W2]","����������"); 
	$header2 = array("","","","","��. [L]","���. [W]","�����","������","�����","������","","","","","",""); 
	$SetLine='0.7';	
	
	$this->SetLineWidth(0);							// ������ �����
	//$this->SetXY(5,5);
	$this->SetFillColor(209,204,244);				// ���� ����
	$this->SetFont('Arial-BoldMT','',8);			// �����
	$this->Image('./../img/logo.png',130,1,85);		// �������
	// ��������� � �����  '������������ �������'
	$this->Ln(-9);	$this->Cell(-3);	$this-> SetFont('Arial-BoldMT','',7); 	$this->MultiCell(20,2,'������������ �������'); 	$this->Ln(-5.3);	$this->Cell(15);	$this-> SetFont('Arial-BoldMT','',11); 	$this->Cell(35,5,$head ,0,1,'L',0);
	// ��������� � �����  '�����'
	$this->Ln(0);	$this->Cell(-12);	$this-> SetFont('Arial-BoldMT','',7); 	$this->Cell(30,5,'�����: ',0,1,'C',0);			$this->Ln(-5.4);	$this->Cell(12);	$this-> SetFont('Arial-BoldMT','',11); 	$this->Cell(50,5,$order,0,1,'L',0);
	// ��������� � �����  '�������'
	$this->Ln(0);	$this->Cell(-8);	$this-> SetFont('Arial-BoldMT','',7); 	$this->Cell(25,5,'�������: ',0,1,'C',0);		$this->Ln(-5.4);	$this->Cell(11);	$this-> SetFont('Arial-BoldMT','',11); 	$this->Cell(45,5,$product,0,1,'L',0);
	// ��������� � ����� '������������'
	$this->SetXY(257,3);	$this-> SetFont('Arial-BoldMT','',7);	$this->Cell(38,6,'������������','0','0','L',1);	$this->SetXY(254,10);								$this-> SetFont('Arial-BoldMT','',12);	$this->Cell(3,5,substr_replace($type_of_work, '', strrpos($type_of_work, ',')),0,1,'C',0);
	// ��������� � ����� ����� ��� ������� �����
	$this->Ln(1);	$this->Cell(0,0,'',1,1,'LRBT',1); 	$this->Ln(4);	$this-> SetFont('Arial-BoldMT','',7);

/*
	*
	*	����� ����� ������� �� ������ ����� �������� 
	*
*/	
		if($this->PageNo()!='' && $col==0){
	 
	$this->Ln();
	$this->Cell(-8);
	$this-> SetFont('Arial-BoldMT','',7.5); 
		    //������� ��������� �������� 
			
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
	$designer 		= trim($data['tb_hat']['designer']);		// �����������
	$to_date 		= date("d.m.Y H:i:s");
	
    $this->SetFont('Arial-BoldMT','',8);
	 
    //���������������� �  1.5 �� �� ������ ������� 
    $this->SetY(-15); 
    //TimesNewRomanPSMT italic 8 
    $this->SetFont('Arial-BoldMT','',8); 
			//������ �����
			
	$this->Line(10,195,288,195);
    //����� ��������
    $this->Cell(0,10,'�������� '.$this->PageNo().'/{nb}',0,0,'C');
	$this->SetXY(270,-15);    
	$this->Cell(1,10,'�����������: '.$designer,0,0,'C');
	$this->Ln();
	$this->SetXY(270,-10);    
	$this->Cell(1,10,'����: '.$to_date,0,0,'C');
	
				}
				
function LoadData($file) {
		
		$lines	= file($file);	// �������� ������ � ������ ����� 
		$data	= array(); 		// �������� �������
		$r		= array(); 		// �������� �������
		$m		= '';			// ����� ������ �� ������� ���������� ������
   
   
    // ��������� ������ �� ������
	$lnk			= explode("\t", iconv('utf-8', 'cp1251',$lines[0]));
	$product		= iconv('utf-8', 'cp1251',trim($lines[1]));
	
    $data['tb_hat']=array(
    'order'					=> $lnk[0], 	// �����
	'product'				=> $product, 	// �������
	'type_of_work'			=> $lnk[1], 	// ��� ������
	'head'					=> $lnk[3], 	// ������������ �������
	'designer'				=> $lnk[2]	 	// �����������
					);
					
									foreach($lines as $id => $line) {
										
		$ln			= explode("\t", iconv('utf-8', 'cp1251',$line));
					
		if(trim($ln[0])=='�' && trim($ln[1])=='���������' && trim($ln[2])=='�����������' && trim($ln[3])=='���-�� � �.'){ $m = $id+1; break; }
		
		if(count($ln) == 1 && $id >= 2 && trim($ln[0]) != ''){
					$data['tb_body'][$id]=array(
					'material'					=> $ln[0]	// ��������
									);									
														}
		if(count($ln)>2 && $id >=2 && $ln[3] == '��������'){
			
			$data['tb_body'][$id]=array(
			
			'position'					=> $ln[0], 	// �������
			'name'						=> $ln[1],	// ������������
			'number'					=> $ln[2],	// ���-��
			'blank_lgth_L'				=> $ln[3],	// ����� [L]	- ���������
			'blank_width_W'				=> $ln[5],	// ������ [W]	- ���������
			'without_facing_lgth_L'		=> $ln[6],	// ����� [L]	- ������ ��� ���������
			'without_facing_width_W'	=> $ln[7],	// ������ [W]	- ������ ��� ���������
			'ready_lgth_L'				=> $ln[8],	// ����� [L]	- ������� ������
			'ready_width_W'				=> $ln[9],	// ������ [W]	- ������� ������
			'slot'						=> $ln[10],	// ���
			'facing_L1'					=> $ln[11],	// ��������� [L1]
			'facing_L2'					=> $ln[12],	// ��������� [L2]
			'facing_W1'					=> $ln[13],	// ��������� [W1]
			'facing_W2'					=> $ln[14],	// ��������� [W2]
			'note'						=> $ln[15]	// ����������
			
						);

		}									
		if(count($ln)>2 && $id >=2 && $ln[3] != '��������'){
			
			if( trim($ln[0])==0 && trim($ln[1])==0 && trim($ln[2])==0 && trim($ln[3])==0 && trim($ln[4])==0 && trim($ln[5])==0 && trim($ln[6])==0 && trim($ln[7])==0 && trim($ln[8])==0 && trim($ln[9])==0 && (trim($ln[10])!='' || trim($ln[11])!='' || trim($ln[12])!='' || trim($ln[13])!='' ) ){
				
				$i = ($id-1);
				$r[$i]['facing_L1'][10] = trim($ln[10]);					
				$r[$i]['facing_L2'][11] = trim($ln[11]);	
				$r[$i]['facing_W1'][12] = trim($ln[12]);	
				$r[$i]['facing_W2'][13] = trim($ln[13]);	
				
			}else{
			
			
			$data['tb_body'][$id]=array(
			
			'position'					=> $ln[0], 	// �������
			'name'						=> $ln[1],	// ������������
			'number'					=> $ln[2],	// ���-��
			'blank_lgth_L'				=> $ln[3],	// ����� [L]	- ���������
			'blank_width_W'				=> $ln[4],	// ������ [W]	- ���������
			'without_facing_lgth_L'		=> $ln[5],	// ����� [L]	- ������ ��� ���������
			'without_facing_width_W'	=> $ln[6],	// ������ [W]	- ������ ��� ���������
			'ready_lgth_L'				=> $ln[7],	// ����� [L]	- ������� ������
			'ready_width_W'				=> $ln[8],	// ������ [W]	- ������� ������
			'slot'						=> $ln[9],	// ���
			'facing_L1'					=> $ln[10],	// ��������� [L1]
			'facing_L2'					=> $ln[11],	// ��������� [L2]
			'facing_W1'					=> $ln[12],	// ��������� [W1]
			'facing_W2'					=> $ln[13],	// ��������� [W2]
			'note'						=> $ln[14]	// ����������
			
			);
					
					}
									}
											}						
/*
	*
	*	��������, ���� �� ������� ��������� � �������� � �������� �� � ������ �������
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
	if(	$ln[2] == '0'	)	{	$ln[2] = '';	}		// �������� ���� � ����������� ������ 0
	
	$data['tb_bottom'][$i]	= array(
	'lng_number'					=> $ln[0], 	// �
	'lng_lining'					=> $ln[1], 	// ���������
	'lng_transcript'				=> $ln[2], 	// �����������
	'lng_amount'					=> $ln[3] 	// ���-�� � ������
									);
	
}		}							return $data; 				}

function show_tpr($array,$hat)
{

	
}

function ImprovedTable($data) {

	$tx				= array('���������� ������� (����������):','0-�������� �������','1-������� ��������','2-���','3-������','4-������','5-������ ����.','6-�����','7-�������','8-�������� ����.','9-���������','10-�������','11-��������������','���������� ����� ������ ������:','�-�������� ������','�-������ ������������ �����','�-������ ������������ ���������','�-������ ������������ ������','�-������ ������������ ������','�-����������(��������� ������� ����� ��� ���������� ��������� �� ��� � ����� ������)');

/*
	*
	*	���� �������
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
				
//	������� �������� �� ��������
					$this->SetWidths(	array(	20,40,6,7,13,13,13,13,13,13,10,28,28,28,28,20	)	);
/*
	*
	*	��������� "slot"-��� �������
	*
*/
						if($val['slot']=='0')		{	$val['slot'] = '';		}
						if(preg_match("/���/i", trim($val['slot'])))		{	$val['slot'] = '���.';		}
						if(preg_match("/����/i", trim($val['slot'])))		{	$val['slot'] = '���.';		}
						if(preg_match("/�����/i", trim($val['slot'])))		{	$val['slot'] = '���.';		}
						if( !preg_match("/���/i", trim($val['slot'])) && !preg_match("/����/i", trim($val['slot'])) && !preg_match("/�����/i", trim($val['slot'])))		{	$val['slot'] = substr($val['slot'],0,5);		}
/*
	*
	*	��������� "���������" �������
	*
*/			
						if($val['facing_L1']=='0')	{	$val['facing_L1'] = '';	}
						if($val['facing_L2']=='0')	{	$val['facing_L2'] = '';	}
						if($val['facing_W1']=='0')	{	$val['facing_W1'] = '';	}
						if($val['facing_W2']=='0')	{	$val['facing_W2'] = '';	}
/*
	*	
	*	������ ������ � ������� "���������"
	*
*/
					if(preg_match("/���������/i", trim($val['name'])))
						{
					$this->Row(	array(	$val['position'],$val['name'],' ',$val['number'],$val['blank_lgth_L'],$val['blank_width_W'],$val['without_facing_lgth_L'],$val['without_facing_width_W'],'','',$val['slot'],$val['facing_L1'],$val['facing_L2'],$val['facing_W1'],$val['facing_W2'],$val['note']),array(	'L','C','L','L','L','L','L','L','L','L','L','L','L','L','L','L'	), array(	true,true,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type ));
					$this->SetX(2);
						}
/*
	*	
	*	������ ������ � ������� "�� ���������"
	*
*/
						if(preg_match("/�� ���������:/i", trim($val['blank_lgth_L'])))
						{
					$this->SetWidths(	array(20,40,6,7,26,13,13,13,13,10,28,28,28,28,20)	);
					$this->Row(	array(	$val['position'],$val['name'],' ',$val['number'],$val['blank_lgth_L'],$val['without_facing_lgth_L'],$val['without_facing_width_W'],$val['ready_lgth_L'],$val['ready_width_W'],$val['slot'],$val['facing_L1'],$val['facing_L2'],$val['facing_W1'],$val['facing_W2'],$val['note']),array(	'L','L','L','L','C','L','L','L','L','L','L','L','L','L','L','L'	), array(	$type,$type,$type,$type,true,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type )	);
					$this->SetX(2);	
						}
/*
	*	
	*	������ ������ � ������� "��������"
	*
*/
						if(preg_match("/��������/i", trim($val['blank_lgth_L'])))
						{
					$this->SetWidths(	array(20,40,6,7,26,13,13,13,13,10,28,28,28,28,20)	);
					$this->Row(	array(	$val['position'],$val['name'],' ',$val['number'],$val['blank_lgth_L'],$val['without_facing_lgth_L'],$val['without_facing_width_W'],$val['ready_lgth_L'],$val['ready_width_W'],$val['slot'],$val['facing_L1'],$val['facing_L2'],$val['facing_W1'],$val['facing_W2'],$val['note']),array(	'L','L','L','L','C','L','L','L','L','L','L','L','L','L','L','L'	), array(	$type,$type,$type,$type,true,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type )	);
					$this->SetX(2);	
						}
/*
	*	
	*	������ ��������� ������ �������
	*
*/
						if(!preg_match("/��������/i", trim($val['blank_lgth_L'])) && !preg_match("/�� ���������:/i", trim($val['blank_lgth_L'])) && !preg_match("/���������/i", trim($val['name'])))
						{
					$this->Row(	array(	$val['position'],$val['name'],' ',$val['number'],$val['blank_lgth_L'],$val['blank_width_W'],$val['without_facing_lgth_L'],$val['without_facing_width_W'],$val['ready_lgth_L'],$val['ready_width_W'],$val['slot'],$val['facing_L1'],$val['facing_L2'],$val['facing_W1'],$val['facing_W2'],$val['note']),array(	'L','L','L','L','L','L','L','L','L','L','L','L','L','L','L','L'	), array(	$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type,$type ));
					$this->SetX(2);
						}
			}
							}
/*
	*	
	*	������ ������ � ����������� � ������������� �������� �����������
	*
*/
						if(is_array($data['tb_bottom']))
						{
/*
	*	
	*	������ ���������� �����������
	*
*/		
		$this->Ln( 1 );
		$this->SetWidths	( 	array(50) );
		$c_f=8;
						  foreach ($tx as $ii => $vl)
    {
				switch(true){
					
// ����� "����������� �������" 
		case  $ii == 0			:	if($this->GetY()>144){	$col=1;	$this->AddPage();}		$this->SetFont	( 'Arial-BoldMT', '', 10 );		$this->Ln(1);	$this->Cell(-5);	$this->Cell(120,5,$vl,'0','0','C',1);	break;
// 0-�������� ������� �� 3-������
		case  $ii>0 && $ii<5	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(-3);	$this->Cell(5,4,$vl,'0','0','L');		break;
// 4-������
		case  $ii==5			:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(-12);		$this->Cell(45); 	$this->Cell(5,4,$vl,'0','0','L');		break;
// 5-������ ����. �� 7-�������		
		case  $ii>5 && $ii<9	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(45); 	$this->Cell(5,4,$vl,'0','0','L');		break;
// 8-�������� ����.	
		case  $ii==9			:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(-12);		$this->Cell(80);	$this->Cell(5,4,$vl,'0','0','L');		break;
// 9-��������� �� 11-��������������	
		case  $ii>9 && $ii<13	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(80);	$this->Cell(5,4,$vl,'0','0','L');		break;
//	����� "���������� ����� ������ ������"
		case  $ii==13			:	$this->SetFont	( 'Arial-BoldMT', '', 10 );	$this->Ln(5);		$this->Cell(-5); 	$this->Cell(120,5,$vl,'0','0','C',1);	break;
//	�-�������� ������ �� �-������ ������������ ���������
		case  $ii>13 && $ii<17	: 	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(-5);	$this->Cell(5,4,$vl,'0','0','L');		break;
//	�-������ ������������ ������ �� �-������ ������������ ������
		case  $ii>16 && $ii<19	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(-4);		$this->Cell(50);	$this->Write(4,chop($vl),'0','0','L');	break;
//	�-����������(��������� ������� ����� ��� ���������� ��������� �� ��� � ����� ������)
		case  $ii==19			:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(8.4);		$this->Cell(50);	$this->MultiCell(57,3,chop($vl));		break;	
							
							}
	}
							
/*
	*	
	*	������ ���������� ���������
	*
*/
					$this->SetFont		( 'Arial-BoldMT', '', 9 );
					$this->SetFillColor	( 209,204,244 );
					
			 $this->Ln( -44 );	 $this->Cell( 144 );	
			 $this->Cell		(	6,		10,	'�',			'LRBT','0','L',1 );	//�
			 $this->Cell		(	40,		10,	'���������',	'LRBT','0','C',1 );	//���������
			 $this->Cell		(	80,		10,	'�����������',	'LRBT','0','C',1 );	//�����������
			 $this->MultiCell	(	15,		5,	'���-�� (����)','LRBT','C',1	 );	//���-�� � ������
			 $this->SetWidths	(	array(6,40,80,15)	);
			
					  foreach ($data['tb_bottom'] as $id => $val) 
		{
		$this->Cell( 144 );
		$this->SetFont	( 'Arial-BoldMT', '', 8 );
		$this->Row		(	array($val['lng_number'],$val['lng_lining'],$val['lng_transcript'],$val['lng_amount']), array('L','C','L','C'), array(false,false,false,false) );
		}			 		/*--->>>	### ����� ###	<<<---*/
						}else{

/*
	*	
	*	������ ���������� ����������� ��� ���������
	*
*/		
		$this->Ln( 1 );
		$this->SetWidths	( 	array(50) );
		$c_f=8;
						  foreach ($tx as $ii => $vl)
    {
				switch(true){
					
// ����� "����������� �������" 
		case  $ii == 0			:	if($this->GetY()>164){	$col=1;	$this->AddPage();}		$this->SetFont	( 'Arial-BoldMT', '', 10 );		$this->Ln(1);	$this->Cell(-5);	$this->Cell(120,5,$vl,'0','0','C',1);	break;
// 0-�������� ������� �� 3-������
		case  $ii>0 && $ii<5	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(-3);	$this->Cell(5,4,$vl,'0','0','L');		break;
// 4-������
		case  $ii==5			:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(-12);		$this->Cell(45); 	$this->Cell(5,4,$vl,'0','0','L');		break;
// 5-������ ����. �� 7-�������		
		case  $ii>5 && $ii<9	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(45); 	$this->Cell(5,4,$vl,'0','0','L');		break;
// 8-�������� ����.	
		case  $ii==9			:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(-12);		$this->Cell(80);	$this->Cell(5,4,$vl,'0','0','L');		break;
// 9-��������� �� 11-��������������	
		case  $ii>9 && $ii<13	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(80);	$this->Cell(5,4,$vl,'0','0','L');		break;
//	����� "���������� ����� ������ ������"
		case  $ii==13			:	$this->SetFont	( 'Arial-BoldMT', '', 10 );	$this->Ln(-17);		$this->Cell(162); 	$this->Cell(120,5,$vl,'0','0','C',1);	break;
//	�-�������� ������ �� �-������ ������������ ���������
		case  $ii>13 && $ii<17	: 	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln();		$this->Cell(165);	$this->Cell(5,4,$vl,'0','0','L');		break;
//	�-������ ������������ ������ �� �-������ ������������ ������
		case  $ii>16 && $ii<19	:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(-4);		$this->Cell(225);	$this->Write(4,chop($vl),'0','0','L');	break;
//	�-����������(��������� ������� ����� ��� ���������� ��������� �� ��� � ����� ������)
		case  $ii==19			:	$this->SetFont( 'Tahoma', '', $c_f );		$this->Ln(8.4);		$this->Cell(225);	$this->MultiCell(57,3,chop($vl));		break;	
							
							}
	}	
							
						}
																		}

}
?>
