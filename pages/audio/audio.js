$(document).ready(function() {
	playing = $("#playing").attr('src');
	$(".song_link").click(function() {
		file = $(this).attr('href');
		var audio = $("#player")[0];
		var  title = $(this).text();
		$("#playing").attr('src', file);
		audio.pause();
		audio.load();
		audio.play();
		$(".audio_title").text(title);
		return false;
	});
});
