$(function(){

	$('.js-toggle-btn').on('click', function(){
		$(this).toggleClass('active');
		$(this).parent().next('.js-toggle-info').slideToggle();
	});

});