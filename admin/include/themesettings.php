<?php 

if(!defined('FEAR')) {header("HTTP/1.1 403 Forbidden")&die('403.14 - Directory listing denied.'); } 

if (isset($_POST['save'])) {
	$bottomAnnouncementText = $_POST['bottom-announcement-text'];
	$bottomAnnouncementColor = $_POST['bottom-announcement-color'];
	$adminPanelHeaderColor = $_POST['admin-panel-header-color'];
	$transparentHeader = $_POST['transparent-header'];
	$tmpbackgroundImg = $_POST['background-img'];
	
	$tmpInsertQuery = odbc_exec($conn, "UPDATE _Odestashield_theme_settings SET bottom_announcement_text = '$bottomAnnouncementText', bottom_announcement_color = '$bottomAnnouncementColor', admin_panel_header_color = '$adminPanelHeaderColor', transparent_header = '$transparentHeader', background_img = '$tmpbackgroundImg'");
}
if (isset($_POST['button-id'])) {
	$button_text = $_POST['button-text'];
	$button_url = $_POST['button-url'];
	$button_id = $_POST['button-id'];
	
	$tmpInsertQuery = odbc_exec($conn, "UPDATE _Odestashield_theme_settings SET button_" . $button_id . "_title = '$button_text', button_" . $button_id . "_url = '$button_url'");
}
$tmpQuery = "SELECT * FROM _Odestashield_theme_settings";
$themeSettings = odbc_exec($conn, $tmpQuery) or die("error");

$button1 = odbc_result($themeSettings, "button_1_title");
$button2 = odbc_result($themeSettings, "button_2_title");
$button3 = odbc_result($themeSettings, "button_3_title");

$button_url1 = odbc_result($themeSettings, "button_1_url");
$button_url2 = odbc_result($themeSettings, "button_2_url");
$button_url3 = odbc_result($themeSettings, "button_3_url");

$transparentHeader = odbc_result($themeSettings, "transparent_header");
$backgroundImg = odbc_result($themeSettings, "background_img");

echo $backgroundImg;

if ($_FILES) {
	include "upload.php";
}

?>
			<div class="main-content">
				<div class="container-fluid">
					<h2 class="page-title">Tema Ayarları</h2>
					<div class="panel panel-headline">
						<div class="panel-body">
				        <?php if (isset($tmpInsertQuery)): ?>
				          <?php if ($tmpInsertQuery): ?>
						        <div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> Site ayarları güncellendi.
							    </div>
				          <?php else: ?>
						        <div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> Site ayarları güncellenemedi.
								</div>
				          <?php endif; ?>
				        <?php endif; ?>
				        <label>Hızlı Butonlar</label>
                        <button class="theme-collapsible">Buton 1</button>
                        <div class="theme-content">
						    <form action="index.php?sayfa=themesettings" method="post">
                            <label style="margin-top:1vh;">Düğme URL</label>
                            <input type="text" name="button-url" class="form-control" value="<?= $button_url1; ?>">
                            <label>Başlık</label>
                            <input type="text" name="button-text" class="form-control" value="<?= $button1; ?>">
                            <input type="hidden" name="button-id" class="form-control" value="1">
                            <button type="submit">Kaydet</button>
							</form>
                        </div>
                        <button class="theme-collapsible">Buton 2</button>
                        <div class="theme-content">
						    <form action="index.php?sayfa=themesettings" method="post">
                            <label style="margin-top:1vh;">Düğme URL</label>
                            <input type="text" name="button-url" class="form-control" value="<?= $button_url2; ?>">
                            <label>Başlık</label>
                            <input type="text" name="button-text" class="form-control" value="<?= $button2 ?>">
                            <input type="hidden" name="button-id" class="form-control" value="2">
                            <button type="submit">Kaydet</button>
							</form>
                        </div>
                        <button class="theme-collapsible">Buton 3</button>
                        <div class="theme-content">
						    <form action="index.php?sayfa=themesettings" method="post">
                            <label style="margin-top:1vh;">Düğme URL</label>
                            <input type="text" name="button-url" class="form-control" value="<?= $button_url3; ?>">
                            <label>Başlık</label>
                            <input type="text" name="button-text" class="form-control" value="<?= $button3 ?>">
                            <input type="hidden" name="button-id" class="form-control" value="3">
                            <button type="submit">Kaydet</button>
							</form>
                        </div>
						
				<form action="index.php?sayfa=themesettings" method="post" enctype="multipart/form-data">
				
						<label style="margin-top: 1vh;">Arkaplan Fotoğrafı</label>
						<div class="row">
						   <div class="col-md-4" style="display: flex; flex-direction: column;align-items: center;">
				              <label style="margin-top: 1vh; color: var(--admin-theme);">#1</label>
							  <label for="bg-img-1"><img src="/theme/fusion/images/body-bg-0.jpg" class="background-img-holder" title="/theme/fusion/images/body-bg-0.jpg"></label>
						      <input id="bg-img-1" type="radio" name="background-img" style="margin-left: 1vh;" class="form-control" <?= ($backgroundImg) == 0 ? "checked" : ""; ?> value="0">
						   </div>
						   <div class="col-md-4" style="display: flex; flex-direction: column;align-items: center;">
				              <label style="margin-top: 1vh; color:var(--admin-theme);">#2</label>
							  <label for="bg-img-2"><img src="/theme/fusion/images/body-bg-1.jpg" class="background-img-holder" title="/theme/fusion/images/body-bg-1.jpg"></label>
						      <input id="bg-img-2" type="radio" name="background-img" style="margin-left: 1vh;" class="form-control" <?= ($backgroundImg) == 1 ? "checked" : ""; ?> value="1">
						   </div>
						   
						   <div class="col-md-4" style="display: flex; flex-direction: column;align-items: center;">
				              <label style="margin-top: 1vh; color:var(--admin-theme);">#3</label>
							  <label for="bg-img-3"><img src="/theme/fusion/images/body-bg-2.jpg" class="background-img-holder" title="/theme/fusion/images/body-bg-2.jpg"></label>
						      <input id="bg-img-3" type="radio" name="background-img" style="margin-left: 1vh;" class="form-control" <?= ($backgroundImg) == 2 ? "checked" : ""; ?> value="2">
						   </div>
						</div>
						<div class="row">
						   <div class="col-md-6">
				              <label style="margin-top: 3vh;">Alt Duyuru Metni</label>
                              <input type="text" name="bottom-announcement-text" class="form-control" value="<?= odbc_result($themeSettings, "bottom_announcement_text") ?>">
						   </div>
						   <div class="col-md-6">
				              <label style="margin-top: 3vh;">Alt Duyuru Rengi</label>
                              <input type="color" name="bottom-announcement-color" class="form-control" value="<?= odbc_result($themeSettings, "bottom_announcement_color") ?>">
						   </div>
						</div>
						<label style="margin-top: 2vh;">Yönetim Paneli Tema Rengi</label>
						<input id="theme-color" type="color" name="admin-panel-header-color" class="form-control" value="<?= odbc_result($themeSettings, "admin_panel_header_color") ?>">
						
						<label style="margin-top: 2vh;">Saydam Header</label>
						<div class="row">
						   <div class="col-md-6" style="display: flex">
				              <label style="margin-top: 1vh; color: var(--admin-theme);">Aktif</label>
						      <input type="radio" name="transparent-header" style="margin-left: 1vh;" class="form-control" <?= ($transparentHeader) == 1 ? "checked" : ""; ?> value="1">
						   </div>
						   <div class="col-md-6" style="display: flex">
				              <label style="margin-top: 1vh; color:var(--admin-theme);">Deaktif</label>
						      <input type="radio" name="transparent-header" style="margin-left: 1vh;" class="form-control" <?= ($transparentHeader) == 0 ? "checked" : ""; ?> value="0">
						   </div>
						</div>
						
						<label style="margin-top: 2vh;">Logo Yükle</label>
						<p style=" display: flex; flex-direction: column;">
							<img src="/theme/fusion/images/logo.png" style="width: 300px;">
							<input type="file" name="dosya_logo" class="form-control-file" style="margin-top: 1vh;"/>
						</p>
						<label style="margin-top: 2vh;">Favicon Yükle</label>
						<p style=" display: flex; flex-direction: column;">
							<img src="/theme/fusion/images/favicon.ico" style="width: 64px;">
							<input type="file" name="dosya_favicon" class="form-control-file" style="margin-top: 1vh;"/>
						</p>
						<p>
							<input type="submit" class="btn btn-primary" style="width: 100%;" name="save" value="Kaydet" />
						</p>
				</form>
						</div>
					</div>
				</div>
				
			</div>

<script>

var colorPicker = document.getElementById('theme-color');

const colorHandler = function(e) {
  document.body.style.setProperty("--admin-theme", e.target.value);
}

colorPicker.addEventListener('input', colorHandler);
colorPicker.addEventListener('propertychange', colorHandler);



var coll = document.getElementsByClassName("theme-collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function(event) {
	  event.preventDefault();
    this.classList.toggle("theme-active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>