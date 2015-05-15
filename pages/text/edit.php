<?php
if (isset($_POST['text']) && isset($_GET['page'])) {
	$text = $_POST['text'];
	$page = $_GET['page'];
	file_put_contents("./pages/text/$page/content.txt", $text);
	echo "test";
	echo $page;
	header("location: ./pages.php?page=$page&type=text");
}
if (isset($_GET['page'])) {
	$selected_page = $_GET['page'];
	$selected_page_title = str_replace('_', ' ', $selected_page);
	$contents = file_get_contents("./pages/text/$selected_page/content.txt");
} else {
	header('location: index.php');
}
if (isset($_GET['status'])) {
	$status = $_GET['status'];
}
?>
<section class="img-upload">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $selected_page; ?>&type=text" method="POST">
	<textarea class="text_area" name="text"> <?php echo $contents; ?></textarea>
	<input type="submit" value="Submit">
</form>
</section>
