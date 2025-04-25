<center><img src="<?=$path;?>images/divider.png"/></center>
<dl class="accordion">
				<?php
				$i = 0;
				$droptable = "SELECT distinct km.sSid,km.strName,knpcs.ZoneID FROM K_MONSTER km INNER JOIN K_NPCPOS2369 knpcs ON km.sSid = knpcs.NpcID where km.strName like '%$search_query%' and knpcs.ZoneID not in (72,73) order by ZoneID DESC;";
				$drop = $dbo->doquery($droptable);
				while($dbo->row($drop)):										
				$i++;
		
				$ssid 	  = $dbo->result('sSid'); 
				$name 	  = $dbo->result('strName'); 
				$zone 	  = $dbo->result('ZoneID'); 
										
				?>
				<!-- ROW -->
				<dt>
					<a href="javascript:void(0);" onclick="searchItem(<?=$ssid;?>);">
						<div class="monster_top">
							<span class="monster_title"><font color="white"><?=$name;?></font></span>
							<span class="monster_open_acc"><font color="green"><?=$dbo->GetZone($zone);?> </font><i class="fa fa-bars"></i></span>
						</div>
					</a>
				</dt>
				<!-- ROW -->
				<?php endwhile;?>
</dl>


