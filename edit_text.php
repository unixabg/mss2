
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
	</section> <!-- end section.main -->
</div> <!-- end div.container -->

</body>
</html>
