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
	die('�� �� ����� ��� ������, ����������� ��� �����������');
    }
    if($password !== $passwordToo){
	die('��������� ������ �� ���������');
    }
    if($password_len < 8){
	die('������� �������� ������');
    }
    if( (preg_match("/[A-z][0-9]/", $password) = 0) and (preg_match("/[0-9][A-z]/", $password) = 0) ) {
	die('������ ������ ��������� � ����� � �����');
    
    $dbc = mysqli_connect('localhost', $mySqlLogin, $mySqlPassword, 'db')
			or die ('������ ���������� � Mysql-��������');
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
      die('������������ � ����� ������� ��� ����������');
    }
    if(mysqli_num_rows($dbEmail) >= 1){
      die('������������ � ����� E-mail ��� ����������');
    }
    // ������ ��� ����� ��������� ������ �� ��������� �����, ��� ��������� ������������
    //$header='Content-type: text/plain; charset=\�utf-8\�';
    $from='no-reply@mybook.ru';
    $hash_code = rand(100000, 999999);
    $subject = "������������ �����������";
    // ����� ��� ����� �������� �������� yousite �� ���� �����
    $message = "�� ������ ������ �� ����������� �� ����� mybook.ru " .
                                "����������� ���� ������ �� ������: " .
                                "http://localhost/mybook/handler/activate.php?hash=" . $hash_code;
    // ���������� ������
    if (!mail($email, $subject, $message, 'From:' . $from)){
      // ���� ������ �� ���������� �� ������ ������������ ����������� ������ ���� �����
      die('�� ����������� ������� �����');
    } else{
      // ���� ������ �����������, �� ��������� ������������ � ���� ������ � ��������������� ��� ����� ��� ���������
      $querySetHashcode = "INSERT INTO `db`.`users` (`Name`, `Email`, `Password`, `date_of_birth`, `login`, `status`, `reg`, `hashcode`)
					  VALUES ('$name', '$email', '$password', '$birthDay', '$login', '0', '0', '$hash_code')";
      $dbSetHashcode = mysqli_query($dbc,$querySetHashcode) or die (mysqli_error());
      mysqli_close($dbc);
      echo "<center><br>�� ��������� �������� ���� ���������� ������ � ������� ��� ��������� ������ ������� ��������.</center>";
      exit;
    }
?>
