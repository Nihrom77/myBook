<?php
  session_start();
  $userId = $_SESSION['id_online_user'];
  $mySqlLogin = 'root';
  $mySqlPassword = '2a92c9';

  $dbc = mysqli_connect('localhost', $mySqlLogin, $mySqlPassword, 'db')
			or die ('Ошибка соединения с Mysql-сервером');
  $queryGetUserContentById = "SELECT * FROM `users` WHERE `users`.`id`='{$userId}'";
  $dbUserContent = mysqli_query($dbc,$queryGetUserContentById) 
			or die (mysqli_error());
  $row = mysqli_fetch_assoc($dbUserContent);
  mysqli_close($dbc);
  $name = $row['Name'];
  $email = $row['Email'];
  $urlAvatar = $row['url_avatar'];
  $birthDay = $row['date_of_birth'];
  $idBook = $row['id_book'];
  $login = $row['login'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Личная страница <?php echo "$name"; ?></title>
	<style>
		.top_hello {
			background: #db9133; color: #000; font-weight: bold; font-size: 20px;
			padding:5px; width:auto;
		}
		.profile_tbl {
			display: block; border-radius: 5px; border: 1px solid #d26511;
			box-shadow: 0 0 10px #b8b8b8; width: 912px; margin: 30px;
		}
		.menu_pro {
			padding:0px; margin: 0px;
			list-style: none; display: block;
		}
		.menu_pro li {
			padding:auto; margin: auto; float:left;
		}
		.menu_pro li a {
			padding:10px; background:#e2dac3;
			font-size:12px; text-decoration: none; width: auto;
		}
		.menu_pro li a:hover {
			background:#b7b19e;
		}
	</style>
	</head>

	<body style="padding:0px; margin:0px; font-family:arial; font-size:12px;">
		<div  class="profile_tbl"><table width="912" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td class="top_hello"><?php echo "$name"; ?></td>
			</tr>
			<tr>
				<td style="padding:10px;"><ul class="menu_pro">
						<li><a href="/mybook/page/profile.php">Мой профиль</a></li>
						<li><a href="javascript://">Мои друзья</a></li>
						<li><a href="javascript://">Мои группы</a></li>
						<li><a href="javascript://">Мои книги</a></li>
						<li><a href="javascript://">Мои настройки</a></li>
						<li><a href="javascript://">Обратная связь</a></li>
					</ul></td>
			</tr>
			<tr>
				<td valign="top" align="center">
					<table width="300" border="0" cellpadding="5" cellspacing="0" align="center">
						<tr>
							<td>Логин:</td>
							<td><?php echo "$login"; ?></td>
						</tr>
						<tr>
							<td>Дата рождения:</td>
							<td><?php echo "$birthDay"; ?></td>
						</tr>
						<tr>
							<td>ФИО:</td>
							<td><?php echo "$name"; ?></td>
						</tr>
						<tr>
							<td colspan="2"><a href="/mybook/index.php?logout" style="text-decoration: none;"><input type="button" value="Выйти с сайта"></a></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		<center><span class="bottom">© 2013 Copyright myBook TEAM. All rights reserved. Любое копирование без письменного разрешения запрещенно.</span></center>

	</body>
</html>
