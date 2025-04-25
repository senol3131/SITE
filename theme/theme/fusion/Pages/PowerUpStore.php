		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->
<div class="content-title">
	<h1 class="title"><center>Power Up Store</center></h1>
</div><!-- content-title -->

	<div class="media-block-i">
		<div class="media-tab tab-button">
			<button data-tab="media-1" class="btn-block-s button-n" style="width: 32.9%;" onClick="getPremiumItem(0);return false;">All Items</button>
			<button data-tab="media-1" class="btn-block-s button-n" style="width: 32.9%;" onClick="getPremiumItem(2);return false;">Cosplay</button>
			<button data-tab="media-1" class="btn-block-s button-n" style="width: 32.9%;" onClick="getPremiumItem(3);return false;">Specials</button>
			<button data-tab="media-1" class="btn-block-s button-n" style="width: 32.9%;" onClick="getPremiumItem(4);return false;">Scrools</button>
			<button data-tab="media-1" class="btn-block-s button-n" style="width: 32.9%;" onClick="getPremiumItem(5);return false;">Familar</button>			
			<button data-tab="media-1" class="btn-block-s button-n" style="width: 32.9%;" onClick="getPremiumItem(6);return false;">Cash & Quest</button>
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
