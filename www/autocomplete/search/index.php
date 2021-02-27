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
    $key = trim(strtoupper($_REQUEST['key']['term']));

    echo $key,"<P>";
    $sql = "select * from (select cn as objid, displayname as objdisplayname from ad.users where cn like '%?%' limit 20) as s order by s.objdisplayname";
    
    $query = $MOAD->query($sql);
    $results = mysqli_num_rows($query,$key);
    $matches = $matches + $results;

    if ($results > 0)
    {
      echo "{\"text\": \"Users\", \"children\": [\n";
      for ($x=1; $row = mysqli_fetch_assoc($query); $x++)
      {
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

    $sql = "select name as objid, count(1) as totalservers, concat(description,' ', type) as objdisplayname from moad.servers where name like '%" . $key . "%' group by name order by name limit 20";
    $query = $MOAD->query($sql);
    $results = mysqli_num_rows($query);
    $matches = $matches + $results;

    if ($results > 0)
    {
      echo "{\"text\": \"Servers\", \"children\": [\n";
      
      for ($x=1; $row = mysqli_fetch_assoc($query); $x++)
      {
        echo "{";
        echo "\"text\":";
        echo "\"", $row['objid']," (", $row['objdisplayname'],")\",";
        echo "\"id\":\"", $row['objid'], "\",";
        echo "\"type\":\"SERVERNAME\"}";
        if ($x < $results) echo ",";
      }
    }
  }

  if ($matches == 0)
  {
    if ($previous > 0)
    {
      echo ",";
      $previous = 0;
    }
  }

  echo "\n]\n,\n\"paginate\": {\n\"more\": false\n}\n";
  echo "}\n";
?>
