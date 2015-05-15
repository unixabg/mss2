<section class="text-display">
<?php
$content = file_get_contents("./pages/text/$page/content.txt");
echo "<h1>$page</h1>
	<div class=\"text-content\">
		$content
	</div>";
?>

</secion>
