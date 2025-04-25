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
		<img src="https://i.hizliresim.com/4qb1rt5.png" width="650" height="45" alt=""></a>
		<img src="https://i.hizliresim.com/r87keck.png" width="650" height="644" alt=""></a>
		<img src="https://i.hizliresim.com/708v3l6.png" width="650" height="45" alt=""></a>
		<img src="https://i.hizliresim.com/5ew0g86.png" width="650" height="45" alt=""></a>
		<img src="https://i.hizliresim.com/r3g625c.png" width="650" height="45" alt=""></a>
		<img src="https://i.hizliresim.com/a9wk6tl.png" width="650" height="644" alt=""></a>

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
