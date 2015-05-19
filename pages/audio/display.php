<section class="text-display">
	<link rel="stylesheet" href="./pages/audio/style.css"/>
	<script src="./pages/audio/audio.js"></script>
		<h1 class="audio_title">Song</h1>
	<audio id="player" controls="controls" >
		<source id="playing" src="song.mp3" type="audio/mpeg">
		Your browser does not support HTML5 audio player
	</audio>
	<?php
	echo "<ul class=\"audio_container\">";
	$files = scandir("./pages/audio/$page");
	foreach ($files as $file) {
		$extension = end(explode(".", $file));
		$array = explode("|", $file);
		$name = $array[1];
		$name = basename($name, ".mp3");
		if ($extension == "mp3" || $extension == "MP3") {
			echo "<li><a class=\"song_link\" href=\"./pages/audio/$page/$file\">$name</a></li>";
		}
	}
	echo "</ul>";
	?>
</section>
