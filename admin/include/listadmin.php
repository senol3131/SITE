<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>

<?php

if(isset($_POST['update-admin'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
	
	echo json_encode($_POST);
    $oldImg = $_POST['old-img'];

		
	if ($_FILES['profile-img']['name'] != "") {
		$errors = array();
		$randN = rand(0, 9999);
				
        $file_name = $randN . "-" . $_FILES['profile-img']['name'];
        $file_size = $_FILES['profile-img']['size'];
        $file_tmp = $_FILES['profile-img']['tmp_name'];
        $file_type = $_FILES['profile-img']['type'];
        $file_ext = strtolower(end(explode('.',$_FILES['profile-img']['name'])));
				
        $extensions = array("jpeg","jpg","png");
				
        if(in_array($file_ext, $extensions)=== false){
            $errors[] = "Lütfen sadece jpeg, jpg veya png formatında dosya yükleyiniz.";
        }
				
        if($file_size > 1097152){
            $errors[] = "Resim boyutu 1MB'dan büyük olamaz";
        }
      
        if(empty($errors)){
			if (move_uploaded_file($file_tmp, "uploads/users/" . $file_name)) {
				unlink("uploads/users/" . $oldImg);
				$query = odbc_exec($conn, "UPDATE _Odestashield_admin_accounts SET StrAccountID = '$username', strPassword = '$password', image = '$file_name' WHERE StrAccountId = '$id'");  
                session_destroy();
                header("Location: /admin/login.php");				
			}
		}
		else
		{
            echo '<script>alert("' . $errors[0] . '")</script>';
        }		
    }
	else {
        $query = odbc_exec($conn, "UPDATE _Odestashield_admin_accounts SET StrAccountID = '$username', strPassword = '$password' WHERE StrAccountId = '$id'");
	}
}



?>

<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Admin Yönetimi</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
							
							<?php
				$islem = v4guvenlik($_GET['islem']);
				
				if($islem == 'sil'){
				$yonetici = $_GET['yonetici'];
          $sql  = odbc_exec($conn, "DELETE FROM _Odestashield_admin_accounts WHERE StrAccountId = '$yonetici'");
            if($sql) {
            echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> "'.$yonetici.'" başarıyla silindi.
									</div>';
            }else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> "'.$yonetici.'" silinemedi.
									</div>';
            }
				}elseif($islem == '') {
				$yoneticicek = odbc_exec($conn, "SELECT StrAccountID,strPassword,image FROM _Odestashield_admin_accounts WHERE StrAuthority = '5'");
				?>
				<table class="table table-striped">
						
							<tr>
								<th>#</th>
								<th>Yetkili</th>
								<th>İşlem</th>
							</tr>
							<?php 
							while(odbc_fetch_row($yoneticicek)) {
							$user = odbc_result($yoneticicek,1);
							$image = odbc_result($yoneticicek, "image");
							$pass = trim(odbc_result($yoneticicek, 2));
							?>
							<tr>
							    <td><img class="admin-img" src="uploads/users/<?= $image ?>"></td>
								<td><?=$user;?></td>
								<td><a style="margin-right:1vh;" href="index.php?sayfa=listadmin&islem=duzenle&id=<?=$user;?>"><span class="label label-success">Düzenle</span></a><a href="index.php?sayfa=listadmin&islem=sil&yonetici=<?=$user;?>"><span class="label label-danger">Sil</span></a></td>
							</tr>
            <?php } ?>
							
						</table>
						<?php }elseif($islem == 'duzenle') {
						$yonetici = $_GET['id'];
						$yoneticicek = odbc_exec($conn, "SELECT StrAccountID,strPassword,image FROM _Odestashield_admin_accounts WHERE StrAuthority = '5'");
						$username = odbc_result($yoneticicek, 1);
						$pass = trim(odbc_result($yoneticicek, 2));
						
						$img = odbc_result($yoneticicek, "image");
						
						?>
						<form action="" method="post" enctype="multipart/form-data">
						<label>Kullanıcı Adı</label>
						<input type="hidden" name="id" value="<?= $_GET['id']  ?>">
						<input type="hidden" name="old-img" value="<?= $img  ?>">
						<input type="text" class="form-control" value="<?= $username  ?>" name="username">
						<label style="margin-top:1vh;">Şifre</label>
						<input type="text" class="form-control" value="<?= $pass  ?>" name="password" required>
						<div style="display:flex; flex-direction: column;">
						
						<label style="margin-top:1vh;">Profil Resmi</label>
						<img src="uploads/users/<?= $img ?>" style="width: 50%;border-radius: 1vh;">
						<input type="file" name="profile-img" style="margin-top:1vh;">
						</div>
						<button type="submit" class="btn btn-success" name="update-admin" style="margin-top:1vh;width:100%;">Güncelle</button>
						</form>
						<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->



