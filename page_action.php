<?php
session_start();
if(!$_SESSION['username']) {
	header("Location: ./index.php");
	exit;
}
if (isset($_GET['page'])) {
	function delTree($dir) {
	$page = $_GET['page'];
	$files = array_diff(scandir($dir), array('.','..'));
		foreach ($files as $file) {
				(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
		}
		return rmdir($dir);
	}
	if (delTree("./pages/$page/")) {
		echo "page delete";
		header('location: ./manage_pages.php');
	} else {
		echo "Problem deleting file.";
		header('location: ./manage_pages.php');
	}
} else {
	echo "Page was not set.";
}
?>
