<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>



<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Duyurular</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
				<?php
				$islem = v4guvenlik($_GET['islem']);
				$id = $_GET['id'];
				if($islem == 'sil'){
          $sql  = odbc_exec($conn, "DELETE FROM _Odestashield_Duyuru WHERE RowID = '$id'");
            if($sql) {
            echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Duyuru başarıyla silindi. 
									</div>';
            }else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> Duyuru silinemedi.
									</div>';
            }
				}elseif($islem == 'tumunusil'){
				
			$sql  = odbc_exec($conn, "TRUNCATE TABLE _Odestashield_Duyuru");
            if($sql) {
            echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Duyurular başarıyla silindi.
									</div>';
            }else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> Duyurular silinemedi.
									</div>';
            }
				}elseif($islem == '') {
				$habercek = odbc_exec($conn, "SELECT RowID,DateX,Description FROM _Odestashield_Duyuru ORDER BY DateX DESC");
				?>
				<table class="table table-striped">
						
							<tr>
								<th width="3%">ID</th>
								<th width="7%">Tarih</th>
								<th>Açıklama</th>
								<th width="10%">Düzenle / Sil</th>
							</tr>
							<?php 
							while(odbc_fetch_row($habercek)) {
							$id = odbc_result($habercek,1);
							$titletr = odbc_result($habercek,2);
							$titleen = odbc_result($habercek,3);
							?>
							<tr>

								<td><?=$id;?></td>
								<td><?=$titletr;?></td>
								<td><?=$titleen;?></td>
								<td><a href="index.php?sayfa=listnews&islem=duzenle&id=<?=$id;?>"><span class="label label-default">Düzenle</span></a> - <a href="index.php?sayfa=listnews&islem=sil&id=<?=$id;?>"><span class="label label-danger">Sil</span></a></td>
							</tr>
            <?php } ?>
							
						</table>
						<table cellpadding="0" cellspacing="0" width="100%">
						<tr>
              <td><div align="center"><a href="index.php?sayfa=listnews&islem=tumunusil"><span class="label label-danger">Tümünü Sil</span></a></div></td>
						</tr>
						</table>
						<?php }elseif($islem == 'duzenle') {
						$id = $_GET['id'];
						$habercekelim = odbc_exec($conn, "SELECT DateX,Description FROM _Odestashield_Duyuru WHERE RowID = '$id'");
						$titletr = odbc_result($habercekelim, 1);
						$titleen = odbc_result($habercekelim, 2);
						if(isset($_POST['save'])) {
						// TR Karakter

				$articlestr = $_POST['articlestr'];
				$articlestr = str_replace("<p>","",$articlestr);
				$articlestr = str_replace("</p>","",$articlestr);
				$tarih = $_POST['tarh'];	
              if($articlestr == '' || $tarih == '') {
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> Boş alan bırakmayınız.
									</div>';
              }else{
                $websqlquery = odbc_exec($conn, "UPDATE _Odestashield_Duyuru SET DateX='$tarih',Description='$articlestr' WHERE RowID = '$id'");
                if($websqlquery) {
						$habercekelim = odbc_exec($conn, "SELECT DateX,Description FROM _Odestashield_Duyuru WHERE RowID = '$id'");
						$titletr = odbc_result($habercekelim, 1);
						$titleen = odbc_result($habercekelim, 2);					
                echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> '.$id.' numaralı duyuru güncellendi.
									</div>
				
				';
                }else{
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> Kaydedilemedi.
									</div>';
            }
          }
				}
						?>
						 <form action="index.php?sayfa=listnews&islem=duzenle&id=<?=$id;?>" method="post">
						<p>
							<label>Duyuru ID: <?=$id;?></label><br />
						</p>							 
						<p>
							<label>Tarih:</label><br />
							<input type="date" id="tarh" name="tarh" value="<?=$titletr;?>">
						</p>	
						<p>
							<label>İçerik:</label><br />
							<div>
								<textarea name="articlestr" id="articlestr" style="height:300px;width:100%;" maxlength="200" ><?=$titleen;?></textarea>
							</div>
						</p>
						<p>
							<input type="submit" class="btn btn-primary" name="save" value="Kaydet" />
						</p>
				</form>
				
				<script>
					var textarea = document.getElementById('articlestr');
					sceditor.create(textarea, {
						format: 'xhtml',
						icons: 'monocons',
						style: 'minified/themes/content/defaultdark.min.css'
					});


					var themeInput = document.getElementById('theme');
					themeInput.onchange = function() {
						var theme = 'minified/themes/' + themeInput.value + '.min.css';

						document.getElementById('theme-style').href = theme;
					};
				</script
						<?php } ?>
				
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
