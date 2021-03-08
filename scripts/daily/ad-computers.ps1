$domaincontroller = "pointy"

if (test-connection $domaincontroller -Quiet)
{
  try {
    {
      Write-Host "processing computer objects"
      $computers = get-adcomputer -filter * -server $domaincontroller -properties distinguishedname, name, dnshostname, sid,enabled,operatingsystem,whencreated, whenchanged, passwordlastset, ipv4address
      $totalcomputers = ($computers | Measure-Object).Count

      if ($totalcomputers -gt 0)
      {
        foreach ($computer in $computers)
        {
          $sql = "insert into ad.computers (dn, ou, cn, dnshostname, sid, enabled, domain, os, whencreated,whenchanged,passwordlastset, ipv4address) values ()"
        }        
      }
    }
  }
  catch {
    write-host "Unable to get computer list"
  }
}
else 
{
  write-host "domain controller unavaialble"  
}
