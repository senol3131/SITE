<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 **/

/*
	Template Settings
*/
header('Content-Type: text/html; charset=utf-8');
	
	$pages = $dbo->SQLSecurity($_GET['pages']);
	
	if($pages == 'FragmentRatesTable' 
	or $pages == 'DropListTable' 
	or $pages == 'DropListItem' 
	or $pages == 'DropListGroupItem' 
	or $pages == 'UpgradeRatesTable' 
	or $pages == 'MinningTable' 
	or $pages == 'ShozinTable' 
	or $pages == 'ShozinTableItem' 
	or $pages == 'Zone'
	or $pages == 'PowerUpStoreTable'
	or $pages == 'ItemListTable' 	
	):
		include APPLICATION . $pages.'.php';
		include INC . $pages . '.php';
		include TEMPLATE . TEMPLATE_DIR . 'top.php';
	else:

	/* Top */
	include APPLICATION . 'top.php';
	include TEMPLATE . TEMPLATE_DIR . 'top.php';
	
	/* Header */
	include APPLICATION . 'header.php';
	include TEMPLATE . TEMPLATE_DIR . 'header.php';	
		
	/* Left */
	/*include TEMPLATE . TEMPLATE_DIR . 'left.php';*/
	
	/* Content */
	$pages = $dbo->SQLSecurity($_GET['pages']);
		if(empty($pages)):
			include APPLICATION . 'content.php';
			include TEMPLATE . TEMPLATE_DIR . 'content.php';
		elseif(!empty($pages) && (file_exists(INC . $pages . '.php'))):
					if(file_exists(APPLICATION . $pages.'.php')):
						include APPLICATION . $pages.'.php';
					endif;
					include INC . $pages . '.php';
		else:
			echo include INC . 'index.php';;
		endif;
	
	/* Right */
	/*include TEMPLATE . TEMPLATE_DIR . 'right.php';*/
	
	/* Footer */
	include TEMPLATE . TEMPLATE_DIR . 'footer.php';
	
	endif;

?>