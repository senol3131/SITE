<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright	:	2020
 **/
 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>FEAR</b>");
 }
 
 
 if($job_id == 1 ):
	$karusjob = 106;
	$humanjob = 206;
	$job_name = "Warrior";
 elseif($job_id == 2 ):
	$karusjob = 108;
	$humanjob = 208;
	$job_name = "Rogue";
 elseif($job_id == 3):
	$karusjob = 112;
	$humanjob = 212;
	$job_name = "Priest";
 elseif($job_id == 4):
	$karusjob = 110;
	$humanjob = 210;
	$job_name = "Mage";
 else:
	$dbo->uyari('Geçersiz işlem!');
	$dbo->yonlendir(''.$base_url.'',0);
 
 endif;
?>
		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->
<div class="content-title">
	<h1 class="title"><center><?=$job_name;?> Sıralaması</center></h1>
</div><!-- content-title -->
<a href="<?=$base_url;?>JobRankings/1"><button style="width: 49.5%;">Warrior</button></a>
<a href="<?=$base_url;?>JobRankings/2"><button style="width: 49.5%;">Rogue</button></a>
<a href="<?=$base_url;?>JobRankings/3"><button style="width: 49.5%;">Priest</button></a>
<a href="<?=$base_url;?>JobRankings/4"><button style="width: 49.5%;">Mage</button></a>

<div class="wrapper-middle" style="padding: 60px;padding-top:10px;">
	<div class="media-block-i">
		<div class="tab-s media active" id="media-1">
			<div class="siralamalar">
				<table width="100%">
					<tbody><tr>
						<th class="topLine"><b>#</b></th>
						<th class="topLine">N|C</th>
						<th class="topLine">Karekter Adi</th>
						<th class="topLine">Clan</th>
						<th class="topLine">Level</th>
						<th class="topLine">Np</th>
					</tr>

<?php
					$i = 0;
					$ss = "SELECT TOP 100 UD.strUserID, UD.Class, UD.Level, UD.bRebirthLevel, UD.Nation, UD.Loyalty, UD.Knights, KD.IDNUM, KD.IDName AS KnightName, UD.LoyaltyMonthly FROM USERDATA AS UD LEFT JOIN KNIGHTS AS KD ON UD.Knights = KD.IDNUM WHERE UD.AUTHORITY = 1 AND UD.Class = {$karusjob} or UD.Class = {$humanjob} ORDER BY UD.Loyalty DESC";
					$genel = $dbo->doquery($ss);
					while($dbo->row($genel)):
					$isim 	 = $dbo->result('strUserID');
					$job 	 = $dbo->result('Class');
					$nation  = $dbo->result('Nation');
					$level   = $dbo->result('Level');
					$reblevel   = $dbo->result('bRebirthLevel');					
					$loyalty = $dbo->result('Loyalty');
					$idnum 	 = $dbo->result('IDNUM');					
					
					#find clan / check clan
					if($dbo->result('KnightName') == true):
						$clanname = $dbo->result('KnightName'); // eğer kullanıcı clanda ise clan adını yazar
					else:
						$clanname = '';	// eğer kullanıcı clanda değil ise boş bırakır
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
							$IDbosmudolumu = "UserRankings";
					}
					else
					{
						$IDbosmudolumu = "ClanProfile/";
					}					
					
                    if ($level == 83)
                    {
                        $reblevel2 = "/$reblevel";
                    }	
					else
					{
						$reblevel2 = "";
					}					
					
					$i++;
				
				?>
				<tr>
					<td><?=$i;?></td>
					<td><b class="nationicon_<?=$nation;?>"></b><b class="job job_<?=$jobumnedir;?>"></b></td>
					<td><a href="<?=$base_url;?>UserProfile/<?=trim(iconv('ISO-8859-9', 'UTF-8',$dbo->result('strUserID')));?>"><?=$isim;?></a></td>
					<td><a href="<?=$base_url;?><?=$IDbosmudolumu?><?=trim(iconv('ISO-8859-9', 'UTF-8',$dbo->result('IDNUM')));?>"><?=$clanname;?></a></td>
					<td><?=$level;?><?=$reblevel2;?></td>
					<td><?=number_format($loyalty);?></td>
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
