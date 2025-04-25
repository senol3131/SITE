<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 **/
 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>FEAR</b>");
 }
 $page_name = $dbo->SQLSecurity(intval($_GET['page_name']));
 
  if($page_name == 1 ):
	$javascriptcode = 'onclick="searchDrop();"';
	$page_title = "Drop Arama";
 elseif($page_name == 2 ):
	$javascriptcode = 'onclick="ItemsearchDrop();"';
	$page_title = "Item Arama";
 endif;
 
 ?>