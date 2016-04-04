<? 
//print_r($_SERVER['REQUEST_URI']);//require_once "../modules/auth/login.php";

$str=substr_count($_SERVER['REQUEST_URI'], "head.php");
//echo $str;
if ($str!="0"){
	require_once "../modules/auth/login.php";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Система Управления Сайтом - AIR.CMS</title>
<link href="template/css/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="template/js/jquery-1.4.4.js"></script>
<script type="text/javascript" src="plugins/tree/js/jquery.simple.tree.js"></script>

<script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
 <script type="text/javascript" src="plugins/AjexFileManager/ajex.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("#ttt").hide();
	$("#ttt").addClass("cla1");
$(".asd").click(function(){
	if ($("#ttt").hasClass("cla1")){
		$("#ttt").slideDown("slow");
		$("#ttt").removeClass("cla1");
	    $("#ttt").addClass("cla2");
	}else{
		$("#ttt").slideUp("slow");
		$("#ttt").removeClass("cla2");
		$("#ttt").addClass("cla1");
	}
});
});

</script>






<style>
.simpleTree {
	margin: 0;
	padding: 0;
	overflow: auto;
	width: 380px;
	height: 350px;
	overflow: auto;
	border: 0px solid #444444;
}

.simpleTree li {
	list-style: none;
	margin: 0;
	padding: 0 0 0 34px;
	line-height: 14px;
}

.simpleTree li span {
	display: inline;
	clear: left;
	white-space: nowrap;
}

.simpleTree ul {
	margin: 0;
	padding: 0;
}

.simpleTree .root {
	margin-left: -16px;
	background: url(plugins/tree/images/root.gif) no-repeat 16px 0 #ffffff;
}

.simpleTree .line {
	margin: 0 0 0 -16px;
	padding: 0;
	line-height: 3px;
	height: 3px;
	font-size: 3px;
	background: url(plugins/tree/images/line_bg.gif) 0 0 no-repeat
		transparent;
}

.simpleTree .line-last {
	margin: 0 0 0 -16px;
	padding: 0;
	line-height: 3px;
	height: 3px;
	font-size: 3px;
	background: url(plugins/tree/images/spacer.gif) 0 0 no-repeat
		transparent;
}

.simpleTree .line-over {
	margin: 0 0 0 -16px;
	padding: 0;
	line-height: 3px;
	height: 3px;
	font-size: 3px;
	background: url(plugins/tree/images/line_bg_over.gif) 0 0 no-repeat
		transparent;
}

.simpleTree .line-over-last {
	margin: 0 0 0 -16px;
	padding: 0;
	line-height: 3px;
	height: 3px;
	font-size: 3px;
	background: url(plugins/tree/images/line_bg_over_last.gif) 0 0 no-repeat
		transparent;
}

.simpleTree .folder-open {
	margin-left: -16px;
	background: url(plugins/tree/images/collapsable.gif) 0 -2px no-repeat
		#fff;
}

.simpleTree .folder-open-last {
	margin-left: -16px;
	background: url(plugins/tree/images/collapsable-last.gif) 0 -2px
		no-repeat #fff;
}

.simpleTree .folder-close {
	margin-left: -16px;
	background: url(plugins/tree/images/expandable.gif) 0 -2px no-repeat
		#fff;
}

.simpleTree .folder-close-last {
	margin-left: -16px;
	background: url(plugins/tree/images/expandable-last.gif) 0 -2px
		no-repeat #fff;
}

.simpleTree .doc {
	margin-left: -16px;
	background: url(plugins/tree/images/leaf.gif) 0 -1px no-repeat #fff;
}

.simpleTree .doc-last {
	margin-left: -16px;
	background: url(plugins/tree/images/leaf-last.gif) 0 -1px no-repeat #fff;
}

.simpleTree .ajax {
	background: url(plugins/tree/images/spinner.gif) no-repeat 0 0 #ffffff;
	height: 16px;
	display: none;
}

.simpleTree .ajax li {
	display: none;
	margin: 0;
	padding: 0;
}

.simpleTree .trigger {
	display: inline;
	margin-left: -32px;
	width: 28px;
	height: 11px;
	cursor: pointer;
}

.simpleTree .text {
	cursor: default;
}

.simpleTree .active { //
	cursor: default; //
	background-color: #F7BE77; //
	padding: 0px 2px;
	border: 1px dashed #444;
}

#drag_container {
	background: #ffffff;
	color: #000;
	font: normal 11px arial, tahoma, helvetica, sans-serif;
	border: 1px dashed #767676;
}

#drag_container ul {
	list-style: none;
	padding: 0;
	margin: 0;
}

#drag_container li {
	list-style: none;
	background-color: #ffffff;
	line-height: 18px;
	white-space: nowrap;
	padding: 1px 1px 0px 16px;
	margin: 0;
}

#drag_container li span {
	padding: 0;
}

#drag_container li.doc,#drag_container li.doc-last {
	background: url(plugins/tree/images/leaf.gif) no-repeat -17px 0 #ffffff;
}

#drag_container .folder-close,#drag_container .folder-close-last {
	background: url(plugins/tree/images/expandable.gif) no-repeat -17px 0
		#ffffff;
}

#drag_container .folder-open,#drag_container .folder-open-last {
	background: url(plugins/tree/images/collapsable.gif) no-repeat -17px 0
		#ffffff;
}

.contextMenu {
	display: none;
}
</style>




<script type="text/javascript">
var simpleTreeCollection;
$(document).ready(function(){
	simpleTreeCollection = $('.simpleTree').simpleTree({
		<?php
		switch ($_SESSION ['level']) {
			case "0" :
				echo "autoclose: true,
		drag:true, 
		afterClick:false,
		afterDblClick:false,";
				break;
			case "1" :
				echo "autoclose: true,
		drag:false, 
		afterClick:false,
		afterDblClick:false,";
				break;
			case "2" :
				echo "autoclose: true,
		drag:false, 
		afterClick:false,
		afterDblClick:false,";
				break;
		}
		?>

		afterMove:function(destination, source, pos){
			
			 $(this).load('plugins/tree/update.php?pid='+destination.attr('id')+'&id='+source.attr('id')+'&position='+pos);
			
		
			/*alert("pid-"+destination.attr('id')+" id-"+source.attr('id')+" position-"+pos);*/
		},
		afterAjax:function()
		{
			alert('Loaded');
		},
		animate:true
		,docToFolderConvert:true,autoclose: true
	});
});



</script>

<link href="plugins/jqueryFileTree/jqueryFileTree.css" rel="stylesheet"
	type="text/css">

<script type="text/javascript"
	src="plugins/jqueryFileTree/jqueryFileTree.js"></script>

</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td background="template/img/up_bg_menu.jpg" height="58px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:20px;">
      <tr>
        <td width="121" align="center"><a href="/admin/" class="menu_top">Главная</a></td>
        <td width="1"><img src="template/img/separator.jpg" width="2" height="26" /></td>
        
        <td width="121" align="center"><a href="?path=auth" class="menu_top">пользователи</a></td>
        <td width="1"><img src="template/img/separator.jpg" width="2" height="26" /></td>
<!-- background="template/img/up_bg_menu_active.jpg" -->
        <td width="121" align="center" ><a href="/admin/index.php" class="menu_top">Управление сайтом</a></td>
        <td width="1"><img src="template/img/separator.jpg" width="2" height="26" /></td>
        <td width="121" align="center"><a href="?path=settings" class="menu_top">настройки</a></td>
        <td width="1"><img src="template/img/separator.jpg" width="2" height="26" /></td>
        <td width="121"  align="center"><a href="?path=auth&amp;do=exit" class="menu_top">выход</a></td>
        <td height="58">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>

    
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="ttt">
<tr>
        <td background="template/img/vipad_menu_bg.jpg" height="86">
        &nbsp;&nbsp;&nbsp;Дополнительные возможности: Пусто
        <center>
          <!-- <table width="100%" border="0" cellspacing="5" cellpadding="5">
            <tr>
              <td><a href="#" class="plazka">Редактировать дизайн</a></td>
              <td bgcolor="#44627a"><a href="#" class="plazka">Основные настройки</a></td>
              <td><a href="#" class="plazka">Раскрутка</a></td>
              <td><a href="#" class="plazka">Файловый менеджер</a></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </table> -->
        </center></td>
      </tr>
</table>
</td>
</tr>
<tr>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="center" background="template/img/vipad_menu_visible_bg.jpg"><img src="template/img/vipad_menu_visible_knopar.jpg" class="asd" width="63" height="5" /></td>
</tr>
</table>
</td>
</tr>
</table>    
    
    </td>
  </tr>
  <tr>
    <td background="template/img/content_bg_top.jpg" height="12"></td>
  </tr>
  <tr>
    <td height="80"><a href="/admin/index.php"><img src="template/img/logo.jpg" width="124" height="33" border="0" style="padding-left:40px;" /></a></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:13px;">
          <tr>
            <td height="41" valign="top"><table width="220" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="33" background="template/img/plazka1_bg.jpg" class="font_white">КОНТЕНТ</td>
                  </tr>
                  <tr>
                    <td valign="top">
                    
                      <!-- менюшка -->
                   <!--  <table width="100%" border="1" cellspacing="3" cellpadding="3">
                      <tr>
                        <td width="8%"><img src="template/img/cat_plus.jpg" width="9" height="9" /></td>
                        <td width="12%"><img src="template/img/cat_papka.jpg" width="16" height="12" /></td>
                        <td width="80%"><a href="#">Платья</a></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><img src="template/img/cat_file.jpg" width="12" height="16" /></td>
                        <td><a href="#">Доставка</a></td>
                      </tr>
                      <tr>
                        <td><img src="template/img/cat_plus.jpg" width="9" height="9" /></td>
                        <td><img src="template/img/cat_papka.jpg" width="16" height="12" /></td>
                        <td><a href="#">Туфли</a></td>
                      </tr>
                      <tr>
                        <td><img src="template/img/cat_minus.jpg" width="9" height="9" /></td>
                        <td><img src="template/img/cat_papka.jpg" width="16" height="12" /></td>
                        <td><a href="#">Кофты</a></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><img src="template/img/cat_file.jpg" width="12" height="16" /></td>
                        <td><a href="#">Синие</a></td>
                      </tr>
                    </table> -->
                    
                    
                    
                    
                    
                    
                    
                    <table width="400px;" cellpadding="3" cellspacing="3" border="0">
	<tr>
		<td width="400px" valign="top">
  <?php
  
  
  $get_count_row_for_order=mysql_result(mysql_query("select count(*) from tree"),0,0);

  
  
		if ($_SESSION ['level'] == 0) {
			if (isset ( $_POST ['razd_add'] )) {
				// добавляем в дерево имя раздела и параметры его
				
				
				$trans_name=translit($_POST['razd_name']);
				
				mysql_query ( "insert into tree SET name='{$_POST['razd_name']}',id_module='{$_POST['id_module']}',pid='{$_POST['tree_id_parent']}', eng_name='{$trans_name}',position='{$get_count_row_for_order}'" );
				$get_id_razdel = mysql_insert_id ();
				// получаем шаблон таблицы sql для модуля
				$get_module_sql_tpl = mysql_result ( mysql_query ( "SELECT tpl_sql FROM `modules` where id='{$_POST['id_module']}'" ), 0, 0 );
				$get_module_sql_tpl = str_replace ( "messageXX", "message{$get_id_razdel}", $get_module_sql_tpl );
				mysql_query ( "{$get_module_sql_tpl}" );
				
				$get_module_sql_tpl_fields = mysql_result ( mysql_query ( "SELECT tpl_sql_fields FROM `modules` where id='{$_POST['id_module']}'" ), 0, 0 );
				$get_module_sql_tpl_fields = str_replace ( "XX_id_razdel", "{$get_id_razdel}", $get_module_sql_tpl_fields );
				$get_module_sql_tpl_fields = str_replace ( "XX_id_module", "{$_POST['id_module']}", $get_module_sql_tpl_fields );
				
				$parse_query = explode ( ";", "$get_module_sql_tpl_fields" );
				
				foreach ( $parse_query as $ind => $val ) {
					mysql_query ( $val );
				}
			}
		}
		
		require_once 'plugins/tree/functions.php';
		echo '<ul class="simpleTree">';
		tree ( 0 );
		echo '</ul>';
		
		echo " </td>
                  </tr>
                </table> ";
		 // echo "Всего записей: {$get_count_row_for_order}<br>";
		
	
		?>
                    <!-- /менюшка -->
                    

                 <b>Добавить раздел:</b><br>

<?php 
	echo '<form action="index.php" method="post">
<table class="tables">

<tr>
<td background="/admin/template/img/bg_tables.jpg"  style="background-repeat: repeat-x" class="tables">
Название:</td><td class="tables"><input type="text" name="razd_name" class="input_pole_mini"></td></tr>
<!--<tr><td>Идентификатор:</td><td><input type="hidden" name="111eng_name111"></td></tr>-->
<tr>
<td background="/admin/template/img/bg_tables.jpg"  style="background-repeat: repeat-x" class="tables">Путь:</td>
<td class="tables"><select name="tree_id_parent" class="input_pole_mini_sp">';
			echo "<option value='1'>Корень</option>";
			$sss = "";
			$sql2 = mysql_query ( "SELECT * FROM `tree` WHERE pid='1' order by id desc" );
			while ( $row2 = mysql_fetch_array ( $sql2 ) ) {
				echo "<option value='{$row2['id']}'>" . $row2 ['name'] . "</option>";
				
				$sql3 = mysql_query ( "SELECT * FROM tree where pid='{$row2['id']}'" );
				echo "SELECT * FROM tree where pid='{$row2['id']}'<br>";
				while ( $row3 = mysql_fetch_array ( $sql3 ) ) {
					echo "<option value='{$row3['id']}'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row3 ['name'] . "</option>";
					
					$sql4 = mysql_query ( "SELECT * FROM tree where pid='{$row3['id']}'" );
					while ( $row4 = mysql_fetch_array ( $sql4 ) ) {
						echo "<option value='{$row4['id']}'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row4 ['name'] . "</option>";
						
						$sql5 = mysql_query ( "SELECT * FROM tree where pid='{$row4['id']}'" );
						while ( $row5 = mysql_fetch_array ( $sql5 ) ) {
							echo "<option value='{$row5['id']}'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row5 ['name'] . "</option>";
							
							$sql6 = mysql_query ( "SELECT * FROM tree where pid='{$row5['id']}'" );
							while ( $row6 = mysql_fetch_array ( $sql6 ) ) {
								echo "<option value='{$row6['id']}'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row6 ['name'] . "</option>";
							}
						
						}
					
					}
				
				}
			
			}
			echo '</select></td></tr>

<tr><td background="/admin/template/img/bg_tables.jpg"  style="background-repeat: repeat-x" class="tables">Модуль:</td><td class="tables"><select name="id_module" class="input_pole_mini_sp">';
			$sql2 = mysql_query ( "SELECT * FROM `modules`" );
			while ( $row2 = mysql_fetch_array ( $sql2 ) ) {
				echo "<option value='{$row2['id']}'>{$row2['name']}</option>";
			}
			echo '</select></td></tr>
<tr><td colspan="2"><input type="submit" name="razd_add" value="Добавить"></td></tr>
</form>
</table>
';
?>      

                    
                    </td>
                  </tr>
                </table>
                
        
                
                 </td>
            <td valign="top"><table width="35" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td  height="33" background="template/img/plazka1_bg.jpg" align="center"><a href="#"><img src="template/img/array_left.jpg" width="15" height="12" border="0" /></a></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <br /></td>
            </tr>
          </table>          <br />
</td>
        <td width="100%" valign="top">
        <!-- контент -->
        
        
        
        
        
        
         
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:13px;padding-right:10px">
          <tr>
            <td height="33" background="/admin/template/img/plazka1_bg.jpg"><table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td width="88%" class="font_white"><a href="/admin/" class="bread">Панель управления</a> <!-- <img src="/admin/template/img/bread.jpg" width="5" height="5" align="absmiddle" /> <a href="№" class="bread">Пользователи</a>  --></td>
                <td width="12%">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td background="/admin/template/img/pod_menu_bg.jpg" height="37">
            <?php 
            
            require_once 'block_menu_row.php';
            ?>

              </td>
          </tr>
          <tr>
            <td id="content">
            
        