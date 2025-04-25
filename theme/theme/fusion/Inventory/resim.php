<?php
	
	include('common.php');
	header("Content-type: image/jpeg");
	$image = $_GET['resim'];
	$im=imagecreatefromjpeg($image);

	$adet = $_GET['adet'];

	$beyaz = imagecolorallocate($im, 255, 255, 255);

	putenv('GDFONTPATH=' . realpath('.')); 
	$font = 'turkce_verdana.ttf';  
	$x = 27;
	$y = 40;
	if ($adet<10) $x+=7;
	if ($adet > 99) $x -= 7;
	if ($adet > 999) $x -= 7;
	imagettftext( $im, 9, 0, $x, $y, $beyaz, $font, $adet);

	imagejpeg($im);
	imagedestroy($im);
?>