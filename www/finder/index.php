<?PHP
  if (! defined('ROOT_PATH')) {
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);
  }

  require_once ROOT_PATH . 'includes/common.inc.php';
  
  if (isset($_REQUEST['query']))
  {
    $query = trim(urldecode($_REQUEST['query']));
  }
  else
  {
    $query = "";
  }

  if (isset($_REQUEST['objtype']))
  {
    if (($_REQUEST['objtype']=="undefined") or (trim($_REQUEST['objtype'])==""))
      $objtype = "SMART";
    else
      $objtype = $_REQUEST['objtype'];
  }
  else
    $objtype = "SMART";

  switch ($objtype)
  {
    case "SMART" :
      $keys = preg_split("/ /",$query);

      if (count($keys) > 1)
      {
        $key = base64_encode($query);
        echo "<META http-equiv=\"refresh\" content=\"0; URL=/people/?key=$key\">";
        exit();
      }

      $ishost = $MOAD->query("select hostname from moad.servers where hostname like '%" . $query . "%'")->numRows();
      if ($ishost > 0)
      {
        if ($ishost == 1)
        {
          $row = $MOAD->query("select id from moad.servers where hostname like '%" . $query . "%'")->fetchAll();
          echo "<META http-equiv=\"refresh\" content=\"0; URL=/servers/?id=" , $row[0]['id'] , "\">";
        }
        else
          echo "<META http-equiv=\"refresh\" content=\"0; URL=/servers/?host=$query\">";
        exit;
      }

      break;
    
    case "SERVERNAME" :
      echo "<META http-equiv=\"refresh\" content=\"0; URL=/servers/info/?host=$query\">";

      break;

    case "USERID" :
      echo "<META http-equiv=\"refresh\" content=\"0; URL=/users/info?userid=$query\">";

      break;

  }
?>
