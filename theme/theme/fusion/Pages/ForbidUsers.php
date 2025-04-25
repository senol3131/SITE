		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->					
<div class="content-title">
	<h1 class="title"><center>Banlılar Listesi</center></h1>
</div><!-- content-title -->
<div class="wrapper-middle" style="padding: 60px;padding-top:10px;">
	<div class="media-block-i">

		<div class="tab-s media active" id="media-1">

        <table width="100%" id="bannedlisttable">
          <tbody><tr>
            <th class="topLine"><b>#</b></th>
            <th class="topLine">Karakter Adi</th>
          </tr>

				<?php
					$i = 0;
					$ss = "SELECT TOP 100 UD.strUserID, UD.Class, UD.Level, UD.Nation, UD.Loyalty, UD.Knights, KD.IDName AS KnightName, UD.LoyaltyMonthly FROM USERDATA AS UD LEFT JOIN KNIGHTS AS KD ON UD.Knights = KD.IDNUM WHERE UD.AUTHORITY = 255 ORDER BY UD.Loyalty DESC";
					$genel = $dbo->doquery($ss);
					while($dbo->row($genel)):
					$isim 	 = $dbo->result('strUserID');
					$job 	 = $dbo->result('Class');
					$nation  = $dbo->result('Nation');
					$level   = $dbo->result('Level');
					$loyalty = $dbo->result('Loyalty');
					
					#find clan / check clan
					if($dbo->result('KnightName') == true):
						$clanname = $dbo->result('KnightName'); // eğer kullanıcı clanda ise clan adını yazar
					else:
						$clanname = '';	// eğer kullanıcı clanda değil ise boş bırakır
					endif;
					
					$i++;
				
				?>
				<tr  style="font-size:11px">
					<td><?=$i;?></td>
					<td style="color: #ff7070;text-shadow: 0px 0px 17px red;"><?=$isim;?></td>
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
