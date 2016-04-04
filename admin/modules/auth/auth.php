<? 
if ($_GET['do']=="exit"){
	session_unset();
echo "<META http-equiv='refresh' content='0; url=/admin/'> ";
}


echo "<h2>Управление пользователями</h2>";

if ($_GET['do']=="del_user"){
    mysql_query("DELETE FROM users WHERE id='{$_GET['id']}'");
    echo mysql_error();
    echo "<script>alert('Пользователь удалён!');</script>";
}


echo "<p><b>Добавить пользователя.</b></p>";
if (isset($_POST['auth_add'])){
	$password=md5($_POST['auth_password']);
	mysql_query("insert into users SET login='{$_POST['auth_login']}', password='{$password}', name='{$_POST['auth_name']}', level='{$_POST['auth_level']}'");
	
	echo mysql_error();

	echo "<script>alert('Пользователь добавлен.');</script>";
}
echo "<form action='/admin/index.php?path=auth' method='post'>
<table>
<tr>
<td background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'>Логин</td><td class='tables'><input type='text' name='auth_login'></td>
</tr>
<tr>
<td background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'>Пароль</td><td class='tables'><input type='text' name='auth_password'></td>
</tr>
<tr>
<td background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'>Имя</td><td class='tables'><input type='text' name='auth_name'></td>
</tr>
<tr>
<td background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x' class='tables'>Уровень доступа</td>
<td class='tables'>
<select name='auth_level'>
<option value='1'>Администратор</option>
<option value='2'>Редактор</option>
</select>
</td>
</tr>
<tr>
<td colspan='2' class='tables'><input type='submit' name='auth_add' value='Добавить'></td>
</tr>
</table>
</form>
";

echo "<p><b>Список пользователей.</b></p>";
$i=0;
echo "<table width='500px' cellpadding='5' class='tables'>";
   echo "<tr class='tables'>
    <td class='tables' align='center' background='/admin/template/img/bg_tables.jpg'>№</td>
    <td class='tables' align='center' background='/admin/template/img/bg_tables.jpg'>Логин</td>
    <td class='tables' align='center' background='/admin/template/img/bg_tables.jpg'>Описание</td>
    <td class='tables' align='center' background='/admin/template/img/bg_tables.jpg'>Управление</td>
    </tr>";
$sql=mysql_query("select * FROM users order by id asc");
while($row=mysql_fetch_array($sql)){
	if ($row['level']=="0"){
		if ($_SESSION['level']==0){
		echo "<tr class='tables'>
		<td class='tables'>{$i}</td> <td class='tables'><b>{$row['login']}</b></td><td class='tables'>{$row['name']}</td><td class='tables'></td>
		</tr>
		";
		}
	}else{
		echo "
		<tr class='tables'>
		<td class='tables'>{$i}</td><td class='tables'>{$row['login']}</td><td class='tables'>{$row['name']}</td><td class='tables'><a href='/admin/?path=auth&do=del_user&id={$row['id']}'><font color='red'>x</font></a></td>
		</tr>";
	}
	$i++;
}
echo "</table>";

?>