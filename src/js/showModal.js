function showModal(type,msg,flag){
    if (type=='error') {
	var imgType = ["src/Error.png"];
	var title='Error';
	}
	if (type=='success') {
	var imgType = ["src/galochka.png"];
	var title='Success';
	}
	if (type=='info') {
	var imgType = ["src/info.png"];
	var title='Info';
	}
	if (type=='warning') {
	var imgType = ["src/warning.png"];
	var title='Warning';
	}
	var heightBody = $("body").height();
	var widthBody = $("body").width();
	var cleanLeftForModal = (widthBody/2)-($('#showModalMsg').width()/2);
	var cleanTopForModal = $(window).height()/2-$('#showModalMsg').height();
	$('#backShowModal').css({"height": heightBody+'px'});
	$('#showModalMsg').css({"left": cleanLeftForModal+'px',"top": cleanTopForModal+'px'});
	$('#titleShowModal').text(title);
	document.getElementById('imgShowModal').src = imgType[0];
	if (flag==1) {
		$('#msgShowModal').html(window[msg]);
	} else
	 {
		$('#msgShowModal').html(msg);
	 }
	showShowModal();
}
function showShowModal() {
	$('#backShowModal').fadeIn();
	$('#showModalMsg').slideDown();
}
function closeShowModal() {
	$('#backShowModal').slideUp();
 	$('#showModalMsg').fadeOut();
}
$( document ).ready(function() {
	$("#backShowModal").click(function(){
	closeShowModal();


});
});