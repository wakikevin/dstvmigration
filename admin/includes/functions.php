<?php

//start session
session_start();

//include config file
include('includes/config.php');

//include database class
include('includes/ORM.class.php');

//include excelwriter
include('includes/excelwriter.inc.php');

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

//funvtion to return the menu
function setMenu($active = 1){
	
	//initialize database;
	initializeDB();
	
	//check if user exists
	$menus = ORM::for_table(DBPREFIX.'menus')->where(array('isactive' => 1))->find_many();
	$menuHtml= '<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu page-sidebar-menu-light" data-auto-scroll="true" data-slide-speed="200">';
	
	if(count($menus) > 0){
		//echo count($menus);
	
		foreach($menus as $menu):
			
			//set first and last
			if($x == 1){
				$num = ' first';
			}elseif($x == count($menus)){
				$num = ' last';
			}else{
				$num = ' ';
			}
			
		
			//set active
			if($menu->id == $active){
					$class = ' active open';
					$selected = '<span class="selected"></span>
					<span class="arrow open"></span>';
			}else{
					$class = '';
					$selected = '';
			}
			
			
			$menuHtml .= '<li class="'.$class.$num.'">
					<a href="'.$menu->linkpage.'">
					<i class="'.$menu->icon.'"></i>
					<span class="title">'.$menu->title.'</span>
					'.$selected.'
					</a>
					
				</li>';
			$x++;
		endforeach;
		
		
	}else{
		
	}
	$menuHtml .='</ul>
			</div>
		</div>';
	return $menuHtml;
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

//function check login
function isLoggedIn($session = array()){
	//print_r($session);
	
	if(count($session) > 0 ){
		
			if(!isset($session['userid']) || $session['userid'] ==''){
				//header('location:login.php');
				echo '<script type="text/javascript">
					window.location.href = "login.php";
				  </script>';
			}  
	}else{
		echo '<script type="text/javascript">
				window.location.href = "login.php";
			  </script>';
		//header('location:login.php');
	}
	
	
}



?>