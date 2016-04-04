<?php
//require_once "config.php";

$db_host='localhost';
$db_user='vektormk_newuser';
$db_psw='pass1967';
$db_name='vektormk_newbase';


if (($dblink = mysql_connect($db_host, $db_user, $db_psw)))
{mysql_query("set names cp1251"); }

if (!mysql_select_db($db_name, $dblink))
{ echo "Ќевозможно выбрать базу $db_name!<br>\n"; }


//изменение положени€
$sql_get="SELECT pid FROM tree WHERE id={$_GET['id']}";
$pid=mysql_result(mysql_query($sql_get),0,0);


$sql_up="UPDATE tree SET pid={$_GET['pid']}, position={$_GET['position']} WHERE id={$_GET['id']}";
mysql_query($sql_up);
echo "<script>alert(".mysql_error()."); </script>";


?>