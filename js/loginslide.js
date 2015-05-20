$(document).ready(function(){
	var slideHeight = $(".login-slide").outerHeight();
	$(".login-slide").css({"top": -slideHeight});
	$("[role='reveal']").mouseover(function(){
		$(".login-slide").stop().animate({"top": "0"});
	});
	$("[role='escape']").click(function() {
		$(".login-slide").stop().animate({"top": -slideHeight});
		return false;
	});
	var hideTimer = null;
	$(".login-slide").bind('mouseleave', function() {
		hideTimer = setTimeout(function() {
			$(".login-slide").stop().animate({"top": -slideHeight});
		}, 3000);
	});
});

