<section class="img-upload">
	<?php
	if (isset($_GET['page'])) {
		$selected_page = $_GET['page'];
		$selected_page_title = str_replace('_', ' ', $selected_page);
	} else {
		header('location: index.php');
	}
	echo "<h1>Upload Audio Files for \"$selected_page_title\"";
	if (isset($_FILES['audio_file']['name']) && isset($_POST['name'])) {
		date_default_timezone_set('UTC');
		$file_name = $_FILES['audio_file']['name'];
		$file_type = $_FILES['audio_file']['type'];
		$file_size = $_FILES['audio_file']['size'];
		$file_tmp = $_FILES['audio_file']['tmp_name'];
		$extension = end(explode(".", $file_name));
		$name = $_POST['name'];
		$timestamp = date('YmdHis');
		echo "test: \"$extension\"";
		if ($extension == "mp3" || $extension == "MP3") {
			move_uploaded_file($file_tmp, "./pages/audio/$selected_page/$timestamp|$name.mp3");
			echo "File uploaded";
		} else {
			echo "File needs to be in mp3 format";
		}
	}
	?>
	<div class="upload-select">
		<form action="<?php echo $_SERVER['PHP_SELF']."?page=$selected_page"; ?>&type=audio" method="POST" enctype="multipart/form-data">
			Audio file must be in mp3 format.</br >
			File Name:<input type="text" name="name"/>
			Audio file:<input type="file" name="audio_file"/>
			<input type="submit" value="Upload"/>
		</form>
	</div>
</section>
