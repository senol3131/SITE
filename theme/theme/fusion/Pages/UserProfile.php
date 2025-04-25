<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 **/
 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>FEAR</b>");
 }

 $user = $dbo->SQLSecurity($_GET['user']);
 
 if(!$user):
	$dbo->uyari('Lütfen bir oyuncu adı giriniz!');
	$dbo->yonlendir($base_url . 'index.php',0);
 else:
	$gm_mi = $dbo->doquery("select count(*) from userdata where authority = 0 and struserid = '".iconv('ISO-8859-9', 'UTF-8',$user)."'");
	
	
	if($dbo->result(1) > 0):
		$dbo->uyari('GM Profilini görüntüleyemezsiniz.!');
		$dbo->yonlendir($base_url . '404',0);
	else:

$infos = $dbo->doquery("SELECT UD.strUserID, UD.Class, UD.Level, UD.Nation, UD.Loyalty, UD.Strong, UD.Sta, UD.Cha, UD.Dex, UD.Intel, UD.Level, UD.Gold, UD.Knights, KD.IDName AS KnightName, UD.LoyaltyMonthly FROM USERDATA AS UD LEFT JOIN KNIGHTS AS KD ON UD.Knights = KD.IDNUM WHERE UD.strUserID = '$user' ORDER BY UD.Loyalty DESC");
$isim 	 = $dbo->result('strUserID');
$job 	 = $dbo->result('Class');
$nation  = $dbo->result('Nation');
$level   = $dbo->result('Level');
$loyalty = $dbo->result('Loyalty');
$loyaltymonthly = $dbo->result('LoyaltyMonthly');
$Strong = $dbo->result('Strong');
$Sta = $dbo->result('Sta');
$Cha = $dbo->result('Cha');
$Intel = $dbo->result('Intel');
$Dex = $dbo->result('Dex');
$Level = $dbo->result('Level');
$Gold = $dbo->result('Gold');

#find clan / check clan
if($dbo->result('KnightName') == true):
	$clanname = $dbo->result('KnightName'); // eğer kullanıcı clanda ise clan adını yazar
	$clanname =  '<a href="'.$base_url.'ClanProfile/'.trim(iconv('ISO-8859-9', 'UTF-8',$dbo->result('Knights'))).'">'.iconv('ISO-8859-9', 'UTF-8',$dbo->result('KnightName')).'</a>';
else:
	$clanname = '[CLAN YOK]';	// eğer kullanıcı clanda değil ise boş bırakır
endif;

?> 		
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-140471361-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-140471361-1');
</script>
		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->					
<div class="content-title">
	<h1 class="title"><center><?php echo $isim; ?> - Kullanıcı Profili</center></h1>
</div><!-- content-title -->

<div class="inventory_full">
<iframe style="border:0px; background-position:1000px 1000px; overflow:hidden; margin-left:-94px;margin-top:-5px; position: relative;" src="<?=$path;?>inventory/inventory.php?user=<?=trim(iconv('ISO-8859-9', 'UTF-8',$user));?>" width=800 height=600></iframe>
</div>

</div>
</div>
</main>
<!--RIGHT--><?php include "/../right.php"; ?><!--RIGHT-->
			</div>
<?
	endif;
 endif;
 

?>