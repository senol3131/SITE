<? echo '<br><center><b><font face="tahoma" size="3" style="color: #9effa2;text-shadow: 0px 0px 17px lime;"><br>
<b>Normal Itemler</b></font></b></center>'; ?>	
<BR>
<center>
<ul class="item_half_center">
		<?php
		for($i=1; $i<=7;$i++)
		{
			$minning = "select * from K_MONSTER_ITEM where sIndex = '$ssid'";
			$drop = $dbo->doquery($minning);
			while($dbo->row($drop)):
			$itemCode = $dbo->result("iItem0$i");																	
			$itemDrop = $dbo->result("sPersent0$i");																	
		?>
		<? if($itemCode >= 100000000){ ?>
		<tr>
			<td><span data-tooltip="<?=$dbo->itemozellik($itemCode);?><br><font color=yellow size=3>Drop Oranı : %<?=$itemDrop/100;?></font>"><img src="<?=$dbo->get_item_image($itemCode);?>" alt = "" /></span></div></td>
		</tr>	
		<? } ?>
		<? if($itemCode > 0 && $itemCode < 100000000){ ?>
		<tr>
			<td>
			<a href="javascript:void(0);" onclick="searchGroupItem(<?=$itemCode;?>);">
			<span data-tooltip="<font color=white size=4>Grup Item (Bilgi için tıkla)</font> <br><br><font color=yellow size=3>Drop Oranı : %<?=$itemDrop/100;?></font>">
			<img src="<?=$path;?>images/itemgroup.jpg" alt = "" /></span></a>
			</td>
		</tr>
		<? } ?>	
		<?php endwhile; ?>				
		<? } ?>		
</ul>