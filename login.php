<?php
$user = htmlentities($_POST['usrname']);
$pass = md5(htmlentities($_POST['passwd']));
$handle = "./users/$user";
if(file_exists($handle)) {
	$fetch = file_get_contents($handle);
	$data = explode('#', $fetch);
	$username = $data['0'];
	$passwd = $data['1'];
	$user_level = $data['2'];
	if($user != $username || $pass != $passwd) {
		$login = "<p>Incorrect Username or Password</p>";
	} else {
			session_start();
		if ($user_level == "10") {
			$_SESSION['user_level'] = "admin";
		} else {
			$_SESSION['user_level'] = "basic";
		}
		$_SESSION['username'] = $username;
		header("Location: ./admin.php");
	}
} else {
	$login = "<p>Incorrect Username or Password</p>";
	echo $login;
}
?>
