<?PHP
/*
	Database Settings
*/

	$db = Array (
	'db_name'	=>	'KO_DATABASE_SERVER_001',
	'db_user'	=>	'sa',
	'db_pass'	=>	'Aa12561985'

	);

/*
	Timezone Settings
*/
	date_default_timezone_set('Europe/Istanbul');

	
	define('game_server',15100);
	define('web_server',80);
	define('ftp_server',15100);
/*
	Directory Settings
*/
	define('APPLICATION', '_application/');
	define('CONFIG', 'system/');
	define('LIBRARY', '_library/');
	define('TEMPLATE', 'theme/');
	define('INC_SQL', 'inc_sql/');
	define('TEMPLATE_DIR', 'fusion/');
	define('INC', 'theme/fusion/pages/');
	define('ADMIN', 'admin/');
/*
	KEYS
*/
	if($_SERVER['HTTP_HOST'] == $_SERVER['SERVER_ADDR']) {
	$key = '12fa8-cf192-84a9d-77552-c26f2'; # IP
	}elseif($_SERVER['HTTP_HOST'] == $_SERVER['SERVER_NAME']) {
	$key = ''; # DOMAIN
	}


?>