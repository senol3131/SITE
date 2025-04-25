<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Yeni Duyuru Ekle</h2>
					<div class="panel panel-headline">
						<div class="panel-body">	<!-- .block_head ends -->
				
				
				
				<div class="block_content tab_content">
				<?PHP
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
				$articlestr = $_POST['articlestr'];
				$articlestr = str_replace("<p>","",$articlestr);
				$articlestr = str_replace("</p>","",$articlestr);
				$articlestr = str_replace("'","`",$articlestr);
				$tarih = $_POST['tarh'];
				$sef = seofunction($titletr);
				//$tarih  = date('d.m.Y');
				$tip = $_POST['tip'];
				$resim = $_POST['resim'];
					  if($articlestr == '' || $tarih == '') {
						echo '<div class="alert alert-warning alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<i class="fa fa-times-circle"></i> Boş alan bırakmayınız.
												</div>';
					  }else{
						$websqlquery = odbc_exec($conn, "INSERT INTO _Odestashield_Duyuru values ('$tarih','$articlestr')");
						if($websqlquery) {
						echo '<div class="alert alert-success alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<i class="fa fa-check-circle"></i> Duyuru eklendi.
												</div>';
									
						}else{
						echo '<div class="alert alert-danger alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<i class="fa fa-times-circle"></i> Duyuru eklenemedi.
												</div>';
						}
					  }
				}
				?>
				<form action="index.php?sayfa=addnews" method="post">
						<p>
							<label>Tarih:</label><br />
							<input type="date" id="tarh" name="tarh">
						</p>	
						<p>
							<label>İçerik:</label><br />
							<div>
								<textarea name="articlestr" id="articlestr" style="height:300px;width:100%;" maxlength="200" ><?=$description;?></textarea>
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
				</script>				
					
				</div>		<!-- .block_content ends -->
				
				

				
				<div class="bendl"></div>
				<div class="bendr"></div>

				
			</div>		<!-- .block ends -->