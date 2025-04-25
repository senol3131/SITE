<?php
$pageTitle = "Kullanıcı Menüsü";
?>
<head>
<title><?=$ServerName;?> ~ <?=$pageTitle;?></title>
</head>
<?PHP

 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>X</b>");
 }
 
 $islem = $dbo->SQLSecurity($_GET['islem']);
 $username = $_SESSION['LoginFormUsername'];
	
if(!$username):
	$dbo->yonlendir(''.$base_url.'index.php',0);
else:
$page = $dbo->SQLSecurity($_GET['act']);
$page = explode('.',$page);
$page = $page[0];
$uzanti = 'php';
			
if(!$page):

$dbo->doquery("select Count(*) from _Odestashield_mykol where StrAccountID = '$username'");
$mykolvarmi = $dbo->result(1);
$dbo->doquery("select strAccountID,CashPoint from TB_USER where StrAccountID = '$username'");	
	$sss = $dbo->result(1);
	$cash = $dbo->result(2);
	

		
$dbo->doquery("SELECT MyKOLMail,MyKOLIPAdress,MyKOLRegDate,MyKOLLastIPAdress,MyKOLLastLogin,MyKOLTelefon FROM _Odestashield_mykol WHERE StrAccountId = '$username'");
	$mail 	  = $dbo->result('MyKOLMail');
		$ipadress = $dbo->result('MyKOLIPAdress');
	$regdate  = $dbo->result('MyKOLRegDate');
	$lastip   = $dbo->result('MyKOLLastIPAdress');
	$lastlogin = $dbo->result('MyKOLLastLogin');
	$telefon  = $dbo->result('MyKOLTelefon');
if($mykolvarmi == 0):
	$dbo->uyari('Mykol bilgilerinizi oluşturmak zorundasınız');
	$dbo->yonlendir(''.$base_url.'UserCP/UpdateMykol',0);
	
else:
?>
<div class="container">
<main class="content">
<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
<div class="middle-wrapper">							
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->	
<div class="content-title">
	<h1 class="title"><center>Kullanıcı Menüsü</center></h1>
</div><!-- content-title -->
<BR>

<div class="wrapper-middle" style="padding: 60px;padding-top:10px;">
<div class="media-block-i">
<table>
<tbody><tr>
	<th colspan="4" style="font-size:14px; height:35px">Hoşgeldiniz, <b style="color:#d88f22;"><?php echo $_SESSION["LoginFormUsername"]; ?></b> (<span style="color:#b48a31;"><?=number_format($cash)?></span> KC)</th>
</tr>
<tr>
	<th>Oluşturulma Tarihi</th>
	<th>Kayıt olunan IP</th>
	<th>Son Aktivite Saati</th>
	<th>Son giriş IP</th>
</tr>
<tr>
	<td><?=$dbo->tr_time($regdate,$format = "j F Y, l H:i");?></td>
	<td><?=$ipadress;?></td>
	<td><?=$dbo->tr_time($lastlogin,$format = "j F Y, l H:i");?></td>
	<td><?=$lastip;?></td>
</tr>
		
<tr>
	<td colspan="4" style="font-size:14px"></td>
</tr>

<tr>
	<th colspan="4" style="font-size:14px; height:35px"><b style="color:#d88f22;">Menu</b></th>
</tr>

<tr class="rightborder">
	<td colspan="2"><a href="<?=$base_url;?>UserCP/ChangePW">Şifre Değiştirme</a></td>
	<td colspan="2"><a href="<?=$base_url;?>UserCP/ChangeSealPW">İtem Kilit Şifre Değiştirme</a></td>
</tr>
<tr class="rightborder">
	<td colspan="4"><a href="<?=$base_url;?>UserCP/ChangeMail">Mail Adresi Değiştirme</a></td>
</tr>

<tr class="rightborder">
	<td colspan="2"><a href="<?=$base_url;?>UserCP/ChangeOTP">OTP Şifresi Değiştirme</a></td>
	<td colspan="2"><a href="<?=$base_url;?>UserCP/ChangePhone">Telefon Numarası Değiştirme</a></td>
</tr>

<tr class="rightborder">
	<td colspan="4"><a href="<?=$base_url;?>Logout" style="font-size:25px"><font color="red">ÇIKIŞ YAP</font></a></td>
</tr>

</tbody></table>
</div>
	</div>
	</div>
	</div>	
	</main>
<!--RIGHT--><?php include "/../right.php"; ?><!--RIGHT-->
			</div>	
<?PHP
endif;
	else:
		if(file_exists(TEMPLATE . TEMPLATE_DIR . 'usercp/' . $page.'.'.$uzanti)):
			include(TEMPLATE . TEMPLATE_DIR . 'usercp/' . $page.'.'.$uzanti);
		else:
			echo '<meta http-equiv="refresh" content="0;URL='.$base_url.'UserCP">';
		endif;
	endif;

	endif;

?>

