<?PHP
  // Sidebar 
  echo "<div id=\"sidebar\">";

    include INCLUDES_PATH . 'logo.inc.php';
    include INCLUDES_PATH . 'search.inc.php';

    // Nav 
    echo "<nav id=\"nav\">";
      echo "<ul>";
        echo "<li "; if ($menu_selection == 'home') echo "class=\"current\""; echo "><a href=\"/\">Home</a></li>";
        echo "<li "; if ($menu_selection == 'servers') echo "class=\"current\""; echo "><a href=\"/servers/\">Servers</a></li>";
        echo "<li "; if ($menu_selection == 'locations') echo "class=\"current\""; echo "><a href=\"/locations/\">Locations</a></li>";
        echo "<li "; if ($menu_selection == 'applications') echo "class=\"current\""; echo "><a href=\"/applications/\">Applications</a></li>";
      echo "</ul>";
    echo "</nav>";
  echo "</div>";
?>