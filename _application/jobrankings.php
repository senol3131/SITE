<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 **/
 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>FEAR</b>");
 }
 $job_id = $dbo->SQLSecurity(intval($_GET['job_id']));
 
  if($job_id == 1 ):
	$job_num == 1;
	$job_name == 'Warrior';
 elseif($job_id == 2 ):
	$job_num == 2;
	$job_name == 'Rogue';
 elseif($job_id == 3):
	$job_num == 3;
	$job_name == 'Priest';
 elseif($job_id == 4):
	$job_num == 4;
	$job_name == 'Mage';
 endif;
 
 ?>