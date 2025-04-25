<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>



<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Admin Ekle</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
							
							<?PHP
				if(isset($_POST['save'])) {
				$username = v4guvenlik($_POST['username']);
				$password = v4guvenlik($_POST['password']);
        $veriss = odbc_exec($conn,"select Count(*) from _Odestashield_admin_accounts where  StrAccountID = '".$username."'");
        $varmis = odbc_result($veriss,1);
          if($username == '' || $password == '' || !isset($_FILES['image'])) {
            echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> Boş alan bırakmayınız.
									</div>';
          }elseif ($varmis > '0') {
            echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> Kullanıcı adı zaten mevcut.
									</div>';
            }else{
				$errors = array();
				$randN = rand(0, 9999);
				
                $file_name = $randN . "-" . $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
                $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
				
                $extensions = array("jpeg","jpg","png");
				
                if(in_array($file_ext, $extensions)=== false){
                    $errors[] = "Lütfen sadece jpeg, jpg veya png formatında dosya yükleyiniz.";
                }
				
                if($file_size > 1097152){
                    $errors[] = "Resim boyutu 1MB'dan büyük olamaz";
                }
      
        if(empty($errors)){
            move_uploaded_file($file_tmp, "uploads/users/" . $file_name);
            $websqlquery = odbc_exec($conn, "INSERT INTO _Odestashield_admin_accounts (StrAuthority,StrAccountID,strPassword,image) VALUES ('5','$username','$password', '$file_name')");
            if($websqlquery) {
            echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> "'.$username.'" başarıyla eklendi.
									</div>';
            }else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> "'.$username.'" eklenemedi.
									</div>';
            }
		}
		else
		{
            echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> ' . $errors[0] . '
									</div>';
        }
          }
				}
				?>
				
					<form action="index.php?sayfa=addadmin" method="post" enctype="multipart/form-data">
						<p>
							<label>Kullanıcı Adı:</label><br />
							<input class="form-control" name="username" type="text" placeholder="Kullanıcı Adı" autocomplete="off" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>Parola:</label><br />
							<input class="form-control" name="password" type="password" placeholder="Parola" autocomplete="off" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>Kullanıcı Resmi:</label><br />
							<input class="form-control" name="image" type="file" required/> 
						</p>
						<p>
							<input type="submit" class="btn btn-primary" name="save" value="Kaydet" />
						</p>
				</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->



