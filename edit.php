<?php
session_start();
if(!$_SESSION['username']) {
	header("Location: ./index.php");
}
if (isset($_GET['type']) && isset($_GET['page'])) {
	$page_type = $_GET['type'];
	$page = $_GET['page'];
} else {
	echo "Page type not defined.";
}
?>
<html>
<head>
<?php include("./header.php"); ?>
<script src="./js/logoslide.js"></script>
<script src="./js/imgPreview.js"></script>
</head>
<div class="container">
	<section class="main">
		<header role="banner"> <!-- begin content for the page -->
			<h1>Welcome</h1>
		</header> <!-- end [role="banner"] -->
		<?php
		include("./slider.php");
		include("./pages/$page_type/edit.php");
		?>
	</section> <!-- end section.main -->
</div> <!-- end div.container -->

</body>
</html>

