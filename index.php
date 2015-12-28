<?php
session_start();
	############################################################
	## set login to null if first form has not been submitted ##
	############################################################
	if(!isset($_POST['init'])) {
		$login = "";
	} else {
		require_once "login.php";
	}
?>
<html>
<head>
<?php include("header.php"); ?>
<script src="./js/logoslide.js"></script>
</head>
<div class="container">
	<section class="main">
	<?php include("slider.php"); ?>
		<header role="banner"> <!-- begin content for the page -->
			<h1>Welcome</h1>
		</header> <!-- end [role="banner"] -->
		<section class="store-info">
			<h2>Location</h2>
			<p>-- 123 Maple Street, New York, New York</p>
			<h2>Store Hours</h2>
			<p>-- Monday-Friday, 8am-7pm</p>
			<p>-- Saturday, 8am-3pm</p>
			<p>-- <B>Closed</B> on Sundays</p>
		</section> <!-- end section.store-info -->
	</section> <!-- end section.main -->
</div> <!-- end div.container -->

</body>
</html>
