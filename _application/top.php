<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 **/
 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>FEAR</b>");
 }
	$dbo->doquery('SELECT TOP 1 title,description,keywords,logo_text,online_bugu,server_name,forum,login_status,esn_link FROM _Odestashield_Site');
	$title 			= $dbo->result('title');
	$description 	= $dbo->result('description');
	$keywords		= $dbo->result('keywords');
	$logo_text		= $dbo->result('logo_text');
	$online_bugu	= $dbo->result('online_bugu');
	$server_name	= $dbo->result('server_name');
	$forum_adress	= $dbo->result('forum');
	$login_status	= $dbo->result('login_status');
	$esn_link	= $dbo->result('esn_link');
	
	$dbo->query("SELECT siralama_turu FROM _Odestashield_panel_settings");
	$siralama_turu = $dbo->results('siralama_turu');
	
	
	
	
 ?>