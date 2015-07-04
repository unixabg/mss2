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
						<?php
						$types = scandir('./pages/');
						foreach ($types as $type) {
							if ($type != "." && $type != "..") {
								echo "<div class=\"page_type\">$type<input type=\"radio\" name=\"page_style\" value=\"$type\" id=\"$type\"><label for=\"$type\" ><img src=\"./pages/$type/icon.png\" alt=\"Image page\"/></label></div>";
							}
						}
						?>
						<input type="submit" value="Submit">
					</form>
				</div>
				<div class="half_right">
					<h1>Manage Pages</h1>
						<table>
							<tr>
								<th>Page Name</th>
								<th>Page Type</th>
								<th>Action</th>
							</tr>
						<?php
						$types = scandir("./pages/");
						if (count($types) > '2') {
							foreach ($types as $type) {
								if ($type != "." && $type != "..") {
									$pages = scandir("./pages/$type");
									foreach ($pages as $page) {
										if (is_dir("./pages/$type/$page") && $page != "." && $page != "..") {
											echo "<tr>
													<td>$page</td>
													<td>$type</td>
													<td><a href=\"page_action.php?page=$page&type=$type\">Delete</a>/<a href=\"./edit.php?page=$page&type=$type\">Edit</a></td>
												</tr>";
										}
									}
								}
							}
						}
						?>
					</table>
				</div>
			</div> <!-- end div.white_content-->
