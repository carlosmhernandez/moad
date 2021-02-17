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
  echo "<title>MOAD - Servers - Add</title>";

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
					<h2>Add Server</h2>
					<p>Enter new system information:</p>
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
					<form action="submit.php">
						<label for="hostname">Host Name:</label><input type="text" name="hostname" id="hostname">
						<label for="fqdn">FQDN:</label><input type="text" name="fqdn" id="fqdn">
						<label for="nodetype">Node Type:</label>
						<select name="nodetype" id="nodetype">
							<option value="VM" selected>Virtual</option>
							<option value="PHYSICAL">Physical</option>
						</select>
  					<label for="description">Description:</label><input type="text" name="description" id="description">
						<label for="type">Type:</label><input type="text" name="type" id="type">
						<label for="disposition">Disposition:</label>
						<select name="disposition" id="disposition">
							<option value="Building" selected>Staging</option>
							<option value="Deployed">Deployed</option>
							<option value="Discontinue">Decom in Progress</option>
							<option value="Retired">Retired</option>
						</select>
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
