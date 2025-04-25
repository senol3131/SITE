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
	<h1 class="title"><center>ESN Yükleme</center></h1>
</div><!-- content-title -->



<?PHP

 if(isset($_POST['submit'])):
	$esn0=$dbo->SQLSecurity($_POST['esn0']);
	$esn1=$dbo->SQLSecurity($_POST['esn1']);
	$esn2=$dbo->SQLSecurity($_POST['esn2']);
	$esn3=$dbo->SQLSecurity($_POST['esn3']);
	$esn4=$dbo->SQLSecurity($_POST['esn4']);
	$esn5=$dbo->SQLSecurity($_POST['esn5']);
	$esn6=$dbo->SQLSecurity($_POST['esn6']);
	$passwd0=$dbo->SQLSecurity($_POST['esn-sifre0']);
	$passwd1=$dbo->SQLSecurity($_POST['esn-sifre1']);
	
	$ESN = $dbo->SQLSecurity($esn0.'-'.$esn1.'-'.$esn2.'-'.$esn3.'-'.$esn4.'-'.$esn5.'-'.$esn6);
    $PASSWD = $dbo->SQLSecurity($passwd0.'-'.$passwd1);

		if(($esn0 or $esn1 or $esn2 or $esn3 or $esn4 or $esn5 or $esn6 or $passwd0 or $passwd1) == ''):
			$dbo->uyari(''.$lang['BlankSpace'].'');
			$dbo->yonlendir(''.$base_url.'UserCP/UploadESN',0);
		else:
			if($_SESSION['kesn_yuklendi'] != 'evet'):
				$query = $dbo->doquery("SELECT Count(*) FROM _Odestashield_kesn_codes WHERE ESN = '".$ESN."' and Passwd =  '".$PASSWD."' and Durum = '0'");
					if($dbo->result(1) != 0):
						$query2 = $dbo->doquery("SELECT * FROM _Odestashield_kesn_codes WHERE ESN = '".$ESN."' and Passwd =  '".$PASSWD."' and Durum = '0'");
						$dbo->query("UPDATE TB_USER set CashPoint = CashPoint + '".$dbo->result('Cash')."' Where strAccountId = '$username'");
						$dbo->query("UPDATE _Odestashield_kesn_codes set Durum = 1,Kullanan = '$username' Where ESN = '".$dbo->result('ESN')."' and Passwd = '".$dbo->result('Passwd')."'");
						$dbo->uyari('Islem Basarili');
						$dbo->yonlendir(''.$base_url.'UserCP/UploadESN',0);
					else:
						$dbo->uyari('Islem Basarisiz');
						$dbo->yonlendir(''.$base_url.'UserCP/UploadESN',0);
					endif;
					$_SESSION['kesn_yuklendi'] = 'evet';
			else:
				$dbo->uyari('ESN HATALI');
				$dbo->yonlendir(''.$base_url.'UserCP/UploadESN',0);
			endif;
		endif;
 else:
 
 endif;
 
 echo'
<form action="'.$base_url.'UserCP/UploadESN" method="post">   
<center>
<td>
<input type="text" required="true" value="" style="padding-top: 0px;
width: 90px;
height: 30px;
 color: white;
    text-align: center;
    margin: 16px auto;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="esn0" maxlength="9" placeholder="ESN1">

<input type="text" required="true" value="" style="padding-top: 0px;
width: 62px;
height: 30px;
 color: white;
    text-align: center;
    margin: 16px auto;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="esn1" maxlength="4" placeholder="ESN2">

<input type="text" required="true" value="" style="padding-top: 0px;
width: 62px;
height: 30px;
 color: white;
    text-align: center;
    margin: 16px auto;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="esn2" maxlength="4" placeholder="ESN3">

<input type="text" required="true" value="" style="padding-top: 0px;
width: 62px;
height: 30px;
 color: white;
    text-align: center;
    margin: 16px auto;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="esn3" maxlength="4" placeholder="ESN4">

<input type="text" required="true" value="" style="padding-top: 0px;
width: 62px;
height: 30px;
 color: white;
    text-align: center;
    margin: 16px auto;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="esn4" maxlength="4" placeholder="ESN5">

<input type="text" required="true" value="" style="padding-top: 0px;
width: 62px;
height: 30px;
 color: white;
    text-align: center;
    margin: 16px auto;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="esn5" maxlength="4" placeholder="ESN6">

<input type="text" required="true" value="" style="padding-top: 0px;
width: 62px;
height: 30px;
 color: white;
    text-align: center;
    margin: 16px auto;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="esn6" maxlength="4" placeholder="ESN7">
</td>
</center>

<center>
<td>
<input type="text" required="true" value="" style="padding-top: 0px;
width: 100px;
height: 30px;
 color: white;
    text-align: center;
    margin: 16px auto;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="esn-sifre0" maxlength="4" placeholder="ESN Sifre 1">

<input type="text" required="true" value="" style="padding-top: 0px;
width: 100px;
height: 30px;
 color: white;
    text-align: center;
    margin: 16px auto;
    line-height: 27px;
    outline: none;
    overflow: hidden;
    margin-bottom: 9px;
    border-radius: 6px;
     background: rgb(2, 7, 12);
    border: 2px solid rgb(7, 20, 33);
    box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.62);
" name="esn-sifre1" maxlength="4" placeholder="ESN Sifre 2">
</td>
</center>

<center>
<br>
  <input type="submit" name="submit" value="Yükle" style="cursor:pointer;background: #342d98;background: url('.$path.'images/login-button.jpg) no-repeat;background-size: cover;margin-top: 20px;padding: 10px 46px;,: 35pxline-height: 13px;font-size: 14px;font-weight: bold;box-shadow: 0px 0px 29px 1px #1b532d;">
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
