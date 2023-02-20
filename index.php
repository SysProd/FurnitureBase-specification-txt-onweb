<html>
<head>
<meta charset="utf-8">

<link 		href	= "./img/icon.ico" type="image/x-icon" 	rel="icon" 							/>
<link 		href	= "./img/icon.ico" type="image/x-icon" 	rel="shortcut icon" 				/>

<link 		href	= "./css/if.css" 			rel="stylesheet" type="text/css"	/>
<link 		href	= "./css/jquery.alerts.css" 			rel="stylesheet" type="text/css"	/>
<link 		href 	= "./css/jquery.autocomplete.css" 		rel="stylesheet" type="text/css" 	/>
<link 		href 	= "./css/jqueryui.custom.css"			rel="stylesheet" type="text/css" 	/>

<script  	src 	= "./js/jquery.min.js"					type="text/javascript">	</script>
<script 	src 	= "./js/jqueryui.custom.js"				type="text/javascript"> </script>
<script  	src 	= "./js/jquery.autocomplete.pack.js"	type="text/javascript"> </script>
<script 	src		= "./js/jquery.alerts.js" 				type="text/javascript"> </script>
<script		src		= "./js/script_pockazka.js"  			type="text/javascript"> </script>

<body>





<title>Обработка Спецификации</title>





</head>
</body>
  <style>
  body {
font:normal 9pt Arial,sans-serif;
	background-color: #ccd5dd;
}
  .inputRed{
border:1px solid #ff4040;
background: #ffcece;
}
.inputGreen{
border:1px solid #83c954;
background: #e8ffce;
}
    .shapka1
	{
      background-color:#5B6B77;
	  color:white;
	  font-weight: bold;
    }
    .shapka_for_material
	{
      background-color:#5B6B77;
	  color:white;
	  font-weight: bold;
    }
	.izdelie
	{
      background-color:#5B6B77;
	  color:white;
	  font-weight: bold;
    }
	
	.zakaz
	{
      background-color:#5B6B77;
	  color:white;
	  font-weight: bold;
    }
	
    .shapka2
	{
      background-color:#5B6B77;
	  color:white;
	  font-weight: bold;
    } 
    .shapka3
	{
      background-color:red;
	  color:white;
	  font-weight: bold;
    } 
	.tabb{border: 1px solid black;font-size: 10pt; color: black; font-family: Arial;}
	.obnie{
		width:25px; /*---померьте размер одной картинки---*/
		height:25px; /*---обычно они квадратные---*/
		background:url(./img/3.png) no-repeat ; /*---и вот этими ноликами двигайте большую картинку куда хотите---*/
		background-position: 100% 100%;
		background-size: 100% 100%;
		}
		  .obnie:hover { 
		width:25px; /*---померьте размер одной картинки---*/
		height:25px; /*---обычно они квадратные---*/
		background:url(./img/1.png) no-repeat ; /*---и вот этими ноликами двигайте большую картинку куда хотите---*/
		background-position: 100% 100%;
		background-size: 100% 100%;
   }
.dowload_raskroi{
		width:25px; /*---померьте размер одной картинки---*/
		height:25px; /*---обычно они квадратные---*/
		background:url(./img/Upload.png) no-repeat ; /*---и вот этими ноликами двигайте большую картинку куда хотите---*/
		background-position: 100% 100%;
		background-size: 100% 100%;
		}
.dowload_raskroi:hover { 
		width:25px; /*---померьте размер одной картинки---*/
		height:25px; /*---обычно они квадратные---*/
		background:url(./img/Upload.png) no-repeat ; /*---и вот этими ноликами двигайте большую картинку куда хотите---*/
		background-position: 100% 100%;
		background-size: 100% 100%;
   } 
	.vid{display:none;}
	.allocation_td
	{
		  border: #C39E9E 1px solid;
		  background: #A62727;
		  background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#F28282));
	}
	.select_change_tr
	{
		  border: #C39E9E 1px solid;
		  background: #A62727;
		  background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#B0FF7C));
	}
	.chistovii{color: white; font-weight: bold; text-align: center; background-color: rgb(91, 107, 119);}
  </style>
<script type="text/javascript">

function printit(){
//$.trim()-убирает лишние пробелы как и chop() в php
var zakaz	= $.trim($('#zakaz').text());
var izdelie	= $.trim($('#izdelie').text());
var vib_P	= $('#vib_P').attr("checked");
var vib_4py	= $('#vib_4py').attr("checked");
var vib_K	= $('#vib_K').attr("checked");
var vib_C	= $('#vib_C').attr("checked");
var vib_M	= $('#vib_M').attr("checked");
var vib_A	= $('#vib_A').attr("checked");
var vbr		= $('#vbr');

    if($.trim($("#artikul").text())!='' && $.trim($("#artikul").text())!='Нажмите для добавления Артикул для раскроя...'){
        artkl = $.trim($("#artikul").text());
        izdelie=izdelie+'(ART: '+artkl+')';
    }
if($('#name_rp').val()!='' && $('#name_autor').val()!='' && (vib_P!=false || vib_4py!=false|| vib_K!=false|| vib_C!=false || vib_M!=false || vib_A!=false)){
var inf_statys=0; switch(true){case vbr.val()=='' && vbr.attr('disabled')==false : inf_statys=1; jQuery('body').css("overflow","hidden");jQuery('body').append('<div class="fon_alert"></div>'); jQuery('.fon_alert').fadeIn(300); 	jQuery.alerts.okButton = '&nbsp;ОК&nbsp;'; jAlert("<center><h2>Введите ФИО Сборщика или Бригадира Сборки</h2></center>", 'Внимание пользователь', function(r){if(r == true){jQuery('body').css("overflow","visible");jQuery('.fon_alert').removeClass('fon_alert');}}); $('#name_rp').removeClass().addClass("inputRed"); break;}
			//проверка если при выборе отправки документов на Сборку указан Бригадир сборки или сборщик
			if(inf_statys==0){
var tbl = $('table#find_obrob_fil'),
    chbx,
    tds,
	trs,
	chbx = tbl.find(':checkbox:checked'),
	pozic=[];
	
	//проверка чтоб были выбраны материалы для печати
    if(!chbx.length){  
	jQuery('body').css("overflow","hidden");				//убрать scrool на странице	
jQuery('body').append('<div class="fon_alert"></div>');  //создание div для заливки фона
jQuery('.fon_alert').fadeIn(300); 						 	//появление созданного div	
jQuery.alerts.okButton = '&nbsp;ОК&nbsp;';
jAlert("<h2>Выберите хотябы один материал для печати</h2>", 'Внимание пользователь', function(r){if(r == true){jQuery('body').css("overflow","visible");jQuery('.fon_alert').remove();

//проба вывода анимации для не отмеченных мателиалов для печати
/*$('#vib_K').css("background-color","red");
$('#vib_K').focus(); //Передаю фокус элементу
//jQuery('body').append('<div class="pas2_mes"></div>');  //создание div для заливки фона
	var distance = 100; // Установите расстояние для ошибки анимации

//jQuery('body').append('<div class="pas1_mes"></div>'); 
	var wi = $(".pas1_mess").outerWidth(); // Получить ошибки измерений pas2_mess
	var st = wi + distance; // Рассчитайте исходное положение pas2_mess	
tbl.find(':checkbox').each(function(i,tr){
tr.pa().text("").removeClass().addClass("pas1_mess").show().css({display: 'block',opacity: 0,right: -st+'px'}).animate({right: -wi+'px',opacity: 1	}, 400).fadeOut(400);
tr.focus();
});
*/

}
}); 

	return false;
	}
				//выборка и обработка только отмеченных материалов
    chbx.each(function(i,el){
	pozic.push($(el).parent().text());
        trs = $(el).closest('tr').nextUntil('.shapka_for_material').filter(function(){
      
		return $(this).hasClass('ss');
        });
		trs.each(function(i, tr){
        pozic.push($('td',tr).map(function(i,td){
		if($(td).find('.primechanie').val()==null && $(td).find('.pripusk').val()==null){
		if($(td).text()!=''){
		if($(td).text()=='Чистовые'){
		return $(td).text()+'\t 0';}else{return $(td).text();}
		
		}else{
		return 0;
		}
			}else{
	if($(td).find('.primechanie').val()!=null && $(td).find('.pripusk').val()==null){
		 return $(td).find('.primechanie').val();
}}
        }).get().join('\t'));
		
    });
			});
	
var tbl_oblic = $('table#find_oblicovki').find('.rs'),
    obl,
	oblic_name=[],
	vaid_rab=[];
	if(vib_P!=false || vib_4py!=false|| vib_K!=false|| vib_C!=false || vib_M!=false || vib_A!=false){
	if(vib_P==true){vaid_rab.push("Р");}
	if(vib_4py==true){vaid_rab.push("ЧПУ");}
	if(vib_K==true){vaid_rab.push("K");}
	if(vib_C==true){vaid_rab.push("Сб("+vbr.val()+")");}
	if(vib_M==true){vaid_rab.push("M");}
	if(vib_A==true){vaid_rab.push("А");}
	}

	var vaid='';
	for(var s in vaid_rab){     vaid+=vaid_rab[s]+', ';    }
	//alert(vaid);
	var str = '';
	serd=zakaz+'\t'+vaid+'\t '+$('#name_autor').val()+'\t '+$('#name_rp').val()+'\r\n '+izdelie;
    for(var s in pozic){     str += '\r\n' + pozic[s];    }
	str=serd+str;
	//alert(str+'sdfsdf');
    if(tbl_oblic.length>0){
    tbl_oblic.each(function(i,tr){
	oblic_name.push($('td',tr).map(function(i,td){
		tt = $(td).find('.search').val();
		
		//поиск облицовки и вывод в input
	if(tt){
		if(tt=='Поиск...'){
		return 0;}else{return tt;}
		}else{return $(td).text();}
        }).get().join('\t'));
		});
		var sd='\r\n№\tОблицовка\tРасшифровка\tКол-во в М.';
		var sr = '';
		for(var r in oblic_name){      sr += '\r\n' + oblic_name[r];    }
		str=str+sd+sr;
		}
	//проверка какие символы поменять для правильной передачи по ajax запросу
	if(str.match(/[&]/g)!=null){str=str.replace('&','%');}

	$.ajax({
  type: "POST",
  url: "include/upload.php",
  data: "maciv_data="+str,
  success: function(msg){
  if(msg!='no'){
  //открытие формы печати
  chat=window.open('http:./include/indx.php', 'newWin', 'toolbar=0, location=0, directories=0, status=0, menubar=0, scrollbars=0, resizable=0, width="100%", height="100%"');
	//определение открылась ли всплывающее окно
 if(chat != null){chat.focus();}else{
jQuery('body').css("overflow","hidden");				//убрать scrool на странице	
jQuery('body').append('<div class="fon_alert"></div>');  //создание div для заливки фона
jQuery('.fon_alert').fadeIn(300); 						 	//появление созданного div	
jQuery.alerts.okButton = '&nbsp;ОК&nbsp;';
jAlert("<h2><center>Форма печати не открыта!</center></h2><br><left><b>РЕШЕНИЕ:</b></left><li>Откройте браузер Google Chrome;</li><li>Перейдите в настройки браузера;</li><li>Найдите вкладку личные данные, после чего нажмите на кнопку \"Настройки контента\";</li><li>Найдите вкладку \"Всплывающие окна\", после чего выберите \"Разрешить открытие всплывающих окон на всех сайтах\" и нажмите \"Готово\";</li><li>По завершению настроек нажмите на клавиатуре \"F5\" и воспользуйтесь функцией \"Вывод на печать\";</li><li>Если мои рекомендации вам не помогли, воспользуйтесь <a href=\"https://support.google.com/chrome/answer/95472?hl=ru\" target=\"_blank\"> офицальной справкой от Google;</a></li><li>Желаю Приятного использования, формы обработки спецификации!!!</li>", 'Внимание пользователь', function(r){if(r == true){jQuery('body').css("overflow","visible");jQuery('.fon_alert').removeClass('fon_alert');}}); 

 }
 /*chat.document.open();
 chat.document.write("<html><head><title>123456</title></head><body>okok</body></html>");
 chat.document.close();*/
	}
					}	});
					
///>>>********* Запись ФИО руководителя, ФИО Конструктора, ФИО Сборщика в txt файл для дальнейшей обработки в функции автозаполнения
if($('#name_rp').val()!='' && $('#name_autor').val()!=''){
var name_rp = $('#name_rp').val(), name_autor=$('#name_autor').val(), vbr=0;
if($('#vbr').val()!=''){vbr=$('#vbr').val();}else{vbr=1;}
	$.ajax({
  type: "POST",
  url: "include/obrab_fio_save_txt.php",
  data: "name_rp="+name_rp+"&name_autor="+name_autor+"&vbr="+vbr,
  success: function(msg){
// alert('перишли:'+msg);
					}	});
}
///****** конец <<<---

}
}else{
jQuery('body').css("overflow","hidden");				//убрать scrool на странице	
jQuery('body').append('<div class="fon_alert"></div>');  //создание div для заливки фона
jQuery('.fon_alert').fadeIn(300); 						 	//появление созданного div	
jQuery.alerts.okButton = '&nbsp;ОК&nbsp;';

switch(true){
case $('#name_rp').val()=='' : jAlert("<center><h2>Введите ФИО Руководителя проекта</h2></center>", 'Внимание пользователь', function(r){if(r == true){jQuery('body').css("overflow","visible");jQuery('.fon_alert').removeClass('fon_alert');}}); $('#name_rp').removeClass().addClass("inputRed"); break;
case $('#name_autor').val()=='' : jAlert("<center><h2>Введите ФИО автора</h2></center>", 'Внимание пользователь', function(r){if(r == true){jQuery('body').css("overflow","visible");jQuery('.fon_alert').removeClass('fon_alert');}}); $('#name_autor').removeClass().addClass("inputRed"); break;
case vib_P==false || vib_4py==false || vib_K==false || vib_C==false || vib_M==false || vib_A==false : jAlert("<center><h2>Выберите хотя бы один вид работы</h2></center>", 'Внимание пользователь', function(r){if(r == true){jQuery('body').css("overflow","visible");jQuery('.fon_alert').removeClass('fon_alert');}}); break;
}
}
				};	//конец обработки кнопки "print"


function processing_type_ff (tr, poz, pripusk, racpil, str_L, str_W){

	var S_L=0,
		S_W=0,
		chict_L_for_tb3=0,
		chict_W_for_tb3=0;
	
			jQuery.alerts.okButton = '&nbsp;Длина[L]&nbsp;';	jQuery.alerts.cancelButton = '&nbsp;Ширина[W]&nbsp;';
			jQuery('.fon_alert').remove();
					jConfirm("<center><h2>По какому параметру произвести объединение?</h2></center>", 'Внимание пользователь', function(r){	
	
	name_mt = tr.closest('tr').find('td:eq(1)').text();		
	col = parseInt(tr.closest('tr').find('td:eq(2)').text());	
	L = parseFloat(tr.closest('tr').find('td:eq(3)').attr('id'));
	W = parseFloat(tr.closest('tr').find('td:eq(4)').attr('id'));
	L_1 = tr.closest('tr').find('td:eq(5)').text();
	W_1 = tr.closest('tr').find('td:eq(6)').text();
	L_2 = tr.closest('tr').find('td:eq(7)').text();
	W_2 = tr.closest('tr').find('td:eq(8)').text();
	paz = tr.closest('tr').find('td:eq(9)').text();
	L1_obl = tr.closest('tr').find('td:eq(10)').text();
	L2_obl = tr.closest('tr').find('td:eq(11)').text();
	W1_obl = tr.closest('tr').find('td:eq(12)').text();
	W2_obl = tr.closest('tr').find('td:eq(13)').text();
	pripusk = parseInt(pripusk);
	racpil = parseInt(racpil);
	str_L = parseInt(str_L);
	str_W = parseInt(str_W);
	full_name= poz+';'+poz;

	/*
	* проверка, если кол-во не четное
	* прибавить к значению ++
	* parseInt full_col
	* parseInt cols
	*/
	cols = 0;
	if (col % 2 == 1){ cols = (col+1)/2 - 1; col = col+1; }
	full_col = col/2;	cols = cols == 0 ? full_col : cols;

					if(r == true){
			//********** по длине ***************************************************\\\\\
			// alert('по длине');
			S_L=L*2+pripusk+racpil;
			chict_L_for_tb3=L*2;
			S_W=W+pripusk;
			chict_W_for_tb3=W;
// alert(S_L);
			// проверка если L<150
				if(S_L<str_L){		S_L=str_L+pripusk;	chict_L_for_tb3=str_L;	}else{	chict_L_for_tb3=chict_L_for_tb3+racpil;	}
			
			// проверка если W<300
				if(S_W<str_W){		S_W=str_W+pripusk;			chict_W_for_tb3=str_W;			}
			//********** Конец-"по длине" ********************************************\\\\\
			
					}else{
			//********** по ширине ***************************************************\\\\\
			// alert('по ширине');
			S_W=W*2+pripusk+racpil;
			chict_W_for_tb3=W*2;
			S_L=L+pripusk;			
			chict_L_for_tb3=L;
							
			// проверка если W<150
				if(S_W<str_L){		S_W=str_L+pripusk;	chict_W_for_tb3=str_L;	}else{	chict_W_for_tb3=chict_W_for_tb3+racpil;	}
				
			// проверка если L<300
				if(S_L<str_W){		S_L=str_W+pripusk;			chict_L_for_tb3=str_W;			}
			//********** Конец-"по ширине" *********************************************\\\\\
				
					}
			// проверка есть ли облицовка, то вывести разный технологический процесс		
					prim = '0,4';
					if( L1_obl!='' || W1_obl!='' || L2_obl!='' || W2_obl!='' ){ prim = '0,3,4'; }
			//Объединение всех данных в одну строку

			tr1='<tr class="ss"><td class="chistovii">'+full_name+'</td><td class="chistovii">Заготовка</td><td>'+full_col+'</td><td class="L" id="'+chict_L_for_tb3+'" style="font-weight: bold;">'+S_L+'</td><td class="W" id="'+chict_W_for_tb3+'" style="font-weight: bold;">'+S_W+'</td><td class="L_1" id="'+chict_L_for_tb3+'">'+chict_L_for_tb3+'</td><td class="W_1" id="'+chict_W_for_tb3+'">'+chict_W_for_tb3+'</td><td class="L_2">'+L_2+'</td><td class="W_2">'+W_2+'</td><td class="paz"></td><td class="L1_obl"></td><td class="L2_obl"></td><td class="W1_obl"></td><td class="W2_obl"></td><td><input type="text" value="1,2" class="primechanie" size="6" onkeypress="if (((event.keyCode < 48) || (event.keyCode > 57)) &amp;&amp; (event.keyCode != 44)) event.returnValue = false;" onmouseover="tooltip.show(\'<center>Введите технологический процесс изделия согласно цифровым обозначениям на фабрике (через запятую)</center>\');" onmouseout="tooltip.hide();"></td><td><input size="2" value="'+pripusk+'" class="pripusk" disabled id="8" onkeypress="if ((event.keyCode < 48) || (event.keyCode > 57)) event.returnValue = false;" style="background-color: gray;"></td></tr>';
			tr2='<tr class="ss"><td>'+poz+'</td><td>'+name_mt+'</td><td>'+cols+'</td><td class="L chistovii" id="'+L+'" colspan="2" style="font-weight: bold;">Из Заготовки: '+full_name+'</td><td class="W vid" id="'+W+'" style="font-weight: bold;">'+W+'</td><td class="L_1" id="'+L_1+'">'+L_1+'</td><td class="W_1" id="'+W_1+'">'+W_1+'</td><td  class="L_1" id="'+L_2+'">'+L_2+'</td><td  class="W_2" id="'+W_2+'">'+W_2+'</td><td class="paz">'+paz+'</td><td class="L1_obl">'+L1_obl+'</td><td class="L2_obl">'+L2_obl+'</td><td class="W1_obl">'+W1_obl+'</td><td class="W2_obl">'+W2_obl+'</td><td><input type="text" value="'+prim+'" class="primechanie" size="6" onkeypress="if (((event.keyCode < 48) || (event.keyCode > 57)) &amp;&amp; (event.keyCode != 44)) event.returnValue = false;" onmouseover="tooltip.show(\'<center>Введите технологический процесс изделия согласно цифровым обозначениям на фабрике (через запятую)</center>\');" onmouseout="tooltip.hide();"></td><td><input size="2" value="'+pripusk+'" class="pripusk" disabled id="8" onkeypress="if ((event.keyCode < 48) || (event.keyCode > 57)) event.returnValue = false;" style="background-color: gray;"></td></tr>';
			tr3='<tr class="ss"><td>'+poz+'</td><td>'+name_mt+'</td><td>'+full_col+'</td><td class="L chistovii" id="'+L+'" colspan="2" style="font-weight: bold;">Из Заготовки: '+full_name+'</td><td class="W vid" id="'+W+'" style="font-weight: bold;">'+W+'</td><td class="L_1" id="'+L_1+'">'+L_1+'</td><td class="W_1" id="'+W_1+'">'+W_1+'</td><td  class="L_1" id="'+L_2+'">'+L_2+'</td><td  class="W_2" id="'+W_2+'">'+W_2+'</td><td class="paz">'+paz+'</td><td class="L1_obl">'+L1_obl+'</td><td class="L2_obl">'+L2_obl+'</td><td class="W1_obl">'+W1_obl+'</td><td class="W2_obl">'+W2_obl+'</td><td><input type="text" value="'+prim+'" class="primechanie" size="6" onkeypress="if (((event.keyCode < 48) || (event.keyCode > 57)) &amp;&amp; (event.keyCode != 44)) event.returnValue = false;" onmouseover="tooltip.show(\'<center>Введите технологический процесс изделия согласно цифровым обозначениям на фабрике (через запятую)</center>\');" onmouseout="tooltip.hide();"></td><td><input size="2" value="'+pripusk+'" class="pripusk" disabled id="8" onkeypress="if ((event.keyCode < 48) || (event.keyCode > 57)) event.returnValue = false;" style="background-color: gray;"></td></tr>';
			// //вставка 3 строки
			tr.before(tr1);
			tr.before(tr2);
			tr.before(tr3);
			tr.remove();	
					});
					
			}	
			
			
				$(document).ready(function() {
var str_L=150,	//определить минимальное значение одной из сторон 150 мм для присоски на станке ЧПУ
str_W=300,	//определить минимальное значение одной из сторон 300 мм для присоски на станке ЧПУ
racpil=4;	//определить ширину распила
		
		//проверка на нажатие вида работ "Сб"
		//show input #vbr
$("#vib_C").click(function(){
if($('#vib_C').attr("checked")==true){
jQuery("#vbr").removeAttr("disabled").removeClass();
}else{
jQuery("#vbr").attr("disabled","disabled").addClass('vid');
}						});

var kol_naz=0;
$(".obnie").click(function(){
						//проверка количество активных начатых объединений позиций
							if(kol_naz==0){
//alert(kol_naz);
kol_naz=1;
var tsr,mm=[];

		//поиск всех строчек таблицы от одной шапки к другой
	   tsr=$(this).closest('tr').nextUntil('.shapka_for_material').filter(function(){return $(this).hasClass('ss');});
         //обработка каждой колонки таблицы в отдельности
		 tsr.each(function(i, tr){
				//переменная с названием "Позиции"
               dd=$(tr).find('.pozicia').text();
			   //проверка есть ли буква "Ф2" в текущей позиции
              if(dd.match(/[фФ]{1}[2]{1}/g)!=null){
			  //удалить класс "vid"
                $(tr).find('.vid').removeClass();
				//запись в массив для проверки количества найденных позиций с буквой "Ф2"
               mm.push('m');
											}             	});
							//проверка, если найдена только одна позиция с "Ф2", то скрыть позицию
							if(mm.length==1){tsr.find(':checkbox').parent().addClass('vid'); jQuery('body').css("overflow","hidden");jQuery('body').append('<div class="fon_alert"></div>');jQuery('.fon_alert').fadeIn(300);jQuery.alerts.okButton = '&nbsp;ОК&nbsp;';jAlert("<center><h2>Доступна только одна позиция для объединения</h2><nav><ul  style=\"text-align: left;\">Решение:<br><li>Возможно в выбранном материале только одна позиция;</li><li>Воспользуйтесь функцией добовления/удаления вида работы.</li></ul></nav></center>", 'Внимание пользователь', function(r){if(r == true){jQuery('body').css("overflow","visible");jQuery('.fon_alert').remove();kol_naz=0;}});}
						//проверка если нет ни одной найденной позиции с "Ф2"
						if(!mm.length){kol_naz=0;exit;}
						
        $("input:checkbox.obiedin").click(function(){
           mrt= $( "input:checked.obiedin" ),
		   col_glk=mrt.length;
		  // alert(mrt);
            if(col_glk==3){
           // alert('привышен лимит');
                $(this).removeAttr('checked');
               // $(this).parent().addClass('vid');
                exit;
            }
			if(col_glk==2){
			jQuery('body').css("overflow","visible");jQuery('.fon_alert').remove();
			jQuery('body').css("overflow","hidden");jQuery('body').append('<div class="fon_alert"></div>');jQuery('.fon_alert').fadeIn(300);jQuery.alerts.okButton = '&nbsp;Да&nbsp;';	jQuery.alerts.cancelButton = '&nbsp;Нет&nbsp;';
			jConfirm("<center><h2>Объеденить выбранные позиции?</h2></center>", 'Внимание пользователь', function(r){
			if(r == true){
			
			//jQuery('body').css("overflow","visible");jQuery('.fon_alert').remove();
			
					//выборка "1" строки элемента
			tb1=mrt.eq(0).closest('tr');
					//выборка "2" строки элемента
			tb2=mrt.eq(1).closest('tr');
					//перемести элемент tb2 к элементу tb1
			tb1.before(tb2);
			
			//данные из "1" строки таблицы отмеченной "input:checked.obiedin"
			//данные из колонки название "Позиции"
			poz_1=mrt.eq(0).closest('tr').find('td:eq(0)');
			//Удалить класс pozicia, дабы запретить редактирование название позиции
			//poz_1.removeClass('pozicia');
			nam_1=poz_1.text();			
			//данные из колонки "Кол-во"
			str1_2=parseInt(mrt.eq(0).closest('tr').find('td:eq(2)').text());
			//данные из колонки "L"
			str1_3=mrt.eq(0).closest('tr').find('td:eq(3)').attr('id');
			//данные из колонки "W"
			str1_4=mrt.eq(0).closest('tr').find('td:eq(4)').attr('id');
			//данные из колонки "L_1"
			L1_1=mrt.eq(0).closest('tr').find('td:eq(5)');
			str1_5=L1_1.attr('id');
			//данные из колонки "W_1"
			W1_1=mrt.eq(0).closest('tr').find('td:eq(6)');
			str1_6=W1_1.attr('id');
			//данные из колонки "Припуск"
			str1_7=mrt.eq(0).closest('tr').find('td:eq(15)').children().val();
			//данные из колонки "Блок объединения"
			glk_1=mrt.eq(0).closest('tr').find('td:eq(16)');
						
			//данные из "2" строки таблицы отмеченной "input:checked.obiedin"
			//данные из колонки название "Позиции"
			poz_2=mrt.eq(1).closest('tr').find('td:eq(0)');
			//Удалить класс pozicia, дабы запретить редактирование название позиции
			//poz_2.removeClass('pozicia').addClass('chistovii');
			nam_2=poz_2.text();
			//данные из колонки "Кол-во"
			str2_2=parseInt(mrt.eq(1).closest('tr').find('td:eq(2)').text());
			//данные из колонки "L"
			str2_3=mrt.eq(1).closest('tr').find('td:eq(3)').attr('id');
			//данные из колонки "W"
			str2_4=mrt.eq(1).closest('tr').find('td:eq(4)').attr('id');
			//данные из колонки "L_1"
			L1_2=mrt.eq(1).closest('tr').find('td:eq(5)');
			str2_5=L1_2.attr('id');
			//данные из колонки "W_1"
			W1_2=mrt.eq(1).closest('tr').find('td:eq(6)');
			str2_6=W1_2.attr('id');
			//данные из колонки "Припуск"
			str2_7=mrt.eq(1).closest('tr').find('td:eq(15)').children().val();
			//данные из колонки "Блок объединения"
			glk_2=mrt.eq(1).closest('tr').find('td:eq(16)');
			//формирование строки "3"
			//полное название объеденных позиций
			ful_nam=nam_1+';'+nam_2;
			//определение припуска изделия
			pripusk=str1_7;
			var S_L=0,S_W=0,chict_L_for_tb3=0,chict_W_for_tb3=0,S_L_1=0,S_W_1=0,S_L_2=0,S_W_2=0;
			jQuery.alerts.okButton = '&nbsp;Длина[L]&nbsp;';	jQuery.alerts.cancelButton = '&nbsp;Ширина[W]&nbsp;';
			jQuery('.fon_alert').remove();
			jConfirm("<center><h2>По какому параметру произвести объединение?</h2></center>", 'Внимание пользователь', function(r){
			
			L1=parseFloat(str1_3);
			L2=parseFloat(str2_3);
			W1=parseFloat(str1_4);
			W2=parseFloat(str2_4);
			pripusk=parseFloat(pripusk);
			
			if(r == true){
			//********** по длине ***************************************************\\\\\
			S_L=L1+L2+pripusk+racpil;
			chict_L_for_tb3=L1+L2;

			//проверка если W1>=W2, тогда S_W=W1, иначе S_W=W2
			if(W1 >= W2){	S_W=W1+pripusk;			chict_W_for_tb3=W1;				}else{
							S_W=W2+pripusk;			chict_W_for_tb3=W2;						}
							
			//проверка если L<150
				if(S_L<str_L){		S_L=str_L+pripusk;	chict_L_for_tb3=str_L;
 				}else{
				chict_L_for_tb3=chict_L_for_tb3+racpil;
				}
				
			//проверка если W<300
				if(S_W<str_W){		S_W=str_W+pripusk;			chict_W_for_tb3=str_W;			}
			//********** Конец-"по длине" ********************************************\\\\\
			}else{
			
			
			//********** по ширине ***************************************************\\\\\
			S_W=W1+W2+pripusk+racpil;
			chict_W_for_tb3=W1+W2;

			//проверка если L1>=L2, тогда S_W=L1, иначе S_W=L2
			if(L1 >= L2){	S_L=L1+pripusk;			chict_L_for_tb3=L1;				}else{
							S_L=L2+pripusk;			chict_L_for_tb3=L2;						}
							
			//проверка если W<150
				if(S_W<str_L){		S_W=str_L+pripusk;	chict_W_for_tb3=str_L; 	
				}else{
				chict_W_for_tb3=chict_W_for_tb3+racpil;
				}
				
			//проверка если L<300
				if(S_L<str_W){		S_L=str_W+pripusk;			chict_L_for_tb3=str_W;			}
			//********** Конец-"по ширине" *********************************************\\\\\
			}
			
		/*
		* проверка, если кол-во не четное
		* parseInt kol_vo_izd
		*/
			kol_vo_izd = (str1_2 + str2_2);
			if (kol_vo_izd % 2 == 1){ kol_vo_izd = (kol_vo_izd+1)/2; }else{ kol_vo_izd = kol_vo_izd/2; }
			//Объединение всех данных в одну строку
			tb3='<tr class="ss"><td class="chistovii">'+ful_nam+'</td><td class="chistovii">Заготовка</td><td>'+kol_vo_izd+'</td><td class="L" id="'+chict_L_for_tb3+'" style="font-weight: bold;">'+S_L+'</td><td class="W" id="'+chict_W_for_tb3+'" style="font-weight: bold;">'+S_W+'</td><td class="L_1" id="'+chict_L_for_tb3+'">'+chict_L_for_tb3+'</td><td class="W_1" id="'+chict_W_for_tb3+'">'+chict_W_for_tb3+'</td><td></td><td></td><td></td><td class="L1_obl"></td><td class="L2_obl"></td><td class="W1_obl"></td><td class="W2_obl"></td><td><input type="text" value="1,2" class="primechanie" size="6" onkeypress="if (((event.keyCode < 48) || (event.keyCode > 57)) &amp;&amp; (event.keyCode != 44)) event.returnValue = false;" onmouseover="tooltip.show(\'<center>Введите технологический процесс изделия согласно цифровым обозначениям на фабрике (через запятую)</center>\');" onmouseout="tooltip.hide();"></td><td><input size="2" value="'+pripusk+'" class="pripusk" disabled id="8" onkeypress="if ((event.keyCode < 48) || (event.keyCode > 57)) event.returnValue = false;" style="background-color: gray;"></td></tr>';
			//вставка 3 строки
			tb2.before(tb3);
			//редактирование 1 строки
			//L
			mrt.eq(0).closest('tr').find('td:eq(3)').text('Из Заготовки: '+ful_nam).attr("colspan","2").addClass('chistovii').css({'font-weight':'bold'});
			//W
			mrt.eq(0).closest('tr').find('td:eq(4)').addClass('vid');
			//L_1
			L1_1.text(str1_5).css({'font-weight':'bold'});
			//W_1
			W1_1.text(str1_6).css({'font-weight':'bold'});
			//редактирование 2 строки
			//L
			mrt.eq(1).closest('tr').find('td:eq(3)').text('Из Заготовки: '+ful_nam).attr("colspan","2").addClass('chistovii').css({'font-weight':'bold'});
			//W
			mrt.eq(1).closest('tr').find('td:eq(4)').addClass('vid');
			//L_1
			L1_2.text(str2_5).css({'font-weight':'bold'});
			//W_1
			W1_2.text(str2_6).css({'font-weight':'bold'});
			
			//удалить затемнение фона
			jQuery('body').css("overflow","visible");jQuery('.fon_alert').remove();
			//очистка выполнения работы с объединением
			kol_naz=0;
						//добавить новую колонку с названием "Позиции" в 1 и 2 строку
			mrt.eq(0).closest('tr').find('td:eq(0)').before('<td>'+nam_1+'</td>');
			mrt.eq(1).closest('tr').find('td:eq(0)').before('<td>'+nam_2+'</td>');
			//удалить старые колонки с названием "Позиции" в 1 и 2 строку
			poz_1.remove();
			poz_2.remove();
			//удаление "checkbox" с 1 и 2 строки
			glk_1.remove();
			glk_2.remove();
										//alert("L1="+L1+"/n L2="+L2+"/n W1="+W1+"/n W2="+W2+"/n pripusk="+pripusk+"/n racpil="+racpil+"/n S_L="+S_L+"/n S_W="+S_W+"/n S_L_1="+S_L_1+"/n S_W_1="+S_W_1+"/n chict_L_for_tb3="+chict_L_for_tb3+"/n chict_W_for_tb3="+chict_W_for_tb3);
			});
			exit;
			}else{
			jQuery('body').css("overflow","visible");jQuery('.fon_alert').remove();
			}
			});
			}

                                         });
										 
										 }else{
jQuery('body').css("overflow","hidden");jQuery('body').append('<div class="fon_alert"></div>');jQuery('.fon_alert').fadeIn(300);jQuery.alerts.okButton = '&nbsp;ОК&nbsp;';jAlert("<center><h2>Завершите все предыдущие действия по объединению позиций</h2></center>", 'Внимание пользователь', function(r){if(r == true){jQuery('body').css("overflow","visible");jQuery('.fon_alert').remove();}});
										 }
});
//*********************************************   обработка выгрузки раскроя **********************************************\\\
$(".dowload_raskroi").click(function(){

var tbl = $('table#find_obrob_fil'),
    chbx,
    tds,
	trs,
	chbx = tbl.find(':checkbox:checked'),
	pozic=[],matrls=[],sr='',str='';
	
	//проверка чтоб были выбраны материалы для выгрузки в раскрой
    if(!chbx.length){
	jQuery('body').css("overflow","hidden");				//убрать scrool на странице	
	jQuery('body').append('<div class="fon_alert"></div>');  //создание div для заливки фона
	jQuery('.fon_alert').fadeIn(300); 						 	//появление созданного div	
	jQuery.alerts.okButton = '&nbsp;ОК&nbsp;';					//название кнопки ОК
	jAlert("<h2>Выберите хотябы один материал для выгрузки в раскрой</h2>", 'Внимание пользователь', function(r){if(r == true){jQuery('body').css("overflow","visible");jQuery('.fon_alert').remove();}}); 
							return false;	}
	//выборка всех отмеченных материалов
	chbx.each(function(i,el){matrls.push($(el).parent().text());});
	//Создание материалов выбора для отметки листового или поганаж
	for(var r in matrls){ sr += "<br><input type='checkbox' class='vibor_mtr_list' value='"+matrls[r]+"'/>"+matrls[r];   }
		
		//	всплывающие сообщение с выбором материала
			//убрать scrool на странице
			jQuery('body').css("overflow","hidden");
			jQuery('body').append('<div id="dialog-message" style="display:none" title=""><p class="reasdss"></p></div>');
			jQuery("#dialog-message").html("Выбирите плитные материалы:"+sr+"<nav><ul  style=\"text-align: left;\"><b>Примечание:</b><br><li>Чтобы выбрать раскрой для линейных материалов, оставте поля выбора пустым и нажмите \"ОК\";</li></ul></nav>").dialog({modal:true,closeOnEscape:false,show: "blind",resizable:true,height: "250",width: 400,buttons:{Отметить_Все: function(){
				//отметить все или отменить
				var list=$(':checkbox.vibor_mtr_list');
				list.each(function(i,el){
				if($(el).attr('checked')==false){
				$(el).attr('checked','checked')
				}else{
				$(el).removeAttr('checked');		
				}});
				},Ок: function(){
				
				var list=$(':checkbox.vibor_mtr_list'),tyu=[],material_name=0;
			//обработка списка
				list.each(function(i,el){if($(el).attr('checked')==true){tt=$(el).val()+"\t Slab";tyu.push(tt);}else{tt=$(el).val()+"\t Stripe";tyu.push(tt);}});			
	
	//выборка и обработка только отмеченных материалов
    chbx.each(function(i,el){
	//запись название материала
	material_name = $(el).parent().text();
	
			//поиск совпадений с выбранным материалом для типа раскроя
			  for(var i in tyu){
			  //Разбить строку на два массива:
							//"Названием Материала" - result[0]
							//"Тип Раскроя" - result[1]
				result=tyu[i].split('\t');
				if(result[0] == material_name){material_name=$.trim(result[0])+' \t '+$.trim(result[1]);}
				 material_name == material_name;  			  
				  }
				  
	//запись в массив "название материала"
	pozic.push("Material \t "+material_name);

	//if($.trim($('td:eq(0)',tr).text()).match(/\//g)!=null){alert($.trim($('td:eq(0)',tr).text()).match(/\//g));}
	
        trs = $(el).closest('tr').nextUntil('.shapka_for_material').filter(function(){return $(this).hasClass('ss');});
	         
			 var  izdl='';
            if($.trim($("#artikul").text())=='Нажмите для добавления Артикул для раскроя...'){	
                izdl=$.trim($("#izdelie").text());
            }else{
                izdl=$.trim($("#artikul").text());
            }	
		          // alert(izdl);
		trs.each(function(i, tr){
		//alert($('td:eq(0)',tr).text().match(/-\./));
 

					var poz=$.trim($('td:eq(0)',tr).text())+'/'+izdl,
						name=$.trim($('td:eq(1)',tr).text()),
						kol_vo=$.trim($('td:eq(2)',tr).text()),
						L=$.trim($('td:eq(3)',tr).text()),
						W=$.trim($('td:eq(4)',tr).text()),
						orientacia;
						result=material_name.split('\t');
						if($.trim(result[1])=='Slab'){
						orientacia=' ';
						// orientacia='Не задана';
						}else{
						orientacia=' ';
						}
		//проверка есть ли сдвоенные детали
		if(L.match(/Из Заготовки/g)==null){
		//проверка есть ли чистовые детали
		if(L.match(/Чистовые/g)!=null){L=$('td:eq(5)',tr).text();W=$('td:eq(6)',tr).text();}
		//alert(mm);
		//проверка есть ли "/" в L и W
						sut_L=L.split('/');
						sut_W=W.split('/');
						if(sut_L[1]!="undefined" && sut_L[1]!=null){L=sut_L[1];}
						if(sut_W[1]!="undefined" && sut_W[1]!=null){W=sut_W[1];}
		//формирование строки
		sum=poz+" \t "+L+" \t "+W+" \t "+kol_vo+" \t "+orientacia+" \t "+name;
        pozic.push(sum);
		}
									});
												});
			//формирование строки для передачи в ajax
			for(var r in pozic){ str+="\r\n"+pozic[r]; }
	//str=serd+str;
	//alert(str);
	zakaz=$.trim($('.izdelie').text());
	//проверка какие символы поменять для правильной передачи по ajax запросу
	if(str.match(/[&]/g)!=null){str=str.replace('&','%');}
	//alert(str);
		$.ajax({
  type: "POST",
  url: "include/upload.php",
  data: "maciv_rascroi="+str,
  success: function(msg){
    chat=window.open('http:./include/upload.php?maciv_rascroi='+zakaz, 'newWin', 'toolbar=0, location=0, directories=0, status=0, menubar=0, scrollbars=0, resizable=0, width=300px, height=100px');
	
	/*		jQuery('body').css("overflow","hidden");
			jQuery('body').append('<div id="dialog-message" style="display:none" title=""><p class="reasdss"></p></div>');
			jQuery("#dialog-message").html("Загрузить файл:"+msg).dialog({modal:true,closeOnEscape:false,show: "blind",resizable:true,height: "250",width: 400,buttons:{ОК: function(){
							jQuery(this).dialog("close");
				jQuery('body').css("overflow","visible");}}});
					*/
					}	});
	
				jQuery(this).dialog("close");
				jQuery('body').css("overflow","visible");
				}
				}
				
				});
				//убрать X для закрытия блока сообщении
				jQuery(".ui-dialog-titlebar-close").remove();
				
				
				

			


			
	
});
//********************************************* конец  обработки выгрузки раскроя **********************************************\\\

//функция изменения названия материала
$(".material").click(function(){
	var name = $(this);
	jQuery('body').css("overflow","hidden");				//убрать scrool на странице	
	jQuery('body').append('<div class="fon_alert"></div>');  //создание div для заливки фона
	jQuery('.fon_alert').fadeIn(300); 						 	//появление созданного div	
	jQuery.alerts.okButton = '&nbsp;ОК&nbsp;';				//вид кнопки "Ok"
	jQuery.alerts.cancelButton = '&nbsp;Отмена&nbsp;';	 //вид кнопки "Cancel"
	jPrompt("Введите новое название",name.text(), 'Внимание', function(r) {
			//удалить символы табуляции и пробелы в тексте
			t = name.text().trim();
			if(r != t)
			//ввести измененное название в ячейку "material"
			name.text(r);
			//удалить затемненный фон и включить scrool на странице
			jQuery('body').css("overflow","visible");jQuery('.fon_alert').remove();
			});
						});
						//конец функции изменения названия материала

//функция изменения названия материала
$("#artikul").click(function(){
	var name = $(this),
        names='';

	jQuery.alerts.okButton = '&nbsp;ОК&nbsp;';				//вид кнопки "Ok"
	jQuery.alerts.cancelButton = '&nbsp;Отмена&nbsp;';	 //вид кнопки "Cancel"
    names = name.text();
    if(names=='Нажмите для добавления Артикул для раскроя...'){ names = ' '}
	jPrompt("Введите Артикул Изделия:",names, 'Внимание', function(r) {
			//ввести измененное название в ячейку "artikul"
        if(r.trim()==''){r='Нажмите для добавления Артикул для раскроя...';}
			name.text(r);
			});
						});
						//конец функции изменения названия материала
	//функция изменения названия позиции					
$(".pozicia").click(function(){
	var pusto=0,
	name = $(this), 
	txt=name.text(),
	vbr_pozic,
	s=0,
	paz='',
	tr=name.parent(),
	L=name.siblings('.L').attr('id'),
	W=name.siblings('.W').attr('id'),
	L_1=name.siblings('.L_1').attr('id'),
	W_1=name.siblings('.W_1').attr('id'),
	primechanie=name.siblings('td').find('.primechanie').val(),
	pripusk=name.siblings('td').find('.pripusk').val(),
	L1_obl=name.siblings('.L1_obl').text(),
	L2_obl=name.siblings('.L2_obl').text(),
	W1_obl=name.siblings('.W1_obl').text(),
	W2_obl=name.siblings('.W2_obl').text();
				jQuery('body').css("overflow","hidden");	//убрать scrool на странице
				jQuery('body').append('<div id="dialog-message" style="display:none" title=""><p class="reasdss"></p></div>');
				jQuery("#dialog-message").html("Для добавления вида работы к выбранной позиции, выбирете соответствующую букву<select id ='vbr_pozic' class ='vbr_pozic'><option selected='' style='background-color:#FF0000'></option><option title='Используется для чистовой детали'>Ч</option><option title='Используется для округления позиции, которая меньше 150 мм'>Ф</option><option title='Используется для объединения сдвоенных деталей'>Ф2</option><option title='Используется для задваивания позиции'>ФФ</option><option  title='Используется для деталей облицованных кожей'>К</option><option title='Используется для деталей облицованных пластиком'>П</option><option title='Используется для деталей облицованных шпоном'>Ш</option><option title='Используется для деталей облицованных тканью'>Т</option></select><nav><ul  style=\"text-align: left;\"><b>Примечание:</b><br><li>Чтобы убрать букву из выбранной позиции, оставте поля выбора пустым и нажмите \"Сохранить\";</li></ul></nav>").dialog({ modal:true,closeOnEscape:true,show: "blind",resizable:true,height: "250",width: 230,buttons:{Сохранить: function(){
				vbr_pozic=$('#vbr_pozic').val();
				//alert('sss'++txt);
/*				switch(vbr_pozic){
				case 'Ч' : alert('выбрана Ч  '); break;
				case 'Ф' : alert('выбрана Ф  '); break;
				case 'Ф2': alert('выбрана Ф2   '); break;
				case 'ФФ': alert('выбрана Ф2   '); break;
				case 'К' : alert('выбрана К  '); break;
				case 'П' : alert('выбрана П  '); break;
				case 'Ш' : alert('выбрана Ш  '); break;
				case 'Т' : alert('выбрана Т  '); break;
				default: alert(vbr_pozic+"нечего не выбрано"); break;
				}*/


					//**********************проверка найденной позиции******************************************||
				switch(true){
				case txt.match(/[Чч]/g)!=null : 					//проверка если не выбрана буква "Ч"					
																	if(vbr_pozic!='Ч'){
																		
																			//замена буквы "Ч"-удаление из найденной позиции
																			s=txt.replace(txt.match(/[Чч]/g),'')+vbr_pozic; 
																		//alert('былаЧ   '+s); alert('ячейка L='+L+'W='+W); 
																			//Обновить значения "L"
																			name.siblings('.L').removeClass('chistovii').attr("colspan","1").text(L); 
																			//Обновить значения "W"
																			name.siblings('.W').removeClass().text(W).addClass('W');
																			//Обновить значения "pripusk"
																			name.siblings('td').find('.pripusk').removeAttr('disabled').css('background-color', 'white');	
																											}else{
																																											
																	//проверка если выбрана буква "Ч"
																		//	alert('выбрана та же буква'); 
																			jQuery(this).dialog("close");
																			jQuery('body').css("overflow","visible");}
																														break;
				case txt.match(/[Фф]/g)!=null && txt.match(/[фФ]{1}[2]{1}/g) == null && txt.match(/[Фф]{2}/g) == null :  //проверка если не выбрана буква "Ф"	
																						if(vbr_pozic!='Ф'){ 	
																								//замена буквы "Ф"-удаление из найденной позиции
																									s=txt.replace(txt.match(/[Фф]/g),'')+vbr_pozic;
																						//alert('былаФ  '+s);
																									//Обновить значения "L"
																									name.siblings('.L').removeClass().text(L).addClass('L').css('font-weight', 'normal');
																									//Обновить значения "W"
																									name.siblings('.W').removeClass().text(W).addClass('W').css('font-weight', 'normal');
																									//Обновить значения "L_1"
																										name.siblings('.L_1').removeClass().text(L_1).addClass('L_1').css('font-weight', 'normal');
																									//Обновить значения "W_1"
																										name.siblings('.W_1').removeClass().text(W_1).addClass('W_1').css('font-weight', 'normal');
																															}else{
																								//проверка если выбрана буква "Ф"							
																									//alert('выбрана таже буква');
																									jQuery(this).dialog("close");
																									jQuery('body').css("overflow","visible");} break;
				case txt.match(/[Фф]{1}[2]{1}/g) !=null && txt.match(/[Фф]{2}/g) == null : 							//проверка если не выбрана буква "Ф2"	
																						if(vbr_pozic!='Ф2'){
																								//замена буквы "Ф2"-удаление из найденной позиции		
																										s=txt.replace(txt.match(/[фФ]{1}[2]{1}/g),'')+vbr_pozic;
																										//alert('былаФ2   '+s);
																									//Обновить значения "L"	
																										name.siblings('.L').removeClass().text(L).addClass('L').css('font-weight', 'normal');
																									//Обновить значения "W"
																										name.siblings('.W').removeClass().text(W).addClass('W').css('font-weight', 'normal');
																									//Обновить значения "L_1"
																										name.siblings('.L_1').removeClass().text(L_1).addClass('L_1').css('font-weight', 'normal');
																									//Обновить значения "W_1"
																										name.siblings('.W_1').removeClass().text(W_1).addClass('W_1').css('font-weight', 'normal');
																									//Обновить значения "pripusk"
																										name.siblings('td').find('.pripusk').removeAttr('disabled').css('background-color', 'white');
																															}else{
																										//alert('выбрана таже буква');			
																										jQuery(this).dialog("close");jQuery('body').css("overflow","visible");} break;
				case txt.match(/[Фф]{2}/g) !=null && txt.match(/[Фф]{1}[2]{1}/g) == null : 							//проверка если не выбрана буква "ФФ"	
																						if(vbr_pozic!='ФФ'){
																								//замена буквы "ФФ"-удаление из найденной позиции	
																										s=txt.replace(txt.match(/[ФФ]{2}/g),'')+vbr_pozic;
																										//alert('была ФФ   '+s1);
																									//Обновить значения "L"	
																										name.siblings('.L').removeClass().text(L).addClass('L').css('font-weight', 'normal');
																									//Обновить значения "W"
																										name.siblings('.W').removeClass().text(W).addClass('W').css('font-weight', 'normal');
																									//Обновить значения "L_1"
																										name.siblings('.L_1').removeClass().text(L_1).addClass('L_1').css('font-weight', 'normal');
																									//Обновить значения "W_1"
																										name.siblings('.W_1').removeClass().text(W_1).addClass('W_1').css('font-weight', 'normal');
																									//Обновить значения "pripusk"
																										name.siblings('td').find('.pripusk').removeAttr('disabled').css('background-color', 'white');
																															}else{
																										//alert('выбрана таже буква');			
																										jQuery(this).dialog("close");jQuery('body').css("overflow","visible");} break;
				case txt.match(/[Кк]/g)!=null : 										if(vbr_pozic!='К'){ 	s=txt.replace(txt.match(/[Кк]/g),'')+vbr_pozic; /*alert('былаК  '+s);*/ name.siblings('.L').text(L); name.siblings('.W').text(W);			}else{	/*alert('выбрана таже буква');*/			jQuery(this).dialog("close");jQuery('body').css("overflow","visible");} break;
				case txt.match(/[Пп]/g)!=null :											if(vbr_pozic!='П'){ 	s=txt.replace(txt.match(/[Пп]/g),'')+vbr_pozic; /*alert('былаП  '+s);*/	name.siblings('.L').text(L); name.siblings('.W').text(W);			}else{	/*alert('выбрана таже буква');*/			jQuery(this).dialog("close");jQuery('body').css("overflow","visible");} break;
				case txt.match(/[Шш]/g)!=null : 										if(vbr_pozic!='Ш'){ 	s=txt.replace(txt.match(/[Шш]/g),'')+vbr_pozic; /*alert('былаШ  '+s);*/	name.siblings('.L').text(L); name.siblings('.W').text(W);			}else{	/*alert('выбрана таже буква');*/			jQuery(this).dialog("close");jQuery('body').css("overflow","visible");} break;
				case txt.match(/[Тт]/g)!=null : 										if(vbr_pozic!='Т'){ 	s=txt.replace(txt.match(/[Тт]/g),'')+vbr_pozic; /*alert('былаТ  '+s);*/	name.siblings('.L').text(L); name.siblings('.W').text(W);			}else{	/*alert('выбрана таже буква');*/			jQuery(this).dialog("close");jQuery('body').css("overflow","visible");} break;
				default: 																if(vbr_pozic!='') { 	s=txt+vbr_pozic; /*alert('была пустота'+s); */							name.siblings('.L').text(L); name.siblings('.W').text(W);			}else{	/*alert('выбрана пустота как и была');*/	jQuery(this).dialog("close");jQuery('body').css("overflow","visible");} break;
				}	//***************конец проверки*******
				
		//*******************проверка выбранной позиции*****************************************
				switch(true){
//******************************* обработка выбора буквы "Ч" **************************************************************\\
				case s.match(/[Чч]/g)!=null : 
												// удалить класс allocation_td из строки
												tr.removeClass('allocation_td');	
												name.siblings('.L').text('Чистовые').attr("colspan","2").addClass('chistovii').css('font-weight','bold'); 
												name.siblings('.W').addClass('vid');	
												//alert('выбрана Ч  ');
											//проверка если нет облицовок, то заменить примечание на "0,4", иначе на "0,3,4"	
										if(L1_obl.length==0 && L2_obl.length==0 && W1_obl.length==0 && W2_obl.length==0){primechanie='0,4';}else{primechanie='0,3,4';}
										name.siblings('td').find('.primechanie').val(primechanie);
											//заблокировать редактирование "припуска"
										name.siblings('td').find('.pripusk').attr("disabled","disabled").css('background-color', 'gray');
										//изменить название текущей позиции
										name.text(s);
										//закрыть всплывающее диалоговое окно
										jQuery(this).dialog("close");jQuery('body').css("overflow","visible");
												break;
//******************************* обработка выбора буквы "Ф" **************************************************************\\
				case s.match(/[Фф]/g)!=null && s.match(/[фФ]{1}[2]{1}/g)==null && s.match(/[Фф]{2}/g) == null:  
												// удалить класс allocation_td из строки
												tr.removeClass('allocation_td');	
			sm_pr=str_L+parseFloat(pripusk);
			sum_L=parseFloat(L)+parseFloat(pripusk);
			sum_W=parseFloat(W)+parseFloat(pripusk);
			//alert(sum_L+'='+sm_pr+'='+sum_W);
							//определение наименьшей Длины-L или Ширины-W
				switch(true){
					case sum_L>=sm_pr && sum_W>=sm_pr : 
					//проверка если L или W <300
					switch(true){
					case sum_L<sum_W: /*alert('1=L<W'); */	if(sum_W<str_W){	sum_W=W+'/'+(str_W+parseFloat(pripusk));		sum_W_1=W_1+'/'+str_W;	}else{	sum_W=parseFloat(W)+parseFloat(pripusk);	sum_W_1=W_1;	}	sum_L_1=L_1;	sum_L=parseFloat(L)+parseFloat(pripusk);	break;
					case sum_L>sum_W: /*alert('2=L>W'); */	if(sum_L<str_W){	sum_L=L+'/'+(str_W+parseFloat(pripusk));		sum_L_1=L_1+'/'+str_W;	}else{	sum_L=parseFloat(L)+parseFloat(pripusk);	sum_L_1=L_1;	}	sum_W_1=W_1;	sum_W=parseFloat(W)+parseFloat(pripusk);	break;
					case sum_L==sum_W: /*alert('3=L==W');*/ if(sum_W<str_W){	sum_W=W+'/'+(str_W+parseFloat(pripusk));		sum_W_1=W_1+'/'+str_W;	}else{	sum_W=parseFloat(L)+parseFloat(pripusk);	sum_W_1=W_1;	}	sum_L_1=L_1;	sum_L=parseFloat(L)+parseFloat(pripusk); 	break;
								}
					//alert(sum_L+'=sum_L '+sum_W+'=sum_W '+sum_L_1+'=sum_L_1');
				name.siblings('.L').text(sum_L).css("font-weight","bold");
				name.siblings('.W').text(sum_W).css("font-weight","bold");
				name.siblings('.L_1').text(sum_L_1).css("font-weight","bold");
				name.siblings('.W_1').text(sum_W_1).css("font-weight","bold");
					//alert("L>158&&W>158");
						break;
						
					case sum_L<=sm_pr && sum_W<=sm_pr :
					//alert("L<158&&W<158");
										//проверка если L или W <300
					switch(true){
					case sum_L<sum_W: /*alert('1=L<W');*/ 	sum_W=W+'/'+(str_W+parseFloat(pripusk));	sum_L=L+'/'+(parseFloat(str_L)+parseFloat(pripusk));		sum_W_1=W_1+'/'+str_W;		sum_L_1=L_1+'/'+(parseFloat(str_L));	break;
					case sum_L>sum_W: /*alert('2=L>W');*/	sum_L=L+'/'+(str_W+parseFloat(pripusk));	sum_W=W+'/'+(parseFloat(str_L)+parseFloat(pripusk));		sum_L_1=L_1+'/'+str_W;		sum_W_1=W_1+'/'+(parseFloat(str_L)); 	break;
					case sum_L==sum_W: /*alert('3=L==W');*/ sum_W=W+'/'+(str_W+parseFloat(pripusk));	sum_L=L+'/'+(parseFloat(str_L)+parseFloat(pripusk));		sum_W_1=W_1+'/'+str_W;		sum_L_1=L_1+'/'+(parseFloat(str_L)); 	break;
								}
					//alert(sum_L+'=sum_L '+sum_W+'=sum_W '+sum_L_1+'=sum_L_1');
				name.siblings('.L').text(sum_L).css("font-weight","bold");
				name.siblings('.W').text(sum_W).css("font-weight","bold");
				name.siblings('.L_1').text(sum_L_1).css("font-weight","bold");
				name.siblings('.W_1').text(sum_W_1).css("font-weight","bold");
						break;
					case sum_L>=sm_pr && sum_W<=sm_pr : 
								//alert("L>158&&W<158");
									//проверка, если Длина-L < 300-str_W
								if(sum_L<str_W){
								//L<300
								sum_L=L+'/'+(str_W+parseFloat(pripusk));
								name.siblings('.L_1').text(L_1+'/'+(str_W)).css("font-weight","bold");
												}
				name.siblings('.L').text(sum_L).css("font-weight","bold");
				name.siblings('.W').text(W+'/'+sm_pr).css("font-weight","bold");
				name.siblings('.W_1').text(W+'/'+(sm_pr-parseFloat(pripusk))).css("font-weight","bold");
						break;
					case sum_L<=sm_pr && sum_W>=sm_pr :
					//проверка, если Ширина-W < 300-str_W
								if(sum_W<str_W){
								//W<300
								sum_W=W+'/'+(str_W+parseFloat(pripusk));
								name.siblings('.W_1').text(W_1+'/'+(str_W)).css("font-weight","bold");
												}
					//alert("L<158&&W>158");
				name.siblings('.L').text(L+'/'+sm_pr).css("font-weight","bold");
				name.siblings('.L_1').text(L+'/'+(sm_pr-parseFloat(pripusk))).css("font-weight","bold");
				name.siblings('.W').text(sum_W).css("font-weight","bold");
						break;
								}
									//изменить название текущей позиции
								name.text(s);
									//проверка если нет облицовок, то заменить примечание на "1,2,3,0,4", иначе на "1,2,0,4"	
								if(L1_obl.length==0 && L2_obl.length==0 && W1_obl.length==0 && W2_obl.length==0){primechanie='1,2,0,4';}else{primechanie='1,2,3,0,4';}
								name.siblings('td').find('.primechanie').val(primechanie);
									//закрыть всплывающее диалоговое окно
								jQuery(this).dialog("close");jQuery('body').css("overflow","visible");
																				//alert('выбрана Ф  '); 
																				break;
//******************************* обработка выбора буквы "Ф2" **************************************************************\\
				case s.match(/[фФ]{1}[2]{1}/g)!=null && s.match(/[фФ]{1}[фФ]{1}/g)==null && s.match(/[Фф]{2}/g) == null:  
												// удалить класс allocation_td из строки
												tr.removeClass('allocation_td');	
				//L
				name.siblings('.L').css("font-weight","bold").removeClass().text(parseFloat(L)+parseFloat(pripusk)).addClass('L').css('font-weight', 'normal');;
				//W
				name.siblings('.W').css("font-weight","bold").removeClass().text(parseFloat(W)+parseFloat(pripusk)).addClass('W').css('font-weight', 'normal');;
				//заблокировать редактирование "припуска"
				name.siblings('td').find('.pripusk').attr("disabled","disabled").css('background-color', 'gray');
									//изменить название текущей позиции
								name.text(s);
									//проверка если нет облицовок, то заменить примечание на "1,2,3,0,4", иначе на "1,2,0,4"	
								if(L1_obl.length==0 && L2_obl.length==0 && W1_obl.length==0 && W2_obl.length==0){primechanie='1,2,4';}else{primechanie='1,2,3,4';}
								name.siblings('td').find('.primechanie').val(primechanie);
									//закрыть всплывающее диалоговое окно
								jQuery(this).dialog("close");jQuery('body').css("overflow","visible");
				
						//alert('выбрана Ф2 '); 
																				break;
//******************************* обработка выбора буквы "ФФ" **************************************************************\\
				case s.match(/[Фф]{2}/g) !=null && s.match(/[Фф]{1}[2]{1}/g) == null :				
													// удалить класс allocation_td из строки
												tr.removeClass('allocation_td');
											//Обновить значения "L"	
												name.siblings('.L').text(parseFloat(L)+parseFloat(pripusk));
											//Обновить значения "W"
												name.siblings('.W').text(parseFloat(W)+parseFloat(pripusk));
											//изменить название текущей позиции
												name.text(s);
		// alert(pozicia);
	processing_type_ff (tr, s, pripusk, racpil, str_L, str_W);
			
						//alert('выбрана ФФ '+tr.html()); 
															//закрыть всплывающее диалоговое окно
								jQuery(this).dialog("close");jQuery('body').css("overflow","visible");
																				break;
//******************************* обработка выбора буквы "К" **************************************************************\\
				case s.match(/[Кк]/g)!=null : 
												// удалить класс allocation_td из строки
												tr.removeClass('allocation_td');
											//Обновить значения "L"	
												name.siblings('.L').text(parseFloat(L)+parseFloat(pripusk));
											//Обновить значения "W"
												name.siblings('.W').text(parseFloat(W)+parseFloat(pripusk));
											//изменить название текущей позиции
												name.text(s);
											//проверка если нет облицовок, то заменить примечание на "0,9,1,2,4", иначе на "0,9,1,2,3,4"	
													if(L1_obl.length==0 && L2_obl.length==0 && W1_obl.length==0 && W2_obl.length==0){primechanie='9,1,2,4';}else{primechanie='9,1,2,3,4';}
												name.siblings('td').find('.primechanie').val(primechanie);
												jQuery(this).dialog("close");jQuery('body').css("overflow","visible");
													//	alert('выбрана К  '); 
																								break;
//******************************* обработка выбора буквы "П" **************************************************************\\
				case s.match(/[Пп]/g)!=null : 
												// удалить класс allocation_td из строки
												tr.removeClass('allocation_td');	
											//Обновить значения "L"	
												name.siblings('.L').text(parseFloat(L)+parseFloat(pripusk));
											//Обновить значения "W"
												name.siblings('.W').text(parseFloat(W)+parseFloat(pripusk));
											//изменить название текущей позиции
												name.text(s);
											//проверка если нет облицовок, то заменить примечание на "0,9,1,2,4", иначе на "0,9,1,2,3,4"	
													if(L1_obl.length==0 && L2_obl.length==0 && W1_obl.length==0 && W2_obl.length==0){primechanie='1,9,2,4';}else{primechanie='1,9,2,3,4';}
												name.siblings('td').find('.primechanie').val(primechanie);
												jQuery(this).dialog("close");jQuery('body').css("overflow","visible");
															//alert('выбрана П  '); 
															break;
//******************************* обработка выбора буквы "Ш" **************************************************************\\
				case s.match(/[Шш]/g)!=null :  
												// удалить класс allocation_td из строки
												tr.removeClass('allocation_td');	
											//Обновить значения "L"	
												name.siblings('.L').text(parseFloat(L)+parseFloat(pripusk));
											//Обновить значения "W"
												name.siblings('.W').text(parseFloat(W)+parseFloat(pripusk));
											//изменить название текущей позиции
												name.text(s);
											//проверка если нет облицовок, то заменить примечание на "0,1,9,2,4", иначе на "0,1,9,2,3,4"	
													if(L1_obl.length==0 && L2_obl.length==0 && W1_obl.length==0 && W2_obl.length==0){primechanie='1,9,2,4';}else{primechanie='1,9,2,3,4';}
												name.siblings('td').find('.primechanie').val(primechanie);
												jQuery(this).dialog("close");jQuery('body').css("overflow","visible");
												//alert('выбрана Ш  '); 
												break;
//******************************* обработка выбора буквы "Т" **************************************************************\\
				case s.match(/[Тт]/g)!=null :	 
												// удалить класс allocation_td из строки
												tr.removeClass('allocation_td');	
											//Обновить значения "L"	
												name.siblings('.L').text(parseFloat(L)+parseFloat(pripusk));
											//Обновить значения "W"
												name.siblings('.W').text(parseFloat(W)+parseFloat(pripusk));
											//изменить название текущей позиции
												name.text(s);
											//проверка если нет облицовок, то заменить примечание на "0,1,2,9,4", иначе на "0,1,2,9,3,4"	
													if(L1_obl.length==0 && L2_obl.length==0 && W1_obl.length==0 && W2_obl.length==0){primechanie='1,2,9,4';}else{primechanie='1,2,9,3,4';}
												name.siblings('td').find('.primechanie').val(primechanie);	
												jQuery(this).dialog("close");jQuery('body').css("overflow","visible");
												//alert('выбрана Т  ');
												break;
				default: 
//******************************* обработка выбора пустого значения **************************************************************\\
						//alert(s+"нечего не выбрано"+primechanie);
						name.siblings('.L').text(parseFloat(L)+parseFloat(pripusk));
						name.siblings('.W').text(parseFloat(W)+parseFloat(pripusk));
						name.text(s);
					//проверка если нет облицовок, то заменить примечание на "1,2,4", иначе на "1,2,3,4"	
						if(L1_obl.length==0 && L2_obl.length==0 && W1_obl.length==0 && W2_obl.length==0){primechanie='1,2,4';}else{primechanie='1,2,3,4';}
						name.siblings('td').find('.primechanie').val(primechanie)
						break;
							}		//************конец проверки********

				
				},Отмена: function(){/*location.reload();*/jQuery(this).dialog("close");jQuery('body').css("overflow","visible");}}});
				jQuery("#ui-dialog-title-dialog-message").html('Выбрана позиция: № <font style="color:red;">'+txt+'</font>');	//титул блока сообщения
				jQuery(".ui-dialog-titlebar-close").remove();//убрать X для закрытия блока сообщении

						});		//конец функции изменения названия позиции


var pripusk_v_procent, kol_vo_metr, sum=0,pozicia,L,W,pripusk,sum_L=0,sum_W=0;

//скрипт обработки найденых облицовок в % припусков
jQuery('table#find_oblicovki').find('tr').each(function(i,e){
if(jQuery(e).find('.pripusk_v_procent').val() != null && jQuery(e).find('.kol_vo_metr').text() != null){
kol_vo_metr = parseFloat(jQuery(e).find('.kol_vo_metr').attr('id'));
pripusk_v_procent = jQuery(e).find('.pripusk_v_procent').val();
sum = kol_vo_metr*(parseFloat(pripusk_v_procent)/100+1);
jQuery(e).find('.kol_vo_metr').text(sum.toFixed(1));
}
});

//скрипт обработки найденых облицовок по изменению % припуска
$(".pripusk_v_procent").blur(function(){
kol_vo_metr= parseFloat($(this).closest('tr').find('.kol_vo_metr').attr('id'));
pripusk_v_procent= $(this).closest('tr').find('.pripusk_v_procent').val();
sum = kol_vo_metr*(parseFloat(pripusk_v_procent)/100+1);
rr = $(this).closest('tr').find('.kol_vo_metr').attr('id');
if(sum.toFixed(0)!=rr || pripusk_v_procent!='12'){
$(this).closest('tr').find('.kol_vo_metr').text(sum.toFixed(1));
}
});

function firstRequest() {
	
//скрипт обработки всех позиций
jQuery('table#find_obrob_fil').find('tr').each(function(i,e){
	var str;
poz = jQuery(e).find('.pozicia');
pozicia = jQuery(e).find('.pozicia').text();
L = jQuery(e).find('.L').attr('id');
W = jQuery(e).find('.W').attr('id');
L_1 = jQuery(e).find('.L_1').attr('id');
W_1 = jQuery(e).find('.W_1').attr('id');
pripusk = jQuery(e).find('.pripusk').val();

if(pozicia.length != 0 && pozicia.match(/[Чч]/g) == null && pozicia.match(/[Фф]/g) == null){
sum_L=parseFloat(L)+parseFloat(pripusk);
sum_W=parseFloat(W)+parseFloat(pripusk);
jQuery(e).find('.L').text(sum_L);
jQuery(e).find('.W').text(sum_W);
}
// без обработки
if(pozicia.match(/[Тт]/g) == null && pozicia.match(/[Кк]/g) == null && pozicia.match(/[Чч]/g) == null && pozicia.match(/[Фф]/g) == null && pozicia.match(/[фФ]{1}[2]{1}/g)==null){
	if(L < 150 || W < 150){
		jQuery(e).addClass('allocation_td');
//	str = 'Позиция = '+pozicia+' ';
	//alert('asd'+str);
}
}

//							#Ч
if(pozicia.match(/[Чч]/g) != null){
	// alert('Ч='+pozicia);
//jQuery(e).find('.L').text('Чистовые').attr("colspan","2").css({"background-color":"#5B6B77","color":"white","font-weight":"bold","text-align" : "center"});
jQuery(e).find('.L').text('Чистовые').attr("colspan","2").addClass('chistovii');
jQuery(e).find('.W').addClass('vid');

//отключить input припуска
jQuery(e).find('.pripusk').attr("disabled","disabled").css('background-color', 'gray');
}

//							#Ф
if(pozicia.match(/[Фф]/g) != null && pozicia.match(/[фФ]{1}[2]{1}/g) == null  && pozicia.match(/[Фф]{2}/g) == null){
	// alert('Ф='+pozicia);
//определить величину минимальной заготовки
sm_pr=str_L+parseFloat(pripusk);
sum_L=parseFloat(L)+parseFloat(pripusk);
sum_W=parseFloat(W)+parseFloat(pripusk);
// alert(sum_L);
//определение наименьшей Длины-L или Ширины-W
switch(true){
case sum_L>=sm_pr && sum_W>=sm_pr : 
					//проверка если L или W <300
					switch(true){
					case sum_L<sum_W: /*alert('1=L<W'); */	if(sum_W<str_W){	sum_W=W+'/'+(str_W+parseFloat(pripusk));		sum_W_1=W_1+'/'+str_W;	}else{	sum_W=parseFloat(W)+parseFloat(pripusk);	sum_W_1=W_1;	}	sum_L_1=L_1;	sum_L=parseFloat(L)+parseFloat(pripusk);	break;
					case sum_L>sum_W: /*alert('2=L>W'); */	if(sum_L<str_W){	sum_L=L+'/'+(str_W+parseFloat(pripusk));		sum_L_1=L_1+'/'+str_W;	}else{	sum_L=parseFloat(L)+parseFloat(pripusk);	sum_L_1=L_1;	}	sum_W_1=W_1;	sum_W=parseFloat(W)+parseFloat(pripusk);	break;
					case sum_L==sum_W: /*alert('3=L==W');*/ if(sum_W<str_W){	sum_W=W+'/'+(str_W+parseFloat(pripusk));		sum_W_1=W_1+'/'+str_W;	}else{	sum_W=parseFloat(L)+parseFloat(pripusk);	sum_W_1=W_1;	}	sum_L_1=L_1;	sum_L=parseFloat(L)+parseFloat(pripusk); 	break;
								}
//alert(sum_L+'=sum_L '+sum_W+'=sum_W '+sum_L_1+'=sum_L_1');			
jQuery(e).find('.L').text(sum_L).css("font-weight","bold");
jQuery(e).find('.W').text(sum_W).css("font-weight","bold");
jQuery(e).find('.L_1').text(sum_L_1).css("font-weight","bold");
jQuery(e).find('.W_1').text(sum_W_1).css("font-weight","bold");
//alert("L>158&&W>158");
break;

case sum_L<=sm_pr && sum_W<=sm_pr :
					//alert("L<158&&W<158");
					//проверка если L или W <300
					switch(true){
					case sum_L<sum_W: /*alert('1=L<W');*/ 	sum_W=W+'/'+(str_W+parseFloat(pripusk));	sum_L=L+'/'+(parseFloat(str_L)+parseFloat(pripusk));		sum_W_1=W_1+'/'+str_W;		sum_L_1=L_1+'/'+str_L;	break;
					case sum_L>sum_W: /*alert('2=L>W');*/	sum_L=L+'/'+(str_W+parseFloat(pripusk));	sum_W=W+'/'+(parseFloat(str_L)+parseFloat(pripusk));		sum_L_1=L_1+'/'+str_W;		sum_W_1=W_1+'/'+str_L; 	break;
					case sum_L==sum_W: /*alert('3=L==W');*/ sum_W=W+'/'+(str_W+parseFloat(pripusk));	sum_L=L+'/'+(parseFloat(str_L)+parseFloat(pripusk));		sum_W_1=W_1+'/'+str_W;		sum_L_1=L_1+'/'+str_L; 	break;
								}
					//alert(sum_L+'=sum_L '+sum_W+'=sum_W '+sum_L_1+'=sum_L_1');
				jQuery(e).find('.L').text(sum_L).css("font-weight","bold");
				jQuery(e).find('.W').text(sum_W).css("font-weight","bold");
				jQuery(e).find('.L_1').text(sum_L_1).css("font-weight","bold");
				jQuery(e).find('.W_1').text(sum_W_1).css("font-weight","bold");
 break;
case sum_L>=sm_pr && sum_W<=sm_pr : 
								//alert("L>158&&W<158");
									//проверка, если Длина-L < 300-str_W
							if(sum_L<str_W){
								//L<300
			sum_L=L+'/'+(str_W+parseFloat(pripusk));
			jQuery(e).find('.L_1').text(L_1+'/'+(str_W)).css("font-weight","bold");
												}
jQuery(e).find('.L').text(sum_L).css("font-weight","bold");
jQuery(e).find('.W').text(W+'/'+sm_pr).css("font-weight","bold");
jQuery(e).find('.W_1').text(W+'/'+(sm_pr-parseFloat(pripusk))).css("font-weight","bold");									

break;

case sum_L<=sm_pr && sum_W>=sm_pr :
					//проверка, если Ширина-W < 300-str_W
				if(sum_W<str_W){
					//W<300
			sum_W=W+'/'+(str_W+parseFloat(pripusk));
			jQuery(e).find('.W_1').text(W_1+'/'+(str_W)).css("font-weight","bold");
								}
					//alert("L<158&&W>158");
jQuery(e).find('.L').text(L+'/'+sm_pr).css("font-weight","bold");
jQuery(e).find('.L_1').text(L+'/'+(sm_pr-parseFloat(pripusk))).css("font-weight","bold");
jQuery(e).find('.W').text(sum_W).css("font-weight","bold");

 break;
						}			}

//							#Ф2

if(pozicia.match(/[фФ]{1}[2]{1}/g) !=null && pozicia.match(/[фФ]{1}[фФ]{1}/g)==null  && pozicia.match(/[Фф]{2}/g) == null){
// alert('Ф2='+pozicia);
//отключить input припуска
jQuery(this).find('.pripusk').attr("disabled","disabled").css('background-color', 'gray');
var sm_pr=0;
jQuery(e).find('.L').text(parseFloat(L)+parseFloat(pripusk)).css("font-weight","bold");
jQuery(e).find('.W').text(parseFloat(W)+parseFloat(pripusk)).css("font-weight","bold");
}

//							#ФФ

if(pozicia.match(/[Фф]{2}/g) != null && pozicia.match(/[фФ]{1}[2]{1}/g) == null && pozicia.match(/[Фф]/g).length == 2){
// alert(poz.parent().html());
tr = poz.parent();
name_poz = pozicia.substr(0, pozicia.length - 2);
// poz.text(name_poz);
//отключить input припуска
jQuery(this).find('.pripusk').attr("disabled","disabled").css('background-color', 'gray');
var sm_pr=0;
// сперва получаем позицию элемента относительно документа
// var scrollTop = $(this).offset().top;
// jQuery(document).scrollTop(scrollTop-100);
// jQuery(this).addClass('select_change_tr');
// alert('as');
 // processing_type_ff (tr, pozicia, pripusk, racpil, str_L, str_W);

// jQuery(e).find('.L').text(parseFloat(L)+parseFloat(pripusk)).css("font-weight","bold");
// jQuery(e).find('.W').text(parseFloat(W)+parseFloat(pripusk)).css("font-weight","bold");
}


});
}
firstRequest();
//скрипт обработки позиций по выбранному и измененному припуску
$(".pripusk").blur(function(){
var pripusk=0,L=0,W=0,L_0=0,W_0=0,sum_L=0,sum_W=0,pozicia=0;
pripusk = $(this).val();
pozicia = $(this).closest('tr.ss').find('.pozicia').text();
L = $(this).closest('tr.ss').find('.L').attr('id');
W = $(this).closest('tr.ss').find('.W').attr('id');
L_0 = $(this).closest('tr.ss').find('.L').text();
W_0 = $(this).closest('tr.ss').find('.W').text();
L_1 = $(this).closest('tr.ss').find('.L_1').attr('id');
W_1 = $(this).closest('tr.ss').find('.W_1').attr('id');
sum_L=parseFloat(L)+parseFloat(pripusk);
sum_W=parseFloat(W)+parseFloat(pripusk);
//заблокировать изменения припуска у чистовых изделиях
//if(L_1=='Чистовые'){jQuery(this).attr("disabled","disabled");}
if(sum_L != L_0 && sum_W != W_0 && L_0 != "Чистовые"){
switch(true){
/*
//если Ч
		case pozicia.match(/[Чч]/g) != null:
				$(this).closest('tr.ss').find('.L').text('Чистовые').attr("colspan","2").css({"background-color":"#5B6B77","color":"white","font-weight":"bold","text-align" : "center"});
				$(this).closest('tr.ss').find('.W').addClass('vid');
		break;//конец Ч
	*/
//если ф
		case pozicia.match(/[Фф]/g) != null && pozicia.match(/[фФ]{1}[2]{1}/g) == null:
			sm_pr=str_L+parseFloat(pripusk);
			//alert(sum_L+'='+sm_pr);
				switch(true){
					case sum_L>=sm_pr && sum_W>=sm_pr : 
				$(this).closest('tr.ss').find('.L').text(sum_L).css("font-weight","bold");
				$(this).closest('tr.ss').find('.W').text(sum_W).css("font-weight","bold");
						break;
					case sum_L<=sm_pr && sum_W<=sm_pr :
				//$(this).closest('tr.ss').find('.L').text('Чистовые').attr("colspan","2").css({"background-color":"#5B6B77","color":"white","font-weight":"bold","text-align" : "center"});
				$(this).closest('tr.ss').find('.L').text('Чистовые').attr("colspan","2").addClass('chistovii');
				$(this).closest('tr.ss').find('.W').addClass('vid');
						break;
					case sum_L>=sm_pr && sum_W<=sm_pr : 
				$(this).closest('tr.ss').find('.L').text(sum_L).css("font-weight","bold");
				$(this).closest('tr.ss').find('.W').text(W+'/'+sm_pr).css("font-weight","bold");
				$(this).find('.W_1').text(W+'/'+(sm_pr-parseFloat(pripusk))).css("font-weight","bold");
						break;
					case sum_L<=sm_pr && sum_W>=sm_pr :
				$(this).closest('tr.ss').find('.L').text(L+'/'+sm_pr).css("font-weight","bold");
				$(this).closest('tr.ss').find('.W').text(sum_W).css("font-weight","bold");
				$(this).find('.L_1').text(W+'/'+(sm_pr-parseFloat(pripusk))).css("font-weight","bold");
						break;
								}
		break;//конец ф
		/*
//если ф2		
		case pozicia.match(/[фФ]{1}[2]{1}/g) != null:
	sm_pr=151;//обгон детали (overtaking details)
	racpil=4;//распил детали (the cut parts)
		var L_1=$(this).closest('tr.ss').find('.L_1').attr('id'), 
			W_1=$(this).closest('tr.ss').find('.W_1').attr('id'), 
			sum_L_1=parseFloat(L_1), 
			sum_W_1=parseFloat(W_1),
			sum_L_1=String(sum_L_1),
			sum_W_1=String(sum_W_1);
					//подставить в L_1 и в W_1 вместо "." на ","
					//if(sum_L_1.match(/[.]/g) == '.' || sum_W_1.match(/[.]/g) == '.'){if(sum_L_1.match(/[.]/g)=='.'){sum_L_1=sum_L_1.replace('.',',');}if(sum_W_1.match(/[.]/g)=='.'){sum_W_1=sum_W_1.replace('.',',');}}
			switch(true){
			
//L>150 && W>150
					case L>=str_L && W>=str_L : 
					//проверка если L или W <300
					switch(true){
					case L<W: alert('L<W'); 	if(W<str_W){	sum_W=W+'/'+(str_W+parseFloat(pripusk));	sum_W_1=W_1+'/'+str_W;}		sum_L_1=parseFloat(sum_L_1)+parseFloat(racpil);		sum_L=parseFloat(L)+parseFloat(pripusk)+parseFloat(racpil);	break;
					case L>W: alert('L>W'); 	if(L<str_W){	sum_L=L+'/'+(str_W+parseFloat(pripusk));	sum_L_1=L_1+'/'+str_W;} 	sum_W_1=parseFloat(sum_W_1)+parseFloat(racpil);		sum_W=parseFloat(W)+parseFloat(pripusk)+parseFloat(racpil);	break;
					case L==W: alert('L==W'); 	if(W<str_W){	sum_W=W+'/'+(str_W+parseFloat(pripusk));	sum_W_1=W_1+'/'+str_W;} 	sum_L_1=parseFloat(sum_L_1)+parseFloat(racpil);		sum_L=parseFloat(L)+parseFloat(pripusk)+parseFloat(racpil); break;
									}
				$(this).closest('tr.ss').find('.L').text(sum_L).css("font-weight","bold");			//L
				$(this).closest('tr.ss').find('.W').text(sum_W).css("font-weight","bold");			//W
				$(this).closest('tr.ss').find('.L_1').text(sum_L_1).css("font-weight","bold");		//L_1
				$(this).closest('tr.ss').find('.W_1').text(sum_W_1).css("font-weight","bold");		//W_1
						break;
//L<150 && W<150
					case L<=str_L && W<=str_L:
						switch(true){
					case L<W: 	sum_W=W+'/'+(str_W+parseFloat(pripusk)+racpil);	sum_L=L+'/'+(str_L+parseFloat(pripusk));	sum_W_1=W_1+'/'+(str_W+racpil);	sum_L_1=L_1+'/'+str_L;	break;
					case L>W: 	sum_L=L+'/'+(str_W+parseFloat(pripusk)+racpil);	sum_W=W+'/'+(str_L+parseFloat(pripusk));	sum_L_1=L_1+'/'+(str_W+racpil);	sum_W_1=W_1+'/'+str_L;	break;
					case L==W: 	sum_W=W+'/'+(str_W+parseFloat(pripusk)+racpil);	sum_L=L+'/'+(str_L+parseFloat(pripusk));	sum_W_1=W_1+'/'+(str_W+racpil);	sum_L_1=L_1+'/'+str_L; 	break;
									}
				$(this).closest('tr.ss').find('.L').text(sum_L).css("font-weight","bold");			//L
				$(this).closest('tr.ss').find('.W').text(sum_W).css("font-weight","bold");			//W
				$(this).closest('tr.ss').find('.L_1').text(sum_L_1).css("font-weight","bold");		//L_1
				$(this).closest('tr.ss').find('.W_1').text(sum_W_1).css("font-weight","bold");		//W_1
						break;
//L>150 && W<150
					case L>=str_L && W<=str_L : 
					//просчет по формуле если W<150
					sm_pr=parseFloat(W)*2+4+parseFloat(pripusk);
					//просчет L(Длина)+припуск+распил
					//sum_L=sum_L+racpil;
					sum_L_1=sum_L_1-racpil;
					if(sm_pr<=158){ sm_pr=158; }
					if(sm_pr>158 && sm_pr<209){ sm_pr=208; }
					if(sm_pr>208){	
					$(this).closest('tr.ss').find('.W').text(sm_pr).css("font-weight","bold");		
					$(this).closest('tr.ss').find('.W_1').text(sum_W_1).css("font-weight","bold");
					}else{	
					$(this).closest('tr.ss').find('.W').text(W+'/'+sm_pr).css("font-weight","bold");	
					$(this).closest('tr.ss').find('.W_1').text(W_1+'/'+(parseFloat(sm_pr)-parseFloat(pripusk))).css("font-weight","bold");
					}
					if(sum_L<str_W){sum_L=L+'/'+(str_W+parseFloat(pripusk));}
					if(sum_L_1<str_W){sum_L_1=L_1+'/'+str_W;}
				$(this).closest('tr.ss').find('.L').text(sum_L).css("font-weight","bold");
				$(this).closest('tr.ss').find('.L_1').text(sum_L_1).css("font-weight","bold");
							break;
//L<150 && W>150
					case L<=str_L && W>=str_L :
					//просчет по формуле если L<150
					sm_pr=parseFloat(L)*2+4+parseFloat(pripusk);
					//просчет W(Ширина)+припуск+распил
					sum_W=sum_W+racpil;
					//если значени L <=158 округлить до 158
					if(sm_pr<=158){ sm_pr=158;}
					//если значени L <=208 & L>=158 округлить до 208
					if(sm_pr>158 && sm_pr<209){ sm_pr=208;}
					//если значени L >208 оставить как есть
					if(sm_pr>208){
					$(this).closest('tr.ss').find('.L').text(sm_pr).css("font-weight","bold");	
					$(this).closest('tr.ss').find('.L_1').text(sum_L_1).css("font-weight","bold");		
					}else{
					$(this).closest('tr.ss').find('.L').text(L+'/'+sm_pr).css("font-weight","bold");			
					$(this).closest('tr.ss').find('.L_1').text(L_1+'/'+(parseFloat(sm_pr)-parseFloat(pripusk))).css("font-weight","bold");
					}
					//если W < 300
					if(sum_W<str_W){sum_W=W+'/'+(str_W+parseFloat(pripusk)+racpil);}
					//если W_1 < 300
					if(sum_W_1<str_W){sum_W_1=W_1+'/'+(str_W+racpil);}else{sum_W_1=parseFloat(W_1)+racpil;}
					//W
				$(this).closest('tr.ss').find('.W').text(sum_W).css("font-weight","bold");
					//W_1
				$(this).closest('tr.ss').find('.W_1').text(sum_W_1).css("font-weight","bold");
						break;
								}
		break;//конец ф2
*/
	//проверка остальных "позиции" (verification of other "position")	
				default: 
			$(this).closest('tr.ss').find('.L').text(sum_L).css("font-weight","bold");
			$(this).closest('tr.ss').find('.W').text(sum_W).css("font-weight","bold");
					break;
			}	
		}
		});
		
//обработка search с функцией автозаполнения
  $(".search").autocomplete("include/search.php", {
    delay:10,
    minChars:2,
    matchSubset:1,
    autoFill:false,
    matchContains:1,
    cacheLength:0,
    selectFirst:false,
    formatItem:liFormat,
    maxItemsToShow:10,
    onItemSelect:selectItem
  });

//обработка ФИО Руководителя, ФИО Конструктора(name_autor) проекта-name_rp с функцией автозаполнения
  $(".find_name").autocomplete("include/search_name.php", {
    delay:10,
    minChars:2,
    matchSubset:1,
    autoFill:false,
    matchContains:1,
    cacheLength:0,
    selectFirst:false,
    formatItem:liFormat,
    maxItemsToShow:10,
    onItemSelect:selectItem
  });

//обработка ФИО Сборщика-vbr с функцией автозаполнения
  $("#vbr").autocomplete("include/search_name.php",{
    delay:10,
    minChars:2,
    matchSubset:1,
    autoFill:false,
    matchContains:1,
    cacheLength:0,
    selectFirst:false,
    formatItem:liFormat,
    maxItemsToShow:10,
    onItemSelect:selectItem
  });
  
//вывод результата в блок liFormat
function liFormat (row, i, num) {
	var result = '<p class=qnt>' + row[0] + '</p>';
	return result;
}
//добавление выбранного результата в this input
function selectItem(li) {
	if( li == null ) var sValue = 'А ничего не выбрано!';
	if( !!li.extra ) var sValue = li.extra[2];
	else var sValue = li.selectValue;
	alert("Выбрана запись с ID: " + sValue);
}
//если input пуст при потери фокуса добавить Title=Поиск...
	$(".search").focusout(function(){
		if($(this).val()=='') $(this).val('Поиск...');
	});
//если input в фокусе то удалить Title=Поиск... и сделать пустым
	$(".search").focusin(function(){
		if($(this).val()=='Поиск...') $(this).val('');
	});
					
									});
</script>
<?php


				if(!empty($_FILES['file']['tmp_name']))
				{
$type = $_FILES['file']['type'];
$file = $_FILES['file']['tmp_name'];
$filename = $_FILES['file']['name'];
					//1 Mb
					$maxSize = 3 * 1024 * 1024;
					//проверка правильного выбранного формата ".txt" файла
					if(!preg_match("/.txt/i", $filename) && $type!="text/plain") die('<div style="position: absolute;text-align: center;float: left; top: 35%;left: 25%;">
					<h2>Данный тип файла не поддерживается!</h2>
					<br>
					<nav>
					<ul  style="text-align: left;">
					Решение:<br>
					<li>Проверить загруженный документ;</li>
					<li>Выберите документ с разрешением ".txt".</li>
					</ul>
					</nav>
					</div> 
					');
					if($maxSize < $_FILES['file']['size']) die('<div style="position: absolute;text-align: center;float: left; top: 35%;left: 25%;">
					<h2>Превышен размер файла, max размер 2 M.</h2>
					<br>
					<nav>
					<ul  style="text-align: left;">
					Решение:<br>
					<li>Уменьшите размер выбранного документа;</li>
					<li>Проверьте настройки выгрузки спецификации с базиса 7.0</li>
					</ul>
					</nav>
					</div>');
					//обработка полученного файла
					$lines = file($file);
					//проверка на существование шапки согласно выгруженному шаблону из Базис Мебельщик 7.0
					if(strlen($lines[3]) != 147 && strlen($lines[4]) != 55)
					die('<div style="position: absolute;text-align: center;float: left; top: 35%;left: 25%;"><h2>Документ не подходит по шаблону выгрузки с Базис 7.0</h2>
					<br>
					<nav>
					<ul  style="text-align: left;">
					Решение:<br>
					<li>Проверьте правильность выбранного документа;</li>
					<li>Проверьте настройки выгрузки спецификации с Базиса 7.0.</li>
					</ul>
					</nav>
					</div>');
					//вывод таблицы с ФИО Р/П,Автора,Сборщика и видом работ
					echo '<table class=tabb align=center border=0 CellPadding="0" CellSpacing="3"><tr class="shapka1"><td>ФИО Рук-ля проекта:</td><td>ФИО Конструктора:</td></tr><tr><td><input id="name_rp" class="find_name" onmouseover="tooltip.show(\'<center>Введите ФИО Руководителя проекта</center>\');" onmouseout="tooltip.hide();" autocomplete="off"/></td><td><input id="name_autor" class="find_name" onmouseover="tooltip.show(\'<center>Введите ФИО Автора</center>\');" onmouseout="tooltip.hide();" autocomplete="off"/></td></tr><tr><td colspan=2 align=center class="shapka1">Выберите вид работ:</td></tr><tr><td colspan=2 align=center>		P<input type="checkbox" id="vib_P" onmouseover="tooltip.show(\'<center>Данный пункт обозначает выдачу документов для Раскройного цеха</center>\');" onmouseout="tooltip.hide();"		style="cursor:pointer;"/>	  ЧПУ<input type="checkbox" id="vib_4py" onmouseover="tooltip.show(\'<center>Данный пункт обозначает выдачу документов для ЧПУ</center>\');" onmouseout="tooltip.hide();"	style="cursor:pointer;"/>		К<input type="checkbox" id="vib_K" 	onmouseover="tooltip.show(\'<center>Данный пункт обозначает выдачу документов для Кромочного цеха</center>\');" onmouseout="tooltip.hide();"	style="cursor:pointer;"/>	   Сб<input type="checkbox" id="vib_C" 	onmouseover="tooltip.show(\'<center>Данный пункт обозначает выдачу документов для отдела Сборки</center>\');" onmouseout="tooltip.hide();"	style="cursor:pointer;"/>		М<input type="checkbox" id="vib_M" 	onmouseover="tooltip.show(\'<center>Данный пункт обозначает выдачу документов для Металлообработки</center>\');" onmouseout="tooltip.hide();"	style="cursor:pointer;"/>		А<input type="checkbox" id="vib_A" 	onmouseover="tooltip.show(\'<center>Данный пункт обозначает выдачу документов для обработки Алюминия	</center>\');" onmouseout="tooltip.hide();"	style="cursor:pointer;"/>		<img src="img/print.gif" border="0" id="print" onClick="printit();" style="position: relative;float: left;top: 2px;left: 300px;cursor: pointer;" onmouseover="tooltip.show(\'<center>Кнопка отправки спецификации на печать, согласно установленному шаблону фабрики</center>\');" onmouseout="tooltip.hide();"/><div class="dowload_raskroi" style="position: relative;float: left;top: 2px;left: 330;cursor:pointer;" onmouseover="tooltip.show(\'<center>Используется в выгрузки материалов для раскроя!</center>\');" onmouseout="tooltip.hide();"></div>	<br><input type="text" id="vbr" onfocus="this.style.background=\'#FFF0C6\'" autocomplete="off" class="vid" required disabled />	</td></tr></table>';
					//запись шапки таблицы в переменную $shapka_tabl
					$shapka_tabl = '<tr class="shapka1"><td>Поз</td><td>Наименование</td><td>Кол-во</td><td colspan=2 align =center>Заготовка</td><td colspan=2 align=center>Деталь без облиц.</td><td colspan=2 align =center>Готовая деталь</td><td>Паз</td><td>Облицовка[L1]</td><td>Облицовка[L2]</td><td>Облицовка[W1]</td><td>Облицовка[W2]</td><td>Примечание</td><td>Припуск</td></tr><tr><td colspan=3></td><td class="shapka2">Длина[L]</td><td class="shapka2">Ширина[W]</td><td class="shapka2">Длина</td><td class="shapka2">Ширина</td><td class="shapka2">Длина</td><td class="shapka2">Ширина</td><td colspan=7></td></tr>';
							//вывод таблицы
					echo '<table border = 1 id="find_obrob_fil" CellPadding="0" CellSpacing="1" class=tabb>';
					//echo 'кол-во строк: '.count($lines).'<br>';
					//echo 'кол-во столбцов: '.count(explode("\t", $lines[3])).'<br>';
				foreach($lines as $id => $val){
							//создание нового массива, обработка колонок таблицы разделенными "\t"
							$line_spisok=explode("\t", iconv("cp1251", "utf-8",$lines[$id]));
							//обрезать значение строчки до 3 символов
							$pol = mb_substr(iconv("cp1251", "utf-8",$lines[$id]),0,3,"UTF-8");
//					die($pol);
							//Вывод "Материала"
								if($pol=='Поз' || $pol=='Поз.'){echo '<tr class="shapka_for_material"><td colspan=3>Материал: </td><td colspan=13 align =left><font class="material" style="cursor:pointer;" onmouseover="this.color=\'red\';tooltip.show(\'<center>Нажмите на название материала, чтоб его изменить</center>\');" onmouseout="this.color=\'white\';tooltip.hide();">'.iconv("cp1251", "utf-8",$lines[$id-1]).'</font><div class="obnie" style="position: relative;float: left;top: 0px;left: 895px;cursor:pointer;" onmouseover="tooltip.show(\'<center>Используется для объединения сдвоенных деталей</center>\');" onmouseout="tooltip.hide();"></div><input type="checkbox" checked="checked" style="position: relative;float: left;top: 2px;left: 895px;cursor:pointer;" class="vibor_print" onmouseover="tooltip.show(\'<center>Выбор материала для вывода на печать или раскрой</center>\');" onmouseout="tooltip.hide();"/></td></tr>';}
							//вывод шапки таблицы
								if(in_array("Поз", $line_spisok) || in_array("Поз.", $line_spisok)){echo ''.$shapka_tabl;}
switch ($id){
			//Позиция
			case 0:
			//вывод "Заказа"
				echo '<tr><td class="shapka1">'.$line_spisok[0].'</td><td class="zakaz" id="zakaz" colspan=15>'.$line_spisok[1].'</td></tr>';
			break;
			case 1:
			//вывод "Изделия"
				echo '<tr><td class="shapka1">'.$line_spisok[0].'</td>
				<td class="izdelie" id="izdelie" colspan=8>'.$line_spisok[1].'</td>
				<td id="artikul" colspan=7  onmouseover="tooltip.show(\'<center>Используется для добавления артикула к изделию, если длина его названия привышает ширину строки в раскрое!</center>\');" onmouseout="tooltip.hide();">Нажмите для добавления Артикул для раскроя...</td>
				</tr>';
			break;
			}
//условие проверки есть ли в массиве "Поз" и "Длина" и колличество столбцов >=4
switch (count($line_spisok)>=4 && !in_array("Поз", $line_spisok) && !in_array("Поз.", $line_spisok) && !in_array("Длина", $line_spisok)){
case 1:

echo "<tr class='ss'>";
				//выборка с массива строки таблицы
foreach($line_spisok as $idi => $value){
$pl = preg_match('/[фФ]{1}+[2]{1}|[чкптшфЧКПТШФ]{1}/i', $line_spisok[0], $inf);// [чкптшфЧКПТШФ] регулярка на проверку совпадении:"ч","к","п","т","ш","ф","ф2"
			//обработка строчки в таблице
			switch ($idi){

			//Позиция
			case 0:
				echo '<td class="pozicia" style="cursor:pointer;" onmouseover="this.color=\'red\';tooltip.show(\'<center>Нажмите на название позиции, чтоб добавить к нему букву из установленного шаблона</center>\');" onmouseout="this.color=\'black\';tooltip.hide();">'.$line_spisok[$idi].'</td>';
			break;
			
			//Длина L
			case 3 :
		/*	if($inf[0]=='Ч' || $inf[0]=='ч'){
			echo '<td colspan = 2 align= center class="shapka1"><b>Чистовые</b></td>'; 
			}else{*/
				if (preg_match("/,/i", $value)){ $value = str_replace (',','.',$value); }else{ $value=$value; }
				$number = floatval( $value ); // получить значение с плавающей точкой
//				$number = ceil( $number ); // округление до целого в большую сторону
				$number = round( $number, 1); // округление до целого в большую сторону
				echo '<td class="L" id="'.$number.'">'.$number.'</td>';
			//}
			break;
			
			//Ширина W
			case 4 :
			/*if($inf[0]=='Ч' || $inf[0]=='ч'){
			//echo '<td colspan = 2 align= center class="shapka1"><b>Чистовые</b></td>';
			}else{*/
				if (preg_match("/,/i", $value)){ $value = str_replace (',','.',$value); }else{ $value=$value; }
				$number = floatval(str_replace(',','.', $value)); // Заменить запятую на число и получить значение с плавающей точкой
//				$number = ceil( $number ); // округление до целого в большую сторону
				$number = round( $number, 1); // округление до целого
				echo '<td class="W"  id="'.$number.'">'.$number.'</td>';
			//}
			break;

			//Длина L_1
			case 5 :
			if (preg_match("/,/i", $value)){$vales = str_replace (',','.',$value);}else{$vales=$value;}
			echo '<td class="L_1" id="'.$vales.'">'.$vales.'</td>';
			/*
			switch(true){
			case ($inf[0]=='Ф2' || $inf[0] == 'ф2') : if($value < 100){if (preg_match("/,/i", $value)){$value = str_replace('.',',',str_replace (',','.',$value)*2+4);echo '<td ><b>'.$line_spisok[$idi].'/'.$value.'</b></td>';}else{echo '<td ><b>'.$line_spisok[$idi].'/'.($value*2+4).'</b></td>';}}else{echo '<td ><b>'.$value.'</b></td>';} break;
			case ($inf[0]=='Ф' || $inf[0] == 'ф') : if($value <100){echo '<td ><b>'.$value.'/100</b></td>';}else{echo '<td><b>'.$value.'</b></td>';}  break;
			default: echo '<td>'.$value.'</td>'; break;
			}*/
			/*if($inf[0]=='Ф2' || $inf[0] == 'ф2'){}
			if($inf[0]=='Ф' || $inf[0] == 'ф'){}
			if(($inf[0]==null) || ($inf[0]=='Ч' || $inf[0]=='ч')){echo '<td>'.$value.'</td>';}			*/
			break;

			//Ширина W_1
			case 6 :
			if (preg_match("/,/i", $value)){$vales = str_replace (',','.',$value);}else{$vales=$value;}
					echo '<td class="W_1" id="'.$vales.'">'.$vales.'</td>';
				/*	switch(true){
			case ($inf[0]=='Ф2' || $inf[0] == 'ф2') : if($value < 100){if (preg_match("/,/i", $value)){$value = str_replace('.',',',str_replace (',','.',$value)*2+4);echo '<td ><b>'.$line_spisok[$idi].'/'.$value.'</b></td>';}else{echo '<td ><b>'.$line_spisok[$idi].'/'.($value*2+4).'</b></td>';}}else{echo '<td ><b>'.$value.'</b></td>';} break;
			case ($inf[0]=='Ф' || $inf[0] == 'ф') : if($value <100){echo '<td ><b>'.$value.'/100</b></td>';}else{echo '<td><b>'.$value.'</b></td>';}  break;
			default: echo '<td>'.$value.'</td>'; break;
			}*/
		/*	if($inf[0]=='Ф2' || $inf[0] == 'ф2'){if($value < 100){if (preg_match("/,/i", $value)){$value = str_replace('.',',',str_replace (',','.',$value)*2+4);echo '<td ><b>'.$line_spisok[$idi].'/'.$value.'</b></td>';}else{echo '<td ><b>'.$line_spisok[$idi].'/'.($value*2+4).'</b></td>';}}else{echo '<td ><b>'.$value.'</b></td>';}}
			if($inf[0]=='Ф' || $inf[0] == 'ф'){if($value <100){echo '<td ><b>'.$value.'/100</b></td>';}else{echo '<td><b>'.$value.'</b></td>';} }
			if(($inf[0]==null) || ($inf[0]=='Ч' || $inf[0]=='ч')){echo '<td>'.$value.'</td>';}*/
			break;

			//Длина L_2
			case 7 :
				if (preg_match("/,/i", $value)){$vales = str_replace (',','.',$value);}else{$vales=$value;}
				echo '<td class="L_2" id="'.$vales.'">'.$vales.'</td>';
			break;

			//Ширина W_2
			case 8 :
				if (preg_match("/,/i", $value)){$vales = str_replace (',','.',$value);}else{$vales=$value;}
				echo '<td class="W_2" id="'.$vales.'">'.$vales.'</td>';
			break;
			
			//L1
			case 10 :
			if(chop($line_spisok[$idi]) != ''){$L1[$id]=chop($line_spisok[$idi]);}
			//$nil
			$sss[]=$id;
			echo '<td class="L1_obl">'.$line_spisok[$idi].'</td>';
			break;
			
			//L2
			case 11 :
			if(chop($line_spisok[$idi]) != ''){$L2[$id]=chop($line_spisok[$idi]);}
			echo '<td class="L2_obl">'.$line_spisok[$idi].'</td>';
			break;
					
			//W1	
			case 12 :
			if(chop($line_spisok[$idi]) != ''){$W1[$id]=chop($line_spisok[$idi]);}
			echo '<td class="W1_obl">'.$line_spisok[$idi].'</td>';
			break;
						
			//W2
			case 13 :
			if(chop($line_spisok[$idi]) != ''){$W2[$id]=chop($line_spisok[$idi]);}
			echo '<td class="W2_obl">'.$line_spisok[$idi].'</td>';
			break;
			
			//столбец примечание
		case 14:
		
		//расстановка значения в "примечание" по указанным буквам в "поз"
		$inform=array('0','1','2','3','4');
		//убрать из массива "3", если нет ни одной облицовки
	if(empty($line_spisok[10]) && empty($line_spisok[11]) && empty($line_spisok[12]) && empty($line_spisok[13])){unset($inform['3']);}
		switch (true){
		//убрать из массива 1,2 если есть буква Ч
		case $inf[0]=='Ч' || $inf[0]=='ч' :  unset($inform['1'],$inform['2']);	 break;
		//убрать из массива 0
		case $inf[0]=='Ф' || $inf[0]=='ф' :  unset($inform['0']);	if($line_spisok[3]>100 && $line_spisok[4]>100){	}else{$inform=implode(",", $inform);if(preg_match("/2,3/i", $inform)){$inform=str_replace ('2,3,','2,3,0,',$inform);}else{$inform=str_replace ('2,','2,0,',$inform);}$inform=explode(",", $inform);}break;
		case $inf[0]=='К' || $inf[0]=='к' :  unset($inform['0']);	$inform=implode(",", $inform);if(preg_match("/0,/i", $inform)){$inform=str_replace ('0,','0,9,',$inform);} $inform=explode(",", $inform);		break;
		case $inf[0]=='П' || $inf[0]=='п' :	 unset($inform['0']);	$inform=implode(",", $inform);if(preg_match("/1,/i", $inform)){$inform=str_replace ('1,','1,9,',$inform);} $inform=explode(",", $inform);		break;
		case $inf[0]=='Т' || $inf[0]=='т' :	 unset($inform['0']);	$inform=implode(",", $inform);if(preg_match("/2,/i", $inform)){$inform=str_replace ('2,','2,9,',$inform);}else{$inform=str_replace ('0,','0,9,',$inform);} $inform=explode(",", $inform);		break;
		case $inf[0]=='Ш' || $inf[0]=='ш' :	 unset($inform['0']);	$inform=implode(",", $inform);if(preg_match("/1,/i", $inform)){$inform=str_replace ('1,','1,9,',$inform);} $inform=explode(",", $inform);		break;
		default:
			unset($inform['0']);
		break;
		}
		$inform=implode(",", $inform);
			echo '<td><input type="text" value="'.$inform.'" class="primechanie" size = "6" onKeyPress ="if (((event.keyCode < 48) || (event.keyCode > 57)) && (event.keyCode != 44)) event.returnValue = false;" onmouseover="tooltip.show(\'<center>Введите технологический процесс изделия согласно цифровым обозначениям на фабрике (через запятую)</center>\');" onmouseout="tooltip.hide();"/></td>';
			echo '<td><input size=2 value="8" class="pripusk" id="8" onKeyPress ="if ((event.keyCode < 48) || (event.keyCode > 57)) event.returnValue = false;" onmouseover="tooltip.show(\'<center>Введите параметр припуска (по умолчанию: 8)</center>\');" onmouseout="tooltip.hide();"/></td>';		  
			echo '<td class="vid"><input type="checkbox" class="obiedin"/></td>';		  
		break;
			//остальные столбцы
			default : 
			echo '<td>'.$value.'</td>';
			break;
									}
													}

break;
echo '</tr>';
}}
//проверка есть ли облицовка в массиве
if(isset($L1) || isset($L2) || isset($W1) || isset($W2)){
	unset($nil,$der);	//очиска массива
$der = array();
 if(isset($L1)){
// $L1=array_values($L1);
 $der=array_merge($der,$L1);
 // echo "L1<br>";
  }
  
  if(isset($L2)){
 //  $L2=array_values($L2);
   $der=array_merge($der,$L2);
 //echo "L2<br>";
  }

  if(isset($W1)){
 // $W1=array_values($W1);
 //echo "W1<br>";
 $der=array_merge($der,$W1);
  }
  
  if(isset($W2)){
 // $W2=array_values($W2);
 //echo "W2<br>";
 $der=array_merge($der,$W2);
  }
  
echo '</table>';

	echo '<br><table border=1 id="find_oblicovki" CellPadding="0" CellSpacing="1" class=tabb>';
	 echo '<tr align=center><td>№</td><td>Облицовка</td><td>Расшифровка</td><td>Кол-во<br>в<br>м.п.</td><td>Припуск в %</td></tr>';
	$y=1;
				foreach(array_unique($der) as $di => $vol){
					unset($sum,$Sr);//очистка переменных
												foreach($lines as $id => $val){
		$line_spisok=explode("\t", iconv("cp1251", "utf-8",$lines[$id]));
								foreach($sss as $i => $vl){
														if($id==$vl){
			foreach($line_spisok as $idi => $v){
		if($idi==2 || $idi==5 || $idi==6 || $idi==10 || $idi==11 || $idi==12 || $idi==13){

		switch($idi){

				//количество
			case 2: 
					$kol=$v;
			break;
			
			//Деталь без облицовки Длина S1
			case 5: 
					$S1=$v;
			break;
			
			//Деталь без облицовки Ширина S2
			case 6: 
					$S2=$v;
			break;
			
			//Облицовка L1
			case 10: 
					if($vol==$v){$L1=1;}else{$L1=0;}
			break;
			
			//Облицовка L2
			case 11:
					if($vol==$v){$L2=1;}else{$L2=0;}
			break;
			
			//Облицовка W1
			case 12: 
					if($vol==$v){$W1=1;}else{$W1=0;}
			break;
			
			//Облицовка W2
			case 13: 
					if($vol==$v){$W2=1;}else{$W2=0;}	
			break;
						}
										}
													}
			//вычисления по формулам										
			$Sr=(($L1*$S1*$kol)/1000)+(($L2*$S1*$kol)/1000)+(($W1*$S2*$kol)/1000)+(($W2*$S2*$kol)/1000);
				$sum=$sum+$Sr;
				//echo $vol."<br>";
				
																	}
																				}
																						}
						//if($vol !='(cмотри чертеж)'){
						echo '<tr align=center class="rs"><td>'.$y++.'</td><td>'.$vol.'</td><td><input type="text" size="50" maxlength="100" autocomplete="off" class="search" value="Поиск..." onmouseover="tooltip.show(\'<center>Введите полное название облицовки или опишите действие по данному пункту</center>\');" onmouseout="tooltip.hide();"/></td><td class="kol_vo_metr" id="'.round($sum,2).'">'.$sum.'</td><td><input size=2 value="12" class="pripusk_v_procent" onKeyPress ="if ((event.keyCode < 48) || (event.keyCode > 57)) event.returnValue = false;" onmouseover="tooltip.show(\'<center>Укажите припуск облицовки в % (по умолчанию: 12)</center>\');" onmouseout="tooltip.hide();"/></td></tr>';
						//								}

									}
				echo '</table>';}
				echo '<br><table>
				<tr><td valign="top">
				
					<table class ="tabb" border="1" >
					<caption style="background-color:#5B6B77;color:white;font-weight: bold;">
					Техический процесс(Примечание):
					</caption>
				<tr>
				<td><b style="color:red;">0</b></td><td>Чистовой раскрой</td><td><b style="color:red;">4</b></td><td>Сборка</td><td><b style="color:red;">8</b></td><td>Присадка ручн.</td>
				</tr><tr>
				<td><b style="color:red;">1</b></td><td>Раскрой черновой</td><td><b style="color:red;">5</b></td><td>Кромка ручн.</td><td><b style="color:red;">9</b></td><td>Облицовка</td>
				</tr><tr>
				<td><b style="color:red;">2</b></td><td>ЧПУ</td><td><b style="color:red;">6</b></td><td>Запил</td><td><b style="color:red;">10</b></td><td>Окраска</td>
				</tr><tr>
				<td><b style="color:red;">3</b></td><td>Кромка</td><td><b style="color:red;">7</b></td><td>Склейка</td><td><b style="color:red;">11</b></td><td>Металлоучасток</td>
				</tr>
				</table>
				
				</td><td valign="top">
				';
								echo '
				<table class ="tabb" border="1" >
				<caption style="background-color:#5B6B77;color:white;font-weight: bold;">Сокращения после номера детали:</caption>
				<tr>
				<td><b style="color:red;">ч</b></td><td>чистовая деталь</td><td><b style="color:red;">ш</b></td><td>деталь облицованная шпоном</td>
				</tr><tr>
				<td><b style="color:red;">к</b></td><td>деталь облицованная кожей</td><td><b style="color:red;">т</b></td><td>деталь облицованная тканью</td>
				</tr><tr>
				<td><b style="color:red;">п</b></td><td>деталь облицованная пластиком</td><td><b style="color:red;">ф</b></td><td>фрезеровка(заготовка которую после ЧПУ необходимо распилить на две и более частей)</td>
				</tr>
				</table>
				</td></tr>
				</table>
								
				';
									}else{
echo '<form method="post" enctype="multipart/form-data">
    <p>Загрузить файл:</p>
    <p><input name="file" size="18" type="file" value=""></p>
    <p><input name="submit" type="submit" value="Загрузить"></p>
</form>';
											}
?>
</html>