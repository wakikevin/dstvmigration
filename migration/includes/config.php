<?php

	define("BASE_URL", "http://localhost/dstvleads/migration");
	define('DATABASE_SERVER','localhost');
	define('DATABASE_USER','root');
	define('DATABASE_PASSWORD','admin');
	define('DATABASE_NAME','leads_mgt_system');
	define('DBPREFIX','dstv_');
	
	define('CONNECTION_STRING', 'mysql:host=localhost;dbname=leads_mgt_system');


//define email parameters
if($_SERVER['HTTP_HOST'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost'){
	define('EMAIL_SERVER','smtp.gmail.com');
	define('EMAIL_SERVER_PORT','465');
	define('SMTP_USER_ACCOUNT','dev.gsoft@gmail.com');
	define('SMTP_USER_PASSWORD','qualityseal2');
	define('EMAIL_SEND_DEBUG_MODE','0');
	define('SMTP_AUTH', true);
	define('EMAIL_FROM_ADDRESS', 'kevin.kyalo@squaddigital.com');
	define('EMAIL_FROM_NAME', 'Tecno Mobile');
	define('EMAIL_REPLY_TO_ADDRESS', 'kevin.kyalo@squaddigital.com');
	define('EMAIL_REPLY_TO_NAME', 'DSTV Leads');
	define('EMAIL_SUBJECT', 'DSTV Leads');
	define('EMAIL_ALTERNATE_BODY_MESSAGE', 'If you are aunable to see this email, contact the administrator.');
}else{
	define('EMAIL_SERVER','localhost');
	define('EMAIL_FROM_ADDRESS', 'kevinwaki@gmail.com');
	define('EMAIL_FROM_NAME', 'DSTV Leads');
	define('EMAIL_REPLY_TO_ADDRESS', 'kevinwaki@gmail.com');
	define('EMAIL_REPLY_TO_NAME', 'DSTV Leads');
	define('EMAIL_SUBJECT', 'DSTV Leads');
	define('EMAIL_ALTERNATE_BODY_MESSAGE', 'If you are aunable to see this email, contact the administrator.');
}


?>