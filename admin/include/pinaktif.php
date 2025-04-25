<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>



<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Active PP Card Codes</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
							
							<?php
				$islem = v4guvenlik($_GET['islem']);
				
				if($islem == 'sil'){
				$menu = $_GET['Pincode'];
          $sql  = odbc_exec($conn, "DELETE FROM PPCARD_LIST WHERE Pincode = '$menu'");
            if($sql) {
            echo '<div class="message success"><p>E-Pin deleted successfully</p> <button onclick="history.go(-1)">Go Back</button> </div>';
            }else{
            echo '<div class="message errormsg"><p>E-Pin could not be deleted.</p> <button onclick="history.go(-1)">Go Back</button> </div>';
            }
				}elseif($islem == '') {
				$menucek = odbc_exec($conn, "SELECT PPKeyCode,KnightCash FROM PPCARD_LIST ORDER BY KnightCash ASC;");
				?>
				<table class="table table-striped">
						
							<tr>
								<th>Pincode</th>
								<th>KC</th>
							</tr>
							<?php 
							while(odbc_fetch_row($menucek)) {
							$Pincode = odbc_result($menucek,1);
							$KC = odbc_result($menucek, 2);
							?>
							<tr>

								<td><?=$Pincode;?></td>
								<td><?=$KC;?></td>
							</tr>
            <?php } ?>
						</table>
						
						<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->



