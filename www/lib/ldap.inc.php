<?PHP

function ldap_ad_init(&$adsr)
{
  $result['ldaperror'] = "";
  $resuslt['ldapbind'] = "";
  $ad = ldap_connect("ldaps://my.addomain.com");
  ldap_set_option($ad,LDAP_OPT_PROTOCOL_VERSION,3);
  ldap_set_option($ad,LDAP_OPT_REFERRALS,0);

  if ($ad)
  {
    $result['ldapbind'] = ldap_bind($ad, "cn=ldapuser,ou=ou,dc=dc,dc=com","password");
    $result['ldaperror'] = ldap_error($ad);
  }
  else
  {
    $result['ldaperror'] = ldap_error($ad);
  }

  return($result);
}

function ldap_ad_done(&$ad)
{
  ldap_close($ad);
}

function ldap_get_ad_user_info(&$ad, $cn)
{
  $adsearch = ldap_search($ad, "dc=mydomain,dc=com","cn=$cn");
  $adinfo = ldap_get_entries($ad, $adsearch);
  return ($adinfo);
}

function ldap_get_ad_group_info(&$ad, $cn)
{
  $adsearch = ldap_search($ad,"dc=mydomain,dc=com","(&(cn=$cn)(objectCategory=Group))");
  $adinfo = ldap_get_entries($ad, $adsearch);
  return($adinfo);
}

function ldap_get_obj_info(&$realm, $dn)
{
  $dn_parts = explode(",",$dn,2);
  $search = ldap_search($realm, $dn_parts[1], $dn_parts[0]);
  $objinfo = ldap_get_entries($realm, $search);
  return ($objinfo);
}

function ldap_find_obj(&$realm, $base, $cn)
{
  $search = ldap_search($realm, $base, "cn=$cn")
  $objinfo = ldap_get_entries($realm, $Search);
  return ($objinfo);
}

function ldap_find_uid($&$realm, $base, $uid)
{
  $search = ldap_search($realm, $base, "uid=$uid");
  $objinfo = ldap_get_entries($realm, $search);
  return($objinfo);
}

function ldap_search_filter(&$realm, $base, $filter)
{
  $search = ldap_search($realm, $base, $filter);
  $objinfo = ldap_get_entries($realm, $search);
  return ($objinfo);
}

function ldap_authenticate(&$realm, $dn, $pw)
{
  @ldap_bind($realm, $dn, $pw);
  return ($objinfo);
}

function win2unix($date_ts)
{
  $epoch_dif = 11644473600;
  $date_ts = $date_ts * 0.0000001;
  $unix_ts = $date_ts - $epoch_dif;
  return ($unix_ts);
}
?>
