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
				<h1>Create New Page</h1>
			</header> <!-- end [role="banner"] -->
			<?php include("slider.php"); ?>
			<div class="white_content">
				<div class="half_left">
					<form action="./new_page.php" method="POST">
						<input type="text" name="page_name" placeholder="Page Name">
						<div class="page_type">Image Page<input type="radio" name="page_style" value="image_page" id="image_page"><label for="image_page" ><img src="./img/image_page.png" alt="Image page"/></label></div>
						<div class="page_type">Text Page<input type="radio" name="page_style" value="text_page" id="text_page"><label for="text_page"><img src="./img/text_page.png" alt="Text page"/></label></div>
						<input type="submit" value="Submit">
					</form>
				</div>
				<div class="half_right">
					<h1>Manage Pages</h1>
						<table>
							<tr>
								<th>Page Name</th>
								<th>Action</th>
							</tr>
						<?php
						$pages = scandir("./pages");
						if (count($pages) > '2') {
							foreach ($pages as $page) {
								if ($page != "." && $page != "..") {
									echo "<tr>
											<td>$page</td>
											<td><a href=\"page_action.php?page=$page\">Delete</a>/<a href=\"upload_img.php\">Edit</a></td>
										</tr>";
								}
							}
						}
						?>
					</table>
				</div>
			</div> <!-- end div.white_content-->
