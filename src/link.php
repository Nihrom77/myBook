<form method="POST" action="/my-form-action.php">
<p>Ваше имя:</p>
<input name="name">
<p>Ваш e-mail:</p>
<input name="contact">
<p>Тема сообщения:</p>
<input name="subject">
<p>Ваше сообщение:</p>
<textarea name="message"></textarea>
<p><input type="submit" value=" Отправить "></p>
</form>
<?
# получаем данные и отсекаем пробельные символы в начале и конце:
$name = @ trim ($_POST['name']);
$contact = @ trim ($_POST['contact']);
$message = @ trim ($_POST['message']);
# проверка, переданы ли все данные
if (! $name or ! $contact or ! $message) exit ('Необходимо заполнить все поля, вернитесь');
# отправка данных на мыло админу
mail ("Snoll@yandex.ru",
      "Сообщение с сайта (отправитель: $name)",
      "$message \n\n Контакты: \n $contact");
header ("Location: /my-form-ok.html");
?>