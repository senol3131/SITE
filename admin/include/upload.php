<?php
	$klasor = 'C:/AppServ/www/theme/fusion/Images/';
	
	if ($_FILES['dosya_logo']['name'] != "") {
      $file = $_FILES['dosya_logo'];
      $format = $file['type'];
      $tmp = $file['tmp_name'];
	if ($format == "image/png") {
		$dir = $klasor . "logo.png";
		

		if(move_uploaded_file($tmp, $dir)) {
					echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Resim başarıyla yüklendi.
									</div>';
		} else
		{
					echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> Resim yüklenemedi
									</div>';
		}
	}else{
		$sonuc = '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> Lütfen dosyayı .png formatında yükleyiniz!
		</div>';
	}
    }
	if ($_FILES['dosya_favicon']['name'] != "") {
      $file = $_FILES['dosya_favicon'];
      $format = $file['type'];
      $tmp = $file['tmp_name'];
		$dir = $klasor . "favicon.ico";
		if(move_uploaded_file($tmp, $dir)) {
					echo '<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Resim başarıyla yüklendi.
									</div>';
		} else
		{
					echo '<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> Resim yüklenemedi.
									</div>';
		}
	}
?>