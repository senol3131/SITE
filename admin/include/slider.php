<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>



<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Slider</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
				<?php
				  if ($_FILES){
					include 'upload.php';
				  }						
					$islem = v4guvenlik($_GET['islem']);
					$id = $_GET['id'];
					if($islem == 'kaydet')
						{
						$slidocount = v4guvenlik($_POST['slidercount']);
					
						$websqlquery = odbc_exec($conn, "UPDATE _Odestashield_Slider SET SliderCount ='$slidocount'");
						if($websqlquery) {
						
						echo '<div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<i class="fa fa-check-circle"></i> Kaydedildi.
											</div>
						
						';
						}else{
						echo '<div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<i class="fa fa-warning"></i> Kaydedilemedi.
											</div>';
					}						
					}
					elseif($islem == '') {
					$habercek = odbc_exec($conn, "SELECT * FROM _Odestashield_Slider");
							$id = odbc_result($habercek,1);
							$sliderURL1 = odbc_result($habercek,2);
							$sliderURL2 = odbc_result($habercek,3);
							$sliderURL3 = odbc_result($habercek,4);
							$sliderURL4 = odbc_result($habercek,5);
							$sliderURL5 = odbc_result($habercek,6);
							$sliderURL6 = odbc_result($habercek,7);
							$sliderURL7 = odbc_result($habercek,8);
							$sliderURL8 = odbc_result($habercek,9);
							$sliderURL9 = odbc_result($habercek,10);
							$sliderURL10 = odbc_result($habercek,11);					
					$i = 1;
					$data2 = array($sliderURL1,$sliderURL2,$sliderURL3,$sliderURL4,$sliderURL5,$sliderURL6,$sliderURL7,$sliderURL8,$sliderURL9,$sliderURL10);
					$data = array();
					while ($i <= $id):
						$i++;
						if ($i == $id):
							$data[$i] =  "selected";
						endif;
					endwhile;
				?>
				<form action="index.php?sayfa=slider&islem=kaydet" method="post" enctype="multipart/form-data">
				<p>
					<label>Slider Adet:</label>
						<select id="slidercount" name="slidercount">
						  <option value="1" <?=$data[1];?>>1</option>
						  <option value="2" <?=$data[2];?>>2</option>
						  <option value="3" <?=$data[3];?>>3</option>
						  <option value="4" <?=$data[4];?>>4</option>
						  <option value="5" <?=$data[5];?>>5</option>
						  <option value="6" <?=$data[6];?>>6</option>
						  <option value="7" <?=$data[7];?>>7</option>
						  <option value="8" <?=$data[8];?>>8</option>
						  <option value="9" <?=$data[9];?>>9</option>
						  <option value="10" <?=$data[10];?>>10</option>
						</select>
					</br>	
					<span class="note"> Görüntülemek istediğiniz slider adetini yukarıdan seç.</span>
				</p>
						<p>
							<label>Resim Yükle:</label>
							<input type="file" name="dosya" class="form-control-file"/>
							<span class="note">Slider resimlerini güncellemek için 1-10 arasında resim yüklerken resim isimleri 'slider1.jpg' 'slider2.jpg' şeklinde olmak zorundadır.</span> 
						</p>
						<p>
							<input type="submit" class="btn btn-primary" name="save" value="Kaydet" />
						</p>				
				</form>				
				<table class="table table-striped table-bordered">

							<tr>
								<th width="3%">#</th>
								<th width="50%">Slider URL</th>
								<th width="40%">Slider Önizleme</th>
								<th width="7%">Slider URL Düzenle</th>
							</tr>


						<?php
								$i = 1;
								$data = array();
								while ($i <= 10):
								$imgLocation = '../theme/fusion/Images/slider'.$i.'.jpg';
								echo '
								
								<tr>
									<td>'.$i.'</td>
									<td>'.$data2[$i-1].'</td>
									
									<td>';
									if (file_exists($imgLocation)) {
										echo '<img src="'.$imgLocation.'" width="347" height="143"></img>';
									}
									else {
										echo '<img src="../theme/fusion/Images/notfound.png" width="347" height="143"></img>';
									}
									echo '</td>
									
									<td><a href="index.php?sayfa=slider&islem=duzenle&id='.$i.'"><span class="label label-default">Düzenle</span></a></td>
								</tr>								
								
								';
								
									$i++;
								endwhile;						
						?>
						

            <?php } ?>
							
						</table>
						<table cellpadding="0" cellspacing="0" width="100%">
						<tr>
						</tr>
						</table>
						<?php if($islem == 'duzenle') {
						$id = $_GET['id'];
						$habercekelim = odbc_exec($conn, "SELECT SliderLink$id FROM _Odestashield_Slider");
						$sliderlink = odbc_result($habercekelim, 1);
						if(isset($_POST['save'])) {
						// TR Karakter

				$sliderlink = $_POST['sliderlink'];
				$slidlink = $_POST['slidlink'];
                $websqlquery = odbc_exec($conn, "UPDATE _Odestashield_Slider SET SliderLink$id ='$slidlink'");
                if($websqlquery) {
				
                echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> '.$id.' numaralı slider linki güncellendi.
									</div>
				
				';
                }else{
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> Kaydedilemedi.
									</div>';
            }
          }
				
						?>
						 <form action="index.php?sayfa=slider&islem=duzenle&id=<?=$id;?>" method="post">
						<p>
							<label>Duyuru ID: <?=$id;?></label><br />
						</p>							 
						<p>
							<label>Slider URL:</label><br />
							<input type="text" name="slidlink" class="form-control" value="<?=$sliderlink; ?>" /> 
						</p>
						<p>
							<input type="submit" class="btn btn-primary" name="save" value="Kaydet" />
						</p>
				</form>
						<?php } ?>
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
						<?php  ?>
				
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
