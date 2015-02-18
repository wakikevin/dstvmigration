<?php

//include functions.php
include('includes/functions.php');

//get action and task
$action = $_REQUEST['action']; 
$task = $_POST['task'];
if($action == 'frmRegion'):
	switch($task):
		case 'save':
			saveRegion();
		break;
		case 'update':
			saveRegion($_POST['id']);
		break;
		default:
			saveRegion();
		break;
	endswitch;
elseif($action == 'frmLocation'):
	switch($task):
		case 'save':
			saveLocation();
		break;
		case 'update':
			saveLocation($_POST['id']);
		break;
		default:
			saveLocation();
		break;
	endswitch;
elseif($action == 'frmAgent'):
	switch($task):
		case 'save':
			saveAgent();
		break;
		case 'update':
			saveAgent($_POST['id']);
		break;
		default:
			saveAgent();
		break;
	endswitch;
elseif($action == 'login'):
	
	login();
elseif($action == 'logout'):
	
	logout();
	
endif;

//function to save regions
function saveRegion($id = 0){
	
	//get posted data
	$name = $_POST['name'];
	$status = $_POST['status'];
	
	//initialize database;
	initializeDB();
	
	//check if user exists
	if($id != 0){
		$region = ORM::for_table(DBPREFIX.'regions')->find_one($id);
	}else{
		$region = ORM::for_table(DBPREFIX.'regions')->create();
	}
	
	$region->name = $name;
	$region->status = $status;
	if($region->save()){
		header('location:regions.php');
	}else{
		header('location:regionform.php');
	}	
}
//function to save location
function saveLocation($id = 0){
	
	
	//get posted data
	$region = $_POST['region'];
	$name = $_POST['name'];
	$contactname = $_POST['contactname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$physical_location = $_POST['location'];
	$status = $_POST['status'];
	
	//initialize database;
	initializeDB();
	
	if($id != 0){
		$location = ORM::for_table(DBPREFIX.'locations')->find_one($id);
	}else{
		$location = ORM::for_table(DBPREFIX.'locations')->create();
	}
	//check if user exists
	
	$location->name = $name;
	$location->region_id = $region;
	$location->email = $email;
	$location->phone = $phone;
	$location->contact_name = $contactname;
	$location->physical_location = $physical_location;
	$location->status = $status;
	if($location->save()){
		
		header('location:locations.php');
	}else{
		header('location:locationform.php');
	}	
}

//function to save location
function saveAgent($id = 0){
	
	//get posted data
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$location = $_POST['location'];
	$status = $_POST['status'];
	
	//initialize database;
	initializeDB();
	
	//check if user exists
	
	if($id != 0){
		$agent = ORM::for_table(DBPREFIX.'agents')->find_one($id);
	}else{
		$agent = ORM::for_table(DBPREFIX.'agents')->create();
	}
	$agent->name = $name;
	$agent->email = $email;
	$agent->phone = $phone;
	$agent->location_id = $location;
	$agent->status = $status;
	if($agent->save()){
		
		header('location:agents.php');
	}else{
		header('location:agentform.php');
	}	
}

function login(){
	
	//get post data
	$username = $_POST['username'];
	$password = md5($_POST['password']);	
	$array = array("username"=>$username,"password"=>$password,"status"=>1);
	
	//initialize database;
	initializeDB();
	
	$user = ORM::for_table(DBPREFIX.'users')->where($array)->find_one();
	
	if(count($user) > 0 ){
			$_SESSION['userid'] = $user->id;
			$_SESSION['name'] = $user->name;
			//header('location:index.php');
			echo '<script type="application/javascript"> window.location.href= "index.php";</script>';
	}else{
		//header('location:login.php');	
		echo '<script type="application/javascript"> window.location.href= "login.php";</script>';
	}
}

function logout(){
	
	session_destroy();
	
	//header('location:login.php');
	echo '<script type="application/javascript"> window.location.href= "login.php";</script>';
}
?>