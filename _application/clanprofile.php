<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 **/
 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>FEAR</b>");
 }
 $id = $dbo->SQLSecurity(intval($_GET['id']));
 $clan_query = $dbo->doquery("Select IDNum,Nation,IDName,Members,Chief,ViceChief_1,ViceChief_2,ViceChief_3 From KNIGHTS Where IDNUM='$id'");
 ?>