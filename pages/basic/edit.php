		<section class="img-upload">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $_GET['page']; ?>&type=basic" method="POST" enctype="multipart/form-data">
					<div class="upload-location">
						<?php
							echo "<label for=\"updir\">This image upload is for page ".$_GET['page'].".</label>";
						?>
					</div>
					<div class="upload-select">
						<input multiple type="file" value="Choose File" name="file" onchange="readURL(this);"><br>
						<img id="imgPreview" src="#" alt="your image" onError="this.onerror=null;this.src='./img/noimage.png';"/><br>
						<input type="textarea" role="caption-input" name="caption" autocomplete="off" placeholder="Caption..." />
						<input type="hidden" name="updir" value="./pages/basic/<?php echo $_GET['page']; ?>" />
						<input type="hidden" name="init" value="true" />
						<input type="submit" value="upload" />
					</div>
				</form>
				<?php
				date_default_timezone_set('UTC');

				if(!isset($_POST['init'])) {
					$upstatus = "";
				} else {
					$updir = $_POST['updir'];
					$captext = $_POST['caption'];
					$file_name = $_FILES['file']['name'];
					$file_type = $_FILES['file']['type'];
					$file_size = $_FILES['file']['size'];
					$file_tmp = $_FILES['file']['tmp_name'];
					$extension = end(explode(".", $file_name));
					$timestamp = date('YmdHis');
					$max_size= 5000000;
					if(isset($file_name)) {
						if(($extension == "jpg" || $extension == "png" || $extension == "jpeg"
						|| $extension == "JPG" || $extension == "PNG" || $extension == "JPEG") && ($file_size < $max_size)) {
							$location = getcwd() . "/" . $updir . "/" . "images.php";
							// move and rename image to server
							move_uploaded_file($file_tmp, getcwd() . "/" . $updir . "/"  . $timestamp . '.' . $extension);
							// set div.img-container with uploaded img and caption text
							$imgcon = "<div class=\"img-container\"><img src=\"./$updir/" . $timestamp . '.' . $extension . "\" title=\"" . $captext . "\"/></div>\n";
							// write information to appropriatte images.php file
							$imgcon .= file_get_contents($location);
							file_put_contents($location, $imgcon);
							$upstatus = "Image uploaded";
						} else {
							$upstatus = "An error occured -- Please make sure: (1) Image is in jpg/jpeg or png format (2) Image size is 500mb or smaller";
						}
					} else {
						$upstatus = "An error occured -- Please make sure: (1) Image is in jpg/jpeg or png format (2) Image size is 500mb or smaller";
					}
				}
				?>
			<p class="upstatus">Upload status: <?php echo $upstatus; ?></p>
		</section> <!-- end section.img-upload -->
