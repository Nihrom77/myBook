<?php	
    $mySqlLogin = 'root';
    $mySqlPassword = '2a92c9';
    $hashcode = $_GET['hash'];
    $dbc = mysqli_connect('localhost', $mySqlLogin, $mySqlPassword, 'db')
			or die ('Ошибка соединения с Mysql-сервером');
    $queryGetUserContentByHashcode = "SELECT * FROM `users` WHERE `users`.`hashcode`='$hashcode'";
    $dbUserContent = mysqli_query($dbc,$queryGetUserContentByHashcode) 
			or die (mysqli_error());
    if(mysqli_num_rows($dbUserContent) > 0){
      $queryActivateUser = "UPDATE `db`.`users` SET `reg` = '1', `hashcode` = '' WHERE `users`.`hashcode` ='$hashcode'";
      mysqli_query($dbc,$queryActivateUser) 
			or die (mysqli_error());
      mysqli_close($dbc);
      echo "<center><br><a href='/mybook/page/profile.php'>Учетная запись активирована. Вернуться на главную.</a></center>";
      exit;
    } else{
        die('Произошла ошибка.');
    }
    mysqli_close($dbc);
    //$_SESSION['id_online_user'] = $row['id'];
    //$ip = $_SERVER["REMOTE_ADDR"];
    //$last_date = time();    
?>
