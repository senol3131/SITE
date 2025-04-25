<center><img src="<?=$path;?>images/divider.png"/></center>
<table width="100%">
				<tr>
					<th>Kullanılan Item</th>
					<th>Item Adı</th>
					<th>Oran</th>
					<th>Düşen Item</th>    
				</tr>
				<?
				// nTableType = 0 (Maden dropları)
				// nTableType = 1 (Balık dropları)

				// UseItemType = 0 (Mattock , Fishing Rod droplar)
				// UseItemType = 1 (Golden Mattock , Golden Fishing Rod dropları
				
					if($item_id == 389132000): // Mattock
						$nTableType  = 0;
						$UseItemType = 0;
						$nWarStatus  = 0;
					elseif($item_id == 389135000): // Golden Mattock
						$nTableType  = 0;
						$UseItemType = 1;
						$nWarStatus  = 0;				
					elseif($item_id == 750680000): // Automatic Minning
						$nTableType  = 0;
						$UseItemType = 3;
						$nWarStatus  = 0;
					elseif($item_id == 750700000): // Automatic Minning + Robin Loot
						$nTableType  = 0;
						$UseItemType = 3;
						$nWarStatus  = 0;
						
					elseif($item_id == 191346000): // Fishing Rod
						$nTableType  = 1;
						$UseItemType = 1;
						$nWarStatus  = 0;
					elseif($item_id == 191347000): // Golden Fishing Rod
						$nTableType  = 1;
						$UseItemType = 0;	
						$nWarStatus  = 0;
					elseif($item_id == 501620000): // Automatic Fishing
						$nTableType  = 1;
						$UseItemType = 1;
						$nWarStatus  = 0;
					elseif($item_id == 520000000): // Automatic Fishing + Robin Loot
						$nTableType  = 1;
						$UseItemType = 1;
						$nWarStatus  = 0;
					endif;
				?>
				<?php
					$i = 0;
					$minning = "select * from MINING_FISHING_ITEM where nTableType = '$nTableType' and UseItemType = '$UseItemType' and nWarStatus = '$nWarStatus' order by SuccessRate DESC";
					$drop = $dbo->doquery($minning);
					while($dbo->row($drop)):
					$itemName = $dbo->result('nGiveItemName');
					$itemCode = $dbo->result('nGiveItemID');
					$Success  = $dbo->result('SuccessRate')/ 100;
					
					
					$i++;				
				?>
				<tr>
				<td><img src="<?=$base_url;?>itemicon.php?num=<?=$item_id;?>"></td>
					
					<td><?=$itemName;?></td>
					<? ?>
					<td>%<?=$Success;?></td>
					<td><ul class="item_half_right"><span data-tooltip="<?=$dbo->itemozellik($itemCode); ?>"><img src="<?=$base_url;?>itemicon.php?num=<?=$itemCode;?>" alt=""></span></ul></td>
				</tr>
				<?php endwhile;?>				
			</table>