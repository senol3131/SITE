<?PHP
/**
 *	@author		: 	FEAR
 * 	@copyright	:	2020
 **/
 if( !defined('FEAR') ) {
    die("Erisim Engellendi! - <b>FEAR</b>");
 }
 $clanname  = $dbo->result('IDName');
 if($dbo->result('IDNum') != $id):
	$dbo->uyari('Aradığınız clan bulunamadı');
	$dbo->yonlendir(''.$base_url.'',0);
 else:
?>	
<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php /*include "serverinfo.php";*/ ?><!--SERVERINFO-->				
<div class="content-title">
	<h1 class="title"><center><?php echo $clanname; ?> - Klan Profili</center></h1>
</div><!-- content-title -->
<div class="wrapper-middle" style="padding: 60px;padding-top:10px;">
	<div class="media-block-i">

		<div class="tab-s media active" id="media-1">
			<div class="siralamalar">
				<table width="100%">
					<tbody><tr>
					<th>#</th>
					<th>N|C</th>
					<th>İsim</th>
					<th>Level</th>
					<th>Puan</th>
					<th>Rütbe</th>    
				</tr>
				<?php
					$sira = 0;
					$i = 0;
					$clanuye = $dbo->doquery("Select strUserId,Level,bRebirthLevel,Loyalty,Class,LoyaltyMonthly,Fame,Nation FROM USERDATA Where Knights in ('$id') order by fame ASC");
					while($dbo->row($clanuye)):
						$job = $dbo->result('Class');
						$level = $dbo->result('Level');
						$reblevel   = $dbo->result('bRebirthLevel');						
						$nation = $dbo->result('Nation');
						$loyalty = $dbo->result('Loyalty');
						$loyaltymonthly = $dbo->result('LoyaltyMonthly');
						switch($dbo->result('Fame'))
						{
						case 1:
							$newrank = "<font color='white'>".$lang['lider']."</font>";
							break;
						case 2:
							$newrank = "<font color='yellow'>".$lang['asistan']."</font>";
							break;
						default:
							$newrank = "".$lang['uye']."";
							break;
						}
						$sira++;
				
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

                    if ($level == 83)
                    {
                        $reblevel2 = "/$reblevel";
                    }	
					else
					{
						$reblevel2 = "";
					}					
				?>
				<tr>
					<td><?=$sira;?></td>
					<td><div class="nationicon_<?=$nation;?>"></div><div class="job job_<?=$jobumnedir;?>"></div></td>			
					<td><a href="<?=$base_url;?>UserProfile/<?=trim(iconv('ISO-8859-9', 'UTF-8',$dbo->result('strUserID')));?>"><?=$dbo->result('strUserID')?></a></td>
					<td><?=$level;?><?=$reblevel2;?></td>
					<td><?=number_format($loyaltymonthly);?> / <?=number_format($loyalty);?></td>
					<td><?=$newrank;?></td>
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
<?
endif;
?>			
