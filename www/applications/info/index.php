<?PHP
  if (! defined('ROOT_PATH')) {
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);
  }

  require_once ROOT_PATH . 'includes/common.inc.php';
  
	if (isset($_REQUEST['appid']))
	{
		if (preg_match('/^[a-zA-Z]+[a-zA-Z0-9 _-]+$/', $_REQUEST['appid']))
		{
			$appid = strtoupper($_REQUEST['appid']);
			$sql = "select app_id, name, description, business_owner, IT_Owner,  IT_Custodian, creationdate, lastupdated from moad.applications where app_id = '" . $appid . "'";
//			echo $sql;
  	  $query = $MOAD->query($sql);
	    $results = $query->numRows();
			$row = $query->fetchAll();
		}
		else
			$appid = "Invalid Application Name";
	}
	else
	{
		$appid = "";
	}

  echo "<!DOCTYPE html>";
  echo "<html lang=\"en\">";
  echo "<head>";

  include ROOT_PATH . 'includes/meta.inc.php';

  // PAGE TITLE HERE
  echo "<title>MOAD - Applications - " , $appid, "</title>";

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
					
<?php
				if ($appid == "Invalid Application Name")
				{
					echo "<div class=error-group>";
				  echo "<h2>",$appid,"</h2>";
					echo "<p><strong>Request:</strong> ",$_REQUEST['appid'],"</p>";
					echo "</div>";
				}
				else
				{
					echo "<h2>",$appid,"</h2>";
					echo "<p>",$row[0]['description'],"</p>";
				}

				echo "</header>";

				echo "<div class=\"info\">";
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
<?php
				if ($appid <> "Invalid Server Name")
				{
					echo "<table>";
					echo "<TR><TD><Strong>Business Owner:</strong></td><TD>", $row[0]['business_owner'],"</TD></TR>";
					echo "<TR><TD><Strong>IT Owner:</strong></td><TD>", $row[0]['IT_Owner'],"</TD></TR>";
					echo "<TR><TD><Strong>IT Custodian:</strong></td><TD>", $row[0]['IT_Custodian'],"</TD></TR>";
					echo "<TR><TD><Strong>Creation Time:</strong></td><TD>", $row[0]['creationdate'],"</TD></TR>";
					echo "<TR><TD><Strong>Last Update:</strong></td><TD>", $row[0]['lastupdated'],"</TD></TR>";
					echo "</table>";
				}
?>
			</article>
		</div>
	</div>

<?php
  $menu_selection = "servers";
	include  ROOT_PATH . 'includes/sidebar.inc.php';
	
echo "</body>";
echo "</html>";
?>
