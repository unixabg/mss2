<?php
session_start();
if(!$_SESSION['username']) {
	header("Location: ./index.php");
}
?>
<html>
<head>
<?php include("header.php"); ?>
<script src="./js/logoslide.js"></script>
<script src="./js/imgPreview.js"></script>
</head>
<div class="container">
	<section class="main">
		<header role="banner"> <!-- begin content for the page -->
			<h1>Welcome</h1>
		</header> <!-- end [role="banner"] -->
		<?php include("slider.php"); ?>
		<div class="white_content">
			<div class="admin_menu">
				<div class="menu_option">
					<h2>Manage Pages</h2>
					<a href="./manage_pages.php"> <img class="admin_icons" role="page_manger" src="./img/page_manger.png" alt="Page Manger"/></a>
				</div>
				<div class="menu_option">
					<h2>Manage Users</h2>
					<a href="./manage_users.php"><img class="admin_icons" role="user_manger" src="./img/user_manger.png" alt="User Manger"/></a>
				</div>
				<div class="menu_option">
					<h2>Change Password</h2>
					<a href="./edit_password.php"><img class="admin_icons" role="change_password" src="./img/change_password.png" alt="Change Password"/></a>
				</div>
			</div>
		</div>
	</section> <!-- end section.main -->
</div> <!-- end div.container -->

</body>
</html>
