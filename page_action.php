<?php
session_start();
if(!$_SESSION['username']) {
	header("Location: ./index.php");
	exit;
}
<<<<<<< HEAD
if (isset($_GET['page'])) {
	function delTree($dir) {
	$page = $_GET['page'];
	$files = array_diff(scandir($dir), array('.','..'));
		foreach ($files as $file) {
				(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
=======
if (isset($_GET['page']) && isset($_GET['type'])) {
	function rrmdir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
>>>>>>> fdc9cd5... Updated code for modular design.
		}
		return rmdir($dir);
	}
<<<<<<< HEAD
	if (delTree("./pages/$page/")) {
		echo "page delete";
=======
	$page = $_GET['page'];
	$type = $_GET['type'];
	if (rrmdir("./pages/$type/$page/")) {
		echo "page deleted";
>>>>>>> fdc9cd5... Updated code for modular design.
		header('location: ./manage_pages.php');
	} else {
		echo "./pages/$type/$page/";
		echo "Problem deleting file.";
		header('location: ./manage_pages.php');
	}
} else {
	echo "Page was not set.";
}
?>
