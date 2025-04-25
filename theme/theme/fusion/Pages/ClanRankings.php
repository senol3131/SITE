		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->					
<div class="content-title">
	<h1 class="title"><center>Clan Sıralaması</center></h1>
</div><!-- content-title -->
<div class="wrapper-middle" style="padding: 60px;padding-top:10px;">
	<div class="media-block-i">

		<div class="tab-s media active" id="media-1">
			<div class="siralamalar">
				<table width="100%">
					<tbody><tr>
						<th class="topLine"><b>#</b></th>
						<th class="topLine">Irk</th>
						<th class="topLine">Clan</th>
						<th class="topLine">Lider</th>
						<th class="topLine">Üye</th>
						<th class="topLine">Np</th>
					</tr>
				<?php
				$i = 0;
					/* top 100 clan*/
				$top100clan	= $dbo->doquery("SELECT TOP 100 k.Nation,k.IDNum, k.IDName, k.Members, k.Chief, k.Points, k.Flag ,k.ClanPointFund FROM KNIGHTS k, USERDATA u WHERE u.Authority = 1 AND k.Chief = u.strUserID GROUP BY k.Nation,k.IDNum, k.IDName, k.Members, k.Chief, k.Points, k.Flag ,k.ClanPointFund ORDER BY SUM(k.Points) DESC");
				while($dbo->row($top100clan)):
				$bagis = $dbo->result('Points');
				$grades = $dbo->result('Points');
				$flag = $dbo->result('Flag');
				/*Training Grade*/
				if($grades <= 73999 and $dbo->result('Flag')< 3):
					$grade = 5 ;
				elseif($grades <= 143999 and $dbo->result('Flag')< 3):
					$grade = 4 ;
				elseif($grades <= 359000 and $dbo->result('Flag')< 3):
					$grade = 3 ;
				elseif($grades <= 719999 and $dbo->result('Flag')< 3):
					$grade = 2 ;
				elseif($grades >= 720000 and $dbo->result('Flag')< 3):
					$grade = 1 ;
				/*Accredited Grade*/					
				elseif($dbo->result('Flag') == 3):
					$grade = 6 ;
				elseif($dbo->result('Flag') == 4):
					$grade = 7 ;
				elseif($dbo->result('Flag') == 5):
					$grade = 8 ;	
				elseif($dbo->result('Flag') == 6):
					$grade = 9 ;
				elseif($dbo->result('Flag') == 7):
					$grade = 10 ;
				/*Royal Grade*/
				elseif($dbo->result('Flag') == 8):
					$grade = 11 ;
				elseif($dbo->result('Flag') == 9):
					$grade = 12 ;
				elseif($dbo->result('Flag') == 10):
					$grade = 13 ;
				elseif($dbo->result('Flag') == 11):
					$grade = 14 ;
				elseif($dbo->result('Flag') == 12):
					$grade = 15 ;					
				endif;
				
				$nation  = $dbo->result('Nation');
				$clanname  = $dbo->result('IDName');
				$chief = $dbo->result('Chief');
				$members = $dbo->result('Members');
				$i++;
				?>

			<tr style="font-size:11px">
				<td><?=$i;?></td>
				<td><b class="nationicon_<?=$nation;?>"></b></td>
				<td><a href="<?=$base_url;?>ClanProfile/<?=trim(iconv('ISO-8859-9', 'UTF-8',$dbo->result('IDNum')));?>" style="color: #FFBE00;"><?=$clanname;?></a></td>
				<td><a href="<?=$base_url;?>UserProfile/<?=trim(iconv('ISO-8859-9', 'UTF-8',$dbo->result('Chief')));?>"><?=$chief;?></a></td>
				<td><?=$members;?></td>
				<td><?=number_format($bagis);?></td>
			</tr>				
				<?php endwhile;?>
				
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

</div>
</div>
</main>
<!--RIGHT--><?php include "/../right.php"; ?><!--RIGHT-->
			</div>
