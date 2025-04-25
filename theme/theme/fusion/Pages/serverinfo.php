			<?php
				$dbo->doquery("SELECT count(StrAccountID) FROM CURRENTUSER");
				$totalonline = $dbo->result(1);
			?>
						<div class="serverinfo-area">
							<div class="serverinfo-item">
								<b>SERVER DURUMU</b>
<!-- 
$serverdurum
0 Offline
1 Online
2 Bakımda
 -->
<?php $serverdurum = 1; ?>

<?php 
                        if ($serverdurum == 0) 
						{
                        ?>                                                            
						<p style="color: #ff7070;text-shadow: 0px 0px 17px red;">Offline</p>                           
                            <?php                      							
                        } 
						else if ($serverdurum == 1) 
						{
                        ?>                                                            
						<p style="color: #9effa2;text-shadow: 0px 0px 17px lime;">Online</p>                             
                            <?php                      							
                        } 
						else if ($serverdurum == 2) 
						{
                        ?>     
						<p style="color: #ff7070;text-shadow: 0px 0px 17px red;">Bakımda</p>                          
                            <?php                      							
                        } 						
?>						
</div>
							<!--<div class="serverinfo-item">
								<b>TOPLAM ONLİNE</b>
								<p style="font-family: Arial"><?=$totalonline;?></p></div>-->
							<div class="serverinfo-item">
								<b>Server Saati</b>
								<p id="serverClock"></p>
								<!--<p><?echo '' . date('H:i');?> </p>-->
							</div>
						</div>