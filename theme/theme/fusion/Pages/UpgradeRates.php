		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->
<div class="content-title">
	<h1 class="title"><center>UPGRADE ORANLARI</center></h1>
</div><!-- content-title -->

	<div class="media-block-i">
		<div class="media-tab tab-button">
<ul class="item_half_center">		
		<center>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getUpgradeItem(379021000);return false;"><span data-tooltip="<?=$dbo->itemozellik(379021000); ?>"><img src="<?=$dbo->get_item_image(379021000); ?>" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getUpgradeItem(700002000);return false;"><span data-tooltip="<?=$dbo->itemozellik(700002000); ?>"><img src="<?=$base_url;?>itemicon.php?num=700002000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getUpgradeItem(379016000);return false;"><span data-tooltip="<?=$dbo->itemozellik(379016000); ?>"><img src="<?=$base_url;?>itemicon.php?num=379220000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getUpgradeItem(379205000);return false;"><span data-tooltip="<?=$dbo->itemozellik(379205000); ?>"><img src="<?=$base_url;?>itemicon.php?num=379205000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getUpgradeItem(379221000);return false;"><span data-tooltip="<?=$dbo->itemozellik(379221000); ?>"><img src="<?=$base_url;?>itemicon.php?num=379221000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getUpgradeItem(379159000);return false;"><span data-tooltip="<?=$dbo->itemozellik(379159000); ?>"><img src="<?=$base_url;?>itemicon.php?num=379159000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getUpgradeItem(379257000);return false;"><span data-tooltip="<?=$dbo->itemozellik(379257000); ?>"><img src="<?=$base_url;?>itemicon.php?num=379257000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getUpgradeItem(379258000);return false;"><span data-tooltip="<?=$dbo->itemozellik(379258000); ?>"><img src="<?=$base_url;?>itemicon.php?num=379258000" alt = "" /></span></a>
		</center>		
</ul>		
		</div>
	<div class="tab-s media" id="media-1">
	
		<div id="loader" style="margin-top: 50px;
		margin-left: 250px;"><img src="<?=$path;?>images/loader.gif" /><br><center>Bu işlem biraz uzun sürebilir. Sabrınız için teşekkürler.</center></div>
		<div id="dropResponse" style="margin-top:10px; width:100%;"></div>
		
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
