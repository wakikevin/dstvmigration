<?php

//define server parameters

if($_SERVER['HTTP_HOST'] == '192.168.2.78' || $_SERVER['HTTP_HOST'] == 'localhost'){
	
	
	define("BASE_URL", "http://192.168.2.78/dstv-switch");
	define('DATABASE_SERVER','localhost');
	define('DATABASE_USER','root');
	define('DATABASE_PASSWORD','');
	define('DATABASE_NAME','dstv_leads');
	define('DBPREFIX','dstv_');
	
	define('CONNECTION_STRING', 'mysql:host=localhost;dbname=dstv_leads');
}else{
	
	define("BASE_URL", "http://squadlab.com/dstv/leads");
	define('DATABASE_SERVER','dstvexplora.db.9126389.hostedresource.com');
	define('DATABASE_USER','dstvexplora');
	define('DATABASE_PASSWORD','PfqBM91q4j#');
	define('DATABASE_NAME','dstvexplora');
	define('DBPREFIX','dstv_');
	
	define('CONNECTION_STRING', 'mysql:host=dstvexplora.db.9126389.hostedresource.com;dbname=dstvexplora');
	
	
}

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