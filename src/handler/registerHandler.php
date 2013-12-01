<?php	
  $mySqlLogin = 'root';
  $mySqlPassword = '2a92c9';
  $name = $_POST['name'];
  $login = $_POST['login'];
  $password = sha1($_POST['password']);
  $passwordToo = sha1($_POST['passwordToo']);
  $birthDay = $_POST['birthDay'];
  $email = $_POST['email'];
  $password_len = strlen($password);
    if($name == "" || 
      $login == "" || 
      $password == sha1("") ||
      $passwordToo == sha1("") ||
      $email == ""){
	die('Вы не ввели все данные, необходимые для регистрации');
    }
    if($password !== $passwordToo){
	die('Введенные пароли не совпадают');
    }
    if($password_len < 8){
	die('Слишком короткий пароль');
    }
    if( (preg_match("/[A-z][0-9]/", $password) = 0) and (preg_match("/[0-9][A-z]/", $password) = 0) ) {
	die('Пароль должен содержать и буквы и цифры');
    
    $dbc = mysqli_connect('localhost', $mySqlLogin, $mySqlPassword, 'db')
			or die ('Ошибка соединения с Mysql-сервером');
    $queryContainsLogin = "SELECT `id`
		    FROM `db`.`users`
		    WHERE `login`='$login' AND `reg` = '1'
		    LIMIT 1";    
    $dbLogin = mysqli_query($dbc,$queryContainsLogin) 
			or die (mysqli_error($dbc));
    $queryContainsEmail = "SELECT `id`
		    FROM `db`.`users`
		    WHERE `email`='$email' AND `reg` = '1'
		    LIMIT 1";
    $dbEmail = mysqli_query($dbc,$queryContainsEmail) or die (mysqli_error());
    if(mysqli_num_rows($dbLogin) >= 1){
      die('Пользователь с таким логином уже существует');
    }
    if(mysqli_num_rows($dbEmail) >= 1){
      die('Пользователь с таким E-mail уже существует');
    }
    // теперь нам нужно отправить ссылку на указанную почту, для активации пользователя
    //$header='Content-type: text/plain; charset=\’utf-8\’';
    $from='no-reply@mybook.ru';
    $hash_code = rand(100000, 999999);
    $subject = "Подтвержение регистрации";
    // здесь вам нужно поменять значение yousite на свой домен
    $message = "Вы подали заявку на регистрацию на сейте mybook.ru " .
                                "Подтвердите свою заявку по ссылке: " .
                                "http://localhost/mybook/handler/activate.php?hash=" . $hash_code;
    // отправляем письмо
    if (!mail($email, $subject, $message, 'From:' . $from)){
      // если письмо не отправлено то значит пользователь некорректно указал свою почту
      die('Вы неправильно указали почту');
    } else{
      // если письмо отправилось, то добавляем пользователя в базу данных с сгенерированным хеш кодом для активации
      $querySetHashcode = "INSERT INTO `db`.`users` (`Name`, `Email`, `Password`, `date_of_birth`, `login`, `status`, `reg`, `hashcode`)
					  VALUES ('$name', '$email', '$password', '$birthDay', '$login', '0', '0', '$hash_code')";
      $dbSetHashcode = mysqli_query($dbc,$querySetHashcode) or die (mysqli_error());
      mysqli_close($dbc);
      echo "<center><br>На указанный почтовый ящик отправлено письмо с ссылкой для активации вашего личного кабинета.</center>";
      exit;
    }
?>
