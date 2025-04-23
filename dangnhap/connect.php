<?php
$host ='localhost';
$user ='root';
$pass ='';
$myDB ='nhom8web';
$link= new mysqli($host,$user,$pass ,$myDB ) or die ("ket noi CSDL that bai");
mysqli_query($link,"SET NAMES UTF8");
?>