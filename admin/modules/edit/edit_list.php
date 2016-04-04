<?php 

switch ($_GET['mode']){
	
	case "del":
//===========================================================================
// Удаление записи (удаление записи (элемента) из раздела)
//===========================================================================
	mysql_query ( "DELETE FROM message{$_GET['pid']} WHERE id='{$_GET['id']}'" );
	//echo "<script>alert('Запись удалена!');</script>";
	
	echo "<meta HTTP-equiv=\"refresh\" content=\"0; url=/admin/index.php?path=edit&pid=".$_GET['pid']."\">";
	
		break;
		
	
	
	case "edit":
//===========================================================================
// Редактирование записи
//===========================================================================
	if (isset ( $_POST ['edit_ok'] )) {
		
		$edit_query = "";
		//----------------------------------
		//Чистим пост массив от пустых полей
		//----------------------------------
		foreach ( $_POST as $ind => $val ) {
			if (empty ( $val )) {
				unset ( $_POST ["{$ind}"] );
			}
		}
		//----------------------------------
		

		//----------------------------------
		//Работаем с файлами
		//----------------------------------
		//Пробегаем массив $_FILES
		$unik = time ();
		foreach ( $_FILES as $ind => $val ) {
			foreach ( $val as $ind2 => $val2 ) {
				if (($ind2 == "name") and ($val2 != ""))
					$_POST [$ind] = $unik . "_" . $val2;
				if ($ind2 == "tmp_name") {
					@copy ( $val ["tmp_name"], "../uploads/" . $unik . "_" . $val ["name"] );
				}
			}
		}
		//--------------------------------------	
		

		//--------------------------------------	
		//Формируем запрос апдейт к базе
		//--------------------------------------	
		$i = 1;
		foreach ( $_POST as $ind => $val ) {
			if ($ind != "edit_ok") {
				
				$pos = strpos ( $ind, '_alt' );
				
				if ($pos === false) {
					//echo "Есть альтернатива!";
					$cover_string = explode ( "_", $ind );
					$ind = $cover_string [0];
				}
				
				if ($i == 1) {
					$edit_query .= "{$ind}='{$val}'";
				} else {
					$edit_query .= ",{$ind}='{$val}'";
				}
			}
			$i ++;
		}
		$edit_query = str_replace ( "_alt", "", $edit_query );
		
		//--------------------------------------	
		mysql_query ( "UPDATE message{$_GET['pid']} SET {$edit_query} WHERE id='{$_GET['id']}'" );
		echo mysql_error ();
		echo "<script>alert('Запись изменена!');</script>";
	
	//--------------------------------------	
	}
	//--------------------------------------	
	//Форма редактирования записи
	//--------------------------------------	
	$sql = mysql_query ( "SELECT * FROM fields where id_razdel='{$_GET['pid']}' order by id asc" );
	while ( $row = mysql_fetch_array ( $sql ) ) {
		$edit_fields [] = $row ['id'];
	}
	
	echo "<form  enctype='multipart/form-data' action='/admin/index.php?path=edit&act=edit_list&mode=edit&pid={$_GET['pid']}&id={$_GET['id']}' method='post'>";
	echo "<table width='100%' border='0' class='tables'>";
	$sql = mysql_query ( "select * from message{$_GET['pid']} WHERE id='{$_GET['id']}'" );
	while ( $row = mysql_fetch_array ( $sql ) ) {
		foreach ( $edit_fields as $ind => $val ) {
			echo "<tr class='tables'><td valign='top' background='/admin/template/img/bg_tables.jpg' style='background-repeat: repeat-x' class='tables'>";
			$get_name_pole = mysql_result ( mysql_query ( "select name from fields where id='{$val}'" ), 0, 0 );
			echo "{$get_name_pole}";
			echo "</td><td class='tables'>";
			//узнаём инфу о полях из sql.fileds
			$get_field_name = mysql_result ( mysql_query ( "select name from fields where id={$val}" ), 0, 0 );
			$get_field_engname = mysql_result ( mysql_query ( "select name_eng from fields where id={$val}" ), 0, 0 );
			$get_field_type = mysql_result ( mysql_query ( "select type from fields where id={$val}" ), 0, 0 );
			$get_field_value_field = mysql_result ( mysql_query ( "select {$get_field_engname} from message{$_GET['pid']} where id={$_GET['id']}" ), 0, 0 );
			
			switch ($get_field_type) {
				case "1" :
					echo "<input type='text' name='{$get_field_engname}' value='{$get_field_value_field}' size='90' class='input_pole'>";
					break;
				case "2" :
					/*$oFCKeditor = new FCKeditor ( "{$get_field_engname}" );
					$oFCKeditor->BasePath = $sBasePath;
					$oFCKeditor->Height = '300px';
					$oFCKeditor->width = '600px';
					$oFCKeditor->Value = $get_field_value_field;
					$oFCKeditor->Create ();*/
					
					
					
					
					


					//echo $get_field_value_field;
						
						
					echo '<textarea class="ckeditor" cols="80" id="'.$get_field_engname.'" name="'.$get_field_engname.'" rows="10">'.$get_field_value_field.'
						</textarea>';
						
					echo '
<script type="text/javascript">
					    var ckeditor1 = CKEDITOR.replace(\''.$get_field_engname.'\');
AjexFileManager.init({returnTo: \'ckeditor\', editor: ckeditor1});
					  
					  
					  
</script>
					';
						
						
					echo "<script type=\"text/javascript\">
(function() {
					
    var config = {
      toolbar: [
        {
          name: 'document',
          items: [ 'Source', '-', 'Preview' ]
        },
        {
          name: 'basicstyles',
          groups: [ 'basicstyles', 'cleanup' ],
          items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ]
        },
        {
          name: 'spellcheck',
          items: [ 'jQuerySpellChecker' ]
        }
      ],
      contentsCss: 'template/js/jquery-spellchecker-demo-master/css/jquery.spellchecker.css'
    };
  
    CKEDITOR.replace('ckeditor1', config);
  })();
					    </script>";
						

								
					
					
					
					
					
					break;
				case "3" :
					echo "<textarea rows='5' cols='50' name='{$get_field_engname}' style='width:575px' class='textarea_pole'>{$get_field_value_field}</textarea>";
					break;
				case "4" :
					echo "
    	
    	<script type=\"text/javascript\">
$(document).ready( function() {
 $('#{$get_field_engname}_alt').hide();
$('#fileTree_{$get_field_engname}').hide();
$('#fileTreex_{$get_field_engname}').hide();
	$('#fileTree_{$get_field_engname}').fileTree({ root: '../../../../uploads/', script: 'plugins/jqueryFileTree/connectors/jqueryFileTree.php' }, function(file) { 
		/* alert('pun-'+file); */

		 $(\"#{$get_field_engname}_alt\").val(file);
		 
	});

	});

</script>
<input type='file' name='{$get_field_engname}' id='{$get_field_engname}'>

<input type='text' name='{$get_field_engname}_alt' id='{$get_field_engname}_alt' size='60'>
";
					
					if (! empty ( $get_field_value_field ))
						echo "<br>
<a href='/uploads/{$get_field_value_field}'>
<img src='/uploads/{$get_field_value_field}' width='100px' border='0' style='padding-top:5px;'>
</a>";
					
					echo "<a href='javascript:void(0);' 
 onclick=\"
 $('#fileTree_{$get_field_engname}').show('slow');
  $('#fileTreex_{$get_field_engname}').show('slow');
 $('#{$get_field_engname}').hide('slow');
 $('#{$get_field_engname}_alt').show('slow');
 \"><br>
 <font color='green'>Выбрать с сервера</font></a> 
 
 <a href='javascript:void(0);' onclick=\"

  $('#fileTree_{$get_field_engname}').hide('slow');
   $('#fileTreex_{$get_field_engname}').hide('slow');
 $('#{$get_field_engname}_alt').hide('slow');
 $('#{$get_field_engname}').show('slow');
 \"><font id='fileTreex_{$get_field_engname}' color='red'>Очистить</font></a><br>";
					echo "<div id='fileTree_{$get_field_engname}' id='fileTree_{$get_field_engname}' style='
    		width: 400px;
			height: 200px;
			border-top: solid 1px #BBB;
			border-left: solid 1px #BBB;
			border-bottom: solid 1px #FFF;
			border-right: solid 1px #FFF;
			background: #FFF;
			overflow: scroll;
			padding: 5px;
			visible:none;
    	'></div>";
					break;
				default :
					break;
			}
			
			echo "</td>
</tr>
";
		}
	}
	echo "</table>";
	echo "<input type='submit' name='edit_ok' value='Изменить'></form>";


		break;
	default:
		//===========================================================================
// Вывод списка записей
//===========================================================================

echo "<h3>Содержание: </h3>";
echo "<table width='500px' cellpadding='5' class='tables'>";
echo "<tr class='tables'>
    <td class='tables' align='center' background='/admin/template/img/bg_tables.jpg'>№</td>
	<td class='tables' align='center' background='/admin/template/img/bg_tables.jpg'>Артикул</td>
    <td class='tables' align='center' background='/admin/template/img/bg_tables.jpg'>Название</td>
    <td class='tables' align='center' background='/admin/template/img/bg_tables.jpg'>Управление</td>
		<td class='tables' align='center' background='/admin/template/img/bg_tables.jpg'>Сортировка</td>
    </tr>";

$res = mysql_query("SELECT position FROM message{$_GET['pid']} WHERE 0");
if ($res) {
	//echo "Поле 'position' существует";
	$sql = mysql_query ( "select * from message{$_GET['pid']} order by position asc" );
}else{
	$sql = mysql_query ( "select * from message{$_GET['pid']}" );
}




while ( $row = mysql_fetch_array ( $sql ) ) {
	echo "<tr class='tables'>
    <td class='tables' align='center'>{$row['id']}</td><td class='tables' align='center'><i>{$row['article']}</i></td><td class='tables'><b>{$row['name']}</b></td><td class='tables'><a href='/admin/index.php?path=edit&act=edit_list&mode=edit&pid={$_GET['pid']}&id={$row['id']}' style='color:green' alt='Редактировать запись' title='Редактировать запись'>Редактировать</a> / <a title='Удалить запись?' alt='Удалить запись?' href=\"javascript:if(confirm('Вы уверены что хотите удалить?')) window.location='/admin/index.php?path=edit&act=edit_list&mode=del&pid={$_GET['pid']}&id={$row['id']}'\"  style='color:red'>Удалить</a></td><td class='tables' align='center'>{$row['position']}</td>
    </tr>";
}
echo "</table>";
		break;
}





?>