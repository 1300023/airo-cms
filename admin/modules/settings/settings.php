<?
echo "<h2>Настройки системы</h2>";

if (isset($_POST['settings_update'])){
	mysql_query("UPDATE settings SET name='{$_POST['site_name']}', domain='{$_POST['site_domain']}', email='{$_POST['site_email_admin']}', description='{$_POST['description']}', keywords='{$_POST['keywords']}' WHERE id='1'");
    echo mysql_error();
   echo "<p><font color='green'><b>Готово!</b></font></p>";	
}

$sql=mysql_query("SELECT * FROM settings WHERE id='1' limit 1");
while($row=mysql_fetch_array($sql)){
echo "<form action='/admin/index.php?path=settings' method='post'>
<table width='100%' border='0' cellspacing='3' cellpadding='3' class='tables'>
  <tr>
    <td width='1px' background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'>Название сайта</td>
    <td width='100%' class='tables'><input type='text' name='site_name' value='{$row['name']}' class='input_pole' size='75'></td>
  </tr>
  <tr>
    <td background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'>Домен сайта</td>
    <td class='tables'><input type='text' name='site_domain' value='{$row['domain']}' class='input_pole' size='75'></td>
  </tr>
  <tr>
    <td nowrap='nowrap' background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'>Email Администратора</td>
    <td class='tables'><input type='text' name='site_email_admin' class='input_pole' value='{$row['email']}' size='75'></td>
  </tr>
    <tr>
    <td nowrap='nowrap' valign='top' background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'>Ключевые слова</td>
    <td class='tables'>
    <textarea rows='5' cols='57' name='keywords' style='width:485px' class='textarea_pole'>{$row['keywords']}</textarea></td>
  </tr>
      <tr>
    <td nowrap='nowrap' valign='top' background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'>Описание сайта</td>
    <td class='tables'><textarea rows='5' cols='57' name='description' style='width:485px' class='textarea_pole'>{$row['description']}</textarea></td>
  </tr>
  <tr>
    <td colspan='2'><input type='submit' name='settings_update' value='Редактировать'></td>
  </tr>
</table>
</form>";
}
?>