					<div class="left-content-block-info">
						<div class="download-bonus-block">
							<div class="download">
								<a href="<?=$base_url;?>Downloads">
								</a>
							</div>
							<div class="bonus-block">
								<a href="<?=$base_url;?>FragmentRates" class="bonus">
									<p>CHAOTIC GENERATOR</p>
								</a>
								<a href="https://www.facebook.com/people/SRGAME24xx/100067453165730/" target="_blank" class="facebook">
									<p>Facebook Sayfamız</p>
								</a>
								<a href="<?=$base_url;?>PowerUpStore" class="support">
									<p>POWER UP STORE</p>
								</a>
								<a href="<?=$base_url;?>DropList" class="shop">
									<p>DROP ITEM ARAMA</p>
								</a>
							</div>
						</div>
						
						<div class="events-block">
						<?php 
							$Sol1 = $dbo->doquery("select * from _Odestashield_Sol1");
							$i = 1;
							$event = "";
							while($dbo->row($Sol1)):
								if (trim($dbo->result(2)) != '-'):
									switch ($i) {
										case 1:
											$event = "bdwevent";
											break;									
										case 2:
											$event = "jrevent";
											break;									
										case 3:
											$event = "chaosevent";
											break;									
										case 4:
											$event = "cswevent";	
											break;									
									}							
									echo '
										<div class="event-item '.$event.'"><p>'.$dbo->result(2).'</p><i>'.$dbo->result(3).'</br>'.$dbo->result(4).'</i></div>
									';
									$i++;
								endif;
							endwhile;
						?>

						</div>
						<div class="discussion-block">
							<div class="content-title c-title">
								<span class="title">Diğer Etkinliklerimiz</span>
							</div>
							
						<?php 
							$Sol1 = $dbo->doquery("select * from _Odestashield_Sol2");
							$i = 1;
							$event = "";
							while($dbo->row($Sol1)):
							if (trim($dbo->result(2)) != '-'):
								echo '
								<div class="forum">
									<img src="'.$path.'images/solalt'.$i.'.jpg" alt="forum-ava">
									<div class="forum-title">							
									'.$dbo->result(2).'
									</div>
									<div class="forum-autor">
									'.$dbo->result(3).'
									</div>
								</div>	
								';
							endif;
							$i++;
							endwhile;
						?>							

						</div>
					</div>