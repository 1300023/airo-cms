<?
//MySQL
$mysql_connect="localhost";
$mysql_login="vektormk_newuser";
$mysql_password='pass1967';
$mysql_db="vektormk_newbase";

$link=mysql_connect($mysql_host,$mysql_login,$mysql_password);
mysql_select_db($mysql_db);
$sql = 'SET NAMES cp1251';
mysql_query($sql);
?>