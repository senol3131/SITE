<center><img src="<?=$path;?>images/divider.png"/></center>
<dl class="accordion">
				<?php
				$i = 0;
				$itmsrch = "select distinct i.Num from K_MONSTER k join K_MONSTER_ITEM ki on k.sSid = ki.sIndex join K_NPCPOS2369 kp on k.sSid = kp.NpcID join ZONE_INFO_2369 z on kp.ZoneID = z.ZoneNo left join MAKE_ITEM_GROUP ig on ig.iItemGroupNum in (ki.iItem01,ki.iItem02,ki.iItem03,ki.iItem04,ki.iItem05,ki.iItem06,ki.iItem07) join ITEM i on i.Num in (iItem01,iItem02,iItem03,iItem04,iItem05,iItem06,iItem07,iItem_1,iItem_2,iItem_3,iItem_4,iItem_5,iItem_6,iItem_7,iItem_8,iItem_9,iItem_10,iItem_11,iItem_12,iItem_13,iItem_14,iItem_15,iItem_16,iItem_17,iItem_18,iItem_19,iItem_20,iItem_21,iItem_22,iItem_23,iItem_24,iItem_25,iItem_26,iItem_27,iItem_28,iItem_29,iItem_30) where RTRIM(SUBSTRING(i.strName,0,(CASE WHEN CHARINDEX('(',i.strName) > 0 THEN CHARINDEX('(',i.strName) ELSE 99 END))) like '%$search_query%' group by k.strName, k.ssid, i.strName, i.Num";
				$dbo->doquery($itmsrch);
				$gelennum 	 = $dbo->result('Num');
				
				$droptable = "select distinct k.sSid,k.strName, z.ZoneNo from K_MONSTER k join K_MONSTER_ITEM ki on k.sSid = ki.sIndex join K_NPCPOS2369 kp on k.sSid=kp.NpcID join ZONE_INFO_2369 z on kp.ZoneID = z.ZoneNo left join MAKE_ITEM_GROUP ig on ig.iItemGroupNum in (ki.iItem01,ki.iItem02,ki.iItem03,ki.iItem04,ki.iItem05,ki.iItem06,ki.iItem07) where '$gelennum' in (iItem01,iItem02,iItem03,iItem04,iItem05,iItem06,iItem07,iItem_1,iItem_2,iItem_3,iItem_4,iItem_5,iItem_6,iItem_7,iItem_8,iItem_9,iItem_10,iItem_11,iItem_12,iItem_13,iItem_14,iItem_15,iItem_16,iItem_17,iItem_18,iItem_19,iItem_20,iItem_21,iItem_22,iItem_23,iItem_24,iItem_25,iItem_26,iItem_27,iItem_28,iItem_29,iItem_30) and z.ZoneNo not in (72,73) order by z.ZoneNo desc";
				$drop = $dbo->doquery($droptable);
				while($dbo->row($drop)):										
				$i++;
		
				$ssid 	  = $dbo->result('sSid'); 
				$name 	  = $dbo->result('strName'); 
				$zone 	  = $dbo->result('ZoneNo'); 
										
				?>
				<!-- ROW -->
				<dt>
					<a href="javascript:void(0);" onclick="searchItem(<?=$ssid;?>);">
						<div class="monster_top">
							<span class="monster_title"><font color="white"><?=$name;?></font></span>
							<span class="monster_open_acc"><font color="green"><?=$dbo->GetZone($zone);?></font> <i class="fa fa-bars"></i></span>
						</div>
					</a>
				</dt>
				<!-- ROW -->
				<?php endwhile;?>
</dl>


