<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>



<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Create Pincode</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
							
							<?PHP
		if(isset($_POST['save'])) {
		/* Pin kodu olu�tur */
        $ESN[0] = substr(rand(0,9999),0,4);
		for ($E = 1; $E <= 4; $E++)
        $ESN[$E] = substr(md5(rand(0,9999)),0,4);
        }
        $ESN = strtoupper(implode('-',$ESN));
        /* Cash */
        $Cash = $_POST['cash'];
          if($Cash == '') {
            echo '<div class="message warning"><p>Knight cash could not be blank.</p> <button onclick="history.go(-1)">Go Back</button> </div>';
          }else{
            $websqlquery = odbc_exec($conn,"INSERT INTO PPCARD_LIST (PPKeyCode,KnightCash) values('".$ESN."',$Cash)");
            if($websqlquery) {
            echo '<div class="message success"><p>Pincode saved successfully.</p> <button onclick="history.go(-1)">Go Back</button> </div>';
            }else{
            echo '<div class="message errormsg"><p>Pincode could not be saved.</p> <button onclick="history.go(-1)">Go Back</button> </div>';
            }
          }
				?>
				<form action="index.php?sayfa=addpin" method="post">
						<p>
							<label>Knight Cash:</label><br />
							<input type="text" name="cash" class="form-control" /> 
							<span class="note">* If you do not want to give kc, write 0.</span>
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



