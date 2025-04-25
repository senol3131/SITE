<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Site Ayarları</h2>
					<div class="panel panel-headline">
						<div class="panel-body">	<!-- .block_head ends -->
				
				
				
				<?PHP
				  if ($_FILES){
					include 'upload.php';
				  }				
				$select = odbc_exec($conn, "SELECT title,description,keywords,site_path,logo_text,online_bugu,server_name,forum,login_status,esn_link FROM _Odestashield_Site");
				$title = odbc_result($select,1);
				$description = odbc_result($select,2);
				$keywords = odbc_result($select,3);
				$site_path = odbc_result($select,4);
				$logo_text = odbc_result($select,5);
				$online_bugu = odbc_result($select,6);
				$server_name = odbc_result($select,7);
				$forum = odbc_result($select,8);
				$login_status = odbc_result($select,9);
				$esn_link = odbc_result($select,10);
				
				if(isset($_POST['save'])) {
				$title 			= v4guvenlik($_POST['title']);
				$description 	= v4guvenlik($_POST['description']);
				$keywords 		= v4guvenlik($_POST['keywords']);
				$logo_text 		= v4guvenlik($_POST['logo_text']);
				$path 			= v4guvenlik($_POST['path']);
				$launguage 		= v4guvenlik($_POST['launguage']);
				$online_bugu 	= v4guvenlik($_POST['online_bugu']);
				$server_name	= v4guvenlik($_POST['server_name']);
				$forum	= v4guvenlik($_POST['forum']);
				$login_status	= v4guvenlik($_POST['girisyap']);
				$esn_link	= v4guvenlik($_POST['esn_link']);
				
          if($title == '' || $description == '' || $keywords == '') {
            echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> Boş alan bırakmayınız.
									</div>';
          }else{
            $websqlquery = odbc_exec($conn, "UPDATE _Odestashield_Site SET forum='$forum',login_status = '$login_status',esn_link = '$esn_link',title='$title',description='$description',keywords='$keywords',logo_text='$logo_text',site_path='$path',online_bugu='$online_bugu',server_name='$server_name',lang='tr'");
            if($websqlquery) {
            echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Site ayarları güncellendi.
									</div>';
            }else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> Site ayarları güncellenemedi.
									</div>';
            }
          }
				}
				?>
				<form action="index.php?sayfa=websettings" method="post" enctype="multipart/form-data">
						<p>
							<label>Site Adı:</label><br />
							<input type="text" name="title" class="form-control" value="<?=$title; ?>" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>Site Açıklaması:</label><br />
							<input type="text" name="description" class="form-control" value="<?=$description; ?>" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>Meta Tag:</label><br />
							<input type="text" name="keywords" class="form-control" value="<?=$keywords; ?>" /> 
							<span class="note"></span>
						</p>						
						<p>
							<label>Forum Adresi:</label><br />
							<input type="text" name="forum" class="form-control" value="<?=$forum; ?>" /> 
							<span class="note"></span>
						</p>	
						<p>
							<label>Sunucu Adı:</label><br />
							<input type="text" name="server_name" class="form-control" value="<?=$server_name; ?>" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>Giriş Yapma:</label>
							<select class="form-control" name="girisyap">
								<?PHP
									if($login_status == "1"):
										echo '<option value="1">Açık</option>';
										echo '<option value="0">Kapalı</option>';
									else:
										echo '<option value="0">Kapalı</option>';
										echo '<option value="1">Açık</option>';
									endif;
								?>
							</select>
						</p>
						<p>
							<label>ESN Bayi Link:</label><br />
							<input type="text" name="esn_link" class="form-control" value="<?=$esn_link; ?>" /> 
							<span class="note"></span>
						</p>						
						<p>
							<label>Online Bug:</label><br />
							<input type="text" name="online_bugu" class="form-control" value="<?=$online_bugu; ?>" /> 
						</p>
						<p>
							<input type="submit" class="btn btn-primary" name="save" value="Kaydet" />
						</p>
				</form>
					
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->

