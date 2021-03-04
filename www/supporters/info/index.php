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
			$sql = "select id, UserID, FirstName, LastName, DisplayName, Type, Title, email, Company, DirectPhone, MobilePhone, Address, City, State, Country, CreationDate from moad.supporters where userid = '" . $userid . "'";
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
  echo "<title>MOAD - Supporter - " , $userid, "</title>";

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
					echo "<TR><TD><Strong>First Name:</strong></td><TD>", $row[0]['FirstName'],"</TD></TR>";
					echo "<TR><TD><Strong>Last Name:</strong></td><TD>", $row[0]['LastName'],"</TD></TR>";
					echo "<TR><TD><Strong>Type:</strong></td><TD>", $row[0]['Type'],"</TD></TR>";
					echo "<TR><TD><Strong>Title:</strong></td><TD>", $row[0]['Title'],"</TD></TR>";
					echo "<TR><TD><Strong>eMail:</strong></td><TD>", $row[0]['email'],"</TD></TR>";
					echo "<TR><TD><Strong>Company:</strong></td><TD>", $row[0]['Company'],"</TD></TR>";
					echo "<TR><TD><Strong>Direct:</strong></td><TD>", $row[0]['DirectPhone'],"</TD></TR>";
					echo "<TR><TD><Strong>Mobile:</strong></td><TD>", $row[0]['MobilePhone'],"</TD></TR>";
					echo "<TR><TD><Strong>Address:</strong></td><TD><pre>", $row[0]['Address'],"</pre></TD></TR>";
					echo "<TR><TD><Strong>City:</strong></td><TD>", $row[0]['City'],"</TD></TR>";
					echo "<TR><TD><Strong>State:</strong></td><TD>", $row[0]['State'],"</TD></TR>";
					echo "<TR><TD><Strong>Country:</strong></td><TD>", $row[0]['Country'],"</TD></TR>";
					echo "<TR><TD><Strong>Creation Time:</strong></td><TD>", $row[0]['CreationDate'],"</TD></TR>";
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
