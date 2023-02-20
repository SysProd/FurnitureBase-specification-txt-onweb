<?php
header('Content-Type: text/html; charset=utf-8');
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  if($_GET['q']){
  $file="./../files/spicok_name.txt";
    $base = @file($file);
    for($i=0;$i<count($base);$i++){
	//функция mb_strtolower() - приводит строку к нижнему регистру
	//функция mb_strpos() - находит позицию первого появления строки в строке
	//функци trim = chop - Удаляет пробелы из начала и конца строки
	  $res = mb_strpos(mb_strtolower($base[$i],"UTF-8"), mb_strtolower($_GET['q'],"UTF-8"));
	  if($res!==false&&$res==0) {
	    $base[$i] = trim($base[$i]);
	  	echo $base[$i]."\n";
	  }
    }
  }
}
?>