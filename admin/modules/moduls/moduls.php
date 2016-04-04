<?
echo "<h2>Подключение модулей</h2>";
//==============================================================================
//Invisible раздела в таблице tree
//==============================================================================
if ($_GET['do']=="invisible"){
	$get_invisible=mysql_result(mysql_query("select invisible from tree where id='{$_GET['id']}'"),0,0);
	
	if ($get_invisible=="0"){
		mysql_query("UPDATE tree SET invisible='1' WHERE id='{$_GET['id']}'");
		echo "<script language='JavaScript'>alert('Включён режим невидимости!');</script>";
	}else{
		mysql_query("UPDATE tree SET invisible='0' WHERE id='{$_GET['id']}'");
		echo "<script language='JavaScript'>alert('Включён режим видимости!');</script>";
	}
	echo mysql_error();

    echo "<META http-equiv=refresh content='0; url=/admin/'>";
}

//==============================================================================
//Удаление полей и дропанье базы контента(message)
//==============================================================================
if ($_GET['do']=="del"){


$get_pid_id=mysql_result(mysql_query("select id from tree WHERE id='{$_GET['id']}'"),0,0);
  


			$sql=mysql_query("select * from tree where pid='{$get_pid_id}'");
			while($row=mysql_fetch_array($sql)){
			    
			    
			    echo "{$row['id']}<br>";
			    
			    
			    $sql2=mysql_query("SELECT * FROM `fields` WHERE id_razdel='{$row['id']}'");
			    while($row2=mysql_fetch_array($sql2)){
			        mysql_query("DELETE FROM fields WHERE id='{$row2['id']}'");
			    }
			    
			    
			    
			    mysql_query("DELETE FROM tree WHERE id='{$row['id']}'");
			    mysql_query("drop table message{$row['id']}");
			    echo mysql_error();
			    
				
			}




    

   $sql=mysql_query("SELECT * FROM `fields` WHERE id_razdel='{$_GET['id']}'");
    while($row=mysql_fetch_array($sql)){
        	mysql_query("DELETE FROM fields WHERE id='{$row['id']}'");
    }





				mysql_query("DELETE FROM tree WHERE id='{$_GET['id']}'");
                mysql_query("drop table message{$_GET['id']}");
                echo mysql_error();
echo "<META http-equiv=refresh content='0; url=/admin/index.php'>";
}

//==============================================================================
//Переключение режимов
//==============================================================================
if ($_GET['do']=="mode"){
    if (isset($_GET['on'])){
        		mysql_query("UPDATE modules SET enabled='1' WHERE id='{$_GET['on']}'");
                echo mysql_error();
        echo "<script>alert('Включаем');</script>";
    }
    if (isset($_GET['off'])){
                mysql_query("UPDATE modules SET enabled='0' WHERE id='{$_GET['off']}'");
                echo mysql_error();
        echo "<script>alert('Выключаем');</script>";
    }
    if (isset($_GET['del'])){
        //mysql_query("DELETE FROM modules WHERE id=".$_REQUEST['id']."");
        echo "<script>alert('Удаляем');</script>";
    }
}

//==============================================================================
//Список модулей 
//==============================================================================
if ($_GET['do']=="list"){
echo "<b>Список модулей включенных в систему.</b><br>";
    echo "<table width='500px' cellpadding='5' class='tables'>";
    echo "<tr class='tables'>
    <td class='tables' align='center' background='/admin/template/img/bg_tables.jpg'>Название модуля</td>
    <td class='tables' align='center' background='/admin/template/img/bg_tables.jpg'>Статус</td>
    </tr>";
    $i=1;
    $sql=mysql_query("select * from modules");
    while($row=mysql_fetch_array($sql)){
        echo "<tr class='tables'>";
        echo "<td class='tables'>{$i}).{$row['name']}</td><td class='tables'>";
        echo $row['enabled']=="1" ? "<font color='green'>Подкл.</font>" : "<font color='red'>Откл.</font>";
        echo $row['enabled']=="0" ? "&nbsp;(<a href='/admin/?path=moduls&do=mode&on={$row['id']}'><font color='green'>Вкл.</font>)</a>" : "&nbsp;(<a href='/admin/?path=moduls&do=mode&off={$row['id']}'><font color='red'>Выкл.</font></a>)";
        if ($_SESSION['level']=="0") echo " <a href='/admin/?path=moduls&do=mode&del={$row['id']}'><font color='red'>Удалить</font></a>";
        echo "</td>";
        echo "</tr>";
        $i++;
    }
    echo "</table>"; 
}

//==============================================================================
//Редактировать поле
//==============================================================================
if ($_GET['do']=="edit_fields"){
echo "<p><b>Редактировать поле.</b></p>";

if (isset($_POST['field_update'])){
	mysql_query("UPDATE fields SET name='{$_POST['field_name']}', name_eng='{$_POST['field_eng_name']}', type='{$_POST['field_type']}' WHERE id='{$_GET['id']}'");
	echo mysql_error();
	echo "<script language='JavaScript'>alert('Запись обновлена!');</script>";
	echo "<META http-equiv='refresh' content='0; url=?path=moduls&do=fields&pid={$_GET['pid']}'> ";
}
//==============================================================================
echo "<form action='?path=moduls&do=edit_fields&pid={$_GET['pid']}&id={$_GET['id']}' method='post'>";
$sql=mysql_query("select * from fields where id='{$_GET['id']}'");
while($row=mysql_fetch_array($sql)){
	
echo "<table border='0' class='tables'>
<tr>
<td>Название:</td><td class='tables'><input type='text' name='field_name' value='{$row['name']}'></td>
</tr>
<tr>
<td>Идентификатор:</td><td class='tables'><input type='text' name='field_eng_name' value='{$row['name_eng']}'></td>
</tr>
<tr>
<td>Тип:</td><td><select name='field_type'>";

    $sql_type=mysql_query("select * from types");
    while($row_type=mysql_fetch_array($sql_type)){
    	$row['type']==$row_type['id'] ? $select=" selected" : $select=" ";
        echo "<option value='{$row_type['id']}' {$select}>{$row_type['name']}</option>";
    }

echo "</select></td>
</tr>
</table>";
}

echo "<input type='submit' name='field_update' value='Редактировать'>
</form>";
}

//==============================================================================
//Список полей
//==============================================================================
if ($_GET['do']=="fields"){
if($_POST['field_add']){
mysql_query("insert into fields SET
id_razdel='{$_GET['pid']}',
name='{$_POST['field_name']}',
name_eng='{$_POST['field_eng_name']}',
type='{$_POST['field_type']}',
priority='1'");
echo mysql_error();

mysql_query("ALTER TABLE `message{$_GET['pid']}` ADD `{$_POST['field_eng_name']}` TEXT NOT NULL ");
echo mysql_error();
//echo "<script>alert('Поле добавлено!');</script>";
}
if($_GET['mode']=="del"){
    	$get_field_name=mysql_result(mysql_query("select name_eng from fields where id='{$_GET['id']}'"),0,0);
    	mysql_query("DELETE FROM fields WHERE id='{$_GET['id']}'");
        mysql_query("alter table message{$_GET['pid']} drop {$get_field_name}");
		//echo "<script>alert('Поле удалено!');</script>";
}

echo "<p><b>Список полей</b></p>";
echo "<table class='tables'>
<tr>
<td background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'><b>Название</b></td>
<td background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'><b>Тип</b></td>
<td background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'><b>Уник. Имя</b></td>
<td background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'></td>
</tr>";
$sql=mysql_query("SELECT * FROM `fields` where id_razdel='{$_GET['pid']}' order by id asc");
while($row=mysql_fetch_array($sql)){
    echo "<tr><td class='tables'>{$row['name']}</td>";
    $get_field_name=mysql_result(mysql_query("select name from types where id='{$row['type']}'"),0,0);
    echo "<td class='tables'>{$get_field_name}</td>";
    echo "<td class='tables' align='center'>{$row['name_eng']}</td>";
    echo "<td class='tables'><a href='?path=moduls&do=edit_fields&pid={$_GET['pid']}&id={$row['id']}'><font color='green'>редактировать</font></a>&nbsp;<a href='/admin/?path=moduls&do=fields&mode=del&pid={$_GET['pid']}&id={$row['id']}'><font color='red'>x</font></a></td></tr>";
}
echo "</table>";
echo "<p><b>Добавить поле.</b></p>";
echo "<form action='/admin/?path=moduls&do=fields&pid={$_GET['pid']}' method='post'>
<table border='0' class='tables'>
<tr>
<td background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' width='100px' class='tables'>Название:</td>
<td class='tables'><input type='text' name='field_name' class='input_pole_mini'></td>
</tr>
<tr>
<td background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'>Идентификатор:</td>
<td class='tables'><input type='text' name='field_eng_name' class='input_pole_mini'></td>
</tr>
<tr>
<td background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'>Тип:</td>
<td class='tables'><select name='field_type' class='input_pole_mini_sp'>";
    $sql_type=mysql_query("select * from types");
    while($row_type=mysql_fetch_array($sql_type)){
        echo "<option value='{$row_type['id']}'>{$row_type['name']}</option>";
    }
echo "</select></td>
</tr>
</table>
<input type='submit' name='field_add' value='Добавить поле'></form>";
}
//==============================================================================
//
//==============================================================================
?>