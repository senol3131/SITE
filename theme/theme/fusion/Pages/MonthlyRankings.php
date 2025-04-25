		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->
<div class="content-title">
	<h1 class="title"><center>Aylık Karakter Sıralaması</center></h1>
</div><!-- content-title -->
<div class="wrapper-middle" style="padding: 60px;padding-top:10px;">
	<div class="media-block-i">
		<div class="media-tab tab-button">
			<button data-tab="media-1" class="btn-block-s button-n active" style="width: 49.5%;">Human</button>
			<button data-tab="media-2" class="btn-block-s button-n" style="width: 49.5%;">Karus</button>
		</div>
		<div class="tab-s media active" id="media-1">
			<div class="siralamalar">
				<table width="100%">
					<tbody><tr>
						<th class="topLine"><b>#</b></th>
						<th class="topLine"></th>
						<th class="topLine">Karakter Adi</th>
						<th class="topLine">Job</th>
						<th class="topLine">Clan</th>
						<th class="topLine">Np</th>
					</tr>

<?php
				$monthly = $dbo->doquery("SELECT TOP 100 UP.nRank, UP.strElmoUserID, UP.nElmoLoyaltyMonthly, UD.Class, KD.IDNUM, KD.IDName AS KnightName FROM USER_PERSONAL_RANK AS  UP  LEFT JOIN USERDATA  AS UD ON UD.strUserID = UP.strElmoUserID LEFT JOIN KNIGHTS AS KD ON UD.Knights = KD.IDNUM WHERE UD.AUTHORITY = 1 ORDER BY UP.nRank");
				$i = 0;
				while($dbo->row($monthly)):
				$index = $dbo->result('nRank');
				$elmouser = $dbo->result('strElmoUserID');
				$clanname  = $dbo->result('KnightName');
				$elmonp = $dbo->result('nElmoLoyaltyMonthly');
				$job 	 = $dbo->result('Class');
				$idnum 	 = $dbo->result('IDNUM');
				$i++;
				
				if($index == 1):
					$index2 = 1;
				elseif($index==2 or $index==3 or $index==4):
					$index2 = 2;
				elseif($index==5 or $index==6 or $index==7 or $index==8 or $index==9):
					$index2 = 3;
				elseif($index==10 or $index==11 or $index==12 or $index==13 or $index==14 or $index==15 or $index==16 or $index==17 or $index==18 or $index==19 or $index==20 or $index==21 or $index==22 or $index==23 or $index==24 or $index==25):
					$index2 = 4;
				elseif($index == 26 or $index==27 or $index==28 or $index==29 or $index==30 or $index==31 or $index==32 or $index==33 or $index==34 or $index==35 or $index==36 or $index==37 or $index==38 or $index==39 or $index==40 or $index==41 or $index==42 or $index==43 or $index==44 or $index==45 or $index==46 or $index==47 or $index==48 or $index==49 or $index==50):
					$index2 = 5;
				else:
					$index2 = 6;
				endif;
				
					if ($job == 101 or $job == 105 or $job == 106)
					{
						$jobumnedir = 11;
					}
					else if ($job == 102 or $job == 107 or $job == 108)
					{
						$jobumnedir = 12;
					}
					else if ($job == 103 or $job == 109 or $job == 110)
					{
						$jobumnedir = 13;
					}
					else if ($job == 104 or $job == 111 or $job == 112)
					{
						$jobumnedir = 14;
					}
					
					else if ($job == 201 or $job == 205 or $job == 206)
					{
						$jobumnedir = 21;
					}
					else if ($job == 202 or $job == 207 or $job == 208)
					{
						$jobumnedir = 22;
					}
					else if ($job == 203 or $job == 209 or $job == 210)
					{
						$jobumnedir = 23;
					}
					else if ($job == 204 or $job == 211 or $job == 212)
					{
						$jobumnedir = 24;
					}				
					
				if ($clanname == "")
				{
						$clanname = "<font color=ff7070>CLAN YOK</font>";
				}
					
				if ($idnum == "")
				{
						$IDbosmudolumu = "MonthlyRankings";
				}
				else
				{
					$IDbosmudolumu = "ClanProfile/";
				}
										
					
				
				?>
					<tr style="font-size:11px">
						<td><?=$i;?></td>
						<td>
						<div class="symbol b<?=$index2;?>"></div>
						</td>
						<td>
						<a href="<?=$base_url;?>UserProfile/<?=trim(iconv('ISO-8859-9', 'UTF-8',$dbo->result('strElmoUserID')));?>"><?=$dbo->result('strElmoUserID')?></a>
						</td>
						<td><div class="job job_<?=$jobumnedir;?>"></div></td>
						<td><a href="<?=$base_url;?><?=$IDbosmudolumu?><?=trim(iconv('ISO-8859-9', 'UTF-8',$dbo->result('IDNUM')));?>"><?=$clanname;?></a></td>
						<td><?=number_format($elmonp);?></td>
					</tr>				
<?php endwhile;?>

					</tbody>
			</table>
		</div>
	</div>
	<div class="tab-s media" id="media-2">
		
		<div class="siralamalar">
			<table width="100%">
				<tbody><tr>
					<th class="topLine"><b>#</b></th>
					<th class="topLine"></th>
					<th class="topLine">Karakter Adi</th>
					<th class="topLine">Job</th>
					<th class="topLine">Clan</th>
					<th class="topLine">Np</th>
				</tr>

<?php
				$monthly = $dbo->doquery("SELECT TOP 100 UP.nRank, UP.strKarusUserID, UP.nKarusLoyaltyMonthly, UD.Class, KD.IDNUM, KD.IDName AS KnightName FROM USER_PERSONAL_RANK AS  UP  LEFT JOIN USERDATA  AS UD ON UD.strUserID = UP.strKarusUserID LEFT JOIN KNIGHTS AS KD ON UD.Knights = KD.IDNUM WHERE UD.AUTHORITY = 1 ORDER BY UP.nRank");
				$i = 0;
				while($dbo->row($monthly)):
				$index = $dbo->result('nRank');
				$elmouser = $dbo->result('strKarusUserID');
				$clanname  = $dbo->result('KnightName');
				$elmonp = $dbo->result('nKarusLoyaltyMonthly');
				$job 	 = $dbo->result('Class');
				$idnum 	 = $dbo->result('IDNUM');
				$i++;
				
				if($index == 1):
					$index2 = 1;
				elseif($index==2 or $index==3 or $index==4):
					$index2 = 2;
				elseif($index==5 or $index==6 or $index==7 or $index==8 or $index==9):
					$index2 = 3;
				elseif($index==10 or $index==11 or $index==12 or $index==13 or $index==14 or $index==15 or $index==16 or $index==17 or $index==18 or $index==19 or $index==20 or $index==21 or $index==22 or $index==23 or $index==24 or $index==25):
					$index2 = 4;
				elseif($index == 26 or $index==27 or $index==28 or $index==29 or $index==30 or $index==31 or $index==32 or $index==33 or $index==34 or $index==35 or $index==36 or $index==37 or $index==38 or $index==39 or $index==40 or $index==41 or $index==42 or $index==43 or $index==44 or $index==45 or $index==46 or $index==47 or $index==48 or $index==49 or $index==50):
					$index2 = 5;
				else:
					$index2 = 6;
				endif;
				
					if ($job == 101 or $job == 105 or $job == 106)
					{
						$jobumnedir = 11;
					}
					else if ($job == 102 or $job == 107 or $job == 108)
					{
						$jobumnedir = 12;
					}
					else if ($job == 103 or $job == 109 or $job == 110)
					{
						$jobumnedir = 13;
					}
					else if ($job == 104 or $job == 111 or $job == 112)
					{
						$jobumnedir = 14;
					}
					
					else if ($job == 201 or $job == 205 or $job == 206)
					{
						$jobumnedir = 21;
					}
					else if ($job == 202 or $job == 207 or $job == 208)
					{
						$jobumnedir = 22;
					}
					else if ($job == 203 or $job == 209 or $job == 210)
					{
						$jobumnedir = 23;
					}
					else if ($job == 204 or $job == 211 or $job == 212)
					{
						$jobumnedir = 24;
					}				
					
				if ($clanname == "")
				{
						$clanname = "<font color=ff7070>CLAN YOK</font>";
				}
					
				if ($idnum == "")
				{
						$IDbosmudolumu = "MonthlyRankings";
				}
				else
				{
					$IDbosmudolumu = "ClanProfile/";
				}					
					
				
				?>
					<tr style="font-size:11px">
						<td><?=$i;?></td>
						<td>
						<div class="symbol b<?=$index2;?>"></div>
						</td>
						<td>
						<a href="<?=$base_url;?>UserProfile/<?=trim(iconv('ISO-8859-9', 'UTF-8',$dbo->result('strKarusUserID')));?>"><?=$dbo->result('strKarusUserID')?></a>
						</td>
						<td><div class="job job_<?=$jobumnedir;?>"></div></td>
						<td><a href="<?=$base_url;?><?=$IDbosmudolumu?><?=trim(iconv('ISO-8859-9', 'UTF-8',$dbo->result('IDNUM')));?>"><?=$clanname;?></a></td>
						<td><?=number_format($elmonp);?></td>
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

<!--SAYFA GECİS SCRIPTI START-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<!--Garanti Olsun diye aynı js 2kez koyduk-->
<script type="text/javascript" src="<?=$path;?>js/jquery.min.js"></script>
		<script type="text/javascript">
			$('.btn-block-s').click(function(){
				$('.btn-block-s').removeClass('active');
				$(this).addClass('active');
				$('.tab-s').removeClass('active');
				$('#'+$(this).attr('data-tab')).addClass('active');
			})
			$('.btn-block-n').click(function(){
				$('.btn-block-n').removeClass('active');
				$(this).addClass('active');
				$('.tab-n').removeClass('active');
				$('#'+$(this).attr('data-tab')).addClass('active');
			})

		</script>
<!--SAYFA GECİS SCRIPTI END-->
