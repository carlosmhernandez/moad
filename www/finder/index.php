<?PHP

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
    if (($_REQUEST['objtype']="undefined") or (trim($_REQUEST['objtype'])==""))
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

      $ishost = $MOAD->result("select count(1) from moad.servers.where name like '\%$query%'");
      if ($ishost > 0)
      {
        if ($ishost == 1)
        {
          $id = $MOAD->result("select serverid from moad.servers.where name like '%$query%'");
          echo "<META http-equiv=\"refresh\" content=\"0; URL=/servers/inventory/systemsummary.php?id=$id\">";
        }
        else
          echo "<META http-equiv=\"refresh\" content=\"0; URL=/servers/inventory/systemsummary.php?host=$query\">";
        exit;
      }
      
      break;

    case "USERID" :
      $keys = preg_split("/ /",$query);

      if (count($key) > 1)
      {
        $key = base64_encode($query);
        echo "<META http-equiv=\"refresh\" content=\"0; URL=/people/?key=$key\">";
        exit;
      }
      else
      {
        echo "<META http-equiv=\"refresh\" content=\"0; URL=/access/?id=$query\">";
      }
  }
?>
