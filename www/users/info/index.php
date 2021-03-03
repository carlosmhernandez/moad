<?PHP
  if (! defined('ROOT_PATH')) {
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);
  }

  require_once ROOT_PATH . 'includes/common.inc.php';
  
	if (isset($_REQUEST['userid']))
	{
		if (preg_match('/^[a-zA-Z]+[a-zA-Z0-9_-]+$/', $_REQUEST['userid']))
		{
			$userid = strtoupper($_REQUEST['userid']);
			$sql = "select dn, ou, cn, Enabled, GivenName, Surname, DisplayName, email, SID, Domain, UserPrincipalName, UAC, GroupMemberships, WhenCreated from ad.users where cn = '" . $userid . "'";
  	  $query = $MOAD->query($sql);
	    $results = $query->numRows();
			$row = $query->fetchAll();
			if ($results <> 1) $userid = "UserID not found";
		}
		else
			$userid = "Invalid User ID";
	}
	else
	{
		$userid = "";
	}

  echo "<!DOCTYPE html>";
  echo "<html lang=\"en\">";
  echo "<head>";

  include ROOT_PATH . 'includes/meta.inc.php';

  // PAGE TITLE HERE
  echo "<title>MOAD - User - " , $userid, "</title>";

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
				if (($userid == "UserID not found") or ($userid == "Invalid User ID"))
				{
					echo "<div class=error-group>";
				  echo "<h2>",$userid,"</h2>";
					echo "<p><strong>Requested User ID:</strong> ",$_REQUEST['userid'],"</p>";
					echo "</div>";
				}
				else
				{
					echo "<h2>",$userid,"</h2>";
					echo "<p>",$row[0]['DisplayName'],"</p>";
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
				if (($userid <> "UserID not found") and ($userid <> "Invalid User ID"))
				{
					echo "<table>";
					echo "<TR><TD><Strong>DN:</strong></td><TD>", $row[0]['dn'],"</TD></TR>";
					echo "<TR><TD><Strong>CN:</strong></td><TD>", $row[0]['cn'],"</TD></TR>";
					echo "<TR><TD><Strong>OU:</strong></td><TD>", $row[0]['ou'],"</TD></TR>";
					echo "<TR><TD><Strong>Given Name:</strong></td><TD>", $row[0]['GivenName'],"</TD></TR>";
					echo "<TR><TD><Strong>Surname:</strong></td><TD>", $row[0]['Surname'],"</TD></TR>";
					echo "<TR><TD><Strong>eMail:</strong></td><TD>", $row[0]['email'],"</TD></TR>";
					echo "<TR><TD><Strong>Enabled:</strong></td><TD>", $row[0]['Enabled'],"</TD></TR>";
					echo "<TR><TD><Strong>SID:</strong></td><TD>", $row[0]['SID'],"</TD></TR>";
					echo "<TR><TD><Strong>Domain:</strong></td><TD>", $row[0]['Domain'],"</TD></TR>";
					echo "<TR><TD><Strong>User Principal Name:</strong></td><TD>", $row[0]['UserPrincipalName'],"</TD></TR>";
					echo "<TR><TD><Strong>UAC:</strong></td><TD>", $row[0]['UAC'],"</TD></TR>";
					echo "<TR><TD><Strong>Creation Time:</strong></td><TD>", $row[0]['WhenCreated'],"</TD></TR>";
					echo "</table>";
				}
?>
			</article>
		</div>
	</div>

<?php
  $menu_selection = "users";
	include  ROOT_PATH . 'includes/sidebar.inc.php';
	
echo "</body>";
echo "</html>";
?>
