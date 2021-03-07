<?PHP
  if (! defined('ROOT_PATH')) {
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);
  }

  require_once ROOT_PATH . 'includes/common.inc.php';

  $previous = 0;
  $matches = 0;
  
  echo "{\n";
  echo "\"results\": [\n";

  if (isset($_REQUEST['key']['term']))
  {
    if (preg_match('/^[a-zA-Z]+[a-zA-Z0-9 _-]+$/', $_REQUEST['key']['term']))
    {
      $key = trim(strtoupper($_REQUEST['key']['term'])); 
      $sql = "select cn as objid, displayname as objdisplayname from ad.users where cn like '%" . $key . "%' order by objdisplayname limit 20";
      $query = $MOAD->query($sql);
      $results = $query->numRows();
      $matches = $matches + $results;

      if ($results > 0)
      {
        $x=0;
        echo "{\"text\": \"Users\", \"children\": [\n";
        foreach ($query->fetchAll() as $row)
        {
          $x++;
          echo "{\"id\":\"",$row['objid'],"\",";
          echo "\"type\":\"USERID\",";
          echo "\"text\":";
          echo "\"", $row['objid']," (", $row['objdisplayname'],")\"";
          echo "}";

          if ($x < $results) echo ",";
          echo "\n";
        }
        echo "]}\n";
        $previous++;
      }

      if ($matches > 0)
      {
        if ($previous > 0)
        {
          echo ",";
          $previous = 0;
        }
      }

      $sql = "select hostname as objid, count(1) as totalservers, concat(description,' ', server_type) as objdisplayname from moad.servers where hostname like '%" . $key . "%' group by hostname order by hostname limit 20";
      $query = $MOAD->query($sql);
      $results = $query->numRows();
      $matches = $matches + $results;

      if ($results > 0)
      {
        echo "{\"text\": \"Servers\", \"children\": [\n";
        $x=0;
        foreach ($query->fetchAll() as $row)
        {
          $x++;
          echo "{";
          echo "\"text\":";
          echo "\"", $row['objid']," (", $row['objdisplayname'],")\",";
          echo "\"id\":\"", $row['objid'], "\",";
          echo "\"type\":\"SERVERNAME\"}";
          if ($x < $results) echo ",";
        }
        echo "]}\n";
        $previous++;
      }

      if ($matches > 0)
      {
        
        if ($previous > 1)
        {
          echo "---,";
          $previous = 0;
        }
      }

      
      $sql = "select userid as objid, displayname as objdisplayname from moad.supporters where userid like '%" . $key . "%' order by userid limit 20";
      $query = $MOAD->query($sql);
      $results = $query->numRows();
      $matches = $matches + $results;

      if ($results > 0)
      {
        echo "{\"text\": \"Supporter\", \"children\": [\n";
        $x=0;
        foreach ($query->fetchAll() as $row)
        {
          $x++;
          echo "{\"id\":\"",$row['objid'],"\",";
          echo "\"type\":\"SUPPORTER\",";
          echo "\"text\":";
          echo "\"", $row['objid']," (", $row['objdisplayname'],")\"";
          echo "}";

          if ($x < $results) echo ",";
        }
        echo "]}\n";
        $previous++;
      }

      if ($matches > 0)
      {
        
        if ($previous > 1)
        {
          echo "---,";
          $previous = 0;
        }
      }
      
      
      $sql = "select app_id as objid, name as objdisplayname from moad.applications where name like '%" . $key . "%' order by name limit 20";
      $query = $MOAD->query($sql);
      $results = $query->numRows();
      $matches = $matches + $results;

      if ($results > 0)
      {
        echo "{\"text\": \"Application\", \"children\": [\n";
        $x=0;
        foreach ($query->fetchAll() as $row)
        {
          $x++;
          echo "{\"id\":\"",$row['objid'],"\",";
          echo "\"type\":\"APPLICATION\",";
          echo "\"text\":";
          echo "\"", $row['objid']," (", $row['objdisplayname'],")\"";
          echo "}";

          if ($x < $results) echo ",";
        }
        echo "]}\n";
        $previous++;
      }      
    }
  }

 
  echo "\n]\n,\n\"paginate\": {\n\"more\": false\n}\n";
  echo "}\n";
?>
