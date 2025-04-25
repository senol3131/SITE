<center><img src="<?=$path;?>images/divider.png"/></center>
<table width="100%">
		<tr>
			<th>#</th>
			<th>Item Adı</th>
			<th>Oran</th>
			<th>Kullanılan Item</th>   
		</tr>
		<?php	
			$i = 0;
			$fragchest = "select distinct nExchangeItemNum1,nExchangeItemCount1 from ITEM_EXCHANGE where nOriginItemNum1 = $item_id order by nExchangeItemCount1 DESC;";
			$drop = $dbo->doquery($fragchest);
			while($dbo->row($drop)):
			$ItemCode = $dbo->result(1);
			$DropRate = $dbo->result(2);
			$i++;
			
			$name = "SELECT strName FROM ITEM WHERE Num = '".$ItemCode."'";
			$dbo->query($name);
			$itemName = $dbo->results('strName');					
			$halit = str_replace("'","",$itemName);								
		?>
		<?if ($ItemCode >= 100000000){ ?>
		<tr>
			<td><ul class="item_half_left"><span data-tooltip="<?=$dbo->itemozellik($ItemCode);?><br><font color=yellow size=3>Drop Oranı : <?=$DropRate/100;?>%</font>"><img src="<?=$base_url;?>itemicon.php?num=<?=$ItemCode;?>" alt = "" /></span></ul></td>
			<td><?=$halit;?></td>
			<td>%<?=$DropRate/100;?></td>
			<td><img src="<?=$base_url;?>itemicon.php?num=<?=$item_id;?>"></td>
		</tr>
		<? }else{?>	
		
		<? }?>		
		<?php endwhile;?>
			
		<?php	
			$i = 0;
			$fragchest = "select distinct nExchangeItemNum2,nExchangeItemCount2 from ITEM_EXCHANGE where nOriginItemNum1 = $item_id order by nExchangeItemCount2 DESC;";
			$drop = $dbo->doquery($fragchest);
			while($dbo->row($drop)):
			$ItemCode = $dbo->result(1);
			$DropRate = $dbo->result(2);
			$i++;
			
			$name = "SELECT strName FROM ITEM WHERE Num = '".$ItemCode."'";
			$dbo->query($name);
			$itemName = $dbo->results('strName');					
			$halit = str_replace("'","",$itemName);					
		?>
		<?if ($ItemCode >= 100000000){ ?>
		<tr>
			<td><ul class="item_half_left"><span data-tooltip="<?=$dbo->itemozellik($ItemCode);?><br><font color=yellow size=3>Drop Oranı : <?=$DropRate/100;?>%</font>"><img src="<?=$base_url;?>itemicon.php?num=<?=$ItemCode;?>" alt = "" /></span></ul></td>
			<td><?=$halit;?></td>
			<td>%<?=$DropRate/100;?></td>
			<td><img src="<?=$base_url;?>itemicon.php?num=<?=$item_id;?>"></td>
		</tr>
		<? }else{?>	
		
		<? }?>		
		<?php endwhile;?>
		
		<?php	
			$i = 0;
			$fragchest = "select distinct nExchangeItemNum3,nExchangeItemCount3 from ITEM_EXCHANGE where nOriginItemNum1 = $item_id order by nExchangeItemCount3 DESC;";
			$drop = $dbo->doquery($fragchest);
			while($dbo->row($drop)):
			$ItemCode = $dbo->result(1);
			$DropRate = $dbo->result(2);
			$i++;
			
			$name = "SELECT strName FROM ITEM WHERE Num = '".$ItemCode."'";
			$dbo->query($name);
			$itemName = $dbo->results('strName');					
			$halit = str_replace("'","",$itemName);					
		?>
		<?if ($ItemCode >= 100000000){ ?>
		<tr>
			<td><ul class="item_half_left"><span data-tooltip="<?=$dbo->itemozellik($ItemCode);?><br><font color=yellow size=3>Drop Oranı : <?=$DropRate/100;?>%</font>"><img src="<?=$base_url;?>itemicon.php?num=<?=$ItemCode;?>" alt = "" /></span></ul></td>
			<td><?=$halit;?></td>
			<td>%<?=$DropRate/100;?></td>
			<td><img src="<?=$base_url;?>itemicon.php?num=<?=$item_id;?>"></td>
		</tr>
		<? }else{?>	
		
		<? }?>		
		<?php endwhile;?>
		
		<?php	
			$i = 0;
			$fragchest = "select distinct nExchangeItemNum4,nExchangeItemCount4 from ITEM_EXCHANGE where nOriginItemNum1 = $item_id order by nExchangeItemCount4 DESC;";
			$drop = $dbo->doquery($fragchest);
			while($dbo->row($drop)):
			$ItemCode = $dbo->result(1);
			$DropRate = $dbo->result(2);
			$i++;
			
			$name = "SELECT strName FROM ITEM WHERE Num = '".$ItemCode."'";
			$dbo->query($name);
			$itemName = $dbo->results('strName');					
			$halit = str_replace("'","",$itemName);						
		?>
		<?if ($ItemCode >= 100000000){ ?>
		<tr>
			<td><ul class="item_half_left"><span data-tooltip="<?=$dbo->itemozellik($ItemCode);?><br><font color=yellow size=3>Drop Oranı : <?=$DropRate/100;?>%</font>"><img src="<?=$base_url;?>itemicon.php?num=<?=$ItemCode;?>" alt = "" /></span></ul></td>
			<td><?=$halit;?></td>
			<td>%<?=$DropRate/100;?></td>
			<td><img src="<?=$base_url;?>itemicon.php?num=<?=$item_id;?>"></td>
		</tr>
		<? }else{?>	
		
		<? }?>		
		<?php endwhile;?>
		
		<?php	
			$i = 0;
			$fragchest = "select distinct nExchangeItemNum5,nExchangeItemCount5 from ITEM_EXCHANGE where nOriginItemNum1 = $item_id order by nExchangeItemCount5 DESC;";
			$drop = $dbo->doquery($fragchest);
			while($dbo->row($drop)):
			$ItemCode = $dbo->result(1);
			$DropRate = $dbo->result(2);
			$i++;
			
			$name = "SELECT strName FROM ITEM WHERE Num = '".$ItemCode."'";
			$dbo->query($name);
			$itemName = $dbo->results('strName');					
			$halit = str_replace("'","",$itemName);			
		?>
		<?if ($ItemCode >= 100000000){ ?>
		<tr>
			<td><ul class="item_half_left"><span data-tooltip="<?=$dbo->itemozellik($ItemCode);?><br><font color=yellow size=3>Drop Oranı : <?=$DropRate/100;?>%</font>"><img src="<?=$base_url;?>itemicon.php?num=<?=$ItemCode;?>" alt = "" /></span></ul></td>
			<td><?=$halit;?></td>
			<td>%<?=$DropRate/100;?></td>
			<td><img src="<?=$base_url;?>itemicon.php?num=<?=$item_id;?>"></td>
		</tr>
		<? }else{?>	
		
		<? }?>		
		<?php endwhile;?>
	</table>