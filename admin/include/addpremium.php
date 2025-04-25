<?php if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } ?>



<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Add Premium to Account</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
							
							<?PHP
				if(isset($_POST['save'])) {
				$username = v4guvenlik($_POST['username']);
				$type 	  = v4guvenlik($_POST['type']);
				$days     = v4guvenlik($_POST['days']);
				$time     = date("d F Y l");
          if($username == '' || $type == '' || $days == '') {
            echo '<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> Do not leave blank space! <button onclick="history.go(-1)">Go Back</button>
									</div> ';
          }else{
            $websqlquery = odbc_exec($conn, "INSERT INTO PREMIUM_SERVICE (strAccountID,StrType,nDays,strZaman) VALUES ('$username','$type','$days','$time')");
            if($websqlquery) {
            echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Premium added to "'.$username.'".
									<button onclick="history.go(-1)">Go Back</button> </div>';
            }else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> Premium could not added.
									 <button onclick="history.go(-1)">Go Back</button></div>';
            }
          }
				}
				?>
				<form action="index.php?sayfa=addpremium" method="post">
						<p>
							<label>Account Name:</label><br />
							<input type="text" name="username" class="form-control" placeholder="Account Name"/> 
							<span class="note"></span>
						</p>
						<p>
							<label>Premium Type:</label><br />
							
							<select class="form-control" name="type">
									<option value="">Select a premium type</option>
									<option value="3">War Premium</option>
									<!--<option value="4">Silver Premium</option>
									<option value="5">Gold Premium</option>-->
							</select>
						</p>
						<p>
							<label>Premium Day:</label><br />
							
							<select class="form-control" name="days">
									<option value="">Select a premium day</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="999">Lifetime</option>
							</select>
						</p>
						<p>
							<input type="submit" class="btn btn-primary" name="save" value="Save" />
						</p>
				</form>
							</div>
							
							
						</div>
						
						<div class="panel panel-headline">
						<div class="panel-body">
							
							<?php
				$islem = v4guvenlik($_GET['islem']);
				$id = $_GET['strAccountID'];
				if($islem == 'sil'){
          $sql  = odbc_exec($conn, "DELETE FROM PREMIUM_SERVICE WHERE strAccountID = '$username'");
            if($sql) {
            echo '<div class="message success"><p>Premium deleted.</p></div> <button onclick="history.go(-1)">Go Back</button>';
            }else{
            echo '<div class="message errormsg"><p>Premium could not be deleted.</p></div> <button onclick="history.go(-1)">Go Back</button>';
            }
				}elseif($islem == 'tumunusil'){
				
			$sql  = odbc_exec($conn, "TRUNCATE TABLE PREMIUM_SERVICE");
            if($sql) {
            echo '<div class="message success"><p>All premium has been deleted.</p></div> <button onclick="history.go(-1)">Go Back</button>';
            }else{
            echo '<div class="message errormsg"><p>All premium could not be deleted.</p></div> <button onclick="history.go(-1)">Go Back</button>';
            }
				}elseif($islem == '') {
				$eventcek = odbc_exec($conn, "SELECT strAccountID,StrType,nDays,strzaman FROM PREMIUM_SERVICE");
				?>
				<table class="table table-striped">
						
							<tr>
								<th>Name</th>
								<th>Premium</th>
								<th>Day</th>
								<th>Added Time</th>
								<th>#</th>
							</tr>
							<?php 
							while(odbc_fetch_row($eventcek)) {
							$strAccountID = odbc_result($eventcek,1);
							$StrType = odbc_result($eventcek, 2);
							$nDays = odbc_result($eventcek, 3);
							$strzaman = odbc_result($eventcek, 4);
							
							if ($StrType == '3') 	  {
								$PremiumType = 'War Premium';        
								}
							elseif ($StrType == '4') {
								$PremiumType = 'Silver Premium';        
								}
							elseif ($StrType == '5') {
								$PremiumType = 'Gold Premium';        
								}
							
							?>
							<tr>

							
								<td><?=$strAccountID;?></td>
								<td><?=$PremiumType;?></td>
								<td><?=$nDays;?></td>
								<td><?=$strzaman;?></td>
								
								<td><a href="index.php?sayfa=addpremium&islem=sil&strAccountID=<?=$strAccountID;?>"><span class="label label-success">Delete</span></a></td>
							</tr>
            <?php } ?>
						</table>
					 <td><div align="center"><a href="index.php?sayfa=addpremium&islem=tumunusil"><span class="label label-danger">Delete All</span></a></div></td>
						<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->



