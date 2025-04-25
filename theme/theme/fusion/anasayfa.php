<!-- SLIDER -->
<?php
$dbo->doquery("SELECT * FROM _Odestashield_Slider");
$SliderCount = $dbo->result(1);
$data1 = array($dbo->result(2),$dbo->result(3),$dbo->result(4),$dbo->result(5),$dbo->result(6),$dbo->result(7),$dbo->result(8),$dbo->result(9),$dbo->result(10),$dbo->result(11));

?>

	<p><center><MARQUEE>
		<span style="color: #00FF00; font-size: 18px; font-weight: bold;">
			[NOTICE]:
		</span>
		<span style="color: #FF6633; font-size: 18px; font-weight: bold;">
			Serverımız Official Olarak Açılmıştır !!
		</span>
	</MARQUEE></p></center>
	
	
<div id="slider">
	<div class="slider">
		<ul>
			<?php
			$i = 1;
			while($i <= $SliderCount):
				echo '<li><a href="'.$data1[$i].'" target="blank"><img src="'.$path.'images/slider'.$i.'.jpg" width="614" height="286" alt=""></a></li>';
				$i++;
			endwhile;	
			?>
		</ul>
	</div>
	
	<div class="sliderButton">
		<ul>
			<?php
			$i = 1;
			while($i <= $SliderCount):
				echo '<li><a href="javascript:void(0)">'.$i.'</a></li>';
				$i++;
			endwhile;	
			?>		
		</ul>
	</div>
</div>
<!--#SLIDER -->

<!--<div class="slider">
	<img src="<?=$path;?>images/slider-img-new2.jpg" width="100%;">
</div>-->

<center><img src="<?=$path;?>images/divider.png"/></center>
<!--Haber Start-->
<div class="right-content-block-info">
	<div class="news-block">
		<div class="content-title">
			<span class="title">Son Haberler</span>
		</div>
<div class="tab-n news active" id="news-1">
			<div class="last-news-block">
				<div class="news-img">
					<img src="<?=$path;?>images/haber.jpg" alt="news-img">
				</div>
				<div class="last-news-info">
					<?php
						$dbo->doquery("SELECT * FROM _Odestashield_NEWS");
						$NewsTitle = $dbo->result(1);
						$NewsDescription = $dbo->result(2);
					?>				
					<h2 title="<?=$NewsTitle;?>"><?=$NewsTitle;?></h2>
					<div class="news-text"><?=$NewsDescription;?></div>

				</div>

			</div>		
			<center><img src="<?=$path;?>images/divider.png"/></center>		
		    <div class="content-title">
			      <span class="title">Duyurular</span>
		    </div>		
			
			<?php
			//<span>'.iconv("WINDOWS-1254","UTF-8", $dbo->result(1)).'</span> - '.$dbo->result(2).'
			$Duyurular = $dbo->doquery("select Top 10 FORMAT(CAST(DateX as Date), 'D', 'tr-TR') as Tarih, Description FROM _Odestashield_Duyuru order by DateX desc");
			while($dbo->row($Duyurular)):
			echo '
				<div class="news-info">
					
					'.$dbo->result(2).'
				</div>			
			';
			endwhile;
			?>
			<center><img src="<?=$path;?>images/divider.png"/></center>	
</div>
</div>
</div>
<!--Haber End-->