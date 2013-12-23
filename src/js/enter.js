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

function postFormRegistration(){
  $.post(
    "/mybook/handler/registerHandler.php",
  {
    name: $('#name').val(),
    login: $('#login').val(),
    password: $('#password').val(),
    passwordToo: $('#passwordToo').val(),
    birthDay: $('#birthDay').val(),
    email: $('#email').val()
  },
  registrationSuccess
  );
}

function registrationSuccess(data){
 $.post(
    "/mybook/src/js/showModal.php",
  if (data=="Продолжить регистрацию"){
        document.location.href = "/mybook/page/postRegistration.php"
  } else {
        $('#error').html(data);
  }
}

function onAjaxSuccess(data){
  if (data=="Авторизация прошла успешно"){
        document.location.href = "/mybook/page/profile.php"
  } else {	
	var rnd = Math.round(Math.random()*(0-9999))+9999;
	$('#captcha_img').attr({"src":"/mybook/captcha.php?"+rnd});
	if (data !== 'update'){
	    $('#error').html(data);
	}
  }
}

function contactform() {
  $.post(
     "/mybook/handler/form_processing.php",
  {
    email: $('#email').val(),
    tema: $('#tema').val(),
    message: $('#message').val()
  }
   contactSuccess
   );
}


function contactSuccess(data){
  if (data=="Ваше сообщение отправлено"){
       document.location.href = "/mybook/src/js/showModal.js"
  } else {
        $('#error').html(data);
  }
}
