<?PHP
  if (! defined('ROOT_PATH')) {
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);
  }

  require_once ROOT_PATH . 'includes/common.inc.php';
  
	if (isset($_REQUEST['host']))
	{
		if (preg_match('/^[a-zA-Z]+[a-zA-Z0-9_-]+$/', $_REQUEST['host']))
		{
			$hostname = strtoupper($_REQUEST['host']);
			$sql = "select id, instance, hostname, fqdn, uuid, server_type, description, disposition, environment, loc_id, datacenter_id, ilo, platform, manufacturer, model, serial_number, ad_domain, os_vendor, os, os_version, ipv4_addresses, app_ids, tz, creationtime, lastupdated, retirement_date from moad.servers where hostname = '" . $hostname . "'";
//			echo $sql;
  	  $query = $MOAD->query($sql);
	    $results = $query->numRows();
			$row = $query->fetchAll();
		}
		else
			$hostname = "Invalid Server Name";
	}
	else
	{
		$hostname = "";
	}

  echo "<!DOCTYPE html>";
  echo "<html lang=\"en\">";
  echo "<head>";

  include ROOT_PATH . 'includes/meta.inc.php';

  // PAGE TITLE HERE
  echo "<title>MOAD - Servers - " , $hostname, "</title>";

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
				if ($hostname == "Invalid Server Name")
				{
					echo "<div class=error-group>";
				  echo "<h2>",$hostname,"</h2>";
					echo "<p><strong>Request:</strong> ",$_REQUEST['host'],"</p>";
					echo "</div>";
				}
				else
				{
					echo "<h2>",$hostname,"</h2>";
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
				if ($hostname <> "Invalid Server Name")
				{
					echo "<table>";
					echo "<TR><TD><Strong>id:</strong></td><TD>", $row[0]['id'],"</TD></TR>";
					echo "<TR><TD><Strong>uuid:</strong></td><TD>", $row[0]['uuid'],"</TD></TR>";
					echo "<TR><TD><Strong>Server Type:</strong></td><TD>", $row[0]['server_type'],"</TD></TR>";
					echo "<TR><TD><Strong>Environment:</strong></td><TD>", $row[0]['environment'],"</TD></TR>";
					echo "<TR><TD><Strong>Platform:</strong></td><TD>", $row[0]['platform'],"</TD></TR>";
					echo "<TR><TD><Strong>Manufacturer:</strong></td><TD>", $row[0]['manufacturer'],"</TD></TR>";
					echo "<TR><TD><Strong>Model:</strong></td><TD>", $row[0]['model'],"</TD></TR>";
					echo "<TR><TD><Strong>Serial Number:</strong></td><TD>", $row[0]['serial_number'],"</TD></TR>";
					echo "<TR><TD><Strong>iLO:</strong></td><TD>", $row[0]['ilo'],"</TD></TR>";
					echo "<TR><TD><Strong>OS Vendor:</strong></td><TD>", $row[0]['os_vendor'],"</TD></TR>";
					echo "<TR><TD><Strong>OS:</strong></td><TD>", $row[0]['os'],"</TD></TR>";
					echo "<TR><TD><Strong>OS Version:</strong></td><TD>", $row[0]['os_version'],"</TD></TR>";
					echo "<TR><TD><Strong>IPv4 Addresses:</strong></td><TD>", $row[0]['ipv4_addresses'],"</TD></TR>";
					echo "<TR><TD><Strong>LOC ID:</strong></td><TD>", $row[0]['loc_id'],"</TD></TR>";
					echo "<TR><TD><Strong>Data Center ID:</strong></td><TD>", $row[0]['datacenter_id'],"</TD></TR>";
					echo "<TR><TD><Strong>Application ID:</strong></td><TD>", $row[0]['app_ids'],"</TD></TR>";
					echo "<TR><TD><Strong>Creation Time:</strong></td><TD>", $row[0]['creationtime'],"</TD></TR>";
					echo "<TR><TD><Strong>Last Update:</strong></td><TD>", $row[0]['lastupdated'],"</TD></TR>";
					echo "<TR><TD><Strong>Retirement Date:</strong></td><TD>", $row[0]['retirement_date'],"</TD></TR>";
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
