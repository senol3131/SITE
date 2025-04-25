<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Add Slider</h2>
					<div class="panel panel-headline">
						<div class="panel-body">	<!-- .block_head ends -->
				
				
				
				<div class="block_content tab_content">
				<?PHP
				if(isset($_POST['save'])) {
				// TR Karakter
				function trkarakter($tr) 
				{
				$tr1=array("İ","ı","Ü","ü","Ö","ö","Ş","ş","Ğ","ğ","Ç","ç","'");
				$tr2=array("I","i","U","u","O","o","S","s","G","g","C","c","");
				$tr=str_replace($tr1,$tr2,$tr);
				return $tr;
				}
				
				$header     = ucwords(trkarakter($_POST['header']));
				$main    	= ucwords(trkarakter($_POST['main']));
				$image 	 	= $_POST['image'];
				$link 	 	= $_POST['link'];
				
				if($header == '' || $main == '' || $image == '' || $link == '') {
					echo '<div class="message warning"><p>Do not leave blank space.</p><button onclick="history.go(-1)">Go Back</button> </div>';
				}else
				{
				$websqlquery = odbc_exec($conn, "INSERT INTO _Odestashield_sliders (header,main,link,image) values ('$header','$main','$link','$image')");
					
				if($websqlquery) 
				{
					echo '<div class="message success"><p>Slider saved successfully.</p><button onclick="history.go(-1)">Go Back</button> </div>';
				}
				else
				{
					echo '<div class="message errormsg"><p>Slider could not be saved.</p><button onclick="history.go(-1)">Go Back</button> </div>';
				}
				  
				}
				
				}
				?>
				<form action="index.php?sayfa=addslider" method="post">
						<p>
							<label>Header of Slider:</label><br />
							<input type="text" name="header" maxlength="50" class="form-control" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>Link:</label><br />
							<input type="text" name="link" class="form-control" /> 
							<span class="note"></span>
						</p>
						<p>
							<label>Image:</label><br />
							<input type="text" name="image" class="form-control" /> 
							<span class="note">Please enter URL</span>
						</p>						
						<p>
							<label>Content of Slider:</label><br />
							<textarea class="form-control" id="content" name="main" rows="1" cols="100" maxlength="100" placeholder="Content of Slider"></textarea>
						</p>
						<p>
							<input type="submit" class="btn btn-primary" name="save" value="Save" />
						</p>
				</form>
					
				</div>		<!-- .block_content ends -->
				
				

				
				<div class="bendl"></div>
				<div class="bendr"></div>

				
			</div>		<!-- .block ends -->