<?php
	header('Access-Control-Allow-Origin: *');  

	ini_set("post_max_size", "100M");
    ini_set("upload_max_filesize", "100M");
    ini_set("memory_limit", "-1"); 

  	define('DEBUG_MODE',false);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
 
	$base = str_replace('required', '', __DIR__);
  	define('MURL','https://www.zappvariety.com/');
  	define('NAME_WEBSITE','Zappvariety');

	// define('DOCUMENT_ROOT',$_SERVER['DOCUMENT_ROOT'].'/zap/');
	// production
	define('DOCUMENT_ROOT',$_SERVER['DOCUMENT_ROOT'].'/');
	define('ROW_IN_DOC','10');
	define('BYTE_PER_KB','1000');
	 
	define('app_id','166994808024757');
	define('app_secret','b0bf73fa492cfd8b4d0125eeda9d5e51');
	define('default_graph_version','v2.10');

	define('GOOGLE_CLIENT_ID', '310104410325-k5ufrsold5trpadn00c424vidtqc2lpt.apps.googleusercontent.com');
	define('GOOGLE_CLIENT_SECRET', 'k-mfqWUZaQoL5r-rpu9NM1fP');
	define('GOOGLE_REDIRECT_URL', MURL.'index.php?route=user/gmailCallback');

	define('DEFAULT_PAGE','home');
	define('WEB_NAME','');
	define('IMAGE',MURL.'uploads/');
	define('IMAGE_PHOTO',MURL.'uploads/photo/'); 
	define('NO_PHOTO',MURL.'uploads/no_photo.jpg');
	define('DB','mysqli');
	define('KEY', 'appcom@fsp88');
	
	// Config DB localhost
	// define('PREFIX', 'm_');
	// define('DB_HOST','localhost');
	// define('DB_USER','root');
	// define('DB_PASS','root');
	// define('DB_DB','zapp_db');
	// define('DATE_FORMAT','Y-m-d');
	// Production
	define('PREFIX', 'm_');
	define('DB_HOST','localhost');
	define('DB_USER','zapp_db');
	define('DB_PASS','11ERN8GuaU');
	define('DB_DB','zapp_db');
	define('DATE_FORMAT','Y-m-d');

	// System config 
	define('DEFAULT_LANGUAGE','1');
	define('DEFAULT_LIMIT_PAGE','10');

	// email ssl
	define('email_username','support@fsoftpro.com');
	define('email_password','fiverama2');
	define('email_host','smtp.gmail.com');
	define('email_port','465');
	define('email_send','support@fsoftpro.com');
	define('email_stmpsecure','ssl');

	// email tls
	// define('email_username','');
	// define('email_password','');
	// define('email_host','');
	// define('email_port','25');
	// define('email_send','');
	// define('email_stmpsecure','TLS');

	// use PHPMailer\PHPMailer\PHPMailer;
	// use PHPMailer\PHPMailer\Exception;

	// require DOCUMENT_ROOT.'system/lib/PHPMailer-master-7/src/Exception.php';
	// require DOCUMENT_ROOT.'system/lib/PHPMailer-master-7/src/PHPMailer.php';
	// require DOCUMENT_ROOT.'system/lib/PHPMailer-master-7/src/SMTP.php';
	// global	$mail ;
	// $mail = new PHPMailer(true); //New instance, with exceptions enabled

	
?>