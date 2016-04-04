<?
$adm = false;

$res = '';

// Ввели пароль
if ((!empty($_POST['e_login']))&&(!empty($_POST['e_pass']))) { 
	session_unset();
	$_POST['e_login'] = strtolower($_POST['e_login']); //понмжаем регистр
	$_POST['e_login'] = htmlspecialchars($_POST['e_login']); //проверяем спецчарсы
	
	$get_login=@mysql_result(mysql_query("select login from users where login='{$_POST['e_login']}'"),0,0);
	$get_password=@mysql_result(mysql_query("select password from users where login='{$_POST['e_login']}'"),0,0);
	$get_level=@mysql_result(mysql_query("select level from users where login='{$_POST['e_login']}'"),0,0);
	$get_name=@mysql_result(mysql_query("select name from users where login='{$_POST['e_login']}'"),0,0);
	
	$succes_password=md5($_POST['e_pass']);

	if (($succes_password != $get_password)||($_POST['e_login'] != $get_login)) {
		sleep(1);
		$res ='Вы ввели неверное имя пользователя или неверный пароль!';
		//echo $res;
	} else {
		session_start();
	$_SESSION['login'] = $_POST['e_login']; 
	$_SESSION['pass'] =$succes_password;
	$_SESSION['level'] =$get_level;
	$_SESSION['name'] =$get_name;
		
		
	//	$_SESSION['login'] = $_POST['e_login']; 
//	$_SESSION['pass'] = md5($_POST['e_pass']);
	//$_SESSION['level'] =$get_level;
		$adm = true;
	}
	
} else {
	// проверка сессии
	session_start();
	if ((!empty($_SESSION['login']))&&(!empty($_SESSION['pass']))) {
	$get_login=@mysql_result(mysql_query("select login from users where login='{$_SESSION['login']}'"),0,0);
	$get_password=@mysql_result(mysql_query("select password from users where login='{$_SESSION['login']}'"),0,0);
	$x_login = $_SESSION['login']; 
	$x_pass = $_SESSION['pass'];
//echo "<script>alert('x_login {$x_login} =={$get_login},x_pass {$x_pass}=={$get_password}');</script>";
		
if (($x_login == $get_login)&&($x_pass == $get_password)) { $adm = true; }
	}
}



// не админ!?!?
if ($adm != true) { ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Air-CMS - вход в систему администрирования</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="/images/admin/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table cellpadding="0" cellpadding="0" border="0" style=" height:100%; width:100%">
	<tr>
    	<td style="height:100%; vertical-align:middle">
<table align="center" cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
    	<td width="26" height="26"><img src="/admin/template/img/ugol_top_left.jpg" width="26" height="26"></td>
    	<td height="26" background="/admin/template/img/bg_top.jpg" style="background-repeat:repeat-x;"><img src="/admin/template/img/bg_top.jpg" width="1" height="26"></td>
    	<td width="26" height="26"><img src="/admin/template/img/ugol_top_right.jpg" width="26" height="26"></td>
    </tr>
	<tr>
    	<td width="26" background="/admin/template/img/bg_left.jpg" style="background-repeat:repeat-y;"><img src="/admin/template/img/bg_left.jpg" width="26" height="1"></td>
    	<td style="padding: 10px 40px 30px 40px;">
    	<form name=new method=post>
        	<table width="100%" cellpadding="0" cellspacing="0" border="0">
            	<tr>
                	<td align="center"><img src="/admin/template/img/air-cms.jpg"></td>
                </tr>
            	<tr>
                	<td height="20px"></td>
                </tr>
            	<tr>
                	<td><input name="e_login" type="text" title="" value="" class="input_auth"></td>
                </tr>
            	<tr>
                	<td height="10px"></td>
                </tr>
            	<tr>
                	<td><input name="e_pass" type="password" title="" value="" class="input_auth"></td>
                </tr>
            	<tr>
                	<td height="20px"></td>
                </tr>
            	<tr>
                	<td align="center"><input  type="image" value="" src="/admin/template/img/enter.jpg" alt="3333" hspace="0" vspace="0" border="0"></td>
                </tr>
            </table>
            </form>
        </td>
    	<td width="26" background="/admin/template/img/bg_right.jpg" style="background-repeat:repeat-y;"><img src="/admin/template/img/bg_right.jpg" width="26" height="1"></td>
    </tr>
	<tr>
    	<td width="26" height="26"><img src="/admin/template/img/ugol_down_left.jpg" width="26" height="26"></td>
    	<td height="26" background="/admin/template/img/bg_down.jpg" style="background-repeat:repeat-x;"><img src="/admin/template/img/bg_down.jpg" width="1" height="26"></td>
    	<td width="26" height="26"><img src="/admin/template/img/ugol_down_right.jpg" width="26" height="26"></td>
    </tr>
</table>
</td>
</tr> 
</table>
</body>
</html>
 
	<html><body>
	
	<?
	die;
}
	
?>