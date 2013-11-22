<?php
session_start();
	if ($_POST['captcha']!=="") {
	if ($_POST['captcha'] !== $_SESSION['captcha']) {echo "Код безопасности введен <b>не верно</b>!";} else {
	   if ($_POST['login']!=="" && $_POST['password']!=="")
	{
	    $login = $_POST['login'];
	    $password = sha1($_POST['password']);
	    	$dbc = mysqli_connect('localhost', 'root', '', 'db')
			or die ('Ошибка соединения с Mysql-сервером');
		
	    $query = "SELECT `id`,`login`
		    FROM `users`
		    WHERE `login`='{$login}' AND `password`='{$password}'
		    LIMIT 1";
	    $sql = mysqli_query($dbc,$query) or die (mysqli_error());

	    // если такой пользователь нашелся
	    if (mysqli_num_rows($sql) == 1) {
		$row = mysqli_fetch_array($sql);
		$_SESSION['id_online_user'] = $row['id'];
		$id = $_SESSION['id_online_user'];
		$loginHis = $row['login'];
		$_SESSION['login_user'] = $loginHis;
		//$ip = $_SERVER["REMOTE_ADDR"];
		//$last_date = time();
		$query = "UPDATE `db`.`users` SET `status` = '1' WHERE `users`.`id` ='$id';";
		$sql = mysqli_query($dbc,$query) or die (mysqli_error());
		mysqli_close($dbc);
		echo ("Авторизация прошла успешно");
		exit;
	    }
	    else {
		die('Вы ввели ошибочные данные');
	    }
		mysqli_close($dbc);
	} else {echo "Вы не ввели Логин/Пароль";}
	}} else
	 {
		echo "Вы не ввели код безопасности";
	 }

?>
