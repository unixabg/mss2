<?php
session_start();
if(!$_SESSION['user_level']) {
	header("Location: ./index.php");
}
if (isset($_POST['page_name']) && isset($_POST['page_style'])) {
	$page_name = $_POST['page_name'];
	$page_style = $_POST['page_style'];
	if (mkdir("./pages/$page_name")) {
		file_put_contents("./pages/$page_name/type", "$page_style");
		touch("./pages/$page_name/images.php");
		touch("./pages/$page_name/content.txt");
		header("Location: ./manage_pages.php?status=$page_name add.");
	} else {
		header("Location: ./manage_pages.php?status=$page_name failed to add.");
	}
} else {
	echo "All infomation was not filled out.";
}

?>
