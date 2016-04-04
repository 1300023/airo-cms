<?php 

switch ($_GET['mode']){
	case "add":
//===========================================================================
//Добавление записи (Новая запись)
//===========================================================================

	$unik = time ();
	foreach ( $_FILES as $ind => $val ) {
		foreach ( $val as $ind2 => $val2 ) {
			if ($ind2 == "name")
				$_POST ['fields'] [$ind] = $unik . "_" . $val2;
			if ($ind2 == "tmp_name") {
				@copy ( $val ["tmp_name"], "../uploads/" . $unik . "_" . $val ["name"] );
			}
		}
	}
	
	$i = 1;
	$query = "insert into message{$_GET['pid']} SET ";
	
	$query .=" id_razdel='{$_GET['pid']}', ";
	foreach ( $_POST ['fields'] as $ind => $val ) {
		if (($ind != "id") && ($ind != "id_module") && ($ind != "id_razdel")) {
			if ($i == 1) {
				$query .= "{$ind}='{$_POST['fields'][$ind]}'";
			} else {
				$query .= " ,{$ind}='{$_POST['fields'][$ind]}'";
			}
		}
		$i ++;
	}
	
	//echo $query;
	mysql_query ( $query );
	echo mysql_error ();
	echo "<META http-equiv='refresh' content='0; url=?path=edit&act=edit_list&pid={$_GET['pid']}'> ";
	// echo "<script>alert('Запись добавлена!');</script>";



		break;
	default:
//===========================================================================
// Форма добавления
//===========================================================================
	echo "<h3>Добавление записи в раздел:</h3>";
	echo "<form  enctype='multipart/form-data' action='/admin/index.php?path=edit&act=edit_add&mode=add&pid={$_GET['pid']}' method='post'>";
	echo "<table border='0' width='100%' class='tables'>";
	$sql = mysql_query ( "SELECT * FROM fields WHERE id_razdel='{$_GET['pid']}' order by id asc" );
	while ( $row = mysql_fetch_array ( $sql ) ) {
		echo "<tr class='tables'><td width='200px' background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables' valign='top'>{$row['name']}</td><td width='100%' class='tables' valign='top'>";
		switch ($row ['type']) {
			case "1" :
				echo "<input type='text' name='fields[{$row['name_eng']}]' size='80' class='input_pole'>";
				break;
			case "2" :
			/*	$oFCKeditor = new FCKeditor ( "fields[{$row['name_eng']}]" );
				$oFCKeditor->BasePath = $sBasePath;
				$oFCKeditor->Height = '300px';
				$oFCKeditor->width = '600px';
				$oFCKeditor->Value = '';
				$oFCKeditor->Create ();*/
				
				
				/*$oFCKeditor = new FCKeditor ( "{$get_field_engname}" );
				 $oFCKeditor->BasePath = $sBasePath;
				$oFCKeditor->Height = '300px';
				$oFCKeditor->width = '600px';
				$oFCKeditor->Value = $get_field_value_field;
				$oFCKeditor->Create ();*/
					
					
					
					
					
				
				
				//echo $get_field_value_field;
				
				
				echo '<textarea class="ckeditor" cols="80" id="fields['.$row['name_eng'].']" name="fields['.$row['name_eng'].']" rows="10">'.$get_field_value_field.'
						</textarea>';
				
				echo '
<script type="text/javascript">
					    var ckeditor1 = CKEDITOR.replace(\'$fields['.$row['name_eng'].']\');
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
				echo "<textarea rows='5' cols='50' name='fields[{$row['name_eng']}]' style='width:516px' class='textarea_pole'></textarea>";
				break;
			case "4" :
				echo "<input type='file'  name='{$row['name_eng']}'>";
				break;
			default :
				break;
		}
		echo "</td></tr>";
	}
	echo "</table>";
	echo "<input type='submit' name='' value='Добавить'></form>";
		break;
		
	
}








?>