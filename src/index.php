﻿<?php
session_start();
if (isset($_GET['logout'])) {
	 if (isset($_SESSION['id_online_user'])) {
	 $dbc = mysqli_connect('localhost', 'root', '', 'db') or die ('Ошибка соединения с Mysql-сервером');
	 $id = $_SESSION['id_online_user'];
	// $ip = $_SERVER["REMOTE_ADDR"];
	 $loginHis = $_SESSION['login_user'];
	 $last_date = time();
	 $query = "UPDATE `db`.`users` SET `status` = '0' WHERE `users`.`id` ='$id';";
	 $sql = mysqli_query($dbc,$query) or die (mysqli_error());
	 mysqli_close($dbc);
	   	unset($_SESSION['id_online_user']);
unset($_SESSION['login_user']);
	 }
}
if (isset($_SESSION['id_online_user'])) {
 header('Location: /mybook/page/profile.php');
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>myBook | Добро пожаловать</title>
		<link rel="stylesheet" href="/mybook/CSS/style.css" type="text/css" />
		<script src="js/jQuery1-3.js"></script>
		<script src="js/enter.js"></script>
	</head>
	<body style="background-image: url(img/pattern.png), url(img/bg_my.jpg);">
		<table cellpadding="0" cellspacing="0" border="0" style="margin-top: 20%;" class="tbl_login" align="center">
			<tr>
				<td colspan="3"><h1>Авторизация</h1></td>
			</tr>
			<tr>
			 <td colspan="3"><div id="error" style="text-align: center;font-size: 16px;"></div></td>
			</tr>
			<tr>
				<td>Логин:</td>
				<td colspan="2"><input type="text" id="login_value" class="log_form_input" /></td>
			</tr>
			<tr>
				<td>Пароль:</td>
				<td colspan="2"><input type="password" id="password_value" class="log_form_input" /></td>
			</tr>
			<tr>
				    <td  align="right">Код безопасноти:</td>
				    <td valign="middle" align="left">
					<img style="border: 1px solid gray; background: url('/bg_capcha.png'); cursor:pointer;" id="captcha_img" src = "captcha.php" width="120" height="40" onclick="onAjaxSuccess('update');" />
				    </td>
				    <td valign="middle" align="left"> <input type="text" class="log_form_input" style="width:80px; height: 20px; padding:10px;" maxlength="6" name="capcha" id="captcha" /></td>
				</tr>
			<tr>
				<td colspan="3" align="center"><a href="forgotPass.php">Забыли вы пароль?</a> | <a href="page/register.php">Регистрация</a></td>
			</tr>
			<tr>
				<td colspan="3" align="cetner">
					<center><input type="button" onClick="postForm();" value="Добро пожаловать" class="log_form_btn" ></center>
				</td>
			</tr>
		</table>
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		<center><span class="bottom">© 2013 Copyright myBook TEAM. All rights reserved. Любое копирование без письменного разрешения запрещенно.</span></center>
	</body>
</html>

