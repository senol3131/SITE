<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>



<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">İndirilecekler</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
							
							<?php
				$islem = v4guvenlik($_GET['islem']);
				
				if($islem == 'sil'){
				$link = $_GET['link'];
          $sql  = odbc_exec($conn, "DELETE FROM _Odestashield_Download WHERE id = '$link'");
            if($sql) {
            echo '<div class="message success"><p>Link başarıyla silindi.</p><button onclick="history.go(-1)">Geri Dön</button> </div>';
            }else{
            echo '<div class="message errormsg"><p>Link silinemedi.</p><button onclick="history.go(-1)">Go Back</button> </div>';
            }
				}elseif($islem == '') {
				$downcek = odbc_exec($conn, "SELECT * FROM _Odestashield_Download ORDER BY id DESC");
				?>
				<table class="table table-striped">
						
				<table class="table tb_ranking table-bordered" cellpadding="0" cellspacing="0" width="100%">
					<tr class="head2">
						<th>BAŞLIK</th>
						<th>RENK</th>
						<th>LİNK</th>
						<th>SİL</th>
					</tr>
							<?php 
							while(odbc_fetch_row($downcek)) {
							$id = odbc_result($downcek,1);
							$renk = odbc_result($downcek, 6);
							$link = odbc_result($downcek, 5);
							$title = odbc_result($downcek, 2);
							?>
							<tr>

								<td><?=$title;?></td>
								<td><?=$renk;?></td>
								<td><?=$link;?></td>
								<td><a href="index.php?sayfa=listlink&islem=sil&link=<?=$id;?>"><span class="label label-danger">Sil</span></a></td>
							</tr>
            <?php } ?>
						</table>
						<table cellpadding="0" cellspacing="0" width="100%">
						<tr>
              <td><div align="center"><a href="index.php?sayfa=listlink&islem=ekle"><span class="label label-warning">Yeni Link Ekle</span</a></div></td>
						</tr>
						</table>
						<?php }
		elseif($islem == 'ekle') {
			if(isset($_POST['save'])) {
				function trkarakter($tr) {
					$tr1=array("İ","ı","Ü","ü","Ö","ö","Ş","ş","Ğ","ğ","Ç","ç");
					$tr2=array("I","i","U","u","O","o","S","s","G","g","C","c");
					$tr=str_replace($tr1,$tr2,$tr);
					return $tr;
				}
				//$titletr = v4guvenlik(ucwords(trkarakter($_POST['titletr'])));
				//$titleen = v4guvenlik(ucwords(trkarakter($_POST['titleen'])));
				//$description = v4guvenlik(ucwords(trkarakter($_POST['description'])));
				
				$titletr = v4guvenlik($_POST['titletr']);
				$titleen = v4guvenlik($_POST['titleen']);
				$description = v4guvenlik($_POST['description']);
				
				$url = v4guvenlik($_POST['url']);
				$color = v4guvenlik($_POST['titlecolor']);
					if($titletr == '' || $url == '') {
						echo '<div class="alert alert-warning alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<i class="fa fa-times-circle"></i> Boş alan bırakmayınız.
												</div>';
					  }
					else {
						$websqlquery = odbc_exec($conn, "INSERT INTO _Odestashield_Download (titletr,titleen,url,description,color,tarih) values ('$titletr','$titleen','$url','$description','$color',GETDATE())");
						if($websqlquery) {
						echo '<div class="alert alert-success alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<i class="fa fa-check-circle"></i> Download link eklendi.
												</div>';
									
						}else{
						echo '<div class="alert alert-danger alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<i class="fa fa-times-circle"></i> Download link eklenemedi.
												</div>';
						}
					}
			}
						?>
			<form action="index.php?sayfa=listlink&islem=ekle" method="post">
				<p>
					<label>Link Başlığı</label>
					<input type="text" name="titletr" class="form-control" /> 
				</p>
					
				<p>
					<label>Link URL</label>
					<input type="text" name="url" class="form-control" /> 
					<span class="note">* örnek: www.siteismi.com/download.rar</span>
				</p>
				<p>
					<label>Başlık Renk</label>
					<input type="text" name="titlecolor" class="form-control" /> 
					<span class="note">* örnek: #111111</span>
				</p>						
				<p><input type="submit" class="btn btn-primary" name="save" value="Kaydet" /></p>
			</form>
						<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->



