				<?php
				date_default_timezone_set('UTC');
				// Here we test for upload actions
				if(isset($_POST['init']) && $_POST['init'] == 'upload') {
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
							$imgcon = "<div class=\"img-container\"><img src=\"./$updir/" . $timestamp . '.' . $extension . "\" id=\"" . $timestamp . '.' . $extension . "\" title=\"" . $captext . "\"/></div>\n";
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
				} else {
					$upstatus = "---";
				}

				// Here we test for removing images under the given page
				if(isset($_GET['page']) && isset($_GET['type']) && isset($_GET['img2del'])) {
					// read each file lines in array
					$file_path = "./pages/basic/".$_GET['page']."/images.php";
					$image_path = "./pages/basic/".$_GET['page']."/" . $_GET['img2del'];
					$lines = file($file_path);
					// The pattern to match our image id
					$pattern = '/(' . $_GET['img2del']  . ')/im';
					// Set a var for the lines we want to keep
					$lines2keep = array();
					foreach ($lines as $key => $value) {
						if (!preg_match($pattern, $value)) {
							// lines not containing hello
							$lines2keep[] = $value;
							#echo $value;
						}
					}

					// now create the paragraph again
					$lines2keep = implode("\n", $lines2keep);
					file_put_contents($file_path,$lines2keep);
					$extension = end(explode(".", $_GET['img2del']));
					if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "JPG" || $extension == "PNG" || $extension == "JPEG") {
						unlink($image_path);
						$upstatus = "Deleted " . $_GET['img2del'];
					} else {
						$upstatus = "Something went wrong attempting to delete " . $_GET['img2del'];
					}
				}
				?>
		<section class="img-upload">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $_GET['page']; ?>&type=basic" method="POST" enctype="multipart/form-data">
					<div class="upload-location">
						<?php
						echo "<label for=\"updir\">This image upload is for page ".$_GET['page'].".</label>";
						?>
					</div>
						<?php
						// Note that we only support a max of 16 lines in images.php
						$array = file("./pages/basic/".$_GET['page']."/images.php");
						$count = count($array);
						$doc = new DOMDocument();
						for($i = 0; $i < $count; $i++) {
							//echo $array[$i];
							$html = $array[$i];
							//file_get_contents("./pages/basic/".$_GET['page']."/images.php");
							@$doc->loadHTML($html);
							$tags = $doc->getElementsByTagName('img');
							foreach ($tags as $tag) {
								echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?page=" . $_GET['page'] . "&type=basic&img2del=" . $tag->getAttribute('id') . "\"onclick=\"return confirm('Are you sure you want to delete this image?');\" >" . $array[$i] . "</a>";
								//echo $tag->getAttribute('id');
							}
						}
						// create blank images so total fills 4 by 4 grid
						$line_count = count($array);
						if($line_count[1] == '') {
							$line_count--;
						}
						if($line_count <= 15) {
							for($i = $line_count; $i < 15; $i++) {
								echo "<div class=\"img-container\"><img src=\"./img/noimage.png\" title=\"\" /></div>";
							}
						}
						?>
		</section> <!-- end section.img-upload -->

					<div class="upload-select">
						<img id="imgPreview" src="#" alt="your image" onError="this.onerror=null;this.src='./img/noimage.png';"/><br>
						<input multiple type="file" value="Choose File" name="file" onchange="readURL(this);"><br>
						<input type="textarea" role="caption-input" name="caption" autocomplete="off" placeholder="Caption..." />
						<input type="hidden" name="updir" value="./pages/basic/<?php echo $_GET['page']; ?>" />
						<input type="hidden" name="init" value="upload" />
						<input type="submit" value="upload" />
					</div>
			<p class="upstatus">Upload status: <?php echo $upstatus; ?></p>
				</form>

