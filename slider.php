		<div class="login-slide">
			<a href="" role="escape">X</a>
<?php
	if(!$_SESSION['username']) {
?>
			<form action="./login.php" method="POST">
				<fieldset role="login-field-container">
					<header role="login-header">
						<h2>Login <small>(Administrators only)</small></h2>
					</header>
					<label for="usrname">Username:</label>
					<input type="text" name="usrname" autocomplete="off"/>
					<label for="passwd">Password:</label>
					<input type="password" name="passwd" />
					<input type="hidden" name="init" value="true" />
					<input type="submit" value="submit" />
				</fieldset>
			</form>
<?php
	} else {
?>
			<div class="admin-content">
				<section class="admin-tools">
					<h2>Tools <small>(<a href="./logout.php">logout</a>)</small></h2>
					<p><a class="admin_options" href="./manage_pages.php">Manage Pages</a></p>
					<?php
					if ($_SESSION['user_level'] == "admin") {
						echo "<a class=\"admin_options\" href=\"./manage_users.php\">Manage Users</a>";
					}
					?>
					<p><a class="admin_options" href="./edit_password.php">Change Password</a></p>
				</section>
			</div>
<?php
	}
?>
		</div> <!-- end div.login-slide -->

