$(document).ready(function(){
	$('.views__fullscreen').on('click',function(){
		$(this).parent().find('a').click();
	});
	$('.product-item-scu-item-list').prepend($('.legs__item.selected'));
});






