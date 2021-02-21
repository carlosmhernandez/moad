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
  echo "<title>MOAD - Supporters - Add</title>";

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
					<p>Enter new team member information:</p>
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
					
					<form action="submit.php" method="post">
						<div class="form-group">
							<label for="userid">User ID:</label><input type="text" name="userid" id="userid" placeholder="Enter User ID if available">
							<label for="firstname">First Name:</label><input type="text" name="firstname" id="firstname" placeholder="Enter user's first name">
							<label for="lastname">Last Name:</label><input type="text" name="lastname" id="lastname" placeholder="Enter user's last name">
							<label for="displayname">Display Name:</label><input type="text" name="displayname" id="displayname" placeholder="Enter display name">
							<label for="type">User Type:</label>
							<select name="type" id="type">
								<option value="Employee" selected>Employee</option>
								<option value="Contractor">Contractor</option>
								<option value="Intern">Intern</option>
								<option value="Tech Support">Tech Support</option>
								<option value="Temp">Temp</option>
							</select>
							<label for="title">Title:</label><input type="text" name="title" id="title" placeholder="Enter user's title">
							<label for="email">eMail:</label><input type="text" name="email" id="email" placeholder="Enter user's email address">
							<label for="company">Company:</label><input type="text" name="company" id="company"  placeholder="Enter company name">
							<label for="directphone">Direct Phone:</label><input type="text" name="directphone" id="directphone" placeholder="Enter direct phone number">
							<label for="mobilephone">Mobile Phone:</label><input type="text" name="mobilephone" id="mobilephone" placeholder="Enter mobile phone number">
							<label for="address">Address:</label><textarea name="address" id="address"></textarea>
							<label for="city">City:</label><input type="text" name="city" id="city" placeholder="Enter city name">
							<label for="state">State:</label><input type="text" name="state" id="state" placeholder="Enter state">
							<label for="country">Country:</label><input type="text" name="country" id="country" placeholder="Enter Country Name">

							<button>Submint</button>
						</div>
					</form>
				
				</p>
		
			</article>
		</div>
	</div>

<?php
  $menu_selection = "supporters";
	include  ROOT_PATH . 'includes/sidebar.inc.php';
	
echo "</body>";
echo "</html>";
?>
