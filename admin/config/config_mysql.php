<?
//��������� MySQL ����.
$mysql_connect="localhost";
$mysql_login="democms";
$mysql_password="6F7j0C2j";
$mysql_db="democms";

$dbh=new CDataBase("$mysql_db", "$mysql_connect", "$mysql_login", "$mysql_password");

// ��������� ��������� ��.
$sql = "SET NAMES cp1251";
$dbh->query($sql);


?>