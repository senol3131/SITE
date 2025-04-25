<center><img src="<?=$path;?>images/divider.png"/></center>
<dl class="accordion">
	<?php
		$i = 0;
		$mobdrop = "select distinct km.sSid, km.strName, knpcs.ZoneID from K_MONSTER km INNER JOIN K_NPCPOS2369 knpcs ON km.sSid = knpcs.NpcID where ZoneID = $zone_id ORDER BY strName ASC;";
		$drop = $dbo->doquery($mobdrop);
		while($dbo->row($drop)):
		$i++;
		$ssid = $dbo->result('sSid');
		$name = $dbo->result('strName');
		$zone = $dbo->result('ZoneID');
	
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