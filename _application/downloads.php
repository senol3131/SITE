<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 **/
 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>FEAR</b>");
 }
 $down_query = $dbo->doquery("SELECT title$site_dil as title,url,tarih FROM _Odestashield_Download ORDER BY id ASC");
 ?>