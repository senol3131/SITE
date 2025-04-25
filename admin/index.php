<?php
ob_start();
session_start();

include('../system/config.inc.php');
$conn = @odbc_connect("".$db['db_name']."","".$db['db_user']."","".$db['db_pass']."");

define("FEAR", 1);

$tmpQuery = "SELECT * FROM _Odestashield_theme_settings";
$themeSettings = odbc_exec($conn, $tmpQuery) or die("error");

$select = odbc_exec($conn, "SELECT site_path FROM _Odestashield_Site");
$path = odbc_result($select,1);
$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/'.$path;

$themeColor = odbc_result($themeSettings, "admin_panel_header_color");


if ($_SESSION['admin'] == '1') {
    header("Location:".$base_url."index.php");
}elseif($_SESSION['admin'] == '') {
    header("Location:".$base_url."admin/login.php");
}
else {
if ($_SESSION['admin'] == '5'){
function v4guvenlik($text){
		$text = trim(htmlspecialchars($text));
		$search = array("'",'"',"TRUNCATE","truncate","UPDATE","update","SELECT","select","DROP","drop","DELETE","delete","WHERE","where","EXEC","exec","INSERT INTO","insert into","PROCEDURE","procedure","--");
		$replace = array("","","","","","","","","","","","","","","","","","","","","");
		$new_text = str_replace($search,$replace,$text);
		return $new_text;
	}

?>
<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<title>SRGAME Yönetim Paneli</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	   <style type="text/css" media="all">
		@import url("css/style.css");
		@import url("css/jquery.wysiwyg.css");
		@import url("css/facebox.css");
		@import url("css/visualize.css");
		@import url("css/date_input.css");
    </style>
	<!-- MAIN CSS -->
	<style type="text/css">
	    :root {
			--admin-theme: <?= $themeColor ?>;
		}
    </style>
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.img.preload.js"></script>
	<script type="text/javascript" src="js/jquery.filestyle.mini.js"></script>
	<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="js/jquery.date_input.pack.js"></script>

	<script type="text/javascript" src="js/facebox.js"></script>
	<script type="text/javascript" src="js/jquery.visualize.js"></script>
	<script type="text/javascript" src="js/jquery.select_skin.js"></script>
	<script type="text/javascript" src="js/ajaxupload.js"></script>
	<script type="text/javascript" src="js/jquery.pngfix.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script type="text/javascript" src="js/jscolor/jscolor.js"></script>
	
	<link rel="stylesheet" href="minified/themes/default.min.css" />
	<script src="minified/sceditor.min.js"></script>
	<script src="minified/formats/bbcode.js"></script>
	<script src="minified/formats/xhtml.js"></script>	
</head>
<body>
	<div id="wrapper">
		<div id="sidebar-nav" class="sidebar" >
		    <a href="index.php">
		    <img src="/theme/fusion/images/logo.png" class="top-img">
			</a>
			<div class="little-line"></div>
			<div class="sidebar-scroll">
				<nav>
						<ul class="nav">
	  <li>
		<a href="#anamenu" data-toggle="collapse" class="active main-category" aria-expanded="true">
		  <i class="lnr lnr-home"></i>
		  <span>Site Yönetimi</span>
		  <i class="icon-submenu lnr lnr-chevron-left"></i>
		</a>
		<div id="anamenu" class="active collapse in" aria-expanded="true">
		  <ul class="nav main-mmenu">
			<li>
			  <a href="#ayar-par" data-toggle="collapse" class="collapsed">
				<i class="fa fa-wrench"></i>
				<span>Ayarlar</span>
				<i class="icon-submenu lnr lnr-chevron-left"></i>
			  </a>
			  <div id="ayar-par" class="collapse ">
				<ul class="nav">
				  <li>
					<a href="index.php?sayfa=websettings">-Genel Ayarlar</a>
				  </li>
				  <li>
					<a href="index.php?sayfa=themesettings">-Tema Ayarları</a>
				  </li>
				</ul>
			  </div>
			</li>
			<li>
			  <a href="#Haberler" data-toggle="collapse" class="collapsed">
				<i class="fa fa-newspaper-o"></i>
				<span>Duyuru Yönetimi</span>
				<i class="icon-submenu lnr lnr-chevron-left"></i>
			  </a>
			  <div id="Haberler" class="collapse ">
				<ul class="nav">
				  <li>
					<a href="index.php?sayfa=addnews">-Duyuru Ekle</a>
				  </li>
				  <li>
					<a href="index.php?sayfa=listnews">-Düzenle / Sil</a>
				  </li>
				</ul>
			  </div>
			</li>
			<li>
			  <a href="#adminyonetimi" data-toggle="collapse" class="collapsed">
				<i class="fa fa-users"></i>
				<span>Admin Yönetimi</span>
				<i class="icon-submenu lnr lnr-chevron-left"></i>
			  </a>
			  <div id="adminyonetimi" class="collapse ">
				<ul class="nav">
				  <li>
					<a href="index.php?sayfa=addadmin">-Admin Oluştur</a>
				  </li>
				  <li>
					<a href="index.php?sayfa=listadmin">-Admin Listesi</a>
				  </li>
				</ul>
			  </div>
			</li>
			<li>
			  <a href="index.php?sayfa=slider" class="collapsed">
				<i class="fa fa-sliders"></i>
				<span>Slider Yönetimi</span>
			  </a>
			</li>
			<li>
			  <a href="index.php?sayfa=solalt1" class="collapsed">
				<i class="fa fa-cog"></i>
				<span>1. Etkinlik Ayarları</span>
			  </a>
			</li>
			<li>
			  <a href="index.php?sayfa=solalt2" class="collapsed">
				<i class="fa fa-cog"></i>
				<span>2. Etkinlik Ayarları</span>
			  </a>
			</li>
			<li>
			  <a href="index.php?sayfa=newedit">
				<i class="fa fa-envelope"></i>
				<span>Baş Haberi Düzenle</span>
			  </a>
			</li>
			<li>
			  <a href="index.php?sayfa=listlink" class="">
				<i class="fa fa-download"></i>
				<span>Dosya Yönetimi</span>
			  </a>
			</li>
		  </ul>
		</div>
	  </li>
	  
	  <!--<li>
		<a href="#gmtools" data-toggle="collapse" class="active main-category" aria-expanded="true">
		  <i class="fa fa-gamepad"></i>
		  <span>GM Araçları</span>
		  <i class="icon-submenu lnr lnr-chevron-left"></i>
		</a>
		<div id="gmtools" class="active collapse in" aria-expanded="true">
		  <ul class="nav main-mmenu">
			<li>
			  <a href="#krallar" data-toggle="collapse" class="collapsed">
				<i class="fa fa-trophy"></i>
				<span>Kral Yönetimi</span>
				<i class="icon-submenu lnr lnr-chevron-left"></i>
			  </a>
			  <div id="krallar" class="collapse ">
				<ul class="nav">
				  <li>
					<a href="#">-Tüm Krallar</a>
				  </li>
				  <li>
					<a href="#">-Kral Oluştur</a>
				  </li>
				</ul>
			  </div>
			</li>
			<li>
			  <a href="#gmyonetimi" data-toggle="collapse" class="collapsed">
				<i class="fa fa-user-md"></i>
				<span>GM Yönetimi</span>
				<i class="icon-submenu lnr lnr-chevron-left"></i>
			  </a>
			  <div id="gmyonetimi" class="collapse ">
				<ul class="nav">
				  <li>
					<a href="#">-Tüm GM'ler</a>
				  </li>
				  <li>
					<a href="#">-GM Oluştur</a>
				  </li>
				</ul>
			  </div>
			</li>
			<li>
			  <a href="#" class="collapsed">
				<i class="fa fa-cog"></i>
				<span>Upgrade Editor</span>
			  </a>
			</li>
		  </ul>
		</div>
	  </li>-->
	</ul>
				</nav>
			</div>
				<a href="/" style="position: absolute; left: 15px; bottom: 25px; color: #337ab7;" target="_blank"><i class="fa fa-arrow-left"></i><span style="margin-left: 1vh;">Siteye Dön</span></a>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="top-section">
		
			<div class="sidebar-profile">
			<img src="uploads/users/<?= $_SESSION['profile_image'] ?>" class="img-circle">
			<span style="color: white;"><?php echo $_SESSION["username"]; ?></span>
			<a href="logout.php">
			<i class="lnr lnr-exit"></i>
			</a>
			</div></div>
		<div class="main">
			<?php
	
     	$page =	v4guvenlik($_GET['sayfa']);
          $page = explode('.',$page);
          $page = $page[0];
          $uzanti = 'php';
		  
		  $toplamhesapquery = odbc_exec($conn, "select COUNT(strAccountID) 'ToplamHesap' from ACCOUNT_CHAR");
		  $toplamhesap = odbc_result($toplamhesapquery,1);
		  $toplamkarusquery = odbc_exec($conn, "select COUNT(strAccountID) 'ToplamHesap' from ACCOUNT_CHAR where bNation = 1");
		  $toplamkarus = odbc_result($toplamkarusquery,1);
		  $toplamhumanquery = odbc_exec($conn, "select COUNT(strAccountID) 'ToplamHesap' from ACCOUNT_CHAR where bNation = 2");
		  $toplamhuman = odbc_result($toplamhumanquery,1);
		  $toplamwarriorquery = odbc_exec($conn, "select COUNT(strUserID) 'ToplamWarrior' from USERDATA where Class % 100 IN (1,5,6)");
		  $toplamwarrior = odbc_result($toplamwarriorquery,1);		
		  $toplamroguequery = odbc_exec($conn, "select COUNT(strUserID) 'ToplamRogue' from USERDATA where Class % 100 IN (2,7,8)");
		  $toplamrogue = odbc_result($toplamroguequery,1);
		  $toplammagequery = odbc_exec($conn, "select COUNT(strUserID) 'ToplamMage' from USERDATA where Class % 100 IN (3,9,10)");
		  $toplammage = odbc_result($toplammagequery,1);
		  $toplampriestquery = odbc_exec($conn, "select COUNT(strUserID) 'ToplamPriest' from USERDATA where Class % 100 IN (4,11,12)");
		  $toplampriest = odbc_result($toplampriestquery,1);		  
				if($page == ''){
			?>
<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline" style="margin-top: 3vh;">
						<div class="panel-heading">
							<h3 class="panel-title">Yönetim Paneline Hoşgeldiniz!</h3>
							<p class="panel-subtitle">Kısayollar</p>
						</div>
						<div class="panel-body">
							<div class="row">
							    <a href="index.php?sayfa=websettings">
								<div class="col-md-4">
									<div class="metric blue">
										<span class="icon"><i class="fa fa-gear"></i></span>
										<p>
											<span class="number">Genel Ayarlar</span>
											<span class="title">Görüntüle</span>
										</p>
									</div>
								</div>
								</a>
							    <a href="index.php?sayfa=listnews">
								<div class="col-md-4">
									<div class="metric purple">
										<span class="icon"><i class="fa fa-bullhorn"></i></span>
										<p>
											<span class="number">Duyuru Yönetimi</span>
											<span class="title">Görüntüle</span>
										</p>
									</div>
								</div>
								</a>
							    <a href="index.php?sayfa=newedit">
								<div class="col-md-4">
									<div class="metric green">
										<span class="icon"><i class="fa fa-newspaper-o"></i></span>
										<p>
											<span class="number">Haber Yönetimi</span>
											<span class="title">Görüntüle</span>
										</p>
									</div>
								</div>
								</a>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Oyun İstatistikleri</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
									<div class="metric orange">
										<span class="icon"><i class="fa fa-male"></i></span>
										<p>
											<span class="number">Toplam Hesap</span>
											<span class="title"><?=$toplamhesap?></span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric dark-blue">
										<span class="icon"><i class="fa fa-money"></i></span>
										<p>
											<span class="number">Toplam Karus</span>
											<span class="title"><?=$toplamkarus?></span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric grey">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number">Toplam Human</span>
											<span class="title"><?=$toplamhuman?></span>
										</p>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-3">
									<div class="metric gradient-2">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number">Toplam Rogue</span>
											<span class="title"><?=$toplamrogue?></span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric gradient">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number">Toplam Priest</span>
											<span class="title"><?=$toplampriest?></span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric gradient-3">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number">Toplam Warrior</span>
											<span class="title"><?=$toplamwarrior?></span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric gradient-4">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number">Toplam Mage</span>
											<span class="title"><?=$toplammage?></span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				}else{
					if(file_exists('include/'.$page.'.'.$uzanti)){
						include('include/'.$page.'.'.$uzanti);
					}else{
						print '<center><br>Sayfa Bulunamadı!</br></center>';
					}
				
				}	
            ?>
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; <?= date("Y") ?> <a href="/" target="_blank">SRGAME</a>. All rights reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script>
	$(function() {

		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	
	
	</script>
</body>

</html>

<?php } } ?>"