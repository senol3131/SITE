<script type="text/javascript" src="<?=$path;?>js/jquery.mask.js"></script>
		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "/../pages/serverinfo.php"; ?><!--SERVERINFO-->	
				
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
	<h1 class="title"><center>İtem Kilit Şifresi Değiştirme</center></h1>
</div><!-- content-title -->



<?PHP

 if(isset($_POST['submit'])):
	$sifre      =   $dbo->SQLSecurity($_POST['pass']);
	$seal  		=   $dbo->SQLSecurity($_POST['newpass']);
	$gsoru      =   $dbo->SQLSecurity($_POST['gsoru']);
	$gyanit     =   $dbo->SQLSecurity($_POST['gyanit']);
	$dbo->doquery("select MyKOLSoru, MyKOLCevap from _Odestashield_mykol where StrAccountID = '$username'");
	$MyKOLSoru = $dbo->result(1);
	$MyKOLCevap = $dbo->result(2);
	
		if(!$seal):
			$dbo->uyari(''.$lang['BlankSpace'].'');
			$dbo->yonlendir(''.$base_url.'UserCP/ChangeSealPW',0);
		elseif(preg_match("/[^0-9]/", $seal)):
			$dbo->uyari('Lütfen item kilit şifrenizi, EN FAZLA 8 HANELİ OLMAK ÜZERE SADECE RAKAMLARDAN YAPINIZ.');
			$dbo->yonlendir(''.$base_url.'UserCP/ChangeSealPW',0);
		elseif($MyKOLSoru <> $gsoru or $MyKOLCevap <> $gyanit):
			$dbo->uyari(''.$lang['gsoruyanlis'].'');
			$dbo->yonlendir(''.$base_url.'UserCP/ChangeSealPW',0);
		else:
			$dbo->doquery("UPDATE TB_USER Set StrSealPasswd = '$seal' where StrAccountID = '$username'");
			$dbo->uyari(''.$lang['islembasarili'].'');
			$dbo->yonlendir(''.$base_url.'UserCP/ChangeSealPW',0);
		endif;
 else:
 
 endif;
 
 echo'
<form action="'.$base_url.'UserCP/ChangeSealPW" method="post">   
		<center>
						
		<br>
	
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
" name="gyanit" value="" placeholder="Gizli Soru Cevabınız"><br>
<input type="text" maxlength="8" required="true" style="display: block;
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
" name="newpass" onkeypress="return onlyNumbers();" placeholder="Yeni Item Kilit Şifreniz">

		
  	<br>
  <input type="submit" name="submit" value="Item Kilit Şifremi Değiştir" style="cursor:pointer;background: #342d98;background: url('.$path.'images/login-button.jpg) no-repeat;background-size: cover;margin-top: 20px;padding: 10px 46px;,: 35pxline-height: 13px;font-size: 14px;font-weight: bold;box-shadow: 0px 0px 29px 1px #1b532d;">
		</center>
	</form>
 ';
 
 ?>
  	<br>
  	<br>
			<br>
		
	
</div>

</div>
</div>
</main>
<script type="text/javascript" src="<?=$path;?>js/jquery.mask.js"></script>
<!--RIGHT--><?php include "/../right.php"; ?><!--RIGHT-->
			</div>
