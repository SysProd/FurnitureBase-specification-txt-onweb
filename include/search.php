<?php
header('Content-Type: text/html; charset=utf-8');
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  if($_GET['q']){
  $serch = $_GET['q'];
// запрос к базе тоже придется под себя подстраивать, тут только для примера
$text = '';

$db = mysqli_connect("localhost","edge","UY3dYFPDXCfnKjch","accessories") OR die("connection error");
$res = mysqli_query($db,"SELECT `ID`, `name` FROM `edge` WHERE `name` LIKE '%".$serch."%' limit 10");
$rn = mysqli_num_rows($res);
if(($rn<=10) && ($rn!=0)){
	while($row = mysqli_fetch_array($res)){
	echo $row[1]."|".$row[0]."\n";
	}
}
 }}
?>