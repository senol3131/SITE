		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "/../pages/serverinfo.php"; ?><!--SERVERINFO-->					
<div class="content-title">
	<h1 class="title"><center>Mykol Bilgilerinizi Doldurun</center></h1>
</div><!-- content-title -->
<div class="parakasma">


<?PHP

 
 if(isset($_POST['submit'])):
	$mail 	  = $dbo->SQLSecurity($_POST['mail']);
	$gsoru 	  = $dbo->SQLSecurity($_POST['gsoru']);
	$gyanit   = $dbo->SQLSecurity($_POST['gyanit']);
	$telefon  = $dbo->SQLSecurity($_POST['telefon']);
	$seal 	  = $dbo->SQLSecurity($_POST['seal']);
	$otp 	  = $dbo->SQLSecurity($_POST['otp']);
	$ip 	  = $_SERVER['REMOTE_ADDR'];
	$regdate  = date("Y-m-d H:i:s");

	$dbo->doquery("SELECT COUNT(*) FROM _Odestashield_mykol WHERE MyKOLMail = '$mail'");
	$mailvar = $dbo->result(1);
	
		if(!$gsoru or !$gyanit or !$telefon or !$seal or !$mail):
			$dbo->uyari(''.$lang['BlankSpace'].'');
			$dbo->yonlendir(''.$base_url.'UserCP/UpdateMykol',0);
			
		elseif(preg_match("/[^0-9]/", $seal)):
			$dbo->uyari('Lütfen item kilit şifrenizi, EN FAZLA 8 HANELİ OLMAK ÜZERE SADECE RAKAMLARDAN YAPINIZ.');
			$dbo->yonlendir(''.$base_url.'UserCP/UpdateMykol',0);
			
		elseif(!eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$", $mail)):
			$dbo->uyari(''.$lang['gecerlimail'].'');
			$dbo->yonlendir(''.$base_url.'',0);
			
		elseif(preg_match("/0\s\(5[0-9]{2}\)\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}/", $telefon)):
			$dbo->uyari('Lütfen geçerli bir telefon numarası giriniz');
			$dbo->yonlendir(''.$base_url.'UserCP/UpdateMykol',0);
		else:
			$dbo->doquery("UPDATE TB_USER Set StrSealPasswd = '$seal' , OTPPassword = '$otp' where StrAccountID = '$username'");
			$dbo->doquery("INSERT INTO _Odestashield_mykol (StrAccountID,MyKOLSoru,MyKOLCevap,MyKOLMail,MyKOLTelefon,MyKOLIPAdress,MyKOLRegDate,MyKOLLastIPAdress,MyKOLLastLogin) VALUES ('$username','$gsoru','$gyanit','$mail','$telefon','$ip','$regdate','$ip','$regdate')");
			$dbo->uyari(''.$lang['islembasarili'].'');
			$dbo->yonlendir(''.$base_url.'UserCP',0);
		endif;
 else:
 endif;
 ?>
 <form method="post" action="<?=$base_url;?>UserCP/UpdateMykol" autocomplete="off" accept-charset="utf-8" id="frm" name="frm">
		<table class="accountinfo" style="width:100%;">
			<tbody>
				<tr>
					<th>Gizli Soru Seçiniz</th>
					<td>
						<select name="gsoru">
							<option value="anneniz" selected=""><?=$lang['anneniz'];?> ?</option>
							<option value="eniyicocukluk"><?=$lang['eniyicocukluk'];?> ?</option>
							<option value="ilkevcilhayvan"><?=$lang['ilkevcilhayvan'];?> ?</option>
							<option value="ogretmen"><?=$lang['ogretmen'];?> ?</option>
							<option value="tarihsel"><?=$lang['tarihsel'];?> ?</option>							
							<option value="buyukbaba"><?=$lang['buyukbaba'];?> ?</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Gizli Yanıt Giriniz</th>
					<td><input type="text" placeholder="Gizli Yanıt" name="gyanit" autocomplete="off" tabindex="1" required/></td>
				</tr>
				<tr>
					<th>Telefon</th>
					<td><input type="text" placeholder="Telefon Numarası" name="telefon" autocomplete="off" tabindex="1" pattern="\d*" required/></td>
				</tr>
				<tr>
					<th>Mail</th>
					<td><input type="text" placeholder="Mail Adresiniz" name="mail" autocomplete="off" tabindex="1" required/></td>
				</tr>				
				<tr>
					<th>Kilit Şifresi</th>
					<td><input type="text" placeholder="Kilit Şifreniz" name="seal" maxlength="8" autocomplete="off" tabindex="1" required/></td>
				</tr>
				<tr>
					<th>OTP Şifresi</th>
					<td><input type="text" placeholder="OTP Şifreniz" name="otp" maxlength="6" autocomplete="off" tabindex="1" required/></td>
				</tr>
				
				<tr>
					<td colspan="2">
					<div class="action_btns">
					<input type="submit" name="submit" class="btn btn_red" style="width: 80%;height:40px; text-align:center;" value="Bilgilerimi Güncelle" tabindex="5"></input>
					</div>
					</td>
				</tr>
			</tbody>
		</table>
		</form>
</div>

</div>
</div>
</main>
<!--RIGHT--><?php include "/../right.php"; ?><!--RIGHT-->
			</div>
	<script type="text/javascript">

		$('[name="strNumber"]').mask("(999) 999-9999");
		$('[name="strNumber"]').on("blur", function () {
			var last = $(this).val().substr($(this).val().indexOf("-") + 1);

			if (last.length == 3) {
				var move = $(this).val().substr($(this).val().indexOf("-") - 1, 1);
				var lastfour = move + last;

				var first = $(this).val().substr(0, 9);

				$(this).val(first + '-' + lastfour);
			}
		});

	</script>