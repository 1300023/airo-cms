<?php
//=================================Инклуды====================================
require_once ('admin/classes/database.php');
require_once ('admin/config/config_mysql.php');
require_once ('admin/classes/func.php');
//============================================================================

//=================Обработчик URL-============================================
$parts = explode ( '/', $_SERVER ['REQUEST_URI'] );
if (@$parts [1] == 'test') {
	if (@$parts [2] != 'false') {
		exit ();
	}
	$string = $part [1];
	$string1 = $part [2];
	print ($string1 . '/' . $string) ;
} else {
	$title = implode ( '/', $parts );
}
//=============================================================================
//==============Конфигурация шаблона===========================================
$smarty = new Smarty ();
$smarty->compile_check = true;
$smarty->debugging = false;
$templates ['pach'] = "/templates/demo/"; //Путь к шаблону
$smarty->assign ( "templates_patch", "{$templates['pach']}" );
//==============================================================================
//==============================================================================
//Определяем меню
//==============================================================================
foreach ( $parts as $key => $item ) {
	if (! empty ( $item ))
		$old_ind_razd = $item;
}

//print_r($parts);
//echo "<br>";

//if (!empty($parts[2])) $old_ind_razd=$parts[1];

//echo "-=={$old_ind_razd}==-";


$get_counter_podrazd_num=@mysql_result(mysql_query("select id from tree where eng_name='{$parts[1]}'"),0,0);


if ($get_counter_podrazd_num==false){
	header("location: http://www.vektor-mk.ru");
	
	header("HTTP/1.1 404 Not Found");
	header("Status: 404 Not Found");
}



$get_counter_podrazd=@mysql_result(@mysql_query("select count(*) from tree where pid='{$get_counter_podrazd_num}'"),0,0);

$get_counter_podrazd_num1=@mysql_result(mysql_query("select id from tree where eng_name='{$parts[2]}'"),0,0);
$get_counter_podrazd1=mysql_result(mysql_query("select count(*) from tree where pid='{$get_counter_podrazd_num1}'"),0,0);

$get_counter_podrazd_num2=@mysql_result(mysql_query("select id from tree where eng_name='{$parts[3]}'"),0,0);
$get_counter_podrazd2=mysql_result(mysql_query("select count(*) from tree where pid='{$get_counter_podrazd_num2}'"),0,0);

//$get_counter_podrazd_num3=mysql_result(mysql_query("select id from tree where eng_name='{$parts[4]}'"),0,0);
//$get_counter_podrazd3=mysql_result(mysql_query("select count(*) from tree where pid='{$get_counter_podrazd_num3}'"),0,0);

//echo $get_counter_podrazd_num2;
//echo "[{$parts[4]}]";






$i = 0;
$sql = mysql_query ( "select * from tree WHERE pid='1' and invisible='0' order by position asc" );
while ( $row = mysql_fetch_array ( $sql ) ) {
	$j [$i] ['name'] = $row ['name']."";
	$j [$i] ['eng_name'] = "/" . $row ['eng_name'] . "/";
	
	
	if ($get_counter_podrazd_num==$row['id']){
	$k = 0;
	$sql1 = mysql_query ( "select * from tree where pid='{$row['id']}'" );
	while ( $row1 = mysql_fetch_array ( $sql1 ) ) {
		$j [$i] ['podmenu'] [$k] ['name'] = $row1 ['name'];
		$j [$i] ['podmenu'] [$k] ['eng_name'] = "/" . $row ['eng_name'] . "/" . $row1 ['eng_name'] . "/";
		
		
		
		if ($get_counter_podrazd_num1==$row1['id']){ ///////////// 2 левел
		$d = 0;
		$sql2 = mysql_query ( "select * from tree where pid='{$row1['id']}'" );
		while ( $row2 = mysql_fetch_array ( $sql2 ) ) {
			
			$j [$i] ['podmenu'] [$k] ['podmenu'] [$d] ['name'] = $row2 ['name'];
			$j [$i] ['podmenu'] [$k] ['podmenu'] [$d] ['eng_name'] = "/" . $row ['eng_name'] . "/" . $row1 ['eng_name'] . "/" . $row2 ['eng_name'] . "/";
			
		///////////// 3 левел
		if ($get_counter_podrazd_num2==$row2['id']){ ///////////// 3 левел
		$y = 0;
		$sql3 = mysql_query ( "select * from tree where pid='{$row2['id']}'" );
		while ( $row3 = mysql_fetch_array ( $sql3 ) ) {
			$j [$i] ['podmenu'] [$k] ['podmenu'] [$d] ['podmenu'] [$y] ['name'] = $row3 ['name'];
			$j [$i] ['podmenu'] [$k] ['podmenu'] [$d] ['podmenu'] [$y] ['eng_name'] = "/" . $row ['eng_name'] . "/" . $row1 ['eng_name'] . "/" .$row2 ['eng_name'] . "/" . $row3 ['eng_name'] . "/";
			$y ++;
			
			
			
		}
		}
		/////////////// 3 
			
			
			$d ++;
		
		}
	} ///////////// 2 левел
		
		
		$k ++;
	}
	}
	
	
	
	
	$i ++;

}


$nmenu=treen(1);




//==============================================================================
//==============================Ассигнем========================================
//echo "<pre>";
//print_r($j);
//echo "</pre>";
$smarty->assign ( "menu", $j );
$smarty->assign ( "nmenu", $nmenu );

//==============================================================================
?>