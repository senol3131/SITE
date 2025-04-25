<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>



<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Etkinlikler</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
				<?php
				  if ($_FILES){
					include 'upload.php';
				  }					
				$islem = v4guvenlik($_GET['islem']);
				$id = $_GET['id'];
				if($islem == '') {
				$habercek = odbc_exec($conn, "select * from _Odestashield_Sol2");
				?>
				<table class="table table-striped">
						
							<tr>
								<th width="3%">ID</th>
								<th width="7%">Başlık</th>
								<th>Açıklama</th>
								<th width="10%">Düzenle</th>
							</tr>
							<?php 
							while(odbc_fetch_row($habercek)) {
							$id = odbc_result($habercek,1);
							$a1 = odbc_result($habercek,2);
							$a2 = odbc_result($habercek,3);
							?>
							<tr>

								<td><?=$id;?></td>
								<td><?=$a1;?></td>
								<td><?=$a2;?></td>
								<td><a href="index.php?sayfa=solalt2&islem=duzenle&id=<?=$id;?>"><span class="label label-default">Düzenle</span></a></td>
							</tr>
            <?php } ?>
							
						</table>
						<table cellpadding="0" cellspacing="0" width="100%">
						<tr>
						</tr>
						</table>
						<?php }elseif($islem == 'duzenle') {
						$id = $_GET['id'];
						$habercekelim = odbc_exec($conn, "select * from _Odestashield_Sol2 WHERE RowID = '$id'");
							$a1 = odbc_result($habercekelim,2);
							$a2 = odbc_result($habercekelim,3);
						if(isset($_POST['save'])) {
						// TR Karakter
			
				$a1 = $_POST['a1'];
				$a2 = $_POST['a2'];
				$a1 = str_replace("<p>","",$a1);
				$a1 = str_replace("</p>","",$a1);						
				$a1 = str_replace("'","`",$a1);						

				$a2 = str_replace("<p>","",$a2);
				$a2 = str_replace("</p>","",$a2);					
				$a2 = str_replace("'","`",$a2);					
              if($a1 == '' || $a2 == '') {
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> Boş alan bırakmayınız.
									</div>';
              }else{
                $websqlquery = odbc_exec($conn, "UPDATE _Odestashield_Sol2 SET Title='$a1',Description='$a2' WHERE RowID = '$id'");
                if($websqlquery) {
						$habercekelim = odbc_exec($conn, "select * from _Odestashield_Sol2 WHERE RowID = '$id'");
							$a1 = odbc_result($habercekelim,2);
							$a2 = odbc_result($habercekelim,3);
			
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
						 <form action="index.php?sayfa=solalt2&islem=duzenle&id=<?=$id;?>" method="post" enctype="multipart/form-data">
						<p>
							<label>Duyuru ID: <?=$id;?></label><br />
							<span class="note">Etkinlik panelde gözükmemesi için başlığa '-' yazıp kaydet.</span>
						</p>							 
						<p>
							<label>Başlık:</label><br />
							<textarea name="a1" id="a1" style="height:200px;width:30%;" maxlength="200" ><?=$a1;?></textarea>
						</p>	
						<p>
							<label>Açıklama:</label><br />
							<div>
								<textarea name="a2" id="a2" style="height:200px;width:30%;" maxlength="200" ><?=$a2;?></textarea>
							</div>
						</p>
						<p>
							<label>Resim Yükle:</label>
							<input type="file" name="dosya" class="form-control-file"/>
							<span class="note">Sol en alt etkinlik resimlerini değiştirmek için 'solalt1-10.jpg' şeklinde isimlendirme yaparak resim yükleyebilirsin. Eğer resim seçilmezse bir etkisi olmaz.</span> 
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
					
					var textarea = document.getElementById('a1');
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
