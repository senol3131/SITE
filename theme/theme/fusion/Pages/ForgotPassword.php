		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->					

<?PHP

 $islem = $dbo->SQLSecurity($_GET['islem']);

 if($sifredegistir != 'acik'):
	$dbo->uyari('Sifre Degistirme Kapalidir!');
	$dbo->yonlendir('index.php',0);
 else:
	if(!$islem or $islem == 1):
		echo '
<div style="
    width: 96%;
    float: left;
    background: #050f19;
    border: 2px solid #040a10;
    margin: 18px 2%;
    border-radius: 5px;
    padding-bottom: 10px;
">

<div class="content-title" style="float: left;width: 100%;">
	<h1 class="title">Şifre Sıfırlama</h1>
</div><!-- content-title -->

<form action="'.$base_url.'ForgotPassword-2" method="post">   
		<center>
						<input type="text" required="true" style="display: block;
 color: white;
    text-align: center;
    width: 64%;
    margin: 16px auto;
    height: 30px;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="kullaniciadi" placeholder="Oyuna Giriş ID">
		
  <input type="submit" name="forgotpw1" value="Onayla" style="cursor:pointer;background: #342d98;background: url('.$path.'images/login-button.jpg) no-repeat;background-size: cover;margin-top: 20px;padding: 10px 46px;,: 35pxline-height: 13px;font-size: 14px;font-weight: bold;box-shadow: 0px 0px 29px 1px #1b532d;">
		</center>
	</form>
  	<br>
  	<br>
			<br>
	';
	elseif($islem == 2):
		$kullanici_adi = $dbo->SQLSecurity($_POST['kullaniciadi']);
		
			if(!$kullanici_adi):
				$dbo->uyari('Boş alan bırakamazsınız');
				$dbo->yonlendir(''.$base_url.'forgotpassword',0);
			else:
				$dbo->doquery("SELECT Count(*) FROM TB_USER WHERE StrAccountID = '$kullanici_adi'");
				
				if($dbo->result(1) == 0):
					$dbo->uyari(''.$lang['WrongUsername'].'');
					$dbo->yonlendir(''.$base_url.'forgotpassword',0);
				else:
					$_SESSION['kullanici_adi'] = $kullanici_adi;
					echo '<div style="
    width: 96%;
    float: left;
    background: #050f19;
    border: 2px solid #040a10;
    margin: 18px 2%;
    border-radius: 5px;
    padding-bottom: 10px;
">

<div class="content-title" style="float: left;width: 100%;">
	<h1 class="title">Şifre Sıfırlama</h1>
</div><!-- content-title -->

<form action="'.$base_url.'ForgotPassword-3" method="post">
<center>								

<select class="input-re3" name="gsoru" styled="true">
<option value="">                                          
Gizli Soru Seçiniz</option>
<option value="anneniz">'.$lang['anneniz'].' ?</option>
<option value="eniyicocukluk">'.$lang['eniyicocukluk'].' ?</option>
<option value="ilkevcilhayvan">'.$lang['ilkevcilhayvan'].' ?</option>
<option value="ogretmen">'.$lang['ogretmen'].' ?</option>
<option value="tarihsel">'.$lang['tarihsel'].' ?</option>
<option value="buyukbaba">'.$lang['buyukbaba'].' ?</option>
</select><br><br>

<input type="text" required="true" style="display: block;
 color: white;
    text-align: center;
    width: 64%;
    margin: 16px auto;
    height: 30px;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="gyanit" placeholder="Gizli Soru Cevabınız"><br>
<input type="password" required="true" style="display: block;
   color: white;
    text-align: center;
    width: 64%;
    margin: 16px auto;
    height: 30px;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="newpass" placeholder="Yeni Şifreniz">

<input type="password" required="true" style="display: block;
   color: white;
    text-align: center;
    width: 64%;
    margin: 16px auto;
    height: 30px;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="newpass2" placeholder="Yeni Şifreniz Tekrar">

		
  	<br>
  <input type="submit" name="submit" value="Şifremi Değiştir" style="cursor:pointer;background: #342d98;background: url('.$path.'images/login-button.jpg) no-repeat;background-size: cover;margin-top: 20px;padding: 10px 46px;,: 35pxline-height: 13px;font-size: 14px;font-weight: bold;box-shadow: 0px 0px 29px 1px #1b532d;">
		</center>
	</form>
  	<br>
  	<br><br>
									';
				endif;
			endif;
	elseif($islem == 3):
		$gsoru      =   $dbo->SQLSecurity($_POST['gsoru']);
        $gyanit     =   $dbo->SQLSecurity($_POST['gyanit']);
        $pass       =   $dbo->SQLSecurity($_POST['newpass']);
        $pass2      =   $dbo->SQLSecurity($_POST['newpass2']);
        $kuladi     =   $_SESSION['kullanici_adi'];
        $dbo->doquery("SELECT MyKOLSoru, MyKOLCevap FROM _Odestashield_mykol WHERE StrAccountID = '$kuladi'");
		$gsoru1		=	$dbo->result('MyKOLSoru');
		$gyanit1	=	$dbo->result('MyKOLCevap');
			
			if(!$gsoru or !$gyanit or !$pass or !$pass2):
				$dbo->uyari(''.$lang['BlankSpace'].'');
				$dbo->yonlendir(''.$base_url.'forgotpassword-2',0);
			elseif($gsoru <> $gsoru1):
				$dbo->uyari(''.$lang['gsoruyanlis'].'');
				$dbo->yonlendir(''.$base_url.'forgotpassword-2',0);
			elseif($gyanit <> $gyanit1):
				$dbo->uyari(''.$lang['gsoruyanlis'].'');
				$dbo->yonlendir(''.$base_url.'forgotpassword-2',0);
			elseif($pass <> $pass2):
				$dbo->uyari(''.$lang['PasswordMatch'].'');

			else:
				$dbo->doquery("UPDATE TB_USER SET STRPASSWD = dbo.HashPasswordString('$pass') WHERE STRACCOUNTID = '$kuladi'");
				$dbo->uyari(''.$lang['islembasarili'].'');
				$dbo->yonlendir(''.$base_url.'index.php',0);
			endif;
	endif;
 endif;
?>

</div>

</div>
</div>
</main>
<!--RIGHT--><?php include "/../right.php"; ?><!--RIGHT-->
			</div>
