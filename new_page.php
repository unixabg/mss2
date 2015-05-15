<?php
session_start();
if(!$_SESSION['user_level']) {
	header("Location: ./index.php");
}
if (isset($_POST['page_name']) && isset($_POST['page_style'])) {
	$page_name = $_POST['page_name'];
	$page_style = $_POST['page_style'];
	if (mkdir("./pages/$page_style/$page_name")) {
		header("Location: ./manage_pages.php?status=$page_name add.");
	} else {
		header("Location: ./manage_pages.php?status=$page_name failed to add.");
	}
} else {
	echo "All infomation was not filled out.";
}

?>
