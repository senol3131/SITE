<?PHP
$dbo->doquery('SELECT site_path,lang,server_name FROM _Odestashield_Site');
$pathr 		= $dbo->result('site_path');
$base_url 	= 'http://'.$_SERVER['HTTP_HOST'].'/'.$pathr;
$path 		= 'http://'.$_SERVER['HTTP_HOST'].'/'.$pathr. TEMPLATE . TEMPLATE_DIR;
$imgpath 	= 'http://'.$_SERVER['HTTP_HOST'].'/'.$pathr. TEMPLATE . TEMPLATE_DIR .'/images/';
$launguage 	= $dbo->result('lang');
$ServerName = $dbo->result('server_name');
?>