<?php
ob_start();
session_start();
include('../system/config.inc.php');
$conn       = @odbc_connect("".$db['db_name']."","".$db['db_user']."","".$db['db_pass']."");
function v4guvenlik($text){
		$text = trim(htmlspecialchars($text));
		$search = array("'",'"',"TRUNCATE","truncate","UPDATE","update","SELECT","select","DROP","drop","DELETE","delete","WHERE","where","EXEC","exec","INSERT INTO","insert into","PROCEDURE","procedure","--");
		$replace = array("","","","","","","","","","","","","","","","","","","","","");
		$new_text = str_replace($search,$replace,$text);
		return $new_text;
	}
?>
  <html lang="en" class="fullscreen-bg">
    <head>
      <title>Game Control Panel</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <!-- VENDOR CSS -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
      <!-- MAIN CSS -->
      <link rel="stylesheet" href="assets/css/main.css">
      <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
      <link rel="stylesheet" href="assets/css/demo.css">
      <!-- GOOGLE FONTS -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
      <!-- ICONS -->
      <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
      <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    </head>
    <body>
        <div class="wrapper">
          <div id="wrapper">
            <div class="vertical-align-wrap">
              <div class="vertical-align-middle">
                <div class="auth-box" style="width: max-content !important;">
                  <div class="left" style="width: 100% !important;">
                    <div class="content">
                      <div class="header">
                        <div class="logo text-center">
                          <img src="../theme/fusion/images/logo.png" width="350" height="200" alt="Logo">
                        </div>
                        <p class="lead">Hesabınıza giriş yapın</p>
                      </div>
                      <form action="login.php" method="post">
                        <div class="form-group">
                          <label for="signin-email" class="control-label sr-only">Kullanıcı Adı</label>
                          <input type="text" name="username" class="form-control" placeholder="Kullanıcı Adı" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label for="signin-password" class="control-label sr-only">Şifre</label>
                          <input type="password" name="password" class="form-control" placeholder="Şifre" autocomplete="off">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Giriş</i>
                        </button>
                        <div class="bottom"></div>
                      </form>
							
							<?php
					if(isset($_POST['submit'])) {
            $username = v4guvenlik($_POST['username']);
            $password = v4guvenlik($_POST['password']);
            $uye = odbc_exec($conn,"select StrAuthority From _Odestashield_admin_accounts where strAccountID = '$username'");
            $u = odbc_result($uye,1);
            
              if($username == '' || $password == '') {
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> Tüm alanlar zorunludur!
									</div>';
              }else{
              $msquery="SELECT COUNT(strAccountID) FROM _Odestashield_admin_accounts WHERE strAccountID = '$username' AND strPassword = '$password' ";
              $msresults=odbc_exec($conn,$msquery) or die("error");
              odbc_fetch_row($msresults);
			  

                if (odbc_result($msresults,1) > 0) {
                $newquery="SELECT * FROM _Odestashield_admin_accounts WHERE strAccountID = '$username'";
                $newresults = odbc_exec($conn, $newquery) or die("error");
			    $image = odbc_result($newresults, "image");
				
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['profile_image'] = $image;
;
                $_SESSION['admin'] = $u;
                header("Location:index.php");
              }else{
               echo '<div class="panel-body"><div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> Kullanıcı adı veya Şifre yanlış
									</div></div>';
              }
              }
					}else{
            echo '';
					}
					?>
						</div>
					</div>
				
				</div>
			</div>
		</div>
</body>

</html>

			
			
			
			
			
			
			
			
		
		
		</div>						<!-- wrapper ends -->
		
	</div>		<!-- #hld ends -->

	
</body>
</html>