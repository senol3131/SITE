<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>



<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Upload Image</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
							
<?php
  if ($_FILES){
    include 'upload.php';
  }
?>
				
        <div class="container">
  		<div class="row">
        <div class="col-12"><?php echo $sonuc; ?></div>
  			<div class="col-12">
  				<form action="index.php?sayfa=addimage" method="post" enctype="multipart/form-data">
  					<div class="form-group">
  						<label>Choose Folder</label>
  						<input type="file" name="dosya" class="form-control-file" required />
  					</div>
  					<div class="form-group">
  						<button type="submit" class="btn btn-primary">Upload</button>
  					</div>
  				</form>
  			</div>
  		</div>
  	</div>
  			
							</div>
						</div>
					</div>
				</div>
			<!-- END MAIN CONTENT -->



