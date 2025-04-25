<?php

	/* Gzip sikistirmasi sayfalarin aktarilmasi sirasinda sikistirma yapar ve trafigi hizlandirir.
   Aktif etmek için true, pasif etmek için false yazmalisiniz*/
	define("GZIP", TRUE);
	// Gzip level Max 9 dur. Arttikça daha fazla sikistirma yapar fakat fazla yazmak performansi daha fazla artirir diyemeyiz. 3 - 4 idealdir.
	define("GZIPLEVEL", 3);
	
	// DB Baglanti ayarlari
    
    	include("../../../system/config.inc.php");

    $msconnect= odbc_connect("".$db['db_name']."","".$db['db_user']."","".$db['db_pass']."") or die("Veritabaný baðlantýsý baþarýsýz");;
?>