<section role="header">
	<header role="navigation-bar">
		<div class="nav-container">
			<h1 role="reveal">My Business</h1>

			<ul>
				<li><a href=<?php if(!$_SESSION['username']) { echo "\"./index.php\""; } else { echo "\"./admin.php\""; } ?>>Home</a></li>
				<?php
				$types = scandir("./pages");
				if (count($types) > '2') {
					foreach ($types as $type) {
						if ($type != "." && $type != "..") {
							if (is_dir("./pages/$type")) {
								$pages = scandir("./pages/$type/");
								foreach ($pages as $page) {
									if (is_dir("./pages/$type/$page") && $page != "." && $page != "..") {
										echo "<li><a href=\"./pages.php?page=$page&type=$type\">$page</a></li>";
									}
								}
							}
						}
					}
				} else {
					echo "<li><a href=\"./page.php\">Example</a></li>";
				}
				?>
			</ul>
		</div>
	</header>
</section>

<!-- include base stylesheet -->
<link rel="stylesheet" href="./css/style.css"/>

<!-- include jquery.js necessary for all other script files -->
<script src="./js/jquery.js"></script>
<!-- scripts that will be needed on all pages -->
<script src="./js/loginslide.js"</script>
