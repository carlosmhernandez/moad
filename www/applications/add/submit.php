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
  echo "<title>MOAD - Applications - Add - Submit</title>";

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
					<h2>Add Application</h2>
					<p>Application information:</p>
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
  echo "<strong>Application ID: </strong>";
  echo $_REQUEST['appid'],"<BR>";
  echo "<strong>Application Name: </strong>";
  echo $_REQUEST['name'],"<BR>";
  echo "<strong>Description: </strong>";
  echo $_REQUEST['description'],"<BR>";
  echo "<strong>Business Owner User ID: </strong>";
  echo $_REQUEST['bizowner'],"<BR>";
  echo "<strong>IT Owner User ID: </strong>";
  echo $_REQUEST['itwowner'],"<BR>";
  echo "<strong>IT Custodian User ID: </strong>";
  echo $_REQUEST['itcustodian'],"</p><p>";

  $sql = "insert into moad.applications (APP_ID, Name, Description, Business_Owner, IT_Owner, IT_Custodian, CreationDate, LastUpdated) values ('" .  $_REQUEST['appid'] . "','" . $_REQUEST['name'] . "','" . $_REQUEST['description'] . "','" . $_REQUEST['bizowner'] . "','" . $_REQUEST['itwowner'] . "','" . $_REQUEST['itcustodian'] . "', now(), now())";
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
