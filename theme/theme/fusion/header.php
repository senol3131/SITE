<?php 

$dbo->doquery("SELECT * FROM _Odestashield_theme_settings");

$transparentHeader = $dbo->result(11);

$bottomAnnouncementText = $dbo->result(8);
$bottomAnnouncementColor = $dbo->result(9);

$button_1 = array($dbo->result(2), $dbo->result(3));
$button_2 = array($dbo->result(4), $dbo->result(5));
$button_3 = array($dbo->result(6), $dbo->result(7));

$backgroundImg = $dbo->result(12);

?>
<style>
body {
	background: url(/theme/fusion/images/body-bg-<?= $backgroundImg ?>.jpg) center top no-repeat, url(/theme/fusion/images/body-bg-bottom.jpg) center bottom no-repeat !important;
	background-color: black !important;
}

@media (max-width: 860px) {
	body {
		background: url(/theme/fusion/images/body-bg-1.jpg) -550px top no-repeat, url(/theme/fusion/images/body-bg-bottom.jpg) center bottom no-repeat !important;
		background-size: cover !important;
		background-color: black !important;
	}
	.footer {
		background: url(/theme/fusion/images/body-bg-bottom.jpg) center bottom no-repeat !important;
        background-size: cover !important;
		
		width: 1260px;
	}
	.container {
        margin-left: 1vh !important;
	}
}

</style>
<body>
	<div class="wrapper">
		<header class="header">
			<div class="menu-top <?= ($transparentHeader == 1) ? "shadow" : ""; ?>">
				<ul class="menu-top-left" style="justify-content: end;">
					<li class="active"><a href="/">Anasayfa</a></li>
					<li><a>Sıralamalar</a>
						<ul>
							<li><a href="<?=$base_url;?>UserRankings">Oyuncu Sıralaması</a></li>						
							<li><a href="<?=$base_url;?>YearlyRankings">Yıllık Sıralama</a></li>						
							<li><a href="<?=$base_url;?>MonthlyRankings">Aylık Sıralama</a></li>
							<li><a href="<?=$base_url;?>ClanRankings">Clan Sıralamalası</a></li>
							<li><a href="<?=$base_url;?>LevelRankings">Seviye Sıralaması</a></li>
							<li><a href="<?=$base_url;?>GameMasters" style="color: #9effa2">GM List</a></li>	
							<li><a href="<?=$base_url;?>ForbidUsers">Banlananlar</a></li>
						</ul>
					</li>
					<li><a href="<?=$base_url;?>Downloads">Download</a></li>
				</ul>
				<ul class="menu-top-right" style="justify-content: start;">
					<li><a style="letter-spacing: 1px;cursor: pointer;">Rehber</a>
						<ul>
							<li><a href="<?=$base_url;?>UpgradeRates">Upgrade Oranları</a></li>
							<li><a href="<?=$base_url;?>DropList">Drop Arama</a></li>
							<li><a href="<?=$base_url;?>ItemList">Item Arama</a></li>						
							<li><a href="<?=$base_url;?>quest">Günlük Görevler</a></li>							
							<li><a href="<?=$base_url;?>Minning">Maden Dropları</a></li>
							<li><a href="<?=$base_url;?>FragmentRates">Gem-Fragment-Kutu</a></li>

						</ul>
					</li>
					<li><a href="<?=$base_url;?>PowerUpStore">Power-up Store</a></li>
					
					<li><a href="<?=$forum_adress;?>" target="_blank" style="color: #9effa2">FORUM</a></li>
				</ul>
				<a href="/" class="server-load">
				<div>
				</div>
				</a>
			</div>
		</header>
		
<style>
#duyuru-alt {position:fixed; z-index:999999; bottom:0; left:0; right:0; margin:0 auto; text-align:center;
	width:100%;
	height:80px;
	color:GREEN;
	background:<?= $bottomAnnouncementColor ?>;
	-webkit-animation:duyuru 0.5s ease-in-out infinite alternate;
	animation:duyuru 1s ease-in-out infinite;
}

@-webkit-keyframes duyuru {
    0%   {background:<?= $bottomAnnouncementColor ?>; height:40px;}
    100% {background:<?= $bottomAnnouncementColor ?>; height:40px;}
}

#duyuru-alt span {
	color:GREEN;
	padding-top:10px;
	display:inline-block
}

#duyuru-alt span b { font-size:15px }

</style>	
<div id="duyuru-alt"><span><b><font color="white"><?= $bottomAnnouncementText ?></font> </b></span><br>
</div>
<style>
#lordiz a {
position: absolute;
bottom: 0px;
right: 0px;
position: fixed;
text-indent: -1000px;
width: 300px;
height: 140px;
overflow: hidden;
background: url("/theme/fusion/images/dc.png") 0 0 no-repeat;
}
</style>
<div id="lordiz"><a href="https://discord.gg/vRWSsTkNBW" "target="_blank" title="Discord Kanalımız"></a></div>
