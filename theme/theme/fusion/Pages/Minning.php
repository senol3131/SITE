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
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getMinningItem(389132000);return false;"><span data-tooltip="<span class='item_title white'>Mattock</span><span class='item_type white'>Non Upgrade Item</span><span class='item_kind'></span><span class='item_property white'><p>Weight : 0.10</p></span><span class='item_property lime'></span><span class='item_property white'></span>"><img src="<?=$base_url;?>itemicon.php?num=389132000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getMinningItem(389135000);return false;"><span data-tooltip="<span class='item_title white'>Golden Mattock</span><span class='item_type white'>Non Upgrade Item</span><span class='item_kind'></span><span class='item_property white'><p>Weight : 0.10</p></span><span class='item_property lime'></span><span class='item_property white'></span>"><img src="<?=$base_url;?>itemicon.php?num=389135000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getMinningItem(501610000);return false;"><span data-tooltip="<span class='item_title white'>Automatic Minning</span><span class='item_type white'>Non Upgrade Item</span><span class='item_kind'></span><span class='item_property white'><p>Weight : 0.10</p></span><span class='item_property lime'></span><span class='item_property white'></span>"><img src="<?=$base_url;?>itemicon.php?num=501610000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getMinningItem(510000000);return false;"><span data-tooltip="<span class='item_title white'>Automatic Minning + Robin Loot</span><span class='item_type white'>Non Upgrade Item</span><span class='item_kind'></span><span class='item_property white'><p>Weight : 0.10</p></span><span class='item_property lime'></span><span class='item_property white'></span>"><img src="<?=$base_url;?>itemicon.php?num=510000000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getMinningItem(191346000);return false;"><span data-tooltip="<span class='item_title white'>Fishing Rod's</span><span class='item_type white'>Non Upgrade Item</span><span class='item_kind'></span><span class='item_property white'><p>Weight : 0.10</p></span><span class='item_property lime'></span><span class='item_property white'></span>"><img src="<?=$base_url;?>itemicon.php?num=191346000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getMinningItem(191347000);return false;"><span data-tooltip="<span class='item_title white'>Golden Fishing Rod's</span><span class='item_type white'>Non Upgrade Item</span><span class='item_kind'></span><span class='item_property white'><p>Weight : 0.10</p></span><span class='item_property lime'></span><span class='item_property white'></span>"><img src="<?=$base_url;?>itemicon.php?num=191347000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getMinningItem(501620000);return false;"><span data-tooltip="<span class='item_title white'>Automatic Fishing</span><span class='item_type white'>Non Upgrade Item</span><span class='item_kind'></span><span class='item_property white'><p>Weight : 0.10</p></span><span class='item_property lime'></span><span class='item_property white'></span>"><img src="<?=$base_url;?>itemicon.php?num=501620000" alt = "" /></span></a>
		<a href="javascript:void(0);" data-tab="media-1" class="btn-block-s button-n" onClick="getMinningItem(520000000);return false;"><span data-tooltip="<span class='item_title white'>Automatic Fishing + Robin Loot</span><span class='item_type white'>Non Upgrade Item</span><span class='item_kind'></span><span class='item_property white'><p>Weight : 0.10</p></span><span class='item_property lime'></span><span class='item_property white'></span>"><img src="<?=$base_url;?>itemicon.php?num=520000000" alt = "" /></span></a>
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
