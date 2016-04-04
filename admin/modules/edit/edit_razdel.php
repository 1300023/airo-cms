<?php

switch ($_GET ['mode']) { //удаление фото
	case "del_photo" :
		$get_img_for_del = @mysql_result ( mysql_query ( "select image from `tree` where id='{$_GET['pid']}'" ), 0, 0 );
		@unlink ( "../uploads/" . $get_img_for_del );
		//echo "<script language='JavaScript'>alert('Запись обновлена!');</script>";
		echo "<META http-equiv='refresh' content='0; url=?path=edit&act=edit_razdel&pid={$_GET['pid']}'> ";
		break;
	case "edit_form" :
		//===========================================================================
		// Редактировать раздел форма и событие
		//===========================================================================
		if ($_POST ['send_change']) {
			$unik = time ();
			if (empty ( $_FILES ["file_pic"] ["name"] )) {
				mysql_query ( "UPDATE tree SET eng_name='{$_POST['new_unik']}', name='{$_POST['new_name']}', opis='{$_POST['opismodtxt']}' WHERE id='{$_GET['pid']}'" );
			} else {
				@copy ( $_FILES ["file_pic"] ["tmp_name"], "../uploads/" . $unik . "_" . $_FILES ["file_pic"] ["name"] );
				mysql_query ( "UPDATE tree SET eng_name='{$_POST['new_unik']}', name='{$_POST['new_name']}', image='{$unik}_{$_FILES["file_pic"]["name"]}', opis='{$_POST['opismodtxt']}' WHERE id='{$_GET['pid']}'" );
			}
			echo mysql_error ();
			echo "<script language='JavaScript'>alert('Запись обновлена!');</script>";
			echo "<META http-equiv='refresh' content='0; url=?path=edit&act=edit_razdel&pid={$_GET['pid']}'> ";
		}
		
		echo "<form enctype='multipart/form-data' action='?path=edit&act=edit_razdel&mode=edit_form&pid={$_GET['pid']}' method='post'>";
		echo "<table width='100%' cellspacing='3' cellpadding='3' border='0' class='pynktir' style='border-color:#5a5a5a; border-style: dotted; border-spacing:0; border-width:thin;'>";
		echo "<tr nowrap='nowrap'>
	<td width='200px' nowrap='nowrap'>
	<span nowrap='nowrap' align='right'>Наименование модуля:</span></td><td><b>{$get_module_name}</b>.
	</td>
     <td rowspan='7' valign='top' align='center'>";
		$get_module_img != "" ? $c = $get_module_img : $c = 'нет фото';
		$file = @fopen ( "../uploads/" . $c, "r" );
		$file ? $m_photo = "<img src='../uploads/{$c}' width='150'>" : $m_photo = "<img src='/admin/template/images/no_photo.jpg' width='150'>";
		echo $m_photo;
		echo "<br><a href='/admin/index.php?path=edit&act=edit_razdel&mode=del_photo&pid={$_GET['pid']}' alt='Удалить фото' title='Удалить фото'><font color='red'>x</font></a></td></tr>";
		
		echo "<tr><td nowrap='nowrap'>Количество записей:</td><td><b>{$count_zapis}</b>.</td></tr>";
		echo "<tr><td nowrap='nowrap'>Имя раздела:</td><td><input type='text' name='new_name' value='{$get_name_module}' style='width:200px;'></td></tr>";
		echo "<tr><td nowrap='nowrap'>Идентификатор:</td><td><input type='text' name='new_unik' value='{$get_eng_name}' style='width:200px;'></td></tr>";
		echo "<tr><td nowrap='nowrap'>Фото:</td><td><input type='file' name='file_pic' style='width:200px;'></td></tr>";
		echo "<tr><td nowrap='nowrap'>Описание:</td><td><textarea rows='5' cols='50' name='opismodtxt'>{$get_module_opis}</textarea></td></tr>";
		echo "<tr><td nowrap='nowrap' colspan='2'><input type='submit' name='send_change' value='Редактировать'></td></tr>";
		echo "</table>";
		echo "</form>";
		break;
	default :
		//===========================================================================
		// Инфо данных о разделе
		//===========================================================================
		echo "<table width='100%' border='0' cellspacing='3' cellpadding='3' class='pynktir' style='border-color:#5a5a5a; border-style: dotted; border-spacing:0; border-width:thin;'>
		<tr nowrap='nowrap'><td width='200px' nowrap='nowrap'><span nowrap='nowrap' align='right'>Наименование модуля:</span></td><td><b>{$get_module_name}</b>.</td>
		<td rowspan='7' valign='top' align='center'>";
		
		$get_module_img != "" ? $c = $get_module_img : $c = 'нет фото';
		$file = @fopen ( "../uploads/" . $c, "r" );
		$file ? $m_photo = "<img src='../uploads/{$c}' width='150'>" : $m_photo = "<img src='/admin/template/images/no_photo.jpg' width='150'>";
		echo $m_photo;
		
		echo "</td>
		</tr>
		<tr><td nowrap='nowrap'>Количество записей:</td><td><b>{$count_zapis}</b>.</td>
		</tr>
		<tr><td nowrap='nowrap'>Имя раздела:</td><td><b>{$get_name_module}</b>.</td>
		</tr>
		<tr><td nowrap='nowrap'>Идентификатор:</td><td><b>{$get_eng_name}</b>.</td>
		</tr>
		<tr><td nowrap='nowrap'>Описание:</td><td><b>{$get_module_opis}</b>.</td>
		</tr>
		<tr><td nowrap='nowrap'>Адрес страницы:</td><td><b><a href='http://{$_SERVER['HTTP_HOST']}/{$get_eng_name}/' target='_blank'>http://{$_SERVER['HTTP_HOST']}/{$get_eng_name}/</a></b></td>
		</tr>
		<tr><td nowrap='nowrap' colspan='3'><a href='?path=edit&act=edit_razdel&mode=edit_form&pid={$_GET['pid']}'><p><font color='green'>Редактировать</font></p></a></td></tr>
		</table>";
		break;
}

?>