$(document).ready(function(){
	//formulaire select
	$('select').formSelect();

	//modal
	$('#submit').click(function() {
		$('.modal').css('display','block');
	});
});