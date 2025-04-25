<?php
function olustur () {
	$fontnum=6;
	$text = strtoupper(substr(rand(0,999999999999),-4));
	session_start();
    $_SESSION["security_code"] = $text;
	
	$im = imagecreatetruecolor(150, 75);
	$white = imagecolorallocate($im, 30, 28, 18);
/*		
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, rand(1,250), rand(1,250), rand(1,250));
*/

	imagefilledrectangle($im, 0, 0, 400, 200, $white);

/*  				
	$trans = imagecolorallocate($im,255,99,140);
    imagecolortransparent($im,$trans);
	imagettftext($im, 25, 0, 10, 49,$trans,"2.ttf",strtoupper(substr(md5(rand(0,999999999999)),-6)));
*/	
	for ($i=0;$i<strlen($text);$i++)
		{
			$font = rand(1,$fontnum).".TTF";
//                    #angel of chacters#
			if ((rand(2,6)%2)) { $angel=rand(0, 30); } else { $angel=rand(330, 360); }
			imagettftext($im, 25, $angel, 10+$i*35, 49, imagecolorallocate($im, rand(1,250), rand(1,250), rand(1,250)), $font,$text[$i]);
		}
	$x=100; $y=100; $size=200;
/*			
	imagesetthickness ($im,2);
	imageline($im, $x+$size/2, $y+$size/2, $x-$size/2, $y-$size/2, imagecolorallocate($im, rand(1,250), rand(1,250), rand(1,250)));
	imageline($im, $x-$size/2, $y+$size, $x+$size/2, $y-$size, imagecolorallocate($im, rand(1,250), rand(1,250), rand(1,250)));
	imageline($im, $x+$size/2, $y+$size, $x+$size/2, $y-$size, imagecolorallocate($im, rand(1,250), rand(1,250), rand(1,250)));
	imageellipse($im, 200, 150, 300, 200, $col_ellipse);
*/	
	header("Content-type: image/png");
	imagepng($im);
	imagedestroy($im);
}
olustur();
?> 