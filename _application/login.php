<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 **/
 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>FEAR</b>");
 }
 
 $dbo->doquery('SELECT TOP 1 girisyap FROM _Odestashield_panel_settings');
 $girisyap = $dbo->result('girisyap');
?>