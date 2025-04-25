<?php
$pageTitle = "Çıkış";
?>
<head>
<title><?=$ServerName;?> ~ <?=$pageTitle;?></title>
</head>
<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 **/
 unset($_SESSION['LoginFormUsername']);
 unset($_SESSION['LoginFormAuth']);
 session_destroy();
 $dbo->yonlendir(''.$base_url.'',0);
 echo'
<div class="serverinfo-area">
<div class="serverinfo-item"></div>
<div class="serverinfo-item">
<b><p style="color: #9effa2;text-shadow: 0px 0px 17px lime;">Lütfen Bekleyiniz</p></b><p style="font-family: Arial"></p></div>
<div class="serverinfo-item"></div></div>
	 ';
 ?>