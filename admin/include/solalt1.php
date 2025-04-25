<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>



<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Etkinlikler</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
				<?php
				$islem = v4guvenlik($_GET['islem']);
				$id = $_GET['id'];
				if($islem == '') {
				$habercek = odbc_exec($conn, "select * from _Odestashield_Sol1");
				?>
				<table class="table table-striped">
						
							<tr>
								<th width="3%">ID</th>
								<th width="7%">Başlık</th>
								<th width="7%">Gün</th>
								<th>Açıklama</th>
								<th width="10%">Düzenle</th>
							</tr>
							<?php 
							while(odbc_fetch_row($habercek)) {
							$id = odbc_result($habercek,1);
							$a1 = odbc_result($habercek,2);
							$a2 = odbc_result($habercek,3);
							$a3 = odbc_result($habercek,4);
							?>
							<tr>

								<td><?=$id;?></td>
								<td><?=$a1;?></td>
								<td><?=$a2;?></td>
								<td><?=$a3;?></td>
								<td><a href="index.php?sayfa=solalt1&islem=duzenle&id=<?=$id;?>"><span class="label label-default">Düzenle</span></a></td>
							</tr>
            <?php } ?>
							
						</table>
						<table cellpadding="0" cellspacing="0" width="100%">
						<tr>
						</tr>
						</table>
						<?php }elseif($islem == 'duzenle') {
						$id = $_GET['id'];
						$habercekelim = odbc_exec($conn, "select * from _Odestashield_Sol1 WHERE RowID = '$id'");
							$a1 = odbc_result($habercekelim,2);
							$a2 = odbc_result($habercekelim,3);
							$a3 = odbc_result($habercekelim,4);
						if(isset($_POST['save'])) {
						// TR Karakter
						
				$a1 = str_replace("<p>","",$a1);
				$a1 = str_replace("</p>","",$a1);						
				$a1 = $_POST['a1'];
				$a2 = $_POST['a2'];
				$a2 = str_replace("<p>","",$a2);
				$a2 = str_replace("</p>","",$a2);					
				$a3 = $_POST['a3'];
				$a3 = str_replace("<p>","",$a3);
				$a3 = str_replace("</p>","",$a3);				
              if($a1 == '' || $a2 == '' || $a3 == '') {
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> Boş alan bırakmayınız.
									</div>';
              }else{
                $websqlquery = odbc_exec($conn, "UPDATE _Odestashield_Sol1 SET Title='$a1',Day='$a2',Description='$a3' WHERE RowID = '$id'");
                if($websqlquery) {
						$habercekelim = odbc_exec($conn, "select * from _Odestashield_Sol1 WHERE RowID = '$id'");
							$a1 = odbc_result($habercekelim,2);
							$a2 = odbc_result($habercekelim,3);
							$a3 = odbc_result($habercekelim,4);					
                echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> '.$id.' numaralı etkinlik güncellendi..
									</div>
				
				';
                }else{
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i>Kaydedilemedi.
									</div>';
            }
          }
				}
						?>
						 <form action="index.php?sayfa=solalt1&islem=duzenle&id=<?=$id;?>" method="post">
						<p>
							<label>Duyuru ID: <?=$id;?></label><br />
							<span class="note">Etkinlik panelde gözükmemesi için başlığa '-' yazıp kaydet.</span>
						</p>							 
						<p>
							<label>Başlık:</label><br />
							<input type="text" id="a1" name="a1" value="<?=$a1;?>">
						</p>	
						<p>
							<label>Gün:</label><br />
							<div>
								<textarea name="a2" id="a2" style="height:200px;width:30%;" maxlength="200" ><?=$a2;?></textarea>
							</div>
						</p>
						<p>
							<label>Açıklama:</label><br />
							<textarea name="a3" id="a3" style="height:200px;width:30%;" maxlength="200" ><?=$a3;?></textarea>
						</p>						
						<p>
							<input type="submit" class="btn btn-primary" name="save" value="Kaydet" />
						</p>
				</form>
				
				<script>
					var textarea = document.getElementById('a2');
					sceditor.create(textarea, {
						format: 'xhtml',
						icons: 'monocons',
						style: 'minified/themes/content/defaultdark.min.css'
					});
					
					var textarea = document.getElementById('a3');
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
