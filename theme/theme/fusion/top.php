<!DOCTYPE html>
<html lang="tr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<title><?=$title;?></title>
	<link rel="stylesheet" type="text/css" href="<?=$path;?>css/ArtemisGame.css?v=1.1">
	<link href="<?=$path;?>css/style-F.css" rel="stylesheet">
	<link rel="icon" href="<?=$path;?>images/favicon.ico?v=1.1"> 
	<meta charset="UTF-8">
	<meta name="description" content="<?=$description;?>">
	<meta name="keyword" content="<?=$keywords;?>">
</head>	
		<script src="<?=$path;?>js/jquery.min.js"></script>		
		<script type="text/javascript" src="<?=$path;?>js/ArtemisGame.js"></script>
		<script type="text/javascript" src="<?=$path;?>js/slider.js"></script>		
		<script type="text/javascript" src="<?=$path;?>js/jquery-migrate-1.2.1.js"></script>
		<script type="text/javascript" src="<?=$path;?>js/fbevents.js"></script>
		<script type="text/javascript" src="<?=$path;?>js/jquery.maskedinput.min.js"></script>
		<script src="<?=$path;?>js/FEAR.js"></script>
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
		
		
<script language="JavaScript">
function onlyNumbers(evt)
{
var e = event || evt; // for trans-browser compatibility
var charCode = e.which || e.keyCode;

if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;

return true;

}
</script>		
		
<script type="text/javascript">
	var theme_url = '<?=$path;?>';
	var base_url = '<?=$base_url;?>';
	</script>
	
	<script>
	function goBack() {
	  window.history.back();
	}
	</script>
	<script>
		function gmprofile() {
		  alert('Yönetici profilini görüntüleyemezsiniz.');
		}
	</script>
	<script>
		function location.reload() {
		location.reload();
		}
	</script>			
		
<script>
var myVar = setInterval(myTimer, 100);

function myTimer() {
	var d = new Date();
  document.getElementById("serverClock").innerHTML = d.toLocaleTimeString();
}
</script>		
		
		<script type="text/javascript">

			$('#onloaddel').remove();
			/*$('.itemicon').mousemove(function(event) {
				var ht = $(this).find('.itemozellik').outerHeight();
				$(this).find('.itemozellik').css({
					top:(event.offsetY-ht)+'px',
					left:event.offsetX+'px'
				})
			});*/


			$('#irkdegis').click(function(){
				if(!$('#irkcheck').prop('checked')){
					alert('Lütfen "Irk Değişimi Yapmayı Onaylıyorum." Seçeneğini İşaretleyin !');
				}else{
					$('#irkform').submit();
				}
			});

					$('.itemicon').mousemove(function(a){
							$(this).find('.itemozellik').css('top',(a.offsetY+20)+'px');
							$(this).find('.itemozellik').css('left',(a.offsetX+20)+'px');
						});

			function numberValidate(evt){
				var theEvent = evt || window.event;
				var key = theEvent.keyCode || theEvent.which;
				key = String.fromCharCode( key );
				var regex = /[0-9]|\./;
				if( !regex.test(key) ) {
					theEvent.returnValue = false;
					if(theEvent.preventDefault) theEvent.preventDefault();
				}
			}

			function registerOpen(){
				new modal('#reg_modal');
				var rndnm = Math.floor(Math.random() * 9999)+1000;
				$('#captcha').attr('src',"captchaf70c.png?i="+rndnm);
				$('#captchatoken').attr('value',rndnm);
				$('[name="fstrNumber"]').on("blur", function () {
					var last = $(this).val().substr($(this).val().indexOf("-") + 1);

					if (last.length == 3) {
						var move = $(this).val().substr($(this).val().indexOf("-") - 1, 1);
						var lastfour = move + last;

						var first = $(this).val().substr(0, 9);

						$(this).val(first + '-' + lastfour);
					}
				});

				$('#registerForm').submit(function(e){
					var x = $(this).serializeArray();
					$.ajax({
						url:'./register.php',
						method: 'POST',
						data:x,
						success:function(data){
							alert(data);
							if(data == "Başarıyla Kayıt Oldunuz."){
								$('.close_mw').click();
								document.location.reload();
							}
						},
						error:function(){
							alert("Bir sorun oluştu :(");
						}
					});
					return false;
				});

			}
		</script>

	<script type="text/javascript">

		$('[name="strNumber"]').mask("(999) 999-9999");
		$('[name="strNumber"]').on("blur", function () {
			var last = $(this).val().substr($(this).val().indexOf("-") + 1);

			if (last.length == 3) {
				var move = $(this).val().substr($(this).val().indexOf("-") - 1, 1);
				var lastfour = move + last;

				var first = $(this).val().substr(0, 9);

				$(this).val(first + '-' + lastfour);
			}
		});

	</script>

		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120609349-2"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-120609349-2');

			gtag('set', {'user_id': '212769'});		</script>
		<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  '<?=$path;?>js/fbevents.js');
  fbq('init', '591783331285090');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=591783331285090&amp;ev=PageView&amp;noscript=1"
/></noscript>

<SCRIPT LANGUAGE="Javascript"><!-- RIGHT CLICK -->
	var isNS = (navigator.appName == "Netscape") ? 1 : 0;
	var EnableRightClick = 0;
	if(isNS)
	document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
	function mischandler(){
	if(EnableRightClick==1){ return true; }
	else {return false; }
	}
	function mousehandler(e){
	if(EnableRightClick==1){ return true; }
	var myevent = (isNS) ? e : event;
	var eventbutton = (isNS) ? myevent.which : myevent.button;
	if((eventbutton==2)||(eventbutton==3)) return false;
	}
	function keyhandler(e) {
	var myevent = (isNS) ? e : window.event;
	if (myevent.keyCode==96)
	EnableRightClick = 1;
	return;
	}
	document.oncontextmenu = mischandler;
	document.onkeypress = keyhandler;
	document.onmousedown = mousehandler;
	document.onmouseup = mousehandler;
</script>
</html>