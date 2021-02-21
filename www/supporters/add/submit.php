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
  echo "<title>MOAD - Supporters - Add - Submit</title>";

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
					<h2>Add Supporter</h2>
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
  echo "<strong>User ID: </strong>";
  echo $_REQUEST['userid'],"<BR>";
  echo "<strong>First Name: </strong>";
  echo $_REQUEST['firstname'],"<BR>";
  echo "<strong>Last Name: </strong>";
  echo $_REQUEST['lastname'],"<BR>";
  echo "<strong>Display Name: </strong>";
  echo $_REQUEST['displayname'],"<BR>";
  echo "<strong>User Type: </strong>";
  echo $_REQUEST['type'],"<BR>";
  echo "<strong>Title: </strong>";
  echo $_REQUEST['title'],"<BR>";
  echo "<strong>eMail: </strong>";
  echo $_REQUEST['email'],"<BR>";
  echo "<strong>Company: </strong>";
  echo $_REQUEST['company'],"<BR>";
  echo "<strong>Direct Phone: </strong>";
  echo $_REQUEST['directphone'],"<BR>";
  echo "<strong>Mobile Phone: </strong>";
  echo $_REQUEST['mobilephone'],"<BR>";
  echo "<strong>Address: </strong>";
  echo $_REQUEST['address'],"<BR>";
  echo "<strong>City: </strong>";
  echo $_REQUEST['city'],"<BR>";
  echo "<strong>State: </strong>";
  echo $_REQUEST['state'],"<BR>";
  echo "<strong>Country: </strong>";
  echo $_REQUEST['country'],"<BR>";

  $sql = "insert into moad.supporters (UserID, FirstName, LastName, DisplayName, Type, Title, email, Company, DirectPhone, MobilePhone, Address, City, State, Country, CreationDate) values ('" . $_REQUEST['userid'] . "','" . $_REQUEST['firstname'] . "','" . $_REQUEST['lastname'] . "','" . $_REQUEST['displayname'] . "','" . $_REQUEST['type'] . "','" . $_REQUEST['title'] . "','" . $_REQUEST['email'] . "','" . $_REQUEST['company'] . "','" . $_REQUEST['directphone'] . "','" . $_REQUEST['mobilephone'] . "','" . $_REQUEST['address'] . "','" . $_REQUEST['city'] . "','" . $_REQUEST['state'] . "','" . $_REQUEST['country'] . "',now())";
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
