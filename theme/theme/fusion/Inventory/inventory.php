<?php
	include('common.php');
	define("ITEMID",0);
	define("DURABILITY",1);
	define("SIZE",2);
	
function itemozellikleri2 ($item)
{
	global $parse;
	
	$tip = $item['ItemType'];
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
        $renk = '#DFC68C';
		$red  = 'Unique';
		$renq = '#DFC68C';
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
        $renk = '#FF78B2';
        break;

    case 12:
        $type = 'Reverse Unique Item';
        $renk = '#DFC68C';
        break;

    case 8:
        $type = 'Cospre Item';
        $renk = '#DFC68C';
        $red  = '<center>Cannot be traded or sold stored</center>';
        $renq = 'red';
        break;
    }

	
	$cins = $item['Kind'];
	switch($cins)
	{
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
		// case 252:{$kind = "Cospre Item";}break;
	}

	
	$aciklama 		 = $item['aciklama'];
	$item['strName'] = str_replace("'","`",str_replace("<selfname>","Selfname",trim($item['strName'])));
	$parse['name'] 	 = $item['strName'];
	$parse['type'] 	 = $type;
	$parse['renk'] 	 = $renk;
	$parse['renq'] 	 = $renq;
	$parse['kind'] 	 = $kind;
	$parse['ozellik1'] = "";
	$parse['ozellik2'] = "";
	$parse['ozellik3'] = "";
	$parse['red'] 	   = $red;
	
	if ($item['Damage']!=0) $parse['ozellik1'] .="Attack Power : " . $item['Damage'] . "<br>";
	
	$speed = $item['Delay'];
	switch($speed)
	{
		case ($speed >0   and $speed <90) :{$delay = "Very Fast";} break;
		case ($speed >89  and $speed <111):{$delay = "Fast";}break;
		case ($speed >110 and $speed <131):{$delay = "Normal";}break;
		case ($speed >130 and $speed <151):{$delay = "Slow";}break;
		case ($speed >150 and $speed <201):{$delay = "Very Slow";}break;

	}
	
	if ($speed!=0) $parse['ozellik1'] .="Attack Speed : " . $delay . "<br>";	

	if ($item['Range']>9) $range=($item['Range']/10) ; else $range=($item['Range']/10) . "0";
	if ($item['Range']!=0) $parse['ozellik1'] .="Effective Range : " . $range . "<br>";
	if ($item['Hitrate']!=0) $parse['ozellik1'] .="Increase Attack Power by  : " . $item['Hitrate'] . "%<br>";
	if ($item['Evasionrate']!=0) $parse['ozellik1'] .="Increase Dodging Power by : " . $item['Evasionrate'] . "%<br>";
	
	if ($item['Weight']>9) $weight=($item['Weight']/10) . ".00"; else $weight=($item['Weight']/10) . "0";
	if ($item['Weight']!=0) $parse['ozellik1'] .="Weight : " . $weight . "<br>";
	if ($item['Duration']>1) $parse['ozellik1'] .="Max Durability : " . $item['Duration'] . "<br>";
	if ($item['Ac']!=0) $parse['ozellik1'] .="Defense Ability : " . $item['Ac'] . "<br>";
	
	if ($item['DaggerAc']!=0) $parse['ozellik2'] .="Defense Ability (Dagger) : " . $item['DaggerAc'] . "<br>";
	if ($item['SwordAc']!=0) $parse['ozellik2'] .="Defense Ability (Sword) : " . $item['SwordAc'] . "<br>";
	if ($item['MaceAc']!=0) $parse['ozellik2'] .="Defense Ability (Club) : " . $item['MaceAc'] . "<br>";
	if ($item['AxeAc']!=0) $parse['ozellik2'] .="Defense Ability (Axe) : " . $item['AxeAc'] . "<br>";
	if ($item['SpearAc']!=0) $parse['ozellik2'] .="Defense Ability (Spear) : " . $item['SpearAc'] . "<br>";
	if ($item['BowAc']!=0) $parse['ozellik2'] .="Defense Ability (Arrow) : " . $item['BowAc'] . "<br>";
	if ($item['FireDamage']!=0) $parse['ozellik2'] .="Flame Damage : " . $item['FireDamage'] . "<br>";
	if ($item['IceDamage']!=0) $parse['ozellik2'] .="Ice Damage : " . $item['IceDamage'] . "<br>";
	if ($item['LightningDamage']!=0) $parse['ozellik2'] .="Lightning Damage : " . $item['LightningDamage'] . "<br>";
	if ($item['PoisonDamage']!=0) $parse['ozellik2'] .="Poison Damage : " . $item['PoisonDamage'] . "<br>";
	
	if ($item['HPDrain']!=0) $parse['ozellik2'] .="HP Recovery : " . $item['HPDrain'] . "<br>";
	if ($item['MPDamage']!=0) $parse['ozellik2'] .="MP Damage : " . $item['MPDamage'] . "<br>";
	if ($item['MPDrain']!=0) $parse['ozellik2'] .="MP Recovery : " . $item['MPDrain'] . "<br>";
	
	if ($item['MirrorDamage']!=0) $parse['ozellik2'] .="Repel Physical Damage : " . $item['MirrorDamage'] . "<br>";
	if ($item['StrB']!=0) $parse['ozellik2'] .="Strength Bonus : " . $item['StrB'] . "<br>";
	if ($item['StaB']!=0) $parse['ozellik2'] .="Health Bonus : " . $item['StaB'] . "<br>";
	if ($item['MaxHpB']!=0) $parse['ozellik2'] .="HP Bonus : " . $item['MaxHpB'] . "<br>";
	if ($item['DexB']!=0) $parse['ozellik2'] .="Dexterity Bonus : " . $item['DexB'] . "<br>";
	if ($item['IntelB']!=0) $parse['ozellik2'] .="Intelligence Bonus : " . $item['IntelB'] . "<br>";
	if ($item['MaxMpB']!=0) $parse['ozellik2'] .="MP Bonus : " . $item['MaxMpB'] . "<br>";
	if ($item['ChaB']!=0) $parse['ozellik2'] .="Magic Power Bonus : " . $item['ChaB'] . "<br>";
	if ($item['FireR']!=0) $parse['ozellik2'] .="Resistance to Flame : " . $item['FireR'] . "<br>";
	if ($item['ColdR']!=0) $parse['ozellik2'] .="Resistance to Glacier : " . $item['ColdR'] . "<br>";
	if ($item['LightningR']!=0) $parse['ozellik2'] .="Resistance to Lightning : " . $item['LightningR'] . "<br>";
	if ($item['MagicR']!=0) $parse['ozellik2'] .="Resistance to Magic : " . $item['MagicR'] . "<br>";
	if ($item['PoisonR']!=0) $parse['ozellik2'] .="Resistance to Poison : " . $item['PoisonR'] . "<br>";
	if ($item['CurseR']!=0) $parse['ozellik2'] .="Resistance to Curse : " . $item['CurseR'] . "<br>";
	
	if ($item['ReqStr']!=0) $parse['ozellik3'] .="Required Strength : " . $item['ReqStr'] . "<br>";
	if ($item['ReqSta']!=0) $parse['ozellik3'] .="Required Health : " . $item['ReqSta'] . "<br>";
	if ($item['ReqDex']!=0) $parse['ozellik3'] .="Required Dexterity : " . $item['ReqDex'] . "<br>";
	if ($item['ReqIntel']!=0) $parse['ozellik3'] .="Required Intelligence : " . $item['ReqIntel'] . "<br>";
	if ($item['ReqCha']!=0) $parse['ozellik3'] .="Required Magic Power : " . $item['ReqCha'] . "<br>";
	
	if ($item['ACBonus']!=0) $parse['ozellik2'] .="Cospre Option : Defance + " . $item['ACBonus'] . "<br>";
	if ($item['HPBonus']!=0) $parse['ozellik2'] .="Cospre Option : HP + " . $item['HPBonus'] . "<br>";
	if ($item['StrengthBonus']!=0) $parse['ozellik2'] .="Cospre Option : STR + " . $item['StrengthBonus'] . "<br>";
	if ($item['StaminaBonus']!=0) $parse['ozellik2'] .="Cospre Option : HP + " . $item['StaminaBonus'] . "<br>";
	if ($item['DexterityBonus']!=0) $parse['ozellik2'] .="Cospre Option : DEX + " . $item['DexterityBonus'] . "<br>";
	if ($item['IntelBonus']!=0) $parse['ozellik2'] .="Cospre Option : INT + " . $item['IntelBonus'] . "<br>";
	if ($item['XPBonusPercent']!=0) $parse['ozellik2'] .="Cospre Option : XP +" . $item['XPBonusPercent'] . "% increase<br>";
	if ($item['CoinBonusPercent']!=0) $parse['ozellik2'] .="Cospre Option : Noah +" . $item['CoinBonusPercent'] . "% increase<br>";
	if ($item['ACBonusPercent']!=0) $parse['ozellik2'] .="Cospre Option : Defance +" . $item['ACBonusPercent'] . "% increase<br>";
	if ($item['APBonusPercent']!=0) $parse['ozellik2'] .="Cospre Option : Damage +" . $item['APBonusPercent'] . "% increase<br>";
	if ($item['NPBonus']!=0) $parse['ozellik2'] .="Cospre Option : Cont +" . $item['NPBonus'] . "% increase<br>";
	if ($item['MaxWeightBonus']!=0) $parse['ozellik3'] .="Weight : " . $item['MaxWeightBonus'] . "<br>";
	if ($item['SetName']!=0) $parse['ozellik3'] .="Set Name = " . $item['SetName'] . "<br>";
}
	
	
	function resimadi2($itemkodu, $uzanti)
	{
		$resim = "itemicon/" . substr($itemkodu,0,1) . "_" . substr($itemkodu,1,4) . "_" . substr($itemkodu,5,1) . "0_0.".$uzanti;
		if(file_exists($resim))
		{
		return $resim;
		}
		else
		{
		return "itemicon/0.jpg";
		}
	}
	
	function ters($str)
	{
		$len = strlen($str);
		for ($i = $len-2; $i>=0; $i-=2)
			$ret .= substr($str,$i,2);
		return $ret;
	}
	
	$userid=get('user');	
	$userkontrol=odbc_fetch_array(doquery("SELECT count(*) as adet FROM userdata where struserid='".$userid."'"));
	$parse['nick']=$userid;
	if ($userkontrol['adet']>0)
	{

	$tema = gettemplate("ozellik");

	$user=doquery("SELECT UD.strItem, UD.Points, UD.strUserID, UD.Class, UD.Exp, UD.MannerPoint, UD.Level, UD.Nation, UD.Loyalty, UD.Strong, UD.Sta, UD.Cha, UD.Dex, UD.Intel, UD.Level, UD.Gold, UD.Knights, KD.IDName AS KnightName, UD.LoyaltyMonthly FROM USERDATA AS UD LEFT JOIN KNIGHTS AS KD ON UD.Knights = KD.IDNUM WHERE UD.strUserID = '".$userid."' ORDER BY UD.Loyalty DESC", true);
	$online=doquery("SELECT Count(strAccountID) as status FROM CURRENTUSER WHERE STRCHARID = '".$userid."'", true);

	$inven = bin2hex($user['strItem']);
	$l = 0;
	for ($x = 0; $x<=49; $x++)
	{
		$item 	= substr($inven, $l,8);
		$dur	= substr($inven,$l+8,4);
		$stack	= substr($inven,$l+12,4);
		$items[$x][ITEMID] 		= hexdec(ters(substr($inven, $l,8)));
		$items[$x][DURABILITY] 	= hexdec(ters(substr($inven,$l+8,4)));
		$items[$x][SIZE] 		= hexdec(ters(substr($inven,$l+12,4)));
		$l+=16;
	}
	$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/'.$pathr;
	
	$parse['online']=$online["Count"];
	
	if($online["status"] > 1)
		$parse['online'] = '<font color="yellow">Çevrimiçi</font>';
	else {
		$parse['online'] = '<font color="red">Çevrimdışı</font>';
	}
	
	$parse['nation']=$user["Nation"];
	
	if($user["Nation"] == 1)
		$parse['nation'] = "Karus";
	else {
		$parse['nation'] = "Elmorad";
	}
	
	$parse['clan']=$user["KnightName"];
	
	if($user["KnightName"] == true)
		$parse['clan'] = '<a href="'.$base_url.'ClanProfile/'.trim(iconv('ISO-8859-9', 'UTF-8',$user["Knights"])).'" target="blank">'.iconv('ISO-8859-9', 'UTF-8',$user["KnightName"]).'</a>';
	else {
		$parse['clan'] = '[CLAN YOK]';
	}
	
	$parse['level']=$user["Level"];
	$parse['exp']=$user["Exp"];
	$parse['manner']=$user["MannerPoint"];
	$parse['coin']=pretty_number($user["Gold"]);
	$parse['createtime']=$user["CreateTime"];		
	$parse['updatetime']=$user["UpdateTime"];	
	$parse['str']=$user["Strong"];
	$parse['hp']=$user["Sta"];
	$parse['dex']=$user["Dex"];
	$parse['mp']=$user["Cha"];
	$parse['int']=$user["Intel"];
	$parse['np']=$user["Loyalty"];
	$parse['np2']=$user["LoyaltyMonthly"];
	$parse['health']=$user["Hp"];
	$parse['mana']=$user["Mp"];
	$parse['stat']=$user["Points"];
   
	foreach ($items as $a => $b)
	{
		$sira = $a;
		$dwid = $b[ITEMID];
		if ($dwid==0)
			$parse['id'.$sira] = "none";
		else
		{
			$u = doquery("SELECT * FROM dbo.ITEM  left join dbo.SET_ITEM on ITEM.Num = SET_ITEM.SetIndex WHERE Num = ".$dwid,true);
			itemozellikleri2($u);
			$adet = 0;
			$stacksize = $b[SIZE];
			$duration  = $b[DURABILITY];
			if ($stacksize>1) $adet = $stacksize; else
			if (($duration >1) and ($duration <=50)) $adet = $duration;
			if ($adet==0)
				$parse['i'.$sira] = resimadi2($dwid,"jpg");
			else
				$parse['i'.$sira] =	"resim.php?resim=" . resimadi2($dwid,"jpg") . "&adet=" . $adet;
			$parse['o'.$sira] = parsetemplate($tema,$parse);
		}
		
	}			

	$sayfa = parsetemplate(gettemplate('inventory'),$parse);
	}else $sayfa=parsetemplate(gettemplate('userbulunamadi'),$parse);
	output($sayfa, FALSE, GZIPLEVEL);
?>