<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>



<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Add News</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
				<?php
				$islem = v4guvenlik($_GET['islem']);
				$id = $_GET['id'];
				if($islem == 'sil'){
          $sql  = odbc_exec($conn, "DELETE FROM _Odestashield_news WHERE id = '$id'");
            if($sql) {
            echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> News deleted successfully <button onclick="history.go(-1)">Go Back</button> 
									</div>';
            }else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> News could not be deleted <button onclick="history.go(-1)">Go Back</button> 
									</div>';
            }
				}elseif($islem == 'tumunusil'){
				
			$sql  = odbc_exec($conn, "TRUNCATE TABLE _Odestashield_news");
            if($sql) {
            echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> News deleted successfully <button onclick="history.go(-1)">Go Back</button> 
									</div>';
            }else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> News could not be deleted <button onclick="history.go(-1)">Go Back</button> 
									</div>';
            }
				}elseif($islem == '') {
				$habercek = odbc_exec($conn, "SELECT id,titletr,titleen FROM _Odestashield_news ORDER BY id DESC");
				?>
				<table class="table table-striped">
						
							<tr>
								<th>Turkish News</th>
								<th>English News</th>
								<th>Edit / Delete</th>
							</tr>
							<?php 
							while(odbc_fetch_row($habercek)) {
							$id = odbc_result($habercek,1);
							$titletr = odbc_result($habercek,2);
							$titleen = odbc_result($habercek,3);
							?>
							<tr>

								<td><?=$titletr;?></td>
								<td><?=$titleen;?></td>
								<td><a href="index.php?sayfa=listslider&islem=duzenle&id=<?=$id;?>"><span class="label label-default">Edit</span></a> - <a href="index.php?sayfa=listslider&islem=sil&id=<?=$id;?>"><span class="label label-danger">Delete</span></a></td>
							</tr>
            <?php } ?>
							
						</table>
						<table cellpadding="0" cellspacing="0" width="100%">
						<tr>
              <td><div align="center"><a href="index.php?sayfa=listslider&islem=tumunusil"><span class="label label-danger">Tümünü Sil</span></a></div></td>
						</tr>
						</table>
						<?php }elseif($islem == 'duzenle') {
						$id = $_GET['id'];
						$habercekelim = odbc_exec($conn, "SELECT titletr,titleen,newstr,newsen,img FROM _Odestashield_news WHERE id = '$id'");
						$titletr = odbc_result($habercekelim, 1);
						$titleen = odbc_result($habercekelim, 2);
						$articlestr = odbc_result($habercekelim, 3);
						$articlesen = odbc_result($habercekelim, 4);
						$resim = odbc_result($habercekelim, 5);
						if(isset($_POST['save'])) {
						// TR Karakter
					function trkarakter($tr) {
					$tr1=array("Ý","ý","Ü","ü","Ö","ö","Þ","þ","Ð","ð","Ç","ç");
					$tr2=array("I","i","U","u","O","o","S","s","G","g","C","c");
					$tr=str_replace($tr1,$tr2,$tr);
					return $tr;
				}
				$titletr2 = ucwords(trkarakter($_POST['titletr']));
				$titleen2 = ucwords(trkarakter($_POST['titleen']));
				$articlestr2 = trkarakter(stripslashes($_POST['articlestr']));
				$articlesen2 = trkarakter(stripslashes($_POST['articlesen']));	
				$resim = $_POST['resim'];	
              if($titletr2 == '' || $articlestr2 == '' || $titleen2 == '' || $articlesen2 == '') {
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> Do not leave blank space
									</div>';
              }else{
                $websqlquery = odbc_exec($conn, "UPDATE _Odestashield_news SET titletr='$titletr2',titleen='$titleen2',newstr='$articlestr2',newsen='$articlesen2',img='$resim' WHERE id = '$id'");
                if($websqlquery) {
                echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> "'.$titletr2.'"/"'.$titleen2.'" editted successfully.
									</div>
				
				';
                }else{
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> News could not be saved
									</div>';
            }
          }
				}
						?>
						 <form action="index.php?sayfa=listnews&islem=duzenle&id=<?=$id;?>" method="post">
						<p>
							<label>News Title Turkish:</label><br />
							<input value="<?=$titletr;?>" type="text" name="titletr" class="form-control" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>News Title English:</label><br />
							<input value="<?=$titleen;?>" type="text" name="titleen" class="form-control" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>Image:</label><br />
							<input value="<?=$resim;?>" type="text" name="resim" class="form-control" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>News Content Turkish:</label><br />
							<textarea class="form-control" id="contact-message" name="articlestr" rows="5" cols="30" placeholder="<?=$articlestr;?>"></textarea>
						</p>
						<p>
							<label>News Content English:</label><br />
							<textarea class="form-control" id="contact-message" name="articlesen" rows="5" cols="30" placeholder="<?=$articlesen;?>"></textarea>
						</p>
						<p>
							<input type="submit" class="btn btn-primary" name="save" value="Save" />
						</p>
				</form>
						<?php } ?>
				
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
