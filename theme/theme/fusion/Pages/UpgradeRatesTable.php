<?
if($item_id == 379021000): 	   // Blessed Upgrade Scroll
$upgrade = $dbo->doquery("SELECT DISTINCT TOP 10 ReqItemID1, ReqItemName1, ItemGrade 'up', SuccessRate, ItemReqCoins  FROM ITEM_UPGRADE_SETTINGS WHERE ReqItemID1=379021000 and ReqItemID2=0 and ItemType = 5 order by ItemGrade asc
");
elseif($item_id == 700002000): // Trina's Piece
$upgrade = $dbo->doquery("SELECT DISTINCT TOP 10 ReqItemID1, ReqItemName1, ItemGrade 'up', SuccessRate, ItemReqCoins  FROM ITEM_UPGRADE_SETTINGS WHERE ReqItemID2=379021000 and ReqItemID1=700002000 and ItemType = 5 order by ItemGrade asc");
elseif($item_id == 379016000): // Upgrade Scroll
$upgrade = $dbo->doquery("SELECT DISTINCT TOP 5 ReqItemID1, ReqItemName1, ItemGrade 'up', SuccessRate, ItemReqCoins  FROM ITEM_UPGRADE_SETTINGS WHERE ReqItemID1=379016000 and ReqItemID2=0 and ItemType = 5 order by ItemGrade asc");
elseif($item_id == 379205000): // US Middle Class
$upgrade = $dbo->doquery("SELECT DISTINCT TOP 7 ReqItemID1, ReqItemName1, ItemGrade 'up', SuccessRate, ItemReqCoins  FROM ITEM_UPGRADE_SETTINGS WHERE ReqItemID1=379205000 and ReqItemID2=0 and ItemType = 5 order by ItemGrade asc");
elseif($item_id == 379221000): // US Low Class
$upgrade = $dbo->doquery("SELECT DISTINCT TOP 7 ReqItemID1, ReqItemName1, ItemGrade 'up', SuccessRate, ItemReqCoins  FROM ITEM_UPGRADE_SETTINGS WHERE ReqItemID1=379221000 and ReqItemID2=0 and ItemType = 5 order by ItemGrade asc");
elseif($item_id == 379159000): // Accessory Compound Scroll
$dbo->doquery("SELECT ReqItemID1, ReqItemName1, SuccessRate, ItemReqCoins FROM ITEM_UPGRADE_SETTINGS WHERE ReqItemID1=379159000 and ReqItemID2=0 and ItemGrade = 0 and ItemType = 4");
$oran0 = $dbo->result('SuccessRate');
$para0 = $dbo->result('ItemReqCoins');
$dbo->doquery("SELECT ReqItemID1, ReqItemName1, SuccessRate, ItemReqCoins FROM ITEM_UPGRADE_SETTINGS WHERE ReqItemID1=379159000 and ReqItemID2=0 and ItemGrade = 1 and ItemType = 4");
$oran1 = $dbo->result('SuccessRate');
$para1 = $dbo->result('ItemReqCoins');
$dbo->doquery("SELECT ReqItemID1, ReqItemName1, SuccessRate, ItemReqCoins FROM ITEM_UPGRADE_SETTINGS WHERE ReqItemID1=379159000 and ReqItemID2=0 and ItemGrade = 2 and ItemType = 4");
$oran2 = $dbo->result('SuccessRate');
$para2 = $dbo->result('ItemReqCoins');
$dbo->doquery("SELECT ReqItemID1, ReqItemName1, SuccessRate, ItemReqCoins FROM ITEM_UPGRADE_SETTINGS WHERE ReqItemID1=379159000 and ReqItemID2=0 and ItemGrade = 3 and ItemType = 4");
$oran3 = $dbo->result('SuccessRate');
$para3 = $dbo->result('ItemReqCoins');
$dbo->doquery("SELECT ReqItemID1, ReqItemName1, SuccessRate, ItemReqCoins FROM ITEM_UPGRADE_SETTINGS WHERE ReqItemID1=379159000 and ReqItemID2=0 and ItemGrade = 4 and ItemType = 4");
$oran4 = $dbo->result('SuccessRate');
$para4 = $dbo->result('ItemReqCoins');
elseif($item_id == 379257000): // Reverse Item Str Sc
$upgrade = $dbo->doquery("SELECT DISTINCT TOP 20 ReqItemID1, ReqItemName1, ItemGrade 'up', SuccessRate, ItemReqCoins  FROM ITEM_UPGRADE_SETTINGS WHERE ReqItemID1=379257000 and ReqItemID2=0 and ItemType = 11 order by ItemGrade asc");
elseif($item_id == 379258000): // Karivdis
$upgrade = $dbo->doquery("SELECT DISTINCT TOP 20 ReqItemID1, ReqItemName1, ItemGrade 'up', SuccessRate, ItemReqCoins  FROM ITEM_UPGRADE_SETTINGS WHERE ReqItemID2=379257000 and ReqItemID1=379258000 and ItemType = 11 order by ItemGrade asc");
endif;
?>
<BR>
<table class="rankTable dataTable no-footer" style="margin-left:0px;width:100%;">
		<thead>
			<tr>
				<th># >>></th>
				<th class="hidden-xs">Eşya Adı</th>
				<th>Seviye</th>
				<th>Oran</th>
				<th>Ücret</th>
			</tr>
		</thead>
		<tbody>
		<? if($item_id == 700002000):?> <!-- TRINA -->
		
		<?php while($dbo->row($upgrade)):?>
			<tr role="row" class="odd">
				<td><img src="<?=$dbo->get_item_image($dbo->result('ReqItemID1')); ?>"></td>
				<td><?=$dbo->result('ReqItemName1');?></td>
				<td>+<?=$dbo->result('up');?> > <?=$dbo->result('up')+1;?></td>
				<td>%<?=$dbo->result('SuccessRate')/100;?></td>
				<td><?=number_format($dbo->result('ItemReqCoins'));?></td>
			</tr>
		<?php endwhile;?>
		
		<? elseif($item_id == 379258000):?> <!-- KARIVDIS -->
		
		<?php while($dbo->row($upgrade)):?>
			<tr role="row" class="odd">
				<td><img src="<?=$dbo->get_item_image($dbo->result('ReqItemID1')); ?>"></td>
				<td><?=$dbo->result('ReqItemName1');?></td>
				<td>+<?=$dbo->result('up');?> > <?=$dbo->result('up')+1;?></td>
				<td>%<?=$dbo->result('SuccessRate')/100;?></td>
				<td><?=number_format($dbo->result('ItemReqCoins'));?></td>
			</tr>
		<?php endwhile;?>

		<? elseif($item_id == 379159000): ?> <!-- TAKI -->

			<tr role="row" class="odd">
				<td><img src="<?=$dbo->get_item_image($dbo->result('ReqItemID1')); ?>"></td>
				<td><?=$dbo->result('ReqItemName1');?></td>
				<td>+0 > 1</td>
				<td>%<?=$oran0/100;?></td>
				<td><?=number_format($para0);?></td>
			</tr>
			
			<tr role="row" class="odd">
				<td><img src="<?=$dbo->get_item_image($dbo->result('ReqItemID1')); ?>"></td>
				<td><?=$dbo->result('ReqItemName1');?></td>
				<td>+1 > 2</td>
				<td>%<?=$oran1/100;?></td>
				<td><?=number_format($para1);?></td>
			</tr>			
			<tr role="row" class="odd">
				<td><img src="<?=$dbo->get_item_image($dbo->result('ReqItemID1')); ?>"></td>
				<td><?=$dbo->result('ReqItemName1');?></td>
				<td>+2 > 3</td>
				<td>%<?=$oran2/100;?></td>
				<td><?=number_format($para2);?></td>
			</tr>			
			<tr role="row" class="odd">
				<td><img src="<?=$dbo->get_item_image($dbo->result('ReqItemID1')); ?>"></td>
				<td><?=$dbo->result('ReqItemName1');?></td>
				<td>+3 > 4</td>
				<td>%<?=$oran3/100;?></td>
				<td><?=number_format($para3);?></td>
			</tr>			
			<tr role="row" class="odd">
				<td><img src="<?=$dbo->get_item_image($dbo->result('ReqItemID1')); ?>"></td>
				<td><?=$dbo->result('ReqItemName1');?></td>
				<td>+4 > 5</td>
				<td>%<?=$oran4/100;?></td>
				<td><?=number_format($dbo->result('ItemReqCoins'));?></td>
			</tr>
		
		<? elseif($item_id == 379021000): ?>
		
		<?php while($dbo->row($upgrade)):?>
			<tr role="row" class="odd">
				<td><img src="<?=$dbo->get_item_image($dbo->result('ReqItemID1')); ?>"></td>
				<td><?=$dbo->result('ReqItemName1');?></td>
				<td>+<?=$dbo->result('up');?> > <?=$dbo->result('up')+1;?></td>
				<td>%<?=$dbo->result('SuccessRate')/100;?></td>
				<td><?=number_format($dbo->result('ItemReqCoins'));?></td>
			</tr>
		<?php endwhile;?>
		
		<? elseif($item_id == 379016000): ?>
		
		<?php while($dbo->row($upgrade)):?>
			<tr role="row" class="odd">
				<td><img src="<?=$dbo->get_item_image(379220000); ?>"></td>
				<td><?=$dbo->result('ReqItemName1');?></td>
				<td>+<?=$dbo->result('up');?> > <?=$dbo->result('up')+1;?></td>
				<td>%<?=$dbo->result('SuccessRate')/100;?></td>
				<td><?=number_format($dbo->result('ItemReqCoins'));?></td>
			</tr>
		<?php endwhile;?>
		
		<? elseif($item_id == 379221000): ?>
		
		<?php while($dbo->row($upgrade)):?>
			<tr role="row" class="odd">
				<td><img src="<?=$dbo->get_item_image(379016000); ?>"></td>
				<td><?=$dbo->result('ReqItemName1');?></td>
				<td>+<?=$dbo->result('up');?> > <?=$dbo->result('up')+1;?></td>
				<td>%<?=$dbo->result('SuccessRate')/100;?></td>
				<td><?=number_format($dbo->result('ItemReqCoins'));?></td>
			</tr>	
			
		<?php endwhile;?>
		
		<? else: ?>
		
		<?php while($dbo->row($upgrade)):?>
			<tr role="row" class="odd">
				<td><img src="<?=$dbo->get_item_image($dbo->result('ReqItemID1')); ?>"></td>
				<td><?=$dbo->result('ReqItemName1');?></td>
				<td>+<?=$dbo->result('up');?> > <?=$dbo->result('up')+1;?></td>
				<td>%<?=$dbo->result('SuccessRate')/100;?></td>
				<td><?=number_format($dbo->result('ItemReqCoins'));?></td>
			</tr>
		<?php endwhile;?>
		
		<? endif; ?>
		</tbody>
	</table>