<?php
session_start();
if(!$_SESSION['username']) {
	header("Location: ./index.php");
}
if (isset($_GET['page'])) {
	$selected_page = $_GET['page'];
} else {
	header('location: index.php');
}
if (isset($_GET['status'])) {
	$status = $_GET['status'];
}
if (isset($_POST['cap']) && isset($_POST['img'])) {
	$img = $_POST['img'];
	$caption = $_POST['cap'];
	$array = array_combine($img, $caption);
	foreach ($array as $src => $text) {
		$file = file_get_contents("./pages/$selected_page/images.php");
		$line = "<div class=\"img-container\"><img src=\"$src\" title=\"$text\"/></div>";
		$file = str_replace($line, "\n", $file);
		$file = preg_replace('/^[ \t]*[\r\n]+/m', '', $file);
		file_put_contents("./pages/$selected_page/images.php", $file);
		unlink("./$src");
		header("locaton: ./edit_imgs.php?page=$selected_page&status=Deleted");
	}
} else {
	header("locaton: ./edit_imgs.php?page=$selected_page&status=Failed");
}
	echo "<title>$selected_page</title>";
?>
<html>
<head>
<?php include("header.php"); ?>
<script src="./js/logoslide.js"></script>
<script src="./js/imgPreview.js"></script>
<script src="./js/selectImg.js"></script>
</head>
<div class="container">
	<section class="main">
	<?php
			include("slider.php");
	?>
		<header role="banner"> <!-- begin content for the page -->
			<h1>Edit <?php echo $selected_page_title; ?></h1>
		</header> <!-- end [role="banner"] -->

		<section class="img-display">
			<div class="display-container">
				<form action="<?php echo $_SERVER['PHP_SELF']."?page=$selected_page"; ?>" method="POST">
					<?php
					// include first 16 lines of images.php
					$array = file("./pages/John/images.php");
					$count = count($array);
					for($i = 0; $i < $count; $i++) {
						echo $array[$i];
					}
					// create blank images so total fills 4 by 4 grid
					$line_count = count($array);
					if($line_count[1] == '') {
						$line_count--;
					}
					?>
					<div id="selected">
					</div>
			</div>
			<section class="full-display">
				<p>Select the image(s) you want to delete</p>
				<input type="submit" value="Delete">
			</section>
			</form>
		</section> <!-- end section.img-display -->

	</section> <!-- end section.main -->
</div> <!-- end div.container -->

</body>
</html>
