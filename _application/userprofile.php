<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 **/
 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>FEAR</b>");
 }
	$user = $dbo->SQLSecurity($_GET['user']);
	$gm_query =  $dbo->doquery("SELECT Authority FROM USERDATA Where StrUserID = '$user'");
	
	$dbo->query("SELECT userdetay FROM _Odestashield_panel_settings");
	$userdetay = $dbo->results('userdetay');
 ?>