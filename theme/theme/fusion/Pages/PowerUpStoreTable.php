<table width="100%">
	<tbody>
					<tr>
						<th class="topLine"><b>#</b></th>
						<th class="topLine">Item Adi</th>
						<th class="topLine">Fiyat</th>
					</tr>
				<?php
			$i = 0;
			if ($item_id == 0)
			{
				$fragchest = "select ItemID,strItemName,Price,ItemIconID1 from PUS_ITEMS INNER JOIN ITEM ON PUS_ITEMS.ItemID = ITEM.Num  order by ID ASC;";
			}
			if ($item_id > 0)
			{
				$fragchest = "select ItemID,strItemName,Price,ItemIconID1 from PUS_ITEMS INNER JOIN ITEM ON GPUS_ITEMS.ItemID = ITEM.Num where Category = $item_id order by ID ASC;";
			}					
			$drop = $dbo->doquery($fragchest);
			while($dbo->row($drop)):
			$ItemID 	 = $dbo->result('ItemID');
			$strItemName = $dbo->result('strItemName');
			$Price 		 = $dbo->result('Price');	
			$itemiconid  = $dbo->result('ItemIconID1');	
			$i++;				
		
		?>	
				<tr>
					<td><ul class="item_half_right"><span data-tooltip="<?=$dbo->itemozellik($ItemID); ?>"><img src="<?=$base_url;?>itemicon.php?num=<?=$itemiconid;?>" alt = "" /></span></ul></td>
					<td><?=$strItemName;?></td>
					<td><?=$Price;?> NPoint</td>
				</tr>
								
				<?php endwhile;?>
					
	</tbody>
</table>