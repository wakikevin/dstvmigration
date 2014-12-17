<?php

error_reporting(0);
//include config file
include('includes/config.php');

//include database class
include('includes/ORM.class.php');

//include mailer class
include('includes/phpmailer/class.phpmailer.php');

//include va;lidation class
include('includes/Validation.class.php');

//function to convert images to data uris
function convertToUri($image){


	// Read image path, convert to base64 encoding
	$imageData = base64_encode(file_get_contents($image));
	$mime = '';
	
	// Format the image SRC:  data:{mime};base64,{data};
	/*if(function_exists('mime_content_type')):
		$mime = mime_content_type($image);
	else:
		$mime = '';
	endif;*/
		
	$src = 'data: '.$mime.';base64,'.$imageData;


return $src;
	
}

function initializeDB(){
	
	ORM::configure(array(
    'connection_string' => CONNECTION_STRING,
    'username' => DATABASE_USER,
    'password' => DATABASE_PASSWORD
	));


}

function sendEmail($sendToAddress, $sendToName, $message){
		try{
			$smtp_account = SMTP_USER_ACCOUNT;
			$mailSender = new PHPMailer();
			
			if(defined(SMTP_USER_ACCOUNT) && SMTP_USER_ACCOUNT != ''){
				$mailSender->IsSMTP();
				$mailSender->Host = EMAIL_SERVER;
				$mailSender->SMTPAuth = SMTP_AUTH;
				$mailSender->SMTPSecure = "ssl";
				$mailSender->SMTPDebug = 2;
				$mailSender->Port = EMAIL_SERVER_PORT;
				$mailSender->IsHTML(true);
				$mailSender->Username = SMTP_USER_ACCOUNT;
				$mailSender->Password = SMTP_USER_PASSWORD;
				$mailSender->setFrom(SMTP_USER_ACCOUNT, SMTP_USER_ACCOUNT);
				//$mailSender->SetFrom(EMAIL_FROM_ADDRESS_INNER, EMAIL_FROM_NAME_INNER);
				$mailSender->AddReplyTo(defined('EMAIL_REPLY_TO_ADDRESS_INNER') ? EMAIL_REPLY_TO_ADDRESS_INNER : "", defined('EMAIL_REPLY_TO_NAME_INNER') ? EMAIL_REPLY_TO_NAME_INNER : "");
				$mailSender->Subject = defined('EMAIL_SUBJECT') ? EMAIL_SUBJECT : 'DSTV Leads';
				$mailSender->AltBody = EMAIL_ALTERNATE_BODY_MESSAGE;
				$mailSender->MsgHTML($message);
				$mailSender->AddAddress($sendToAddress, $sendToName);
				//$mailSender->AddAddress(EMAIL_FROM_ADDRESS_INNER, EMAIL_FROM_NAME_INNER);
			}else{
				$mailSender->Host = EMAIL_SERVER;
				$mailSender->SMTPDebug = 2;
				$mailSender->Port = 25;
				$mailSender->IsHTML(true);
				//$mailSender->SetFrom(EMAIL_FROM_ADDRESS, EMAIL_FROM_NAME);
				$mailSender->SetFrom($sendToAddress, $sendToName);
				$mailSender->AddReplyTo(defined('EMAIL_REPLY_TO_ADDRESS') ? EMAIL_REPLY_TO_ADDRESS : "", defined('EMAIL_REPLY_TO_NAME') ? EMAIL_REPLY_TO_NAME : "");
				$mailSender->Subject = defined('EMAIL_SUBJECT') ? EMAIL_SUBJECT : 'DSTV Leads';
				$mailSender->AltBody = EMAIL_ALTERNATE_BODY_MESSAGE;
				$mailSender->MsgHTML($message);
				//$mailSender->AddAddress($sendToAddress, $sendToName);
				$mailSender->AddAddress(EMAIL_FROM_ADDRESS, EMAIL_FROM_NAME);
			}
			
			if(!$mailSender->Send()){
				return false;
			} else {
				return true;
			}
		}catch (Exception $ex){
			return false;
		}
	}
	
	function sendAgentEmail($sendToAddress, $sendToName, $message){
		try{
			$smtp_account = SMTP_USER_ACCOUNT;
			$mailSender = new PHPMailer();
			
			if(defined(SMTP_USER_ACCOUNT) && SMTP_USER_ACCOUNT != ''){
				$mailSender->IsSMTP();
				$mailSender->Host = EMAIL_SERVER;
				$mailSender->SMTPAuth = SMTP_AUTH;
				$mailSender->SMTPSecure = "ssl";
				$mailSender->SMTPDebug = 2;
				$mailSender->Port = EMAIL_SERVER_PORT;
				$mailSender->IsHTML(true);
				$mailSender->Username = SMTP_USER_ACCOUNT;
				$mailSender->Password = SMTP_USER_PASSWORD;
				$mailSender->setFrom(SMTP_USER_ACCOUNT, SMTP_USER_ACCOUNT);
				//$mailSender->SetFrom(EMAIL_FROM_ADDRESS_INNER, EMAIL_FROM_NAME_INNER);
				$mailSender->AddReplyTo(defined('EMAIL_REPLY_TO_ADDRESS_INNER') ? EMAIL_REPLY_TO_ADDRESS_INNER : "", defined('EMAIL_REPLY_TO_NAME_INNER') ? EMAIL_REPLY_TO_NAME_INNER : "");
				$mailSender->Subject = defined('EMAIL_SUBJECT') ? EMAIL_SUBJECT : 'DSTV Leads';
				$mailSender->AltBody = EMAIL_ALTERNATE_BODY_MESSAGE;
				$mailSender->MsgHTML($message);
				$mailSender->AddAddress($sendToAddress, $sendToName);
				//$mailSender->AddAddress(EMAIL_FROM_ADDRESS_INNER, EMAIL_FROM_NAME_INNER);
			}else{
				$mailSender->Host = EMAIL_SERVER;
				$mailSender->SMTPDebug = 2;
				$mailSender->Port = 25;
				$mailSender->IsHTML(true);
				$mailSender->SetFrom(EMAIL_FROM_ADDRESS, EMAIL_FROM_NAME);
				//$mailSender->SetFrom($sendToAddress, $sendToName);
				$mailSender->AddReplyTo(defined('EMAIL_REPLY_TO_ADDRESS') ? EMAIL_REPLY_TO_ADDRESS : "", defined('EMAIL_REPLY_TO_NAME') ? EMAIL_REPLY_TO_NAME : "");
				$mailSender->Subject = defined('EMAIL_SUBJECT') ? EMAIL_SUBJECT : 'DSTV Leads';
				$mailSender->AltBody = EMAIL_ALTERNATE_BODY_MESSAGE;
				$mailSender->MsgHTML($message);
				$mailSender->AddAddress($sendToAddress, $sendToName);
				//$mailSender->AddAddress(EMAIL_FROM_ADDRESS, EMAIL_FROM_NAME);
			}
			
			if(!$mailSender->Send()){
				return false;
			} else {
				return true;
			}
		}catch (Exception $ex){
			return false;
		}
	}

function generateToken(){
	
	//initialize database;
	initializeDB();
	
	//generate code
	$code = 'DL-'.substr(strtoupper(md5(time())),0,10);
	
	//check if user has ever shared
	$newCode = ORM::for_table(DBPREFIX.'tokens')->create();
	$newCode->token = $code;
	$newCode->save();
	
return $code;
}

//code to check if code is still valid
function checkToken($token){
	
	//initialize database;
	initializeDB();
	
	//check if user exists
	$tokens = ORM::for_table(DBPREFIX.'tokens')->where('token',$token)->find_one();
	
	if(isset($tokens) && $tokens->isUsed == 0){
		return true;
	}else{
		return false;
	}
}

//deactivate code
function deactivateCode($token){
	//initialize database;
	initializeDB();
	
	//check if user exists
	$tokens = ORM::for_table(DBPREFIX.'tokens')->where('token',$token)->find_one();
	$tokens->isUsed = 1;
	$tokens->save();
	
}

//function to get data 
function getData($table,$where = array()){
	
	//initialize database;
	initializeDB();
	
	//check if user exists
	$data = ORM::for_table(DBPREFIX.$table)->where($where)->order_by_asc('id')->find_many();
	
	return $data;	
}

//function to get data 
function getRecord($table,$id){
	
	//initialize database;
	initializeDB();
	
	//check if user exists
	$data = ORM::for_table(DBPREFIX.$table)->find_one($id);
	
	return $data;	
}

function getRawData($table,$sql = ''){
	
	//initialize database;
	initializeDB();
	
	//check if user exists
	$data = ORM::for_table(DBPREFIX.$table)->raw_query($sql)->order_by_asc('id')->find_many();
	
	return $data;	
}

function getRawDataRecord($table,$sql = ''){
	
	//initialize database;
	initializeDB();
	
	//check if user exists
	$data = ORM::for_table(DBPREFIX.$table)->raw_query($sql)->find_one();
	
	return $data;	
}

function sendSMS($phonenumber,$message){
	$account_username = 'Green_Soft';
	$account_password ="Test1234";
	$sender = 'yangumail';
	
	$xml = 'XML=
				<SMS>
				<authentication>
				<username>'.$account_username.'</username>
				<password>'.$account_password.'</password>
				</authentication>
				<message>
				<sender>'.$sender.'</sender>
				<text>'.$message.'</text>
				
				<recipients>
				<gsm>'.$phonenumber.'</gsm>
				
				</recipients>
				</message>
				</SMS>';
	$url ='http://api.infobip.com/api/v3/sendsms/xml';
	
	
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_MUTE, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		
		//print_r($output);
				
		if($output):
			$status=true;
		else:
			$status=false;
		endif;
		return $status;
	
}


//do post
function do_post_request($url, $data, $optional_headers = null)
{
  $params = array('http' => array(
              'method' => 'POST',
              'content' => $data
            ));
  if ($optional_headers !== null) {
    $params['http']['header'] = $optional_headers;
  }
  $ctx = stream_context_create($params);
  $fp = @fopen($url, 'rb', false, $ctx);
  if (!$fp) {
    throw new Exception("Problem with $url, $php_errormsg");
  }
  $response = @stream_get_contents($fp);
  if ($response === false) {
    throw new Exception("Problem reading data from $url, $php_errormsg");
  }
  return $response;
}

?>