		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "/../pages/serverinfo.php"; ?><!--SERVERINFO-->					
<div class="content-title">
	<h1 class="title"><center>Telefon Doğrulama</center></h1>
</div><!-- content-title -->
<div class="parakasma">

<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright	:	2019
 **/
 
 if(isset($_POST['submit'])):
	$sifre      =   $dbo->SQLSecurity($_POST['pass']);
	$telefon  	=    $dbo->SQLSecurity($_POST['telefon']);
	
		if(!$telefon):
			$dbo->uyari(''.$lang['BlankSpace'].'');
			$dbo->yonlendir(''.$base_url.'UserCP/ChangePhone',0);
		elseif(preg_match("/0\s\(5[0-9]{2}\)\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}/", $telefon)):
			$dbo->uyari('Lütfen geçerli bir telefon numarası giriniz ve başına 0 koymayı unutmayınız');
			$dbo->yonlendir(''.$base_url.'UserCP/ChangePhone',0);
		else:
			$dbo->doquery("UPDATE _Odestashield_mykol Set MyKOLTelefon = '$telefon' where StrAccountID = '$username'");
			$dbo->uyari(''.$lang['islembasarili'].'');
			$dbo->yonlendir(''.$base_url.'UserCP/ChangePhone',0);
		endif;
 else:
 
 endif;
 
 echo'
<form action="'.$base_url.'UserCP/ChangePhone" method="post">
		<center>
						<div style="width: 92%;background: #193c5f33;border: 2px solid #0a3056;margin: 20px;height: 33px;line-height: 34px;text-align: center;font-weight: bold;font-size: 14px;">Hediye Kodlardan Faydalanmak İçin Numaranızı Doğrulayın.</div>
	
			<input type="text" required="true" style="margin-bottom: 20px;width: 240px;height: 16px;color: white;font-weight: bold;font-size: 14px;background: #14304a;border: 2px solid #1f476d;" name="telefon" minlength="11" maxlength="11" placeholder="Yeni Telefon Numaranızı Giriniz" pattern="\d*">
	

			<br>
			<input type="submit" name="submit" value="Telefon Numarasını Değiştir" style="cursor:pointer;background: #342d98;background: url('.$path.'images/login-button.jpg) no-repeat;background-size: cover;margin-top: 20px;padding: 10px 46px;,: 35pxline-height: 13px;font-size: 14px;font-weight: bold;box-shadow: 0px 0px 29px 1px #1b532d;">
		</center>
	</form>
 ';
 
 ?>


</div>

</div>
</div>
</main>
<!--RIGHT--><?php include "/../right.php"; ?><!--RIGHT-->
			</div>
	