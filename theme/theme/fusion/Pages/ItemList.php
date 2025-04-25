		<div class="container">
			<main class="content">
				<div class="content-block-info">
<!--LEFT--><?php include "/../left.php"; ?><!--LEFT-->
					<div class="middle-wrapper">
<!--SERVERINFO--><?php include "serverinfo.php"; ?><!--SERVERINFO-->					
<div class="content-title">
	<h1 class="title"><center>ITEM ARAMA</center></h1>
</div><!-- content-title -->
<a href="<?=$base_url;?>DropList"><button style="width: 49.5%;">Drop Arama</button></a>
<a href="<?=$base_url;?>ItemList"><button style="width: 49.5%;">Item Arama</button></a>
<br><br>
<center>
<form class="form-horizontal" role="form" method="post" onsubmit="return false;">
	<div class="label-left list-bordered">
        <div class="form-group">
            <label for="form2_01" class="col-sm-8 control-label"></label>
            <div class="col-sm-10">
                <input type="text" name="search_query" id="search_query" placeholder="Item adı giriniz" autocomplete="off" maxlength="40" style="border: 1px solid rgb(35, 52, 66);"/>
			</div>
        </div>
		<br>
        <div class="form-group">
            <div class="row margin-top20">
                <div class="col-md-12 col-md-offset-8">
					<div class="lins-top-news">
						<button class="login-button2 button-n" onclick="location.reload();">Geri Git</button>
						<button class="login-button2 button-n" name="search_button" style="background: url(<?=$path;?>images/register-button.jpg) no-repeat;box-shadow: 0px 0px 29px 1px #4f0634;border: 1px solid #2f0128;" id="search_button" type="button" onclick="ItemsearchDrop();">Arama</button>
					</div>	
                </div>	
            </div>
        </div>
		
    </div>
</form>
</center>
<div id="loader"><img src="<?=$path;?>images/loader.gif" /><br>Bu işlem biraz uzun sürebilir. Sabrınız için teşekkürler.</div>
<div id="dropResponse">

<dl class="accordion">
	<!-- ROW -->
	<dt>
		<a href="javascript:void(0);" onclick="Zone(21);">
			<div class="monster_top">
				<span class="monster_title"><font color="green">Moradon</font></span>
				<span class="monster_open_acc"><i class="fa fa-bars"></i></span>
			</div>
		</a>
	</dt>
	<!-- ROW -->
	<dt>
		<a href="javascript:void(0);" onclick="Zone(1);">
			<div class="monster_top">
				<span class="monster_title"><font color="green">Luferson Castle</font></span>
				<span class="monster_open_acc"><i class="fa fa-bars"></i></span>
			</div>
		</a>
	</dt>
	<!-- ROW -->
	<dt>
		<a href="javascript:void(0);" onclick="Zone(2);">
			<div class="monster_top">
				<span class="monster_title"><font color="green">El Morad Castle</font></span>
				<span class="monster_open_acc"><i class="fa fa-bars"></i></span>
			</div>
		</a>
	</dt>
	<!-- ROW -->
	<dt>
		<a href="javascript:void(0);" onclick="Zone(71);">
			<div class="monster_top">
				<span class="monster_title"><font color="green">Ronark Land (CZ)</font></span>
				<span class="monster_open_acc"><i class="fa fa-bars"></i></span>
			</div>
		</a>
	</dt>
	<!-- ROW -->
	<dt>
		<a href="javascript:void(0);" onclick="Zone(11);">
			<div class="monster_top">
				<span class="monster_title"><font color="green">Eslant (Karus)</font></span>
				<span class="monster_open_acc"><i class="fa fa-bars"></i></span>
			</div>
		</a>
	</dt>
	<!-- ROW -->
	<dt>
		<a href="javascript:void(0);" onclick="Zone(12);">
			<div class="monster_top">
				<span class="monster_title"><font color="green">Eslant (El Morad)</font></span>
				<span class="monster_open_acc"><i class="fa fa-bars"></i></span>
			</div>
		</a>
	</dt>
	<!-- ROW -->
	<dt>
		<a href="javascript:void(0);" onclick="Zone(30);">
			<div class="monster_top">
				<span class="monster_title"><font color="green">Delos</font></span>
				<span class="monster_open_acc"><i class="fa fa-bars"></i></span>
			</div>
		</a>
	</dt>
	<dt>
		<a href="javascript:void(0);" onclick="Zone(31);">
			<div class="monster_top">
				<span class="monster_title"><font color="green">Bifrost</font></span>
				<span class="monster_open_acc"><i class="fa fa-bars"></i></span>
			</div>
		</a>
	</dt>
	<dt>
		<a href="javascript:void(0);" onclick="Zone(33);">
			<div class="monster_top">
				<span class="monster_title"><font color="green">Hell Abyss</font></span>
				<span class="monster_open_acc"><i class="fa fa-bars"></i></span>
			</div>
		</a>
	</dt>
	<dt>
		<a href="javascript:void(0);" onclick="Zone(32);">
			<div class="monster_top">
				<span class="monster_title"><font color="green">Desperation Abyss</font></span>
				<span class="monster_open_acc"><i class="fa fa-bars"></i></span>
			</div>
		</a>
	</dt>
</dl>
</div>
<div id="loader"><img src="<?=$path;?>images/loader.gif" /><br>Bu2 işlem biraz uzun sürebilir. Sabrınız için teşekkürler.</div>
<div id="dropResponse2"></div>

</div>
</div>
</main>
<!--RIGHT--><?php include "/../right.php"; ?><!--RIGHT-->
			</div>
