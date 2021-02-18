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
						<label for="hostname">Host Name:</label><input type="text" name="hostname" id="hostname" placeholder="Enter computer name">
						<label for="fqdn">FQDN:</label><input type="text" name="fqdn" id="fqdn" placeholder="Enter fully qualified domain name">
						<label for="ipv4address">IPV4 Address:</label><input type="text" name="ipv4address" id="ipv4address">
						<label for="nodetype">Node Type:</label>
						<select name="nodetype" id="nodetype">
							<option value="VM" selected>Virtual</option>
							<option value="PHYSICAL">Physical</option>
						</select>
  					<label for="description">Description:</label><input type="text" name="description" id="description" placeholder="i.e. Home Drives">
						<label for="type">Type:</label><input type="text" name="type" id="type" placeholder="i.e. File Server">
						<label for="environment">Environment:</label>
						<select name="environment" id="environment">
							<option value="Production" selected>Production</option>
							<option value="Integration">Integration</option>
							<option value="Development">Development</option>
							<option value="Testing">Testing</option>
							<option value="Experimental">Experimental</option>
						</select>
						<label for="disposition">Disposition:</label>
						<select name="disposition" id="disposition">
							<option value="Building" selected>Staging</option>
							<option value="Deployed">Deployed</option>
							<option value="Discontinue">Decom in Progress</option>
							<option value="Retired">Retired</option>
						</select>
						<label for="manufacturer">Manufacturer:</label>
						<select name="manufacturer" id="manufacturer">
						  <option value="VMWare" selected>VM - (VMWare)</option>
							<option value="HyperV">VM - HyperV</option>
							<option value="HP" >HP</option>
							<option value="Dell">Dell</option>
						</select>
						<label for="model">Model:</label><input type="text" name="model" id="model" placeholder="Enter computer model or Leave blank for VMs">
						<label for="sn">Serial Number:</label><input type="text" name="sn" id="sn"  placeholder="Enter computer serial number or Leave blank for VMs">
						<label for="ilo">iLO:</label><input type="text" name="ilo" id="ilo" placeholder="dns name or ip address for remote management">
						<label for="osvendor">OS Vendor:</label>
						<select name="osvendor" id="osvendor">
							<option value="Microsoft" selected>Microsoft</option>
							<option value="VMWare">VMWare</option>
							<option value="Ubuntu">Ubuntu</option>
							<option value="RedHat">RedHat</option>
							<option value="SUSE">SUSE</option>
							<option value="Linux">Linux (Other)</option>
						</select>
						<label for="os">OS:</label><input type="text" name="os" id="os">
						<label for="osversion">OS Version:</label><input type="text" name="osversion" id="osversion">
						<label for="ntdomain">Domain:</label><input type="text" name="ntdomain" id="ntdomain" placeholder="Enter the AD domain name for this system">
						<label for="locid">Location:</label><input type="text" name="locid" id="locid">
						<label for="datacenterid">Data Center:</label><input type="text" name="datacenterid" id="datacenterid">
						<label for="appid">Application:</label><input type="text" name="appid" id="appid">

						<button>Submint</button>
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
