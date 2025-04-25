<?php ?><?php
/*
 *	@author	:	FEAR
 *	@year	:	2020
*/
/*
	Session Start
*/
ob_start();
session_start();
define("FEAR", 1, true);
/*
	Configuration Files
*/
include ('config.inc.php');
/*
	DBO 
*/
include LIBRARY . 'functions.php';
/*
	Call Class
*/
$dbo = new dbo($db['db_name'], $db['db_user'], $db['db_pass']);
#$dbo->licence_control($key);
/*
	Base URL
*/
include ('inc_sql/base_url.php');
/*
	Language
*/
include ('inc_sql/lang.php');
/*
	Template Settings
*/
include LIBRARY . 'template.lib.php';