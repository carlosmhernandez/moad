<?PHP
  if (! defined('ROOT_PATH')) {
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);
  }

  require_once ROOT_PATH . 'includes/common.inc.php';
  
  echo "<!DOCTYPE html>";
  echo "<html lang=\"en\">";
  echo "<head>";

  include ROOT_PATH . 'includes/meta.inc.php';

  // PAGE TITLE HERE
  echo "<title>MOAD - Applications - Add</title>";

	// STYLESHEETS
  echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/style.css\">";
  echo "</head>";

	echo "<body>";
  
	// Content 
?>
  <div id="content">
		<div class="inner">

	    <!-- Post -->
			<article class="box post post-excerpt">
				<header>
					<h2>Add Application</h2>
					<p>Enter new applicatoin information:</p>
				</header>
				<div class="info">
<?php
				$year = date("Y");
				$month = date("M");
				$day   = date("d");
				
				echo "<span class=\"date\"><span class=\"month\">", $month;
				echo "</span> <span class=\"day\">";
				echo $day, "</span><span class=\"year\">, ";
				echo $year, "</span></span>";

?>
					<ul class="stats">
						<li><a href="#" class="fas fa-bell">16</a></li>
						<li><a href="#" class="fas fa-server">32</a></li>
						<li><a href="#" class="fas fa-exclamation-triangle">64</a></li>
					</ul>
				</div>				
				<p>
					
					<form action="submit.php" method="post">
						<div class="form-group">
							<label for="appid">Application ID:</label><input type="text" name="appid" id="appid" placeholder="Enter a unique Application ID">
							<label for="name">Application Name:</label><input type="text" name="name" id="name" placeholder="Enter application full name">
							<label for="description">Application Description:</label><textarea name="description" id="description"></textarea>
							<label for="bizowner">Business Owner:</label><input type="text" name="bizowner" id="bizowner" placeholder="Enter User ID of business owner">
							<label for="itwowner">IT Owner:</label><input type="text" name="itwowner" id="itwowner" placeholder="Enter User ID of IT owner">
							<label for="itcustodian">IT Custodian:</label><input type="text" name="itcustodian" id="itcustodian" placeholder="Enter User ID of IT custodian">
							
							<button>Submint</button>
						</div>
					</form>
				
				</p>
		
			</article>
		</div>
	</div>

<?php
  $menu_selection = "servers";
	include  ROOT_PATH . 'includes/sidebar.inc.php';
	
echo "</body>";
echo "</html>";
?>
