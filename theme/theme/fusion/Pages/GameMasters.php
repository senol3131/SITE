		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->					
<div class="content-title">
	<h1 class="title"><center>Oyun Yöneticileri</center></h1>
</div><!-- content-title -->
<div class="wrapper-middle" style="padding: 60px;padding-top:10px;">
	<div class="media-block-i">

		<div class="tab-s media active" id="media-1">
			<div class="siralamalar">
				<table width="100%">
          <tbody><tr>
            <th class="topLine"><b>#</b></th>
			<th class="topLine">N|C</th>		
            <th class="topLine">Karakter Adi</th>
            <th class="topLine">Durum</th>
          </tr>

				<?php
					$i = 0;
					$ss = "SELECT strUserID,Class,Nation from USERDATA where Authority = 0 ORDER BY strUserID ASC";
					$genel = $dbo->doquery($ss);
					while($dbo->row($genel)):
					$isim 	 = $dbo->result('strUserID');
					$job 	 = $dbo->result('Class');
					$nation  = $dbo->result('Nation');
					
					# is gm online?
					$online = "SELECT Count(strAccountID) FROM CURRENTUSER WHERE STRCHARID = '".$dbo->result('strUserID')."'"; // CURRENTUSER'dan gm kontrolü yapar
					$dbo->query($online);
					
					if($dbo->results(1) == 1):
						$onlinemi = '<span class="online">Çevrimiçi</span>'; // eğer gm online ise ekrana yazdırır
					else:
						$onlinemi = '<span class="offline">Çevrimdışı</span>';	// eğer gm offline ise ekrana yazdırır
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
					
					$i++;
				
				?>
				<tr  style="font-size:11px">
					<td><?=$i;?></td>					
					<td><div class="nationicon_<?=$nation;?>"></div><div class="job job_<?=$jobumnedir;?>"></div></td>
					<td><?=$isim;?></td>
					<td><?=$onlinemi;?></td>				
				</tr>				
				<?php endwhile;?>
			</tbody></table>
</div>
    </div>
  </div>
</div>

</div>
</div>
</main>
<!--RIGHT--><?php include "/../right.php"; ?><!--RIGHT-->
			</div>
