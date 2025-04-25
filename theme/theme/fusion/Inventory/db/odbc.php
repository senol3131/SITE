<?
	class debug
	{
		function error($query, $error = "")
		{
			global $msconnect, $user;
			$hata = date("d m Y G:i:s",time()) . " -> ( ". $_SERVER['PHP_SELF'] . "?" .$_SERVER['QUERY_STRING'] ." ) [Sorgu] : " . $query . "  [Hata] : " . $error."\r\n";
			$file = fopen("Debug.txt","a");
			fwrite($file, $hata );
			fclose($file);
			die($hata);
		}
	}
	
	$debug = new debug();
	function doquery($query, $fetch = false){
		global $msconnect, $user, $debug;
		include("settings.php");
		
		if (!isset($msconnect))
		{
			$msconnect=odbc_connect("$dbname","$dbuser","$dbpass");
		}
		$sqlquery = @odbc_exec($msconnect,$query) or $debug->error($query, odbc_errormsg());
	
		if($fetch)
		{ 
			$sqlrow = @odbc_fetch_array($sqlquery);
			return $sqlrow;
		}else{
			return $sqlquery;
		}
	}

?>