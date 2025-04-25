		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->					
<div class="content-title">
	<h1 class="title"><center>Kayıt Ol</center></h1>
</div><!-- content-title -->
<?PHP

 $islem = $dbo->SQLSecurity($_GET['islem']);

 if($kayitol != 'acik'):
	$dbo->uyari('Üyelik Alımı Kapalidir!');
	$dbo->yonlendir('index.php',0);
 elseif($_SESSION['User']):
	$dbo->uyari('Zaten sunucumuza üyesiniz!');
	$dbo->yonlendir('index.php',0);
 else:
	echo '
			<div class="popup-block">
				<div class="reg-form">
';
	if(!$islem or $islem == 1):
		echo '
		<center>
		
						<form method="post" autocomplete="off" action="'.$base_url.'Register-2">
						<p>Giriş Id</p>
						<input type="text" name="kullaniciadi" placeholder="Giriş Id" minlength="3" required="true">
						
							<p>Şifre</p>
							<input type="password" name="sifre" placeholder="Şifre" minlength="3" required="true">
							
						<p>Gizli Soru</p>
						<select class="input-re" name="gsoru" styled="true">
						<option value="">     Gizli Soru Seçiniz</option>
						<option value="anneniz">'.$lang['anneniz'].' ?</option>
						<option value="eniyicocukluk">'.$lang['eniyicocukluk'].' ?</option>
						<option value="ilkevcilhayvan">'.$lang['ilkevcilhayvan'].' ?</option>
						<option value="ogretmen">'.$lang['ogretmen'].' ?</option>
						<option value="tarihsel">'.$lang['tarihsel'].' ?</option>
						<option value="buyukbaba">'.$lang['buyukbaba'].' ?</option>
						</select><br><br>

						<p>Gizli Soru Cevabı</p>
						<input type="text" name="gyanit" placeholder="Gizli Soru Cevabı" minlength="3" required="true">

						<p>Email Adresi</p>
						<input type="email" name="mailadresi" placeholder="E-Posta Adresi" required="true">

						<p>Telefon Numarası</p>
						<input type="text" name="fstrNumber" placeholder="Telefon Numarası" required="true">

						<p>İtem Kilit Şifresi</p>
						<input type="text" name="seal" onkeypress="numberValidate(event)" minlength="8" maxlength="8" placeholder="İtem Kilit Şifresi" required="true">
						
						<p>OTP Şifresi</p>
						<input type="text" name="otp" onkeypress="numberValidate(event)" minlength="6" maxlength="6" placeholder="İtem Kilit Şifresi" required="true">

						<div class="reg-buttons" style="margin-top: 0px;">
							<button class="cont button-n login-button" type="submit">Kayıt Ol</button>
							<button class="but button-n close_mw" type="button">İptal</button>
						</div>
					</form>
		</center>
		';
	elseif($islem == 2):
		$username = $dbo->SQLSecurity($_POST['kullaniciadi']);
		$password = $dbo->SQLSecurity($_POST['sifre']);
		$mail = $dbo->SQLSecurity($_POST['mailadresi']);
		$gsoru = $dbo->SQLSecurity($_POST['gsoru']);
		$gyanit = $dbo->SQLSecurity($_POST['gyanit']);
		$telefon = $dbo->SQLSecurity($_POST['fstrNumber']);
		$seal = $dbo->SQLSecurity($_POST['seal']);
		$otp = $dbo->SQLSecurity($_POST['otp']);
		$ip = $_SERVER['REMOTE_ADDR'];
		$regdate = date("Y-m-d H:i:s");
			
		$dbo->doquery("SELECT COUNT(*) FROM TB_USER WHERE STRACCOUNTID = '$username'");
		$uservar = $dbo->result(1);
		$dbo->doquery("SELECT COUNT(*) FROM _Odestashield_mykol WHERE MyKOLMail = '$mail'");
		$mailvar = $dbo->result(1);
			
			if(!$username or !$password or !$gsoru or !$gyanit or !$mail or !$telefon or !$otp):
				$dbo->uyari(''.$lang['BlankSpace'].'');
				$dbo->yonlendir(''.$base_url.'Register',0);
			elseif($uservar > 0):
				$dbo->uyari(''.$lang['kullaniciadivar'].'');
				$dbo->yonlendir(''.$base_url.'Register',0);
			elseif($mailvar > 0):
				$dbo->uyari(''.$lang['mailvar'].'');
				$dbo->yonlendir(''.$base_url.'Register',0);
			elseif(!eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$", $mail)):
				$dbo->uyari(''.$lang['gecerlimail'].'');
				$dbo->yonlendir(''.$base_url.'Register',0);
			elseif(preg_match("/[^a-z, A-Z, 0-9]/", $username)):
				$dbo->uyari(''.$lang['gecersizk'].' '.$lang['iharf'].' : abcdefghijklmnoprstuvyzxwq '.$lang['iharf'].' : ABCDEFGHIJKLMNOPRSTUVYZXWQ '.$lang['isayi'].': 0123456789');
				$dbo->yonlendir(''.$base_url.'Register',0);
			elseif(preg_match("/[^a-z, A-Z, 0-9]/", $password)):
				$dbo->uyari(''.$lang['gecersizs'].' '.$lang['iharf'].' : abcdefghijklmnoprstuvyzxwq '.$lang['iharf'].' : ABCDEFGHIJKLMNOPRSTUVYZXWQ '.$lang['isayi'].': 0123456789');
				$dbo->yonlendir(''.$base_url.'Register',0);	
			elseif(preg_match("/[^0-9]/", $seal)):
				$dbo->uyari('Lütfen item kilit şifrenizi, EN FAZLA 8 HANELİ OLMAK ÜZERE SADECE RAKAMLARDAN YAPINIZ.');
				$dbo->yonlendir(''.$base_url.'Register',0);			
			elseif(preg_match("/[^0-9]/", $otp)):
				$dbo->uyari('Lütfen OTP şifrenizi, EN FAZLA 6 HANELİ OLMAK ÜZERE SADECE RAKAMLARDAN YAPINIZ.');
				$dbo->yonlendir(''.$base_url.'Register',0);
			elseif(preg_match("/0\s\(5[0-9]{2}\)\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}/", $telefon)):
				$dbo->uyari('Lütfen geçerli bir telefon numarası giriniz');
				$dbo->yonlendir(''.$base_url.'Register',0);
			else:
				$dbo->doquery("INSERT INTO TB_USER (StrAccountID,StrPasswd,OTPPassword,strSealPasswd,StrAuthority,CashPoint) VALUES('$username',dbo.HashPasswordString('$password'),'$otp','$seal',1,0)");
				$dbo->doquery("INSERT INTO CHECK_ACCOUNT (StrAccountID) VALUES('$username')");
				$dbo->doquery("INSERT INTO _Odestashield_mykol (StrAccountID,MyKOLSoru,MyKOLCevap,MyKOLMail,MyKOLTelefon,MyKOLIPAdress,MyKOLRegDate,MyKOLLastIPAdress,MyKOLLastLogin) VALUES ('$username','$gsoru','$gyanit','$mail','$telefon','$ip','$regdate','$ip','$regdate')");
				$dbo->uyari(''.$lang['kayitbasarili'].'');
				$dbo->yonlendir(''.$base_url.'',0);
			endif;
	endif;
	echo '</div></div>';
 endif;?>


</div>
</div>
</main>
<!--RIGHT--><?php include "/../right.php"; ?><!--RIGHT-->
			</div>
