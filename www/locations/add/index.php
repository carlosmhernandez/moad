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
  echo "<title>MOAD - Locations - Add</title>";

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
					<h2>Add Location</h2>
					<p>Enter new location information:</p>
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
							<label for="locid">Location ID:</label><input type="text" name="locid" id="locid" placeholder="Enter a custom location ID is you have one. If you don't have one you can leave blank.">
							<label for="name">Location Name:</label><input type="text" name="name" id="name" placeholder="Enter location name">
							<label for="address">Address:</label><textarea name="address" id="address"></textarea>
							<label for="city">City:</label><input type="text" name="city" id="city" placeholder="Enter city name">
							<label for="state">State:</label><input type="text" name="state" id="state" placeholder="Enter state or province">
							<label for="country">Country:</label><input type="text" name="country" id="country" placeholder="Enter country name">
							<label for="region">Region:</label>
							<select name="region" id="region">
							  <option value="Americas" selected>Americas</option>
								<option value="Africa">Africa</option>
								<option value="Asia">Asia</option>
								<option value="Asia Pacific">Asia Pacific</option>
								<option value="EMEA">EMEA</option>
								<option value="Europe">Europe</option>
								<option value="Latin America">Latin America</option>
								<option value="Middle East">Middle East</option>
								<option value="North America">North America</option>
								<option value="South America">South America</option>
							</select>
							<label for="status">Status:</label>
							<select name="status" id="status">
								<option value="Active" selected>Active</option>
								<option value="Closed">Closed</option>
							</select>

							<button>Submint</button>
						</div>
					</form>
				
				</p>
		
			</article>
		</div>
	</div>

<?php
  $menu_selection = "supporters";
	include  ROOT_PATH . 'includes/sidebar.inc.php';
	
echo "</body>";
echo "</html>";
?>
