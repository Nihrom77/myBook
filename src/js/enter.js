function postForm() {
  $.post(
  "/mybook/handler/login.php",
  {
    login: $('#login_value').val(),
    password: $('#password_value').val(),
    captcha: $('#captcha').val()
  },
  onAjaxSuccess
  );
}
function onAjaxSuccess(data)
{
  if (data=="Авторизация прошла успешно") {document.location.href = "/mybook/page/profile.php"} else 
  {	
	var rnd = Math.round(Math.random()*(0-9999))+9999;
	$('#captcha_img').attr({"src":"/mybook/captcha.php?"+rnd});
	if (data=='update') { } else {$('#error').html(data);}
  }
}
