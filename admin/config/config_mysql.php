<?
//��������� MySQL ����.
$mysql_connect="localhost";
$mysql_login="democms";
$mysql_password="demo";
$mysql_db="democms";

$dbh=new CDataBase("$mysql_db", "$mysql_connect", "$mysql_login", "$mysql_password");

// ��������� ��������� ��.
$sql = "SET NAMES cp1251";
$dbh->query($sql);


?>