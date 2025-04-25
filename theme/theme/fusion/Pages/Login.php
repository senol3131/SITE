<?php
$pageTitle = "Giriş Yap";
?>
<title><?=$ServerName;?> ~ <?=$pageTitle;?></title>
<?PHP

 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>X</b>");
  }
 
 if($login_status != 1):
	$dbo->uyari('Giriş yapma kapalıdır!');
	$dbo->yonlendir(''.$base_url.'',1);
 else:
	$username  = $dbo->SQLSecurity($dbo->security($_POST['LoginFormUsername']));
	$password  = $dbo->SQLSecurity($dbo->security($_POST['LoginFormPassword']));
	$loginip   = $_SERVER['REMOTE_ADDR'];
	$logindate = date("Y-m-d H:i:s");
	if(empty($username) or empty($password)):
		$dbo->uyari(''.$lang['BlankSpace'].'');
		$dbo->yonlendir(''.$base_url.'',1);
	else:
		$dbo->doquery("SELECT strAuthority , strAccountID , CashPoint FROM TB_USER WHERE strAccountID = '$username' AND strPasswd = dbo.HashPasswordString('$password')");
		$u = $dbo->result('strAuthority');
			if($u >= 0):
				$_SESSION['LoginFormPassword'] = $u;
				$_SESSION['LoginFormUsername'] = $username;
				$dbo->doquery("UPDATE _Odestashield_mykol SET MyKOLLastIPAdress = '$loginip' , MyKOLLastLogin = '$logindate' WHERE strAccountID = '$username'");
				$dbo->yonlendir(''.$base_url.'',0);
			else:
				$dbo->uyari(''.$lang['WrongUsername'].'');
				$dbo->yonlendir(''.$base_url.'',1);
			endif;
	endif;
 endif;
?>