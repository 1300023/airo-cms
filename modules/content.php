<?php 
//===============================================================
//Модуль Контентной страницы
//===============================================================
/*
$content.= "<p><table width='400' border='3' style='border-color:#5a5a5a; border-style: solid; border-spacing:0; border-width:thin;'><tr><td width='50%'>";
$sql=mysql_query("SELECT * FROM tree where pid=$get_razd_id ORDER BY id desc");
while($row=mysql_fetch_array($sql)){
	$content.="- <a href='/{$str_get}/{$row['eng_name']}/'>{$row['name']}</a><br>";
}

$content.= "</td><td width='50%' nowrap='nowrap'>";
$get_p=mysql_result(mysql_query("select * from tree where eng_name='{$parts[2]}'"),0,0);


//$content.="<p>[{$str_get}--[{$get_p}]</p>";

if(!empty($parts[2])){
$sql=mysql_query("SELECT * FROM tree where pid=$get_p ORDER BY id desc");
while($row2=mysql_fetch_array($sql)){
	$content.="- <a href='/{$str_get}/{$parts[2]}/{$row2['eng_name']}/'>{$row2['name']}</a><br>";
}
}

$content.= "</td></tr></table>";
*/
//echo "select * from message{$get_razd_id}";

if ($parts[1]=="nashi_partnery"){
$sql=@mysql_query("select * from message{$get_razd_id}");
while($row=@mysql_fetch_array($sql)){
	$content.="
	<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='1'><img src='/templates/demo/images/left_up.jpg' width='11' height='10'></td>
    <td width='100%' background='/templates/demo/images/up_bg.jpg'></td>
    <td width='1'><img src='/templates/demo/images/right-up-ugol.jpg' width='11' height='10'></td>
  </tr>
  <tr>
    <td width='1' height='92' background='/templates/demo/images/left_bg.jpg'>&nbsp;</td>
    <td width='88' bgcolor='#FFFFFF' valign='top'>
    
	<h1>{$row['name']}</h1>
	{$row['alltext']}<br>
	
	</td>
    <td width='10' background='/templates/demo/images/right_bg.jpg'></td>
  </tr>
  <tr>
    <td width='11'><img src='/templates/demo/images/left_ugol.jpg' width='11' height='11'></td>
    <td background='/templates/demo/images/down_bg.jpg'></td>
    <td width='10'><img src='/templates/demo/images/right_down_ugol.jpg' width='11' height='11'></td>
  </tr>
</table>

";
}
}elseif($parts[1]=="kontakty"){
	
	
	
	
	
	if ($_POST['send']) {
	
		$mail = "Внимание! Поступил Экспресс-заказ от клиента.\n\n";
	
		$mail .= "Имя: {$_POST['name']}\n";
		$mail .= "Компания: {$_POST['company']}\n";
		$mail .= "Город: {$_POST['town']}\n";
		$mail .= "Почта: {$_POST['email']}\n";
		$mail .= "Телефон: {$_POST['subject']}\n";
		$mail .= "Сообщение: {$_POST['texts']}\n";

	
	
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/plain; charset=\"windows-1251\"\r\n";
	
		mail("vektor189@mail.ru", "С сайта - vektor-mk.ru: {$_POST['subject']}.", $mail, $headers ) or die("не пошло");
		mail("vektor167@mail.ru", "С сайта - vektor-mk.ru: {$_POST['subject']}.", $mail, $headers ) or die("не пошло");
		mail("1300023@gmail.com", "С сайта - vektor-mk.ru: {$_POST['subject']}.", $mail, $headers ) or die("не пошло");
		
		//Vektor167@mail.ru
		
	echo "<script>alert('Письмо успешно отправлено!');</script>";
	}
	
	
	$sql=@mysql_query("select * from message426");
	while($row=@mysql_fetch_array($sql)){
		$content.="
		<h1>{$row['name']}</h1><br>
		{$row['alltext']}<br>
		<br>";
	}
	
$content.="<h1>Обратная связь</h1>";
$content.='
<form id="contact_form" action="/kontakty/" method="post">
  <strong>Имя:</strong>*<br>
  <input size="30" maxlength="1000" value="" name="name" type="text" class="required">
  <br>
  <br>
  <strong>Компания:</strong>*<br>
  <input size="30" maxlength="1000" value="" name="company" type="text" class="required">
  <br>
  <br>
  <strong>Город:</strong>*<br>
  <input size="30" maxlength="1000" value="" name="town" type="text" class="required">
  <br>
  <br>
  <strong>E-mail</strong>*<br>
  <input size="30" maxlength="1000" value="" name="email" type="text" class="required">
  <br>
  <br>
    <strong>Телефон</strong>*<br>
  <input size="30" maxlength="1000" value="" name="subject" type="text" class="required">
  <br>
  <br>
  <strong>Текст:</strong>*<br>
  <textarea cols="50" rows="7" name="texts"></textarea>
  <br>
  <br>
  <input name="send" type="submit" value="Отправить">
  <br>

</form>
		<br><br>
		';

}else{
	

$sql=@mysql_query("select * from message{$get_razd_id}");
while($row=@mysql_fetch_array($sql)){
	$content.="
	<h1>{$row['name']}</h1><br>
	{$row['alltext']}<br>
	<br>";
}
}

?>