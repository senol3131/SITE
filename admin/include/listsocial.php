<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>



<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Social Media</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
				
				
				
				<div class="block_content tab_content">
				<?PHP
				$select = odbc_exec($conn, "SELECT youtube,discord,facebook,instagram,forum,twitter FROM _Odestashield_social_links");
				$youtube   = odbc_result($select,'youtube');
				$discord   = odbc_result($select,'discord');
				$facebook  = odbc_result($select,'facebook');
				$instagram = odbc_result($select,'instagram');
				$forum 	   = odbc_result($select,'forum');
				$twitter   = odbc_result($select,'twitter');
				
				if(isset($_POST['save'])) {
				$youtube   = v4guvenlik($_POST['youtube']);
				$discord   = v4guvenlik($_POST['discord']);
				$facebook  = v4guvenlik($_POST['facebook']);
				$instagram = v4guvenlik($_POST['instagram']);
				$forum 	   = v4guvenlik($_POST['forum']);
				$twitter   = v4guvenlik($_POST['twitter']);

				
          
            $websqlquery = odbc_exec($conn, "UPDATE _Odestashield_social_links SET youtube='$youtube',discord='$discord',facebook='$facebook',instagram='$instagram',forum='$forum',twitter='$twitter'");
            if($websqlquery) {
            echo '<div class="message success"><p>Saved successfully</p><button onclick="history.go(-1)">Go Back</button> </div>';
            }else{
            echo '<div class="message errormsg"><p>Fail.</p><button onclick="history.go(-1)">Go Back</button> </div>';
            }
          
				}
				?>
				<form action="index.php?sayfa=listsocial" method="post">
						<p>
							<label>YouTube Channel</label><br />
							<input type="text" name="youtube" class="form-control" value="<?=$youtube; ?>" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>Discord Channel</label><br />
							<input type="text" name="discord" class="form-control" value="<?=$discord; ?>" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>Instagram Account</label><br />
							<input type="text" name="instagram" class="form-control" value="<?=$instagram; ?>" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>Facebook Channel:</label><br />
							<input type="text" name="facebook" class="form-control" value="<?=$facebook; ?>" /> 
							<span class="note"></span>
						</p>						
						<p>
							<label>Forum Link:</label><br />
							<input type="text" name="forum" class="form-control" value="<?=$forum; ?>" /> 
							<span class="note"></span>
						</p>						
						<p>
							<label>Twitter Link:</label><br />
							<input type="text" name="twitter" class="form-control" value="<?=$twitter; ?>" /> 
							<span class="note"></span>
						</p>
						
						<p>
							<input type="submit" class="btn btn-primary" name="save" value="Save" />
						</p>
				</form>
					
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
