<?php
session_start();
if(!$_SESSION['username']) {
	header("Location: ./index.php");
}
if (isset($_POST['password'])) {
	$username = $_POST['username'];
	$new_password = md5($_POST['password']);
	$old_password = md5($_POST['old_password']);
	$password_check = md5($_POST['password_check']);
	$file = file_get_contents("./users/$username");
	$explode = explode('#', "$file");
	$file_password = $explode['1'];
	if ($new_password == $password_check) {
		if ($file_password == $old_password) {
			file_put_contents("./users/$username", $explode['0']."#".$new_password."#".$explode['2']."#");
			header("location: ./edit_password.php?status=Password sucessfully changed.");
		} else {
			header("location: ./edit_password.php?status=Error opening file.");
		}
	} else {
			header("location: ./edit_password.php?status=Old Password did not match.");
	}
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
</head>
<div class="container">
	<section class="main">
		<header role="banner"> <!-- begin content for the page -->
			<h1>Change Password</h1>
		</header> <!-- end [role="banner"] -->
		<?php include("slider.php"); ?>
		<section class="img-upload">
			<div class="upload-location">
				<form action="./edit_password.php" method="POST" />
					<input type="password" name="old_password" placeholder="Old Password" />
					<input type="password" name="password" placeholder="Password" />
					<input type="password" name="password_check" placeholder="Retype Password" />
					<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>" />
					<input type="submit" value="Submit" />
				</form>
			</div>
		</section>
		<p class="upstatus">Status: <?php echo $status; ?></p>
	</section> <!-- end section.main -->
</div> <!-- end div.container -->

</body>
</html>
