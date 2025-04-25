<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->					
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->	
<div class="content-title">
	<h1 class="title"><center>Günlük Görevler</center></h1>
</div><!-- content-title -->
<div class="wrapper-middle" style="padding-top:10px;">
	<div class="media-block-i">

		<div class="tab-s media active" id="media-1">








        <table class="table table-bordered" width="100%" id="ax">
          <tbody><tr>
            <th class="topLine">Öldür</th>
            <th class="topLine">Bölge & Level Aralığı</th>
            <th class="topLine">Ödül</th>
          </tr>



				<?PHP
					$download = 
					$dbo->doquery("SELECT 
					strName as QuestName,
					(SELECT ltrim(rtrim(strName)) FROM K_MONSTER where sSid = Odestashield_DAILY_QUESTS.MobID1) as Monster1,
					(SELECT ltrim(rtrim(strName)) FROM K_MONSTER where sSid = Odestashield_DAILY_QUESTS.MobID2) as Monster2,
					(SELECT ltrim(rtrim(strName)) FROM K_MONSTER where sSid = Odestashield_DAILY_QUESTS.MobID3) as Monster3,
					(SELECT ltrim(rtrim(strName)) FROM K_MONSTER where sSid = Odestashield_DAILY_QUESTS.MobID4) as Monster4,
					KillCount,
					Reward1,
					Reward2,
					Reward3,
					Reward4,
					Count1,
					Count2,
					Count3,
					Count4,
					(SELECT ltrim(rtrim(strZoneName)) FROM ZONE_INFO_1098 where ZoneNO = Odestashield_DAILY_QUESTS.ZoneID) as Zone,
					MinLevel,
					MaxLevel,
					TimeType,
					ReplayTime
					FROM Odestashield_DAILY_QUESTS ORDER BY id ASC");
					while($dbo->row($download)):
					$GorevAdi = $dbo->result(1);
					$Mob1 = $dbo->result(2);
					$Mob2 = $dbo->result(3);
					$Mob3 = $dbo->result(4);
					$Mob4 = $dbo->result(5);
					$KillCount = $dbo->result(6);
					$Reward1 = $dbo->result(7);
					$RewardCount1 = $dbo->result(11);
					$Reward2 = $dbo->result(8);
					$RewardCount2 = $dbo->result(12);
					$Reward3 = $dbo->result(9);
					$RewardCount3 = $dbo->result(13);
					$Reward4 = $dbo->result(10);
					$RewardCount4 = $dbo->result(14);
					$ZoneX = $dbo->result(15);
					$MinLevel = $dbo->result(16);
					$MaxLevel = $dbo->result(17);
					
					$GorevTip = $dbo->result(18);
					$GorevSaat = $dbo->result(19);
					
					switch ($GorevTip) {
						case 0:
							$GorevText = "Sürekli Tekrarlanabilir";
							break;
						case 1:
							$GorevText = $GorevSaat." Saatde Bir Yapıabilir";
							break;
						case 2:
							$GorevText = "Sadece Bir Defa Yapılabilir";
							break;						
					}
					
					
					
					
					
				?>
				
        <tr  style="font-size:11px">
			<td>
				<?php if ($Mob1 <> "" and $KillCount > 0): ?> <?=$Mob1; ?> <?=$KillCount; ?>x </br><? endif; ?>
				<?php if ($Mob2 <> "" and $KillCount > 0): ?> <?=$Mob2; ?> <?=$KillCount; ?>x </br><? endif; ?>
				<?php if ($Mob3 <> "" and $KillCount > 0): ?> <?=$Mob3; ?> <?=$KillCount; ?>x </br><? endif; ?>
				<?php if ($Mob4 <> "" and $KillCount > 0): ?> <?=$Mob4; ?> <?=$KillCount; ?>x<? endif; ?>
			
			</td>
			<td><?=$ZoneX;?></br>[<?=$MinLevel;?>-<?=$MaxLevel;?>]</br><?=$GorevText;?></td>
			<td>
				<?php if ($Reward1 > 0 and $RewardCount1 > 0): ?> <ul class="item_half_center"><span data-tooltip="<?=$dbo->itemozellik2($Reward1,$RewardCount1); ?>"><img src="<?=$base_url;?>itemicon.php?num=<?=$Reward1;?>" alt="<?=$RewardCount1;?>"></span></ul> <?php endif; ?>
				<?php if ($Reward2 > 0 and $RewardCount2 > 0): ?> <ul class="item_half_center"><span data-tooltip="<?=$dbo->itemozellik2($Reward2,$RewardCount2); ?>"><img src="<?=$base_url;?>itemicon.php?num=<?=$Reward2;?>" alt="<?=$RewardCount2;?>"></span></ul> <?php endif; ?>
				<?php if ($Reward3 > 0 and $RewardCount3 > 0): ?> </br> <?php endif; ?>
				<?php if ($Reward3 > 0 and $RewardCount3 > 0): ?> <ul class="item_half_center"><span data-tooltip="<?=$dbo->itemozellik2($Reward3,$RewardCount3); ?>"><img src="<?=$base_url;?>itemicon.php?num=<?=$Reward3;?>" alt="<?=$RewardCount3;?>"></span></ul> <?php endif; ?>
				<?php if ($Reward4 > 0 and $RewardCount4 > 0): ?> <ul class="item_half_center"><span data-tooltip="<?=$dbo->itemozellik2($Reward4,$RewardCount4); ?>"><img src="<?=$base_url;?>itemicon.php?num=<?=$Reward4;?>" alt="<?=$RewardCount4;?>"></span></ul> <?php endif; ?>
			</td>
			
        </tr>				
				<?php endwhile;?>
			</tbody></table>






    </div>
  </div>
</div>

</div>
</div>
</main>
<!--RIGHT--><?php include "/../right.php"; ?><!--RIGHT-->
			</div>