<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {

if(isset($_POST['maciv_data'])){
$maciv_data=$_POST['maciv_data'];
$filename='dd';
echo "yes";
///$maciv_data = mysql_escape_string($maciv_data)
//echo $maciv_data;
file_put_contents('./../files/'.$filename . '.txt', $maciv_data);
}

if(isset($_POST['maciv_rascroi'])){
$maciv_data=iconv("utf-8", "cp1251",$_POST['maciv_rascroi']);
$filename='rascroi';
file_put_contents('./../files/'.$filename . '.txt', $maciv_data);
echo $maciv_data;
}
}
if(isset($_GET['maciv_rascroi'])){
$filename='rascroi';
$filename=$_SERVER['DOCUMENT_ROOT'].'/specification/files/'.$filename.'.txt';
//echo $filename;

if(!is_file($filename)) exit("File not found");
$content = file_get_contents($filename);
header('Content-Type: application/octet-stream; charset=windows-1251');// выбор кодировки
header("Content-Disposition: attachment; filename=111.txt");
echo $_GET['maciv_rascroi'];
ob_start();
echo $content;
ob_end_flush();
//echo "<a href='http://192.168.0.1/specification/files/rascroi.txt'>раскрой.txt</a>";
}


?>