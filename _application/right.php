<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 **/
 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>FEAR</b>");
 }
	$dbo->doquery('SELECT TOP 1 youtube,discord,instagram,facebook,forum,twitter FROM _Odestashield_social_links');
	$youtube 		= $dbo->result('youtube');
	$discord 		= $dbo->result('discord');
	$instagram		= $dbo->result('instagram');
	$facebook		= $dbo->result('facebook');
	$forum			= $dbo->result('forum');
	$twitter		= $dbo->result('twitter');	
 ?>