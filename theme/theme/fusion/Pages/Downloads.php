<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->					
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->	
<div class="content-title">
	<h1 class="title"><center>Downloads</center></h1>
</div><!-- content-title -->
<div class="wrapper-middle" style="padding: 60px;padding-top:10px;">
	<div class="media-block-i">

		<div class="tab-s media active" id="media-1">








        <table width="100%" id="bannedlisttable">
          <tbody><tr>
            <th class="topLine"><b>#</b></th>
            <th class="topLine">Açıklama</th>
            <th class="topLine">Link</th>
          </tr>



				<?PHP
					$i = 0;
					$download = $dbo->doquery("SELECT title$site_dil as title,url,tarih,color FROM _Odestashield_Download ORDER BY id ASC");
					while($dbo->row($download)):
					$title = $dbo->result('title');
					$url = $dbo->result('url');
					$tarih = $dbo->result('tarih');
					$renq = $dbo->result('color');
					$i++;												
				?>
				
        <tr  style="font-size:11px">
            <td><?=$i;?></td>
            <td style="color:<?=$renq;?>;"><?=$title;?></td>            
			<td><a href="<?=$url;?>" target="_blank " style="color: #9effa2;text-shadow: 0px 0px 17px lime;">İndir</a></td>
			
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