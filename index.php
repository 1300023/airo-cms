<?php
//print_r($_SERVER ['REQUEST_URI']);

if ($_SERVER['REQUEST_URI']=="/main/"){
	header("location: http://demo.ru");
	header("HTTP/1.1 404 Not Found");
	header("Status: 404 Not Found");
}


require 'admin/plugins/smarty/Smarty.class.php';
require_once "admin/config/config_client.php";

//============================================================================
//==============================Объявляем глобальные переменные===============
$str_get = $parts [1];
$get_razd_id = @mysql_result ( mysql_query ( "SELECT id FROM tree WHERE eng_name='{$str_get}'" ), 0, 0 );
$get_module_id = @mysql_result ( mysql_query ( "SELECT id_module FROM tree WHERE eng_name='{$str_get}'" ), 0, 0 );
$get_module_name = @mysql_result ( mysql_query ( "SELECT name FROM modules WHERE id='{$get_module_id}'" ), 0, 0 );
$get_module_nameeng = @mysql_result ( mysql_query ( "SELECT eng_name FROM modules WHERE id='{$get_module_id}'" ), 0, 0 );
$get_title = @mysql_result ( mysql_query ( "SELECT name FROM tree WHERE eng_name='{$str_get}'" ), 0, 0 );
$get_headerpage = @mysql_result ( mysql_query ( "SELECT name FROM settings" ), 0, 0 );
//============================================================================

//=============объявляем название сайта==========================
$smarty->assign ( "headertitle", "{$get_headerpage}" );

if (empty ( $parts [1] )) {
	$smarty->assign ( "titlez", "Добро пожаловать на сайт!" );
} else {
	$smarty->assign ( "titlez", "{$get_title}" );
}

if (empty ( $parts [1] )) {
	$smarty->assign ( "beck", "" );
} else {
	$smarty->assign ( "beck", "<!--<a href='javascript:history.back();' style='color:blue;'>Назад</a>-->" );
}
//================================================================
//===========================Титлы кейворды дескрипшены============
foreach ( $parts as $key => $item ) {
	if (! empty ( $item ))
		$old = $item;
}
$get_message = @mysql_result ( mysql_query ( "SELECT id FROM tree WHERE eng_name='{$old}'" ), 0, 0 );

/////////////////////////////////////////////////////////////
////////////////////////////Строим хлебные крошки////////////

$bread1="";
$patch="";
$bread1.="<ul class='bread-crumb nuclear'>";
$bread1.= "<li><a href='/'>Главная</a></li>";
//print_r($parts);
foreach ( $parts as $key => $item ) {
	if ((!empty ( $item ))and($item!="")){
		$patch.="/{$item}";
		$get_bread_rus=@mysql_result(mysql_query("select name from tree where eng_name='{$item}'"),0,0);
		$bread1.= "<li><a href='{$patch}/'>{$get_bread_rus}</a> <!--<img src='/templates/demo/images/menu_knopka2.jpg'>--></li>";
	}
}
$bread1.="</ul>";
$bread1=@ereg_replace(" <img src='/templates/demo/images/menu_knopka2.jpg'> $","", $bread1);

/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////

if (! empty ( $parts [1] )) {
	

				$result_url = count ( $parts ) - 2;

				
				$pos = strpos ( $parts [$result_url], "t_" );
				if ($pos === false) {
					
					foreach ( $parts as $key => $item ) {
						if ((!empty ( $item ))and($item!="")){
								
							$get_bread_rus3=@mysql_result(mysql_query("select name from tree where eng_name='{$item}'"),0,0);
							$bread3= "{$get_bread_rus3}";
						}
					}
						
						
					$smarty->assign ( "title_seo", $bread3 );
					$smarty->assign ( "meta", '<meta name="Description" content="' . $bread3. '">
				<meta name="Keywords" content="' . $bread3 . '">' );
					
				}else{
					//echo "...";
					//$sql_get_dop_info = mysql_query ( "select * from message{$get_razd_id} order by id asc" );
					$seo_filter_url_tovar=explode("t_",$parts[$result_url]);

					$result_url2 = count ( $parts ) - 3;
					$get_num_tree_razd=@mysql_result(mysql_query("select id from tree where eng_name='{$parts [$result_url2]}'"),0,0);
					

					
					
					$sql_get_dop_info = mysql_query ( "select * from message{$get_num_tree_razd} where id='{$seo_filter_url_tovar[1]}'" );
					//echo "select * from message{$get_razd_id} where id='{$seo_filter_url_tovar[1]}'";
					
					while ( $row_dop_info = @mysql_fetch_array ( $sql_get_dop_info ) ) {				
							
						$smarty->assign ( "title_seo", $row_dop_info ['title'].". Купить оптом и в розницу." );
						$smarty->assign ( "meta", '<meta name="Description" content="' . $row_dop_info ['description'] . '">
				<meta name="Keywords" content="' . $row_dop_info ['keywords'] . ', купить, оптом, розница, официальный дилер, поставщик">' );
					}
					
					
				}
				
				
	
	/*$sql_get_dop_info = mysql_query ( "select * from message{$get_message} order by id asc" );
	while ( $row_dop_info = @mysql_fetch_array ( $sql_get_dop_info ) ) {

		
		
		
		$smarty->assign ( "title_seo", "".$row_dop_info ['title'] );
		$smarty->assign ( "meta", '<meta name="Description" content="' . $row_dop_info ['description'] . '">
				<meta name="Keywords" content="' . $row_dop_info ['keywords'] . '">' );
	}*/
	
	
	
} else {
	
	
	$sql_get_dop_info = mysql_query ( "SELECT *FROM `settings`" );
	while ( $row_dop_info = mysql_fetch_array ( $sql_get_dop_info ) ) {
		$smarty->assign ( "title_seo", $row_dop_info ['name'] );
		$smarty->assign ( "meta", '
<meta name="Description" content="' . $row_dop_info ['description'] . '">
<meta name="Keywords" content="' . $row_dop_info ['keywords'] . '">
' );
	}
	
	
	
}
//================================================================

///////////////////////////Определяем модуль/////////////////////
if (($_SERVER ['REQUEST_URI'] ['1'] != "") and ($_SERVER ['REQUEST_URI'] ['1']!="")) {
	

	if ($_SERVER ['REQUEST_URI']=="/ocenit_stoimost/"){
		require_once "modules/calc.php";
	}else{
	$modul_path = "modules/" . $get_module_nameeng . ".php";
	if(is_file($modul_path)){
	require_once $modul_path;
	}else{ //если такого модуля не существует, редиректим
	//echo "<META http-equiv='refresh' content='0; url=/'>";
	}
	}
	
	
	

}else{

	require_once 'modules/main.php';
}


if ($_SERVER ['REQUEST_URI'] ['1'] == "") {
	$smarty->assign ( "header", "{$content_p}<br><br>" );
}
/////////////////////////////////////////////////////////////////
////////////////Определяем новости///////////////////////////
$fire_news="";
$sql=mysql_query("SELECT * FROM message421 order by id desc limit 3");
while($row=@mysql_fetch_array($sql)){
$fire_news.="
<div class='news-item'>
		  						<span class='data'>{$row['data']}</span>
		  						<a href='/novosti/{$row['id']}/'>{$row['anons']}</a>
		  					</div>
";                  	
}
/////////////////////////////////////////////////////////////////
////////////////Определяем 1///////////////////////////


$fire_photo="<tr>";
$sql=mysql_query("SELECT * FROM message373 ORDER BY RAND() LIMIT 3");
while($row=@mysql_fetch_array($sql)){
	$fire_photo.="<tr>";
$fire_photo.="
	<td width=\"163\" height=\"138\" valign=\"top\" align=\"left\">

	<a href='/uploads/{$row['foto2']}' class='highslide' onclick='return hs.expand(this)'>
	<img src='/uploads/{$row['foto']}' width='170' height='218' alt='' title='' style=\"margin: 13px 0px 0px 0px;\"/></a>

	</td>";    
$fire_photo.="</tr>";
}
  
/////////////////////////////////////////////////////////////////
////////////////Определяем 2///////////////////////////



$sql=mysql_query("SELECT * FROM `tree` WHERE pid='428' order by position asc");
while($row=@mysql_fetch_array($sql)){

	$fire_menu.="
			<li><a href=\"/katalog/{$row['eng_name']}/\">{$row['name']}</a></li>
";

}

/////////////////////////////////////////////////////////////////
       /* $mr="";
        require_once 'admin/plugins/tree/functions_site.php';
		$mr.='<ul class="simpleTree">';
		$mr.=tree ( 0, $get_message);
		$mr.= '</ul>';
		$smarty->assign ( "menus", $mr );
		*/
////////////////////////////////////////


$slider_partner.="<ul class='slider'>";
$sql=mysql_query("SELECT * FROM message508");
while($row=@mysql_fetch_array($sql)){
//window.location.href = \"{$row['www']}/\"
	$slider_partner.="
		<li><span><img width='95' style='cursor: pointer;' src='/uploads/{$row['logotip']}' border='0' alt='{$row['name']}' onclick=\"window.open('{$row['www']}','_blank');\"></span></li>	
	";

}
$slider_partner.="</ul>";




$slider_big.="";
$sql=mysql_query("SELECT * FROM message513 order by prio asc");
while($row=@mysql_fetch_array($sql)){

	$slider_big.='
		<div class="slide">
	  						<img src="/uploads/'.$row['izobrazhenie'].'" alt="">
	  						<div class="text">
	  							<div class="hd">'.$row['alltext'].'</div>
	  							<p>'.$row['opis'].'</p>
	  							<a href="'.$row['linkas'].'" class="more">Каталог</a>
	  						</div>
	  					</div>	
	
	
	
	';
//	<li><span><img width='95' style='cursor: pointer;' src='/uploads/{$row['logotip']}' border='0' alt='{$row['name']}' onclick=\"window.open('{$row['www']}','_blank');\"></span></li>

}
//$slider_big.="</ul>";

$smarty->assign ( "slider_big", $slider_big );
$smarty->assign ( "zagolovok_cat", $zagolovok_cat );


$smarty->assign ( "slider_partner", $slider_partner );
$smarty->assign ( "breads", $bread1 );
//$smarty->assign ( "sapka", $sapka );
$smarty->assign ( "url", $_SERVER['REQUEST_URI'] );
$smarty->assign ( "fire_news", "{$fire_news}" );
$smarty->assign ( "fire_photo", "{$fire_photo}" );
$smarty->assign ( "fire_menu", "{$fire_menu}" );
$smarty->assign ( "Content", "{$content}" );
$smarty->display ( 'index.tpl' );

?>
