<section class="img-display">
	<div class="display-container">
		<?php
		// include first 16 lines of images.php
		$array = file("./pages/basic/$page/images.php");
		$count = count($array);
		for($i = 0; $i < $count; $i++) {
			echo $array[$i];
		}
		// create blank images so total fills 4 by 4 grid
		$line_count = count($array);
		if($line_count[1] == '') {
			$line_count--;
		}
		if($line_count <= 15) {
			for($i = $line_count; $i < 16; $i++) {
				echo "<div class=\"img-container\"><img src=\"./img/noimage.png\" title=\"\" /></div>";
			}
		}
		?>
	</div>
	<section class="full-display">
	</section>
</section> <!-- end section.img-display -->
