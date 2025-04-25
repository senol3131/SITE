<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 **/
 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>FEAR</b>");
 }

	/* drop */
	$drop = $dbo->doquery("SELECT * FROM K_MONSTER where strName LIKE '%$MobName%'");
?>