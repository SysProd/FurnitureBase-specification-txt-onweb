<?php
if($_POST['name_rp'] && $_POST['name_autor'] && $_POST['vbr']){
$name_rp = $_POST['name_rp'];
$name_autor=$_POST['name_autor'];
$vbr=$_POST['vbr'];
$file="./../files/spicok_name.txt";
//проверка на существования файла spicok_name.txt
if (file_exists($file)){
//чтение файла
$files=fopen($file, "r");
//переборка всех строк
//feof($files) - проверка достигнут ли конец файла
while (!feof($files))
{
//читает строку
$text = fgets ($files, 1024);
//запись в массив
$rr[]=chop($text);
}
fclose($files);
//проверка на существование в массиве текста с переменной $name_rp
if(!in_array($name_rp,$rr)){
$files=fopen($file, "a");
$text=$name_rp."\n";
fwrite ($files, $text);
fclose($files);}
//проверка на существование в массиве текста с переменной $name_autor
if(!in_array($name_autor,$rr)){
$files=fopen($file, "a");
$text=$name_autor."\n";
fwrite ($files, $text);
fclose($files);}
//проверка на существование в массиве текста с переменной $vbr
if($vbr!=1 && !in_array($vbr,$rr)){
$files=fopen($file, "a");
$text=$vbr."\n";
fwrite ($files, $text);
fclose($files);}
}else{
echo "not_file";
}
}
?>