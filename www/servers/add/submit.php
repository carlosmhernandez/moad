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
  echo "<title>MOAD - Servers - Add - Submit</title>";

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
          
<?php
  echo "<strong>Host Name: </strong>";
  echo $_REQUEST['hostname'],"<BR>";
  echo "<strong>FQDN: </strong>";
  echo $_REQUEST['fqdn'],"<BR>";
  echo "<strong>IPV4 Address: </strong>";
  echo $_REQUEST['ipv4address'],"<BR>";
  echo "<strong>Node Type: </strong>";
  echo $_REQUEST['nodetype'],"<BR>";
  echo "<strong>Description: </strong>";
  echo $_REQUEST['description'],"<BR>";
  echo "<strong>Type: </strong>";
  echo $_REQUEST['type'],"<BR>";
  echo "<strong>Environment: </strong>";
  echo $_REQUEST['environment'],"<BR>";
  echo "<strong>Disposition: </strong>";
  echo $_REQUEST['disposition'],"<BR>";
  echo "<strong>Manufacturer: </strong>";
  echo $_REQUEST['manufacturer'],"<BR>";
  echo "<strong>Model: </strong>";
  echo $_REQUEST['model'],"<BR>";
  echo "<strong>Serial Number: </strong>";
  echo $_REQUEST['sn'],"<BR>";
  echo "<strong>iLO: </strong>";
  echo $_REQUEST['ilo'],"<BR>";
  echo "<strong>OS Vendor: </strong>";
  echo $_REQUEST['osvendor'],"<BR>";
  echo "<strong>OS: </strong>";
  echo $_REQUEST['os'],"<BR>";
  echo "<strong>OS Version: </strong>";
  echo $_REQUEST['osversion'],"<BR>";
  echo "<strong>AD Domain: </strong>";
  echo $_REQUEST['ntdomain'],"<BR>";
  echo "<strong>Location ID: </strong>";
  echo $_REQUEST['locid'],"<BR>";
  echo "<strong>Datacenter ID: </strong>";
  echo $_REQUEST['datacenterid'],"<BR>";
  echo "<strong>Application ID: </strong>";
  echo $_REQUEST['appid'],"</p><p>";

  $sql = "insert into moad.servers (hostname, fqdn, Server_Type, Description, Disposition, Environment, LOC_ID, DataCenter_ID, iLO, Platform, Manufacturer, Model, Serial_Number, AD_Domain, OS_Vendor, OS, OS_Version, IPV4_Addresses, APP_IDs, Status, CreationTime, LastUpdated) values ('" . $_REQUEST['hostname'] . "','" . $_REQUEST['fqdn'] . "','" . $_REQUEST['type'] . "','" .  $_REQUEST['description'] . "','" . $_REQUEST['disposition'] . "','" . $_REQUEST['environment'] . "','" . $_REQUEST['locid'] . "','" .  $_REQUEST['datacenterid'] . "','" . $_REQUEST['ilo'] . "','" .$_REQUEST['platform'] . "','" . $_REQUEST['manufacturer'] . "','" . $_REQUEST['model'] . "','" . $_REQUEST['sn'] . "','" . $_REQUEST['ntdomain'] . "','" . $_REQUEST['osvendor'] . "','" . $_REQUEST['os'] . "','" . $_REQUEST['osversion'] . "','" . $_REQUEST['ipv4address'] . "','" . $_REQUEST['appid'] . "', 'Unknown', now(), now())";
  //echo $sql;
  
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
