<?php
	
	include("db/odbc.php");
	session_start();
	define("AVCI",true);
	define("CACHE_FOLDER","cache/");
	define("CACHEKULLAN",FALSE);
	
	function temizle($deger)
	{
		$karakterler = array(chr(39),chr(92),chr(34),"-","/",";");
		$deger = str_replace($karakterler,"",$deger);
		return $deger;
	}
	function get($deger)
	{
		global $_GET;
		$deger = $_GET[$deger];
		$karakterler = array(chr(39),chr(92),chr(34),"-","/",";");
		$deger = str_replace($karakterler,"",$deger);
		return $deger;
	}
	function post($deger)
	{
		global $_POST;
		$deger = $_POST[$deger];
		$karakterler = array(chr(39),chr(92),chr(34),"-","/",";");
		$deger = str_replace($karakterler,"",$deger);
		return $deger;
	}
	function pretty_number($n, $floor = true) {
		if ($floor) {
			$n = floor($n);
		}
		return number_format($n, 0, ",", ".");
	}
	function ReadFromFile($filename) {
		$content = @file_get_contents ($filename);
		return $content;
	}

	function SaveToFile ($filename, $content) {
		$content = @file_put_contents ($filename, $content);
	}

	function parsetemplate ($template, $array) {
		return preg_replace('#\{([a-z0-9\-_]*?)\}#Ssie', '( ( isset($array[\'\1\']) ) ? $array[\'\1\'] : \'\' );', $template);
	}

	function gettemplate ($templatename) {
		$filename = 'templates/' . $templatename . ".tpl";
		return ReadFromFile($filename);
	}

	function output($text,$gzip=true,$level = 3)
	{
		if ($gzip)	$ret = fetch_gzipped_text($text,$level);	else	$ret = $text;
		die( $ret );
		exit();
	}
	function fetch_gzipped_text($text, $level = 1)
	{
		$returntext = $text;

		if (function_exists('crc32') AND function_exists('gzcompress'))
		{
			if (strpos(' ' . $_SERVER['HTTP_ACCEPT_ENCODING'], 'x-gzip') !== false)
			{
				$encoding = 'x-gzip';
			}
			if (strpos(' ' . $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false)
			{
				$encoding = 'gzip';
			}

			if ($encoding)
			{
				header('Content-Encoding: ' . $encoding);

				if (false AND function_exists('gzencode'))
				{
					$returntext = gzencode($text, $level);
				}
				else
				{
					$size = strlen($text);
					$crc = crc32($text);

					$returntext = "\x1f\x8b\x08\x00\x00\x00\x00\x00\x00\xff";
					$returntext .= substr(gzcompress($text, $level), 2, -4);
					$returntext .= pack('V', $crc);
					$returntext .= pack('V', $size);
				}
			}
		}
		return $returntext;
	}
	



	


	
	function resimadi($itemkodu, $uzanti)
	{
		$resim = "itemicon/" . substr($itemkodu,0,1) . "_" . substr($itemkodu,1,4) . "_" . substr($itemkodu,5,1) . "0_0.".$uzanti;
		return $resim;
	}
	


?>