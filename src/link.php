<form method="POST" action="/my-form-action.php">
<p>���� ���:</p>
<input name="name">
<p>��� e-mail:</p>
<input name="contact">
<p>���� ���������:</p>
<input name="subject">
<p>���� ���������:</p>
<textarea name="message"></textarea>
<p><input type="submit" value=" ��������� "></p>
</form>
<?
# �������� ������ � �������� ���������� ������� � ������ � �����:
$name = @ trim ($_POST['name']);
$contact = @ trim ($_POST['contact']);
$message = @ trim ($_POST['message']);
# ��������, �������� �� ��� ������
if (! $name or ! $contact or ! $message) exit ('���������� ��������� ��� ����, ���������');
# �������� ������ �� ���� ������
mail ("Snoll@yandex.ru",
      "��������� � ����� (�����������: $name)",
      "$message \n\n ��������: \n $contact");
header ("Location: /my-form-ok.html");
?>