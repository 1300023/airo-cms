<?php
$get_name_module = mysql_result ( mysql_query ( "SELECT name FROM `tree` WHERE id='{$_GET['pid']}'" ), 0, 0 );
$get_eng_name = mysql_result ( mysql_query ( "SELECT eng_name FROM `tree` WHERE id='{$_GET['pid']}'" ), 0, 0 );

echo "<h2>Редактирование раздела: {$get_name_module}</h2>";
$get_module_id = mysql_result ( mysql_query ( "select id_module FROM tree WHERE id='{$_GET['pid']}'" ), 0, 0 );
$get_module_name = mysql_result ( mysql_query ( "select name FROM modules WHERE id='{$get_module_id}'" ), 0, 0 );
$count_zapis = mysql_result ( mysql_query ( "select count(*) FROM message{$_GET['pid']}" ), 0, 0 );

$get_module_img = mysql_result ( mysql_query ( "select image FROM tree WHERE id='{$_GET['pid']}'" ), 0, 0 );
$get_module_opis = mysql_result ( mysql_query ( "select opis FROM tree WHERE id='{$_GET['pid']}'" ), 0, 0 );



//===========================================================================
// Свич моде
//===========================================================================


switch ($_GET ['act']) {
	case "edit_razdel" :
		require_once 'edit_razdel.php';
		break;
	case "edit_list" :
		require_once 'edit_list.php';
		break;
	case "edit_add" :
		require_once 'edit_add.php';
		break;
	default :
		require_once 'edit_list.php';
		break;
}












?>