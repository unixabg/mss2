<?php
session_start();
?>
<html>
<head>
<?php
include("header.php");
$page = $_GET['page'];
$type = $_GET['type'];
?>
<script src="./js/logoslide.js"></script>
<script src="./js/imgPreview.js"></script>
<script src="./js/imgDisplay.js"></script>
</head>
<div class="container">
	<section class="main">
	<?php
			include("slider.php");
	?>
		<header role="banner"> <!-- begin content for the page -->
			<?php
			echo "<h1>$page</h1>";
			if ($_SESSION['username']) {
				if ($type == "image_page") {
					echo "<a class=\"edit_imgs\" href=\"./edit_imgs.php?page=$page\">Manage Images</a>";
				} elseif ($type == "text_page") {
					echo "<a class=\"edit_imgs\" href=\"./edit_text.php?page=$page\">Manage Page</a>";
				}
			}
			echo "</header> <!-- end [role=\"banner\"] -->";
			if ($type == "image_page") {
			?>
			<section class="img-display">
				<div class="display-container">
					<?php
					// include first 16 lines of images.php
					$array = file("./pages/$page/images.php");
					for($i = 0; $i < 16; $i++) {
						echo $array[$i];
					}
					// create blank images so total fills 4 by 4 grid
					$line_count = count($array);
					if($line_count[1] == '') {
						$line_count--;
					}
					if($line_count <= 15) {
						for($i = $line_count; $i < 15; $i++) {
							echo "<div class=\"img-container\"><img src=\"./img/noimage.png\" title=\"\" /></div>";
						}
					}
					?>
				</div>
				<section class="full-display">
				</section>
			</section> <!-- end section.img-display -->
		<?php
		} else {
		?>
			<section class="text-display">
			<?php
			$content = file_get_contents("./pages/$page/content.txt");
			echo "<h1>$page</h1>
					<div class=\"text-content\">
						$content
					</div>";
			?>

			</secion>
		<?php
		}
		?>
	</section> <!-- end section.main -->
</div> <!-- end div.container -->

</body>
</html>
