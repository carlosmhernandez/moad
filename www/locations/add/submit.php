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
  echo "<title>MOAD - Locations - Add - Submit</title>";

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
          
<?php
  echo "<strong>User ID: </strong>";
  echo $_REQUEST['locid'],"<BR>";
  echo "<strong>Location Name: </strong>";
  echo $_REQUEST['name'],"<BR>";
  echo "<strong>Address: </strong>";
  echo $_REQUEST['address'],"<BR>";
  echo "<strong>City: </strong>";
  echo $_REQUEST['city'],"<BR>";
  echo "<strong>State: </strong>";
  echo $_REQUEST['state'],"<BR>";
  echo "<strong>Country: </strong>";
  echo $_REQUEST['country'],"<BR>";
  echo "<strong>Region: </strong>";
  echo $_REQUEST['region'],"<BR>";
  echo "<strong>Location Status: </strong>";
  echo $_REQUEST['status'],"<BR>";

  $sql = "insert into moad.locations (LOC_ID, Name, Address, City, State, Country, Region, Status, CreationDate) values ('" . $_REQUEST['locid'] . "','" . $_REQUEST['name'] . "','" . $_REQUEST['address'] . "','" . $_REQUEST['city'] . "','" . $_REQUEST['state'] . "','" . $_REQUEST['country'] . "','" . $_REQUEST['region'] . "','" . $_REQUEST['status'] . "',now())";
//  echo $sql;
  
  $MOAD->query($sql);
  echo "</p>"

  ?>	
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
