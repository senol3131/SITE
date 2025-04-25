<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Haber Düzenle</h2>
					<div class="panel panel-headline">
						<div class="panel-body">	<!-- .block_head ends -->
				
				
				
				<div class="block_content tab_content">
				<?PHP
				  if ($_FILES){
					include 'upload.php';
				  }					
					$select = odbc_exec($conn, "select * from _Odestashield_news");
					$title = odbc_result($select,1);
					$description = odbc_result($select,2);
					
				if(isset($_POST['save'])) {
				// TR Karakter
				function trkarakter($tr) {
									$tr1=array("İ","ı","Ü","ü","Ö","ö","Ş","ş","Ğ","ğ","Ç","ç","'");
									$tr2=array("I","i","U","u","O","o","S","s","G","g","C","c","");
									$tr=str_replace($tr1,$tr2,$tr);
									return $tr;
								}
								function seofunction($text) {

							$dizi1=array("İ","Ş"," ","Ü","Ç","'","G","Ö","ı","ş","ü","ç","g","ö","Ğ","ğ","ü","Ü");
							$dizi2=array("i","s","-","u","c","","g","o","i","s","u","c","g","o","g","g","u","u");
							$text=str_replace($dizi1,$dizi2,$text);
							$text=preg_replace("@[^A-Za-z0-9\-_]+@i","",$text);
							$text=strtolower($text);
							return($text);

	}
				$titletr = stripslashes($_POST['titletr']);
				$articlestr = stripslashes($_POST['articlestr']);
				$articlestr = str_replace("'","`",$articlestr);
				$sef = seofunction($titletr);
				$tarih  = date('d.m.Y H:i:s');
				$tip = $_POST['tip'];
				$resim = $_POST['resim'];
				if($titletr == '' || $articlestr == '') {
					echo '<div class="message warning"><p>Boş alan bırakmayınız.</p></div>';
				  }else{
					
					  if($titletr == '' || $articlestr == '') {
						echo '<div class="alert alert-warning alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<i class="fa fa-times-circle"></i> Boş alan bırakmayınız.
												</div>';
					  }else{
						$websqlquery = odbc_exec($conn, "UPDATE _Odestashield_news set title='$titletr', description='$articlestr'");
						if($websqlquery) {
						echo '<div class="alert alert-success alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<i class="fa fa-check-circle"></i> Haber güncellendi.
												</div>';
								$select = odbc_exec($conn, "select * from _Odestashield_news");
								$title = odbc_result($select,1);
								$description = odbc_result($select,2);												
						}else{
						echo '<div class="alert alert-danger alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<i class="fa fa-times-circle"></i> Haber güncellenemedi.
												</div>';
						}
					  }
				  }
				}
				?>
				<form action="index.php?sayfa=newedit" method="post" enctype="multipart/form-data">
						<p>
							<label>Başlık:</label><br />
							<input type="text" name="titletr" class="form-control" value="<?=$title;?>"/> 
							<span class="note"></span> 
						</p>
			
						<p>
							<label>İçerik:</label><br />
							<div>
								<textarea name="articlestr" id="articlestr" style="height:300px;width:100%;" maxlength="500" ><?=$description;?></textarea>
							</div>
						</p>
						<p>
							<label>Resim Yükle:</label>
							<input type="file" name="dosya" class="form-control-file"/>
							<span class="note">Resim adı: 'haber.jpg' olmak zorundadır. Eğer resim seçilmezse bir etkisi olmaz.</span> 
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
				</script>				
					
				</div>		<!-- .block_content ends -->
				
				

				
				<div class="bendl"></div>
				<div class="bendr"></div>

				
			</div>		<!-- .block ends -->