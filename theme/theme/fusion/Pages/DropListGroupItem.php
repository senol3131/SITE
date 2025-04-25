<center><b><font face="tahoma" size="3" style="color: #ff7070;text-shadow: 0px 0px 17px red;"><br>
<b>Grup Itemler </b></font></b></center>
<br>
<ul class="item_half_bottom">
	<?php
		$dropgroup = "select distinct * from MAKE_ITEM_GROUP where iItemGroupNum = $itemcode";
		$drop = $dbo->doquery($dropgroup);
		while($dbo->row($drop)):
		
		for($i=1; $i<=30; $i++)
		{
			$name = "SELECT strName FROM ITEM WHERE Num = '".$item."'";
			$dbo->query($name);	
			$item = $dbo->result("iItem_$i");
			if ($item>100000000) 
			{
				$html .= '<li><span data-tooltip="'.$dbo->itemozellik($item).'"><img src="'.$dbo->get_item_image($item).'"></span></li>	';
			}
			else
			{
				$html .= '';
			}
		}				
	?>
	<? echo $html; ?>
	<?php endwhile;?>	
</ul>