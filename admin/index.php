<?
require_once "config/config_admin.php";
require_once "config/config_mysql.php";
require_once "modules/auth/login.php";
require_once "classes/func.php";
require_once "template/head.php";
//=========================================
//Пути
//=========================================

define("DIR_MODULE","modules/");
//include("plugins/fckeditor/fckeditor.php") ;
//$sBasePath ="plugins/fckeditor/";
//=========================================

if (isset($_GET['path'])){
	$modul_path=DIR_MODULE."/".$_GET['path']."/".$_GET['path'].'.php';
	require_once $modul_path;
	}else{
	require_once DIR_MODULE."default/".'default.php';
	}

require_once "template/foot.php";



?>
