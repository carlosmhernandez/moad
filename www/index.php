<?PHP
  if (! defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
  }

  require_once ROOT_PATH . 'includes/common.inc.php';
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="server, inventory, MOAD" />
	<meta name="author" content="Carlos M. Hernandez" />
	<meta name="robots" content="noindex" />
	<meta name="description" content="The Mother of All DataBases" />
	<meta property="og:title" content="MOAD" />
	<meta property="og:description" content="The Mother of All DataBases" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- FAVICONS ICON -->
	<link rel="icon" href="/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="/images/favicon-32x32.png" />

	<!-- PAGE TITLE HERE -->
	<title>MOAD</title>

	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="/css/style.css">

</head>
<body>
  <!-- Content -->
  <div id="content">
		<div class="inner">

	    <!-- Post -->
			<article class="box post post-excerpt">
				<header>
					<h2>Welcome to MOAD</h2>
					<p>A free server inventory</p>
				</header>
				<div class="info">
<?php
				$year = date("Y");
				$month = date("M");
				$day   = date("d");
				
				echo "<span class=\"date\"><span class=\"month\">", $month;
				echo "</span> <span class=\"day\">14</span><span class=\"year\">, ";
				echo $year, "</span></span>";
?>
					<ul class="stats">
						<li><a href="#" class="fas fa-bell">16</a></li>
						<li><a href="#" class="fas fa-server">32</a></li>
						<li><a href="#" class="fas fa-exclamation-triangle">64</a></li>
					</ul>
				</div>
				
				<p>
					<strong>Hello!</strong> Testing responsive web interface.
				</p>
		
			</article>
		</div>
	</div>

<!-- Sidebar -->
	<div id="sidebar">

		<!-- Logo -->
			<h1 id="logo"><a href="#">MOAD</a></h1>

		<!-- Nav -->
			<nav id="nav">
				<ul>
					<li class="current"><a href="#">Home</a></li>
					<li><a href="#">Servers</a></li>
				</ul>
			</nav>

		<!-- Search -->
			<section class="box search">
				<form method="post" action="#">
					<input type="text" class="text" name="search" placeholder="Search" />
				</form>
			</section>

	</div>
</body>
</html>