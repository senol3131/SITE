<?PHP
	// Diller
	$dil_ayar['tr'] = array('tr.php','Turkce');
	$dil_ayar['en'] = array('en.php','English');

	define("DIL_KLASOR",'languages');

	@ $gelen_dil = $_REQUEST['dil'];
	@ $oturum_dil = $_SESSION['oturum_dil'];
	@ $varsayilan_dil = $launguage; //SİTE ILK AÇILDIĞINDA GEÇERLİ SAYFA DİLİ

	$site_dil = $varsayilan_dil;

	if (empty($gelen_dil))
	{
	if (!empty($oturum_dil))
	{
	$site_dil = $oturum_dil;
	}
	} else {
	if (is_array($dil_ayar[$gelen_dil]))
	{
	$site_dil = $gelen_dil;
	$_SESSION['oturum_dil'] = $gelen_dil;
	}
	}

	//DİL DOSYASININ SAYFAYA EKLENMESİ
	$dil_dosyasi = DIL_KLASOR.'/'.$dil_ayar["$site_dil"][0];

	//Dil Dosyasının Olup Olmadığı Kontrol Ediliyor
	if (file_exists($dil_dosyasi))
	{
	include($dil_dosyasi);
	} else {
	echo '<div align="center" style="color:#ff0000">HATA: Belirttiğiniz '.$dil_dosyasi.' Adresindeki Dosya Bulunamadı</div>';
	include(DIL_KLASOR.'/'.$dil_ayar["$varsayilan_dil"][0]);
	}
?>