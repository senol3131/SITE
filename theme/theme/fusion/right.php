<script type="text/javascript">
function registerOpen(){
				new modal('#reg_modal');
				var rndnm = Math.floor(Math.random() * 9999)+1000;
				$('#captcha').attr('src',"captchaf70c.png?i="+rndnm);
				$('#captchatoken').attr('value',rndnm);
				$('[name="fstrNumber"]').on("blur", function () {
					var last = $(this).val().substr($(this).val().indexOf("-") + 1);

					if (last.length == 3) {
						var move = $(this).val().substr($(this).val().indexOf("-") - 1, 1);
						var lastfour = move + last;

						var first = $(this).val().substr(0, 9);

						$(this).val(first + '-' + lastfour);
					}
				});

				$('#registerForm').submit(function(e){
					var x = $(this).serializeArray();
					$.ajax({
						url:'./register.php',
						method: 'POST',
						data:x,
						success:function(data){
							alert(data);
							if(data == "Başarıyla Kayıt Oldunuz."){
								$('.close_mw').click();
								document.location.reload();
							}
						},
						error:function(){
							alert("Bir sorun oluştu :(");
						}
					});
					return false;
				});

			}
</script>
<aside class="sidebar">
<div class="shop-block">
        <div class="shop shop-one">
            <h3><?= $button_1[0] ?></h3>
            <br>
            <a href="<?= $button_1[1] ?>" class="blue-a button button-small">Tıkla</a>
        </div>
        <div class="shop shop-two">
            <h3><?= $button_2[0] ?></h3>
            <br>
            <a href="<?= $button_2[1] ?>" class="green-a button button-small itemshop itemshop-btn iframe">Tıkla</a>
        </div>
        <div class="shop shop-three">
            <h3><?= $button_3[0] ?></h3>
            <br>
            <a href="<?= $button_3[1] ?>" class="gold-a button button-small itemshop itemshop-btn iframe">Tıkla</a>
        </div>
    </div>
	<?php if(!$_SESSION['LoginFormUsername']) { ?>

					<div class="login-block">
						<div class="login-block-b">
															
								<form class="login-form block-p" action="<?=$base_url;?>Login" method="POST">
									<div class="login-title">Giriş Yap</div>
									<p id="username-input"><input type="text" name="LoginFormUsername" placeholder="Kullanıcı Adı" class="username" style="border: 1px solid rgb(35, 52, 66);"></p>
									<p id="password-input"><input type="password" name="LoginFormPassword" placeholder="Şifre" class="password" style="border: 1px solid rgb(35, 52, 66);"></p>
									<a href="<?=$base_url;?>ForgotPassword" class="forgot-pass">Şifremi Unuttum</a>
									<button class="login-button button-n">Giriş</button>
									<button onclick="registerOpen(); return false" class="register-button button-n">Kayıt Ol</button>	
								</form>
						</div>
					</div>
	<?php }else{ ?>
	<?php
		$sss = $_SESSION['LoginFormUsername'];

		$dbo->doquery("SELECT CashPoint FROM TB_USER WHERE StrAccountId = '$sss'");
		$cash = $dbo->result('CashPoint');

		$dbo->doquery("SELECT MyKOLMail,MyKOLIPAdress,MyKOLRegDate,MyKOLLastIPAdress,MyKOLLastLogin,MyKOLTelefon FROM _Odestashield_mykol WHERE StrAccountId = '$sss'");
		$mail 	  = $dbo->result('MyKOLMail');
		$ipadress = $dbo->result('MyKOLIPAdress');
		$regdate  = $dbo->result('MyKOLRegDate');
		$lastip   = $dbo->result('MyKOLLastIPAdress');
		$lastlogin = $dbo->result('MyKOLLastLogin');
		$telefon  = $dbo->result('MyKOLTelefon');
	?>
<div class="login-block">
						<div class="login-block-b">
															<form class="lk-form block-l" style="padding-bottom:0px;">
									<div class="lk-title">
										<span class="coins"><?=number_format($cash)?> Cash Point</span>
										<span class="username"><?php echo $_SESSION["LoginFormUsername"]; ?></span>
									</div>
									<ul>
										<!--<li><a href="">My Friends <b>+2</b> <span>234</span></a></li>-->
										<li><a href="<?=$base_url;?>UserCP">Kullanıcı Paneli</a></li>
									
									<li><a href="<?=$esn_link;?>" target="_blank">Yetkili ESN Bayi</a></li>
									
										<li><a href="<?=$base_url;?>Logout">Çıkış Yap</a></li>
										
										
									</ul>
								</form>
														</div>
					</div>
	<?php	 } ?>					
					<div class="best-players">
						<div class="sidebar-title best-players-title">
							En İyi Oyuncular <span>TOP  <b>10</b></span>
						</div>
						<div class="top-players block-p block-bt">
				<?PHP												
					$i = 0;
					/* top 10 user*/
					$top10user	= $dbo->doquery("SELECT TOP 10 strUserID, Class, Level, Nation, Loyalty,LoyaltyMonthly FROM USERDATA WHERE AUTHORITY = 1 ORDER BY LoyaltyMonthly DESC");
					while($dbo->row($top10user)):
					$user 	 = $dbo->result('strUserID');					
					$job 	 = $dbo->result('Class');					
					$nation  = $dbo->result('Nation');					
					$level   = $dbo->result('Level');					
					$loyalty = $dbo->result('Loyalty');					
					$loyaltymonthly = $dbo->result('LoyaltyMonthly');					
					$i++;			
				?>																										
							
							<div class="player-info">
								<div class="top-number">
								<?=$i;?>.
								</div>
								<div class="top-name"><?=trim(iconv('ISO-8859-9', 'UTF-8',$dbo->result('strUserID')));?></div>
								<div class="nation_type"><div class="nationicon_<?=$nation;?>"></div></div>
								<div class="top-r">
								<span><?=number_format($loyaltymonthly);?></span> <a href="<?=$base_url;?>UserProfile/<?=trim(iconv('ISO-8859-9', 'UTF-8',$user));?>" class="blue-a profile-button">Oyuncu Itemleri</a>
								</div>
							</div>				
				<?php endwhile;?>							
						</div>
					</div>
					<div class="best-players">
						<div class="sidebar-title best-players-title">
							En İyi Clanlar <span style="background: url(<?=$path;?>images/flag-icon2.png) no-repeat">TOP  <b>10</b></span>
						</div>
						<div class="top-players block-p block-bt">
				<?php
				$i = 0;
				/* top 10 clan*/
				$top100clan	= $dbo->doquery("SELECT TOP 10 k.Nation,k.IDNum, k.IDName, k.Members, k.Chief, k.Points, k.Flag ,k.ClanPointFund FROM knights k, userdata u WHERE u.Authority = 1 AND k.Chief = u.strUserID GROUP BY k.Nation,k.IDNum, k.IDName, k.Members, k.Chief, k.Points, k.Flag ,k.ClanPointFund ORDER BY SUM(k.Points) DESC");
				while($dbo->row($top100clan)):

				$nation  = $dbo->result('Nation');
				$clanname  = $dbo->result('IDName');
				$chief = $dbo->result('Chief');
				$members = $dbo->result('Members');
				$points = $dbo->result('Points');
				$i++;
				?>						
							<div class="player-info">
								<div class="top-number">
								<?=$i;?>.
								</div>
								<div class="top-name" style="width:153px"><?=$clanname;?></div>
								<div class="nation_type"><div class="nationicon_<?=$nation;?>"></div></div>
								<div class="top-r">
								<span><?=number_format($points);?></span> <a href="<?=$base_url;?>ClanProfile/<?=trim(iconv('ISO-8859-9', 'UTF-8',$dbo->result('IDNum')));?>" class="blue-a profile-button">Clan Profili</a>
								</div>
							</div>				
				<?php endwhile;?>
								
							</div>
					</div>
				</aside>			

<div class='modal_window' id="reg_modal">
			<a href="#" class='close_mw close-r'></a>
			<div class="popup-block">
				<div class="reg-title">
					Kayıt Ol
				</div>
				<div class="reg-form">
		<center>
		
						<form method="post" autocomplete="off" action="<?=$base_url;?>Register-2">
						<p>Giriş Id</p>
						<input type="text" name="kullaniciadi" placeholder="Giriş Id" minlength="3" required="true">
						
						<p>Şifre</p>
						<input type="password" name="sifre" placeholder="Şifre" minlength="3" required="true">
							
						<p>Gizli Soru</p>
						<select class="input-re2" name="gsoru" minlength="3" required="true" styled="true">
						<option value="">     Gizli Soru Seçiniz</option>
						<option value="anneniz"><?=$lang['anneniz']?> ?</option>
						<option value="eniyicocukluk"><?=$lang['eniyicocukluk']?> ?</option>
						<option value="ilkevcilhayvan"><?=$lang['ilkevcilhayvan']?> ?</option>
						<option value="ogretmen"><?=$lang['ogretmen']?> ?</option>
						<option value="tarihsel"><?=$lang['tarihsel']?> ?</option>
						<option value="buyukbaba"><?=$lang['buyukbaba']?> ?</option>
						</select><br><br><br>

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
</div></div></div>

		<div class='modal_window' id="imageModal1" style="width: 800px;background: url(<?=$path;?>images/sidebar-bg.png);box-shadow: 0px 10px 63px 0px rgba(0, 0, 0, 0.5);border:none;padding:0px;">
			<div class="popup-block" style="background: #07131f;">
				<img src="<?=$path;?>images/1299-1.jpg" width="100%" style="display:block">
			</div>
		</div>

		<div class='modal_window' id="imageModal2" style="width: 800px;background: url(<?=$path;?>images/sidebar-bg.png);box-shadow: 0px 10px 63px 0px rgba(0, 0, 0, 0.5);border:none;padding:0px;">
			<div class="popup-block" style="background: #07131f;">
				<img src="<?=$path;?>images/1299-2.jpg" width="100%" style="display:block">
			</div>
		</div>

		<div class='modal_window' id="imageModal3" style="width: 800px;background: url(<?=$path;?>images/sidebar-bg.png);box-shadow: 0px 10px 63px 0px rgba(0, 0, 0, 0.5);border:none;padding:0px;">
			<div class="popup-block" style="background: #07131f;">
				<img src="<?=$path;?>images/1299-3.jpg" width="100%" style="display:block">
			</div>
		</div>


		<div class='modal_window' id="imageModal4" style="width: 800px;background: url(<?=$path;?>images/sidebar-bg.png);box-shadow: 0px 10px 63px 0px rgba(0, 0, 0, 0.5);border:none;padding:0px;">
			<div class="popup-block" style="background: #07131f;">
				<img src="<?=$path;?>images/1299-4.jpg" width="100%" style="display:block">
			</div>
		</div>
		












