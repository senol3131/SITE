<?php

/**
 *	@author		: 	FEAR
 * 	@copyright    :    2020
 *
 */
class dbo {
    function __construct($dbdata, $dbuser, $dbpass) {
        try {
            if (!$this->link = odbc_connect($dbdata, $dbuser, $dbpass)) {
                throw new Exception('Veritabanina baglanilamadi!');
            }
        }
        catch(Exception $dbo) {
            die($dbo->getMessage());
        }
    }
    function security($text) {
        $text = trim($text);
        $search = array('', '', '', '', '', '', '', '', '', '', '', '', ',');
        $replace = array('C', 'c', 'G', 'g', 'i', 'I', 'O', 'o', 'S', 's', 'U', 'u');
        $new_text = str_replace($search, $replace, $text);
        return $new_text;
    }
    function doquery($query) {
        try {
            if (!$this->ver = odbc_exec($this->link, $query)) {
                throw new Exception('Sorguda hata olustu.');
            }
        }
        catch(Exception $dbo) {
            die($dbo->getMessage());
        }
    }
    function query($sorgu) {
        try {
            if (!$this->query = odbc_exec($this->link, $sorgu)) {
                throw new Exception('Sorguda hata olustu.');
            }
        }
        catch(Exception $dbo) {
            die($dbo->getMessage());
        }
    }
    function result($write) {
        return odbc_result($this->ver, $write);
    }
    function results($write) {
        return odbc_result($this->query, $write);
    }
    function row() {
        return odbc_fetch_row($this->ver);
    }
    function rows() {
        return odbc_fetch_row($this->query);
    }
    function fetch() {
        odbc_fetch_array($this->ver);
    }
    function __desctruct() {
        odbc_free_result();
        odbc_close($this->link);
    }
	
	public function uyari( $c )
    {
        echo "<script type=\"text/javascript\">alert(\"".$c."\");</script>";
    }

    public function yonlendir( $url, $zaman )
    {
        echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"".$zaman.";URL=".$url."\">";
    }
    function SQLSecurity($text) {
        $text = trim(htmlspecialchars($text));
        $search = array("'", '"', "TRUNCATE", "truncate", "UPDATE", "update", "SELECT", "select", "DROP", "drop", "DELETE", "delete", "WHERE", "where", "EXEC", "exec", "INSERT INTO", "insert into", "PROCEDURE", "procedure", "--");
        $replace = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
        $new_text = str_replace($search, $replace, $text);
        return $new_text;
    }
	
	function time_convert($zaman) {
		$zaman = (!is_numeric($zaman) ? strtotime($zaman) : $zaman);
		$zaman_farki = time() - $zaman;
		$saniye = $zaman_farki;
		$dakika = round($zaman_farki / 60);
		$saat = round($zaman_farki / 3600);
		$gun = round($zaman_farki / 86400);
		$hafta = round($zaman_farki / 604800);
		$ay = round($zaman_farki / 2419200);
		$yil = round($zaman_farki / 29030400);
		if( $saniye < 60 ) 
		{
			if( $saniye == 0 ) 
			{
				return "az önce";
			}

			return $saniye . " saniye önce";
		}

		if( $dakika < 60 ) 
		{
			return $dakika . " dakika önce";
		}

		if( $saat < 24 ) 
		{
			return $saat . " saat önce";
		}

		if( $gun < 7 ) 
		{
			return $gun . " gün önce";
		}

		if( $hafta < 4 ) 
		{
			return $hafta . " hafta önce";
		}

		if( $ay < 12 ) 
		{
			return $ay . " ay önce";
		}

		return $yil . " yıl önce";
	}

	function tr_time($time = "", $format = "j F Y, l H:i"){
		if( empty($time) ) 
		{
			$time = date("Y-m-d H:i");
		}

		if( !is_numeric($time) ) 
		{
			$z = date($format, strtotime($time));
		}

		$donustur = array( "Monday" => "Pazartesi", "Tuesday" => "Salı", "Wednesday" => "Çarşamba", "Thursday" => "Perşembe", "Friday" => "Cuma", "Saturday" => "Cumartesi", "Sunday" => "Pazar", "January" => "Ocak", "February" => "Şubat", "March" => "Mart", "April" => "Nisan", "May" => "Mayıs", "June" => "Haziran", "July" => "Temmuz", "August" => "Ağustos", "September" => "Eylül", "October" => "Ekim", "November" => "Kasım", "December" => "Aralık", "Mon" => "Pts", "Tue" => "Sal", "Wed" => "Çar", "Thu" => "Per", "Fri" => "Cum", "Sat" => "Cts", "Sun" => "Paz", "Jan" => "Oca", "Feb" => "Şub", "Mar" => "Mar", "Apr" => "Nis", "Jun" => "Haz", "Jul" => "Tem", "Aug" => "Ağu", "Sep" => "Eyl", "Oct" => "Eki", "Nov" => "Kas", "Dec" => "Ara" );
		foreach( $donustur as $en => $tr ) 
		{
			$z = str_replace($en, $tr, $z);
		}
		if( strpos($z, "Mayıs") !== false && strpos($format, "F") === false ) 
		{
			$z = str_replace("Mayıs", "May", $z);
		}

		return $z;
	}
		
	function server_time()
	{
		echo date('j F Y, l');
	}
	
	function title($pageTitle)
	{
		return $pageTitle;
	}
	
	function get_item_image($item_id)
	{
	$resim = "theme/fusion/inventory/itemicon/" . substr($item_id,0,1) . "_" . substr($item_id,1,4) . "_" . substr($item_id,5,1) . "0_0.jpg";
	if(file_exists($resim))
	{
	return $resim;
	}
	else
	{
	return "theme/fusion/inventory/itemicon/none.jpg";
	}
	}
	
	function GetZone($zone)
	{
		switch ($zone)
		{
		case 1:
			return 'Luferson Casle';
		case 2:
			return 'El Morad Castle';		
		case 5:
			return 'Luferson Castle II';		
		case 6:
			return 'Luferson Castle III';		
		case 7:
			return 'El Morad Castle II';		
		case 8:
			return 'El Morad Castle III';
		case 11:
			return 'Karus Eslant';
		case 12:
			return 'ElMorad Eslant';		
		case 13:
			return 'Karus Eslant II';		
		case 14:
			return 'Karus Eslant III';		
		case 15:
			return 'Elmorad Eslant II';		
		case 16:
			return 'Elmorad Eslant III';
		case 18:
			return 'Old Karus';			
		case 21:
			return 'Moradon';		
		case 22:
			return 'Moradon II';		
		case 23:
			return 'Moradon III';		
		case 24:
			return 'Moradon IV';		
		case 25:
			return 'Moradon V';
		case 28:
			return 'Old Human';
		case 29:
			return 'Old Moradon';			
		case 30:
			return 'Delos';
		case 31:
			return 'Bifrost';
		case 32:
			return 'Desperation Abyss';
		case 33:
			return 'Hell Abyss';
		case 34:
			return 'Felankor Lair';		
		case 35:
			return 'Delos Basement';	
		case 36:
			return 'Test';				
		case 48:
			return 'BattleField';
		case 51:
			return 'Orc Arena';
		case 52:
			return 'Blood Don Arena';
		case 53:
			return 'Goblin Arena';
		case 54:
			return 'Caitharos Arena';
		case 55:
			return 'Kellino Temple';
		case 61:	
			return 'Napies Gorge';
		case 62:	
			return 'Alseids Prairie';
		case 63:	
			return 'Nieds Triangle';
		case 64:	
			return 'Nereids Island';
		case 65:	
			return 'Zipang';
		case 66:	
			return 'Oreads';
		case 67:	
			return 'Test Zone';
		case 69:	
			return 'Snow War';
		case 71:	
			return 'Ronark Land';
		case 72:	
			return 'Ardream';
		case 73:	
			return 'Ronark Land Base';
		case 74:	
			return 'Test Zone';			
		case 75:
			return 'Krowaz Domion';		
		case 76:
			return 'Knight Royale';		
		case 77:
			return 'Clan War Ardream';	
		case 78:
			return 'Clan War Ronark Land';				
		case 81:
			return 'Monster Stone';		
		case 82:
			return 'Monster Stone II';		
		case 83:
			return 'Monster Stone III';	
		case 84:
			return 'Border Defance War';	
		case 85:
			return 'Chaos Dengueon';
		case 86:
			return 'Under The Castle';
		case 87:
			return 'Juraid Mountain';
		case 88:
			return 'Lk War';
		case 89:
			return 'Dungeon Defence';
		case 91:
			return 'Delos Basement [WAR]';			
		case 92:
			return 'Prison';
		case 93:
			return 'Isillion Lair';
		case 94:
			return 'Felankor Lair';
		case 95:
			return 'Drakis Tower';
		case 96:
			return 'Party War 1';
		case 97:
			return 'Party War 2';
		case 98:
			return 'Party War 3';
		case 99:
			return 'Party War 4';			
		default:
			return 'Unkown Zone';
		}
	}	
	
	/*function GetZone($zone)
	{
		switch ($zone)
		{
		case 1:
			return 'Luferson Casle';
		case 2:
			return 'El Morad Castle';		
		case 5:
			return 'Luferson Castle II';		
		case 6:
			return 'Luferson Castle III';		
		case 7:
			return 'El Morad Castle II';		
		case 8:
			return 'El Morad Castle III';
		case 11:
			return 'Karus Eslant';
		case 12:
			return 'ElMorad Eslant';		
		case 13:
			return 'Karus Eslant II';		
		case 14:
			return 'Karus Eslant III';		
		case 15:
			return 'Elmorad Eslant II';		
		case 16:
			return 'Elmorad Eslant III';
		case 21:
			return 'Moradon';		
		case 22:
			return 'Moradon II';		
		case 23:
			return 'Moradon III';		
		case 24:
			return 'Moradon IV';		
		case 25:
			return 'Moradon V';
		case 30:
			return 'Delos';
		case 31:
			return 'Bifrost';
		case 32:
			return 'Desperation Abyss';
		case 33:
			return 'Hell Abyss';
		case 48:
			return 'BattleField';
		case 51:
			return 'Orc Arena';
		case 52:
			return 'Blood Don Arena';
		case 53:
			return 'Goblin Arena';
		case 54:
			return 'Caitharos Arena';
		case 55:
			return 'Kellino Temple';		
		case 75:
			return 'Krowaz Domion';		
		case 81:
			return 'Monster Stone';		
		case 82:
			return 'Monster Stone II';		
		case 83:
			return 'Monster Stone III';	
		case 92:
			return 'Prison';
		case 101:
			return 'Napies Gorge';
		case 102:
			return 'Alseids Prairie';
		case 103:
			return 'Neids Triangle';
		case 111:
			return 'Snow Fight Zone';
		case 201:
			return 'Colony Zone';
		case 202:
			return 'Ardream';
		case 203:
			return 'Juraid Mountain';
		default:
			return 'Unkown Zone';
		}
	}*/
	
	function licence_control($hk) {
        global $scripturl;
        if (!empty($_SERVER['SERVER_NAME'])) $site = $_SERVER['SERVER_NAME'];
        elseif (!empty($_SERVER['HTTP_HOST'])) $site = $_SERVER['HTTP_HOST'];
        else $site = preg_match('~(http|ftp)[s]?:\/\/[w\.]*([a-zA-Z0-9\.]+)\/~i', $scripturl, $match) ? $match[2] : '';
        if (empty($site)) return;
        if (strpos($site, 'www.') !== false) $site = substr($site, 4);
        $halitkarakoc = sha1(sha1(sha1(md5(md5(md5($site . 'bunucalaninanasinisikiyim'))))) . 'bunucalaninanasinisikiyim*/');
        $halitkarakoc = substr($halitkarakoc, 0, 25);
        $halitkarakoc = wordwrap($halitkarakoc, 5, '-', true);
        if ($halitkarakoc != $hk || $halitkarakoc !== $hk) die('
	    <head>
		<title>Lisanssız Kullanım</title>
		<style type="text/css">
		 
		body {
		background-color:   #fff;
		margin:40px;
		font-family:Lucida Grande, Verdana, Sans-serif;
		font-size:12px;
		color:#000;
		}
		 
		#content  {
		border:#999 1px solid;
		background-color:   #fff;
		padding:    20px 20px 12px 20px;
		}
		 
		h1 {
		font-weight:normal;
		font-size:14px;
		color:#990000;
		margin:0 0 4px 0;
		}
		.dort {
			font-weight:bold;
			font-size: 36px;
			color:#990000;
		}
		 
		</style>
		</head>
		<body>
			<div id="content">
				<h1><span class="dort">Hata</span> Lisanssız Kullanım</h1>
				<p>FEAR Panel yetkili satıcısından lisans satın alın!</p>
				<p>Purchase a license from an authorized dealer of FEAR Panel!</p>
		</div>
		 
		</body>
		</html>');
    }
	
	function itemozellik ($item)
	{
	include CONFIG . "config.inc.php";
	$dbname = $db['db_name'];
	$dbuser = $db['db_user'];
	$dbpass = $db['db_pass'];		
	$conn = odbc_connect("$dbname","$dbuser","$dbpass");	
	$itemal=odbc_exec($conn,"SELECT * FROM ITEM left join SET_ITEM on ITEM.Num = SET_ITEM.SetIndex WHERE Num = '" . $item . "'");
	$Num			=	odbc_result($itemal,'Num');
	$ItemType		=	odbc_result($itemal,'ItemType');
	$Kind			=	odbc_result($itemal,'Kind');
	$strName		=	odbc_result($itemal,'strName');
	$Damage			=	odbc_result($itemal,'Damage');
	$Delay			=	odbc_result($itemal,'Delay');
	$Range			=	odbc_result($itemal,'Range');
	$Hitrate		=	odbc_result($itemal,'Hitrate');
	$Evasionrate	=	odbc_result($itemal,'Evasionrate');
	$Weight			=	odbc_result($itemal,'Weight');
	$Duration		=	odbc_result($itemal,'Duration');
	$Ac				=	odbc_result($itemal,'Ac');
	$DaggerAc		=	odbc_result($itemal,'DaggerAc');
	$SwordAc		=	odbc_result($itemal,'SwordAc');
	$MaceAc			=	odbc_result($itemal,'MaceAc');
	$AxeAc			=	odbc_result($itemal,'AxeAc');
	$SpearAc		=	odbc_result($itemal,'SpearAc');
	$BowAc   		=	odbc_result($itemal,'BowAc');
	$FireDamage		=	odbc_result($itemal,'FireDamage');
	$IceDamage		=	odbc_result($itemal,'IceDamage');
	$LightningDamage=	odbc_result($itemal,'LightningDamage');
	$PoisonDamage	=	odbc_result($itemal,'PoisonDamage');
	$HPDrain		=	odbc_result($itemal,'HPDrain');
	$MPDamage		=	odbc_result($itemal,'MPDamage');
	$MPDrain		=	odbc_result($itemal,'MPDrain');
	$MirrorDamage	=	odbc_result($itemal,'MirrorDamage');
	$StrB			=	odbc_result($itemal,'StrB');
	$StaB			=	odbc_result($itemal,'StaB');
	$MaxHpB			=	odbc_result($itemal,'MaxHpB');
	$DexB			=	odbc_result($itemal,'DexB');
	$IntelB			=	odbc_result($itemal,'IntelB');
	$MaxMpB			=	odbc_result($itemal,'MaxMpB');
	$ChaB			=	odbc_result($itemal,'ChaB');
	$FireR			=	odbc_result($itemal,'FireR');
	$ColdR			=	odbc_result($itemal,'ColdR');
	$LightningR		=	odbc_result($itemal,'LightningR');
	$MagicR			=	odbc_result($itemal,'MagicR');
	$PoisonR		=	odbc_result($itemal,'PoisonR');
	$CurseR			=	odbc_result($itemal,'CurseR');
	$ReqStr			=	odbc_result($itemal,'ReqStr');
	$ReqSta			=	odbc_result($itemal,'ReqSta');
	$ReqDex			=	odbc_result($itemal,'ReqDex');
	$ReqIntel		=	odbc_result($itemal,'ReqIntel');
	$ReqCha			=	odbc_result($itemal,'ReqCha');
	$ACBonus		=	odbc_result($itemal,'ACBonus');
	$HPBonus		=	odbc_result($itemal,'HPBonus');
	$StrengthBonus	=	odbc_result($itemal,'StrengthBonus');
	$StaminaBonus	=	odbc_result($itemal,'StaminaBonus');
	$DexterityBonus	=	odbc_result($itemal,'DexterityBonus');
	$IntelBonus		=	odbc_result($itemal,'IntelBonus');
	$XPBonusPercent	=	odbc_result($itemal,'XPBonusPercent');
	$CoinBonusPercent=	odbc_result($itemal,'CoinBonusPercent');
	$APBonusPercent	=	odbc_result($itemal,'APBonusPercent');
	$NPBonus		=	odbc_result($itemal,'NPBonus');
	$MaxWeightBonus	=	odbc_result($itemal,'MaxWeightBonus');
	$SetName		=	odbc_result($itemal,'SetName');
	
	$tip = $ItemType;
	switch($tip)
	{
	case 0:
        $type = 'Non Upgrade Item';
        $renk = 'white';
        break;

    case 1:
        $type = 'Magic Item';
        $renk = 'blue';
        break;

    case 2:
        $type = 'Rare Item';
        $renk = 'yellow';
        break;

    case 3:
        $type = 'Craft Item';
        $renk = 'lime';
        break;

    case 4:
        $type = 'Unique Item';
        $renk = 'unique_item';
        break;

    case 5:
        $type = 'Upgrade Item';
        $renk = 'purple';
        break;

    case 6:
        $type = 'Event Item';
        $renk = 'event_item';
        break;

    case 11:
        $type = 'Reverse Upgrade Item';
        $renk = 'reverse';
        break;

    case 12:
        $type = 'Reverse Unique Item';
        $renk = 'reverse';
        break;

    case 8:
        $type = 'Cospre Item';
        $renk = 'cospre';
        break;
    }

	$cins = $Kind;
	switch($cins)
	{
	case 10 :{$kind = "Wing";} break;
	case 11 :{$kind = "Dagger";} break;
	case 21 :{$kind = "Sword";}break;
	case 22 :{$kind = "Two-handed Sword";}break;
	case 31 :{$kind = "Axe";}break;
	case 32 :{$kind = "Two-handed Axe";}break;
	case 41 :{$kind = "Club";}break;
	case 42 :{$kind = "Two-handed Club";}break;
	case 51 :{$kind = "Spear";}break;
	case 52 :{$kind = "Long Spear";}break;
	case 60 :{$kind = "Shield";}break;
	case 61 :{$kind = "Pickaxe";}break;
	case 62 :{$kind = "Mattock";}break;
	case 63 :{$kind = "Fishing";}break;
	case 70 :{$kind = "Bow";}break;
	case 71 :{$kind = "Crossbow";}break;
	case 91 :{$kind = "Earring";}break;
	case 92 :{$kind = "Necklace";}break;
	case 93 :{$kind = "Ring";}break;
	case 94 :{$kind = "Belt";}break;
	case 95 :{$kind = "Lune Item";}break;
	case 110:{$kind = "Staff";}break;
	case 140:{$kind = "Jamadhar";}break;
	case 151:{$kind = "Pet Item";}break;
	case 181:{$kind = "Mace";}break;
	case 200:{$kind = "Portu Armor";}break;
	case 210:{$kind = "Warrior Armor";}break;
	case 220:{$kind = "Rogue Armor";}break;
	case 230:{$kind = "Magician Armor";}break;
	case 240:{$kind = "Priest Armor";}break;
	case 252:{$kind = "Cospre Item";}break;
	}
	$aciklama = '';
	$strName = str_replace("'","`",str_replace("<selfname>",trim($user),trim($strName)));
	$parse['name'] = trim($strName);
	$parse['type'] = $type;
	$parse['renk'] = $renk;
	$parse['kind'] = $kind;
	$parse['ozellik1'] = "";
	$parse['ozellik2'] = "";
	$parse['ozellik3'] = "";
	if ($Damage!=0) $parse['ozellik1'] .="Attack Power : " . $Damage . "<br>";
	$speed = $Delay;
	switch($speed)
	{case ($speed >0 and $speed <100):{$delay = "Very Fast";} break;
	case ($speed >100 and $speed <111):{$delay = "Fast";}break;
	case ($speed >110 and $speed <131):{$delay = "Normal";}break;
	case ($speed >130 and $speed <151):{$delay = "Slow";}break;
	case ($speed >150 and $speed <201):{$delay = "Very Slow";}}
	if ($speed!=0 and $speed !=100) $parse['ozellik1'] .="Attack Speed : " . $delay . "<br>";	
	if ($Range>9) $range=($Range/10) ; else $range=($Range/10) . "0";
	if ($Range!=0) $parse['ozellik1'] .="Effective Range : " . $range . "<br>";
	if ($Hitrate!=0) $parse['ozellik1'] .="Increase Attack Power by : " . $Hitrate . "%<br>";
	if ($Evasionrate!=0) $parse['ozellik1'] .="Increase Dodging Power by : " . $Evasionrate . "%<br>";
	if ($Weight>9) $weight=($Weight/10) . ".00"; else $weight=($Weight/10) . "0";
	if ($Weight!=0) $parse['ozellik1'] .="Weight : " . $weight . "<br>";
	if ($Duration>1) $parse['ozellik1'] .="Max Durability : " . $Duration . "<br>";
	if ($Ac!=0) $parse['ozellik1'] .="Defense Ability : " . $Ac . "<br>";
	if ($DaggerAc!=0) $parse['ozellik2'] .="Defense Ability (Dagger) : " . $DaggerAc . "<br>";
	if ($SwordAc!=0) $parse['ozellik2'] .="Defense Ability (Sword) : " . $SwordAc . "<br>";
	if ($MaceAc!=0) $parse['ozellik2'] .="Defense Ability (Club) : " . $MaceAc . "<br>";
	if ($AxeAc!=0) $parse['ozellik2'] .="Defense Ability (Axe) : " . $AxeAc . "<br>";
	if ($SpearAc!=0) $parse['ozellik2'] .="Defense Ability (Spear) : " . $SpearAc . "<br>";
	if ($BowAc!=0) $parse['ozellik2'] .="Defense Ability (Arrow) : " . $BowAc . "<br>";
	if ($FireDamage!=0) $parse['ozellik2'] .="Flame Damage : " . $FireDamage . "<br>";
	if ($IceDamage!=0) $parse['ozellik2'] .="Ice Damage : " . $IceDamage . "<br>";
	if ($LightningDamage!=0) $parse['ozellik2'] .="Lightning Damage : " . $LightningDamage . "<br>";
	if ($PoisonDamage!=0) $parse['ozellik2'] .="Poison Damage : " . $PoisonDamage . "<br>";
	if ($HPDrain!=0) $parse['ozellik2'] .="HP Recovery : " . $HPDrain . "<br>";
	if ($MPDamage!=0) $parse['ozellik2'] .="MP Damage : " . $MPDamage . "<br>";
	if ($MPDrain!=0) $parse['ozellik2'] .="MP Recovery : " . $MPDrain . "<br>";
	if ($MirrorDamage!=0) $parse['ozellik2'] .="Repel Physical Damage : " . $MirrorDamage . "<br>";
	if ($StrB!=0) $parse['ozellik2'] .="Strength Bonus : " . $StrB . "<br>";
	if ($StaB!=0) $parse['ozellik2'] .="Health Bonus : " . $StaB . "<br>";
	if ($MaxHpB!=0) $parse['ozellik2'] .="HP Bonus : " . $MaxHpB . "<br>";
	if ($DexB!=0) $parse['ozellik2'] .="Dexterity Bonus : " . $DexB . "<br>";
	if ($IntelB!=0) $parse['ozellik2'] .="Intelligence Bonus : " . $IntelB . "<br>";
	if ($MaxMpB!=0) $parse['ozellik2'] .="MP Bonus : " . $MaxMpB . "<br>";
	if ($ChaB!=0) $parse['ozellik2'] .="Magic Power Bonus : " . $ChaB . "<br>";
	if ($FireR!=0) $parse['ozellik2'] .="Resistance to Flame : " . $FireR . "<br>";
	if ($ColdR>5) $parse['ozellik2'] .="Resistance to Glacier : " . $ColdR . "<br>";
	if ($LightningR>5) $parse['ozellik2'] .="Resistance to Lightning : " . $LightningR . "<br>";
	if ($MagicR!=0) $parse['ozellik2'] .="Resistance to Magic : " . $MagicR . "<br>";
	if ($PoisonR!=0) $parse['ozellik2'] .="Resistance to Poison : " . $PoisonR . "<br>";
	if ($CurseR!=0) $parse['ozellik2'] .="Resistance to Curse : " . $CurseR . "<br>";
	if ($ReqStr!=0) $parse['ozellik3'] .="Required Strength : " . $ReqStr . "<br>";
	if ($ReqSta!=0) $parse['ozellik3'] .="Required Health : " . $ReqSta . "<br>";
	if ($ReqDex!=0) $parse['ozellik3'] .="Required Dexterity : " . $ReqDex . "<br>";
	if ($ReqIntel!=0) $parse['ozellik3'] .="Required Intelligence : " . $ReqIntel . "<br>";
	if ($ReqCha!=0) $parse['ozellik3'] .="Required Magic Power : " . $ReqCha . "<br>";
	if (substr($Num,0, 1) == "9") $parse['ozellik3'] .="<br><center><font color=red>Cannot be traded or sold stored!</font></center><br>";
	
	if ($ACBonus!=0) $parse['ozellik2'] .="Cospre Option : Defance + " . $ACBonus . "<br>";
	if ($HPBonus!=0) $parse['ozellik2'] .="Cospre Option : HP + " . $HPBonus . "<br>";
	if ($StrengthBonus!=0) $parse['ozellik2'] .="Cospre Option : STR + " . $StrengthBonus . "<br>";
	if ($StaminaBonus!=0) $parse['ozellik2'] .="Cospre Option : HP + " . $StaminaBonus . "<br>";
	if ($DexterityBonus!=0) $parse['ozellik2'] .="Cospre Option : DEX + " . $DexterityBonus . "<br>";
	if ($IntelBonus!=0) $parse['ozellik2'] .="Cospre Option : INT + " . $IntelBonus . "<br>";
	if ($XPBonusPercent!=0) $parse['ozellik2'] .="Cospre Option : XP +" . $XPBonusPercent . "% increase<br>";
	if ($CoinBonusPercent!=0) $parse['ozellik2'] .="Cospre Option : Noah +" . $CoinBonusPercent . "% increase<br>";
	if ($ACBonusPercent!=0) $parse['ozellik2'] .="Cospre Option : Defance +" . $ACBonusPercent . "% increase<br>";
	if ($APBonusPercent !=0) $parse['ozellik2'] .="Cospre Option : Damage +" . $APBonusPercent . "% increase<br>";
	if ($NPBonus!=0) $parse['ozellik2'] .="Cospre Option : Cont +" . $NPBonus . "% increase<br>";
	if ($MaxWeightBonus=0) $parse['ozellik3'] .="Weight : " . $MaxWeightBonus . "<br>";
	if ($SetName!=0) $parse['ozellik3'] .="Set Name = " . $SetName . "<br>";

	return "<span class='item_title ".$renk."'>".$strName."</span><span class='item_type ".$renk."'>(".$type.")</span><span class='item_kind'>".$kind."</span><span class='item_property white'>".$parse[ozellik1]."</span><span class='item_property lime'>".$parse[ozellik2]."</span><span class='item_property white'>".$parse[ozellik3]."</span>";
	}
	
	function itemozellik2 ($item,$amount)
	{
	include CONFIG . "config.inc.php";
	$dbname = $db['db_name'];
	$dbuser = $db['db_user'];
	$dbpass = $db['db_pass'];		
	$conn = odbc_connect("$dbname","$dbuser","$dbpass");	
	$itemal=odbc_exec($conn,"SELECT * FROM ITEM left join SET_ITEM on ITEM.Num = SET_ITEM.SetIndex WHERE Num = '" . $item . "'");
	$Num			=	odbc_result($itemal,'Num');
	$ItemType		=	odbc_result($itemal,'ItemType');
	$Kind			=	odbc_result($itemal,'Kind');
	$strName		=	odbc_result($itemal,'strName');
	$Damage			=	odbc_result($itemal,'Damage');
	$Delay			=	odbc_result($itemal,'Delay');
	$Range			=	odbc_result($itemal,'Range');
	$Hitrate		=	odbc_result($itemal,'Hitrate');
	$Evasionrate	=	odbc_result($itemal,'Evasionrate');
	$Weight			=	odbc_result($itemal,'Weight');
	$Duration		=	odbc_result($itemal,'Duration');
	$Ac				=	odbc_result($itemal,'Ac');
	$DaggerAc		=	odbc_result($itemal,'DaggerAc');
	$SwordAc		=	odbc_result($itemal,'SwordAc');
	$MaceAc			=	odbc_result($itemal,'MaceAc');
	$AxeAc			=	odbc_result($itemal,'AxeAc');
	$SpearAc		=	odbc_result($itemal,'SpearAc');
	$BowAc   		=	odbc_result($itemal,'BowAc');
	$FireDamage		=	odbc_result($itemal,'FireDamage');
	$IceDamage		=	odbc_result($itemal,'IceDamage');
	$LightningDamage=	odbc_result($itemal,'LightningDamage');
	$PoisonDamage	=	odbc_result($itemal,'PoisonDamage');
	$HPDrain		=	odbc_result($itemal,'HPDrain');
	$MPDamage		=	odbc_result($itemal,'MPDamage');
	$MPDrain		=	odbc_result($itemal,'MPDrain');
	$MirrorDamage	=	odbc_result($itemal,'MirrorDamage');
	$StrB			=	odbc_result($itemal,'StrB');
	$StaB			=	odbc_result($itemal,'StaB');
	$MaxHpB			=	odbc_result($itemal,'MaxHpB');
	$DexB			=	odbc_result($itemal,'DexB');
	$IntelB			=	odbc_result($itemal,'IntelB');
	$MaxMpB			=	odbc_result($itemal,'MaxMpB');
	$ChaB			=	odbc_result($itemal,'ChaB');
	$FireR			=	odbc_result($itemal,'FireR');
	$ColdR			=	odbc_result($itemal,'ColdR');
	$LightningR		=	odbc_result($itemal,'LightningR');
	$MagicR			=	odbc_result($itemal,'MagicR');
	$PoisonR		=	odbc_result($itemal,'PoisonR');
	$CurseR			=	odbc_result($itemal,'CurseR');
	$ReqStr			=	odbc_result($itemal,'ReqStr');
	$ReqSta			=	odbc_result($itemal,'ReqSta');
	$ReqDex			=	odbc_result($itemal,'ReqDex');
	$ReqIntel		=	odbc_result($itemal,'ReqIntel');
	$ReqCha			=	odbc_result($itemal,'ReqCha');
	$ACBonus		=	odbc_result($itemal,'ACBonus');
	$HPBonus		=	odbc_result($itemal,'HPBonus');
	$StrengthBonus	=	odbc_result($itemal,'StrengthBonus');
	$StaminaBonus	=	odbc_result($itemal,'StaminaBonus');
	$DexterityBonus	=	odbc_result($itemal,'DexterityBonus');
	$IntelBonus		=	odbc_result($itemal,'IntelBonus');
	$XPBonusPercent	=	odbc_result($itemal,'XPBonusPercent');
	$CoinBonusPercent=	odbc_result($itemal,'CoinBonusPercent');
	$APBonusPercent	=	odbc_result($itemal,'APBonusPercent');
	$NPBonus		=	odbc_result($itemal,'NPBonus');
	$MaxWeightBonus	=	odbc_result($itemal,'MaxWeightBonus');
	$SetName		=	odbc_result($itemal,'SetName');
	
	$tip = $ItemType;
	switch($tip)
	{
	case 0:
        $type = 'Non Upgrade Item';
        $renk = 'white';
        break;

    case 1:
        $type = 'Magic Item';
        $renk = 'blue';
        break;

    case 2:
        $type = 'Rare Item';
        $renk = 'yellow';
        break;

    case 3:
        $type = 'Craft Item';
        $renk = 'lime';
        break;

    case 4:
        $type = 'Unique Item';
        $renk = 'unique_item';
        break;

    case 5:
        $type = 'Upgrade Item';
        $renk = 'purple';
        break;

    case 6:
        $type = 'Event Item';
        $renk = 'event_item';
        break;

    case 11:
        $type = 'Reverse Upgrade Item';
        $renk = 'reverse';
        break;

    case 12:
        $type = 'Reverse Unique Item';
        $renk = 'reverse';
        break;

    case 8:
        $type = 'Cospre Item';
        $renk = 'cospre';
        break;
    }

	$cins = $Kind;
	switch($cins)
	{
	case 10 :{$kind = "Wing";} break;
	case 11 :{$kind = "Dagger";} break;
	case 21 :{$kind = "Sword";}break;
	case 22 :{$kind = "Two-handed Sword";}break;
	case 31 :{$kind = "Axe";}break;
	case 32 :{$kind = "Two-handed Axe";}break;
	case 41 :{$kind = "Club";}break;
	case 42 :{$kind = "Two-handed Club";}break;
	case 51 :{$kind = "Spear";}break;
	case 52 :{$kind = "Long Spear";}break;
	case 60 :{$kind = "Shield";}break;
	case 61 :{$kind = "Pickaxe";}break;
	case 62 :{$kind = "Mattock";}break;
	case 63 :{$kind = "Fishing";}break;
	case 70 :{$kind = "Bow";}break;
	case 71 :{$kind = "Crossbow";}break;
	case 91 :{$kind = "Earring";}break;
	case 92 :{$kind = "Necklace";}break;
	case 93 :{$kind = "Ring";}break;
	case 94 :{$kind = "Belt";}break;
	case 95 :{$kind = "Lune Item";}break;
	case 110:{$kind = "Staff";}break;
	case 140:{$kind = "Jamadhar";}break;
	case 151:{$kind = "Pet Item";}break;
	case 181:{$kind = "Mace";}break;
	case 200:{$kind = "Portu Armor";}break;
	case 210:{$kind = "Warrior Armor";}break;
	case 220:{$kind = "Rogue Armor";}break;
	case 230:{$kind = "Magician Armor";}break;
	case 240:{$kind = "Priest Armor";}break;
	case 252:{$kind = "Cospre Item";}break;
	}
	$aciklama = '';
	$strName = str_replace("'","`",str_replace("<selfname>",trim($user),trim($strName)));
	$parse['name'] = trim($strName);
	$parse['type'] = $type;
	$parse['renk'] = $renk;
	$parse['kind'] = $kind;
	$parse['ozellik1'] = "";
	$parse['ozellik2'] = "";
	$parse['ozellik3'] = "";
	if ($Damage!=0) $parse['ozellik1'] .="Attack Power : " . $Damage . "<br>";
	$speed = $Delay;
	switch($speed)
	{case ($speed >0 and $speed <100):{$delay = "Very Fast";} break;
	case ($speed >100 and $speed <111):{$delay = "Fast";}break;
	case ($speed >110 and $speed <131):{$delay = "Normal";}break;
	case ($speed >130 and $speed <151):{$delay = "Slow";}break;
	case ($speed >150 and $speed <201):{$delay = "Very Slow";}}
	if ($speed!=0 and $speed !=100) $parse['ozellik1'] .="Attack Speed : " . $delay . "<br>";	
	if ($Range>9) $range=($Range/10) ; else $range=($Range/10) . "0";
	if ($Range!=0) $parse['ozellik1'] .="Effective Range : " . $range . "<br>";
	if ($Hitrate!=0) $parse['ozellik1'] .="Increase Attack Power by : " . $Hitrate . "%<br>";
	if ($Evasionrate!=0) $parse['ozellik1'] .="Increase Dodging Power by : " . $Evasionrate . "%<br>";
	if ($Weight>9) $weight=($Weight/10) . ".00"; else $weight=($Weight/10) . "0";
	if ($Weight!=0) $parse['ozellik1'] .="Weight : " . $weight . "<br>";
	if ($Duration>1) $parse['ozellik1'] .="Max Durability : " . $Duration . "<br>";
	if ($Ac!=0) $parse['ozellik1'] .="Defense Ability : " . $Ac . "<br>";
	if ($DaggerAc!=0) $parse['ozellik2'] .="Defense Ability (Dagger) : " . $DaggerAc . "<br>";
	if ($SwordAc!=0) $parse['ozellik2'] .="Defense Ability (Sword) : " . $SwordAc . "<br>";
	if ($MaceAc!=0) $parse['ozellik2'] .="Defense Ability (Club) : " . $MaceAc . "<br>";
	if ($AxeAc!=0) $parse['ozellik2'] .="Defense Ability (Axe) : " . $AxeAc . "<br>";
	if ($SpearAc!=0) $parse['ozellik2'] .="Defense Ability (Spear) : " . $SpearAc . "<br>";
	if ($BowAc!=0) $parse['ozellik2'] .="Defense Ability (Arrow) : " . $BowAc . "<br>";
	if ($FireDamage!=0) $parse['ozellik2'] .="Flame Damage : " . $FireDamage . "<br>";
	if ($IceDamage!=0) $parse['ozellik2'] .="Ice Damage : " . $IceDamage . "<br>";
	if ($LightningDamage!=0) $parse['ozellik2'] .="Lightning Damage : " . $LightningDamage . "<br>";
	if ($PoisonDamage!=0) $parse['ozellik2'] .="Poison Damage : " . $PoisonDamage . "<br>";
	if ($HPDrain!=0) $parse['ozellik2'] .="HP Recovery : " . $HPDrain . "<br>";
	if ($MPDamage!=0) $parse['ozellik2'] .="MP Damage : " . $MPDamage . "<br>";
	if ($MPDrain!=0) $parse['ozellik2'] .="MP Recovery : " . $MPDrain . "<br>";
	if ($MirrorDamage!=0) $parse['ozellik2'] .="Repel Physical Damage : " . $MirrorDamage . "<br>";
	if ($StrB!=0) $parse['ozellik2'] .="Strength Bonus : " . $StrB . "<br>";
	if ($StaB!=0) $parse['ozellik2'] .="Health Bonus : " . $StaB . "<br>";
	if ($MaxHpB!=0) $parse['ozellik2'] .="HP Bonus : " . $MaxHpB . "<br>";
	if ($DexB!=0) $parse['ozellik2'] .="Dexterity Bonus : " . $DexB . "<br>";
	if ($IntelB!=0) $parse['ozellik2'] .="Intelligence Bonus : " . $IntelB . "<br>";
	if ($MaxMpB!=0) $parse['ozellik2'] .="MP Bonus : " . $MaxMpB . "<br>";
	if ($ChaB!=0) $parse['ozellik2'] .="Magic Power Bonus : " . $ChaB . "<br>";
	if ($FireR!=0) $parse['ozellik2'] .="Resistance to Flame : " . $FireR . "<br>";
	if ($ColdR>5) $parse['ozellik2'] .="Resistance to Glacier : " . $ColdR . "<br>";
	if ($LightningR>5) $parse['ozellik2'] .="Resistance to Lightning : " . $LightningR . "<br>";
	if ($MagicR!=0) $parse['ozellik2'] .="Resistance to Magic : " . $MagicR . "<br>";
	if ($PoisonR!=0) $parse['ozellik2'] .="Resistance to Poison : " . $PoisonR . "<br>";
	if ($CurseR!=0) $parse['ozellik2'] .="Resistance to Curse : " . $CurseR . "<br>";
	if ($ReqStr!=0) $parse['ozellik3'] .="Required Strength : " . $ReqStr . "<br>";
	if ($ReqSta!=0) $parse['ozellik3'] .="Required Health : " . $ReqSta . "<br>";
	if ($ReqDex!=0) $parse['ozellik3'] .="Required Dexterity : " . $ReqDex . "<br>";
	if ($ReqIntel!=0) $parse['ozellik3'] .="Required Intelligence : " . $ReqIntel . "<br>";
	if ($ReqCha!=0) $parse['ozellik3'] .="Required Magic Power : " . $ReqCha . "<br>";
	if (substr($Num,0, 1) == "9") $parse['ozellik3'] .="<br><center><font color=red>Cannot be traded or sold stored!</font></center><br>";
	
	if ($ACBonus!=0) $parse['ozellik2'] .="Cospre Option : Defance + " . $ACBonus . "<br>";
	if ($HPBonus!=0) $parse['ozellik2'] .="Cospre Option : HP + " . $HPBonus . "<br>";
	if ($StrengthBonus!=0) $parse['ozellik2'] .="Cospre Option : STR + " . $StrengthBonus . "<br>";
	if ($StaminaBonus!=0) $parse['ozellik2'] .="Cospre Option : HP + " . $StaminaBonus . "<br>";
	if ($DexterityBonus!=0) $parse['ozellik2'] .="Cospre Option : DEX + " . $DexterityBonus . "<br>";
	if ($IntelBonus!=0) $parse['ozellik2'] .="Cospre Option : INT + " . $IntelBonus . "<br>";
	if ($XPBonusPercent!=0) $parse['ozellik2'] .="Cospre Option : XP +" . $XPBonusPercent . "% increase<br>";
	if ($CoinBonusPercent!=0) $parse['ozellik2'] .="Cospre Option : Noah +" . $CoinBonusPercent . "% increase<br>";
	if ($ACBonusPercent!=0) $parse['ozellik2'] .="Cospre Option : Defance +" . $ACBonusPercent . "% increase<br>";
	if ($APBonusPercent !=0) $parse['ozellik2'] .="Cospre Option : Damage +" . $APBonusPercent . "% increase<br>";
	if ($NPBonus!=0) $parse['ozellik2'] .="Cospre Option : Cont +" . $NPBonus . "% increase<br>";
	if ($MaxWeightBonus=0) $parse['ozellik3'] .="Weight : " . $MaxWeightBonus . "<br>";
	if ($SetName!=0) $parse['ozellik3'] .="Set Name = " . $SetName . "<br>";

	switch ($item) {
		case 900000000: // noah
			$strName = '('.number_format($amount).')'.' '.$strName;
			break;
		case 900001000: // exp
			$strName = '('.number_format($amount).')'.' '.$strName;
			break;		
		case 900002000: // np
			$strName = '('.number_format($amount).')'.' '.$strName;
			break;				
		case 900003000: // ladder
			$strName = '('.number_format($amount).')'.' '.$strName;
			break;		
	}
	return "<span class='item_title ".$renk."'>".$strName."</span><span class='item_type ".$renk."'>(".$type.")</span><span class='item_kind'>".$kind."</span><span class='item_property white'>".$parse[ozellik1]."</span><span class='item_property lime'>".$parse[ozellik2]."</span><span class='item_property white'>".$parse[ozellik3]."</span>";
	}	
}
?>