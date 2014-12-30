<?php
//include the functions file
include('includes/functions.php');

//check what action is required.
$action = $_POST['action'];

if($action == 'save'):

	//call function to save user details
	saveData();


endif;


//function to save data
function saveData(){

	//initialize database
	initializeDB();
	
	//initiatte validation class
	$validate = new Validation();
	$error = array();
	
	//get posted data
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$location = $_POST['location'];
	$utm_source = $_POST['utm_source'];
	$utm_medium = $_POST['utm_medium'];
	$utm_campaign = $_POST['utm_campaign'];
	$referrer = $_POST['referrer'];
	$source = $_POST['source'];
	$token =$_POST['token'];

	//check if token is valid
	if(checkToken($token)){
		
		//validate the fields
		if($validate->validate_all($name)){
			if($validate->validate_email($email)){
				if($validate->validate_phone($mobile)){
							//get assigned agent
							$sql = 'SELECT a.* FROM dstv_agents a WHERE a.location_id = '.$location;
							$agent = getRawDataRecord('agents',$sql);
							
							if(count($agent) > 0){
								
								$agent_id = $agent->id;
								$agent_name = $agent->name;
								$agent_email = $agent->email;	
								$agent_phone = $agent->phone;
							}
							// save the details into database
							//check if user has ever shared
							try{
								$newLead = ORM::for_table(DBPREFIX.'leads')->create();
								$newLead->name = $name;
								$newLead->email = $email;
								$newLead->mobile = $mobile;
								$newLead->location_id = $location;
								$newLead->agent_id = $agent_id;
								$newLead->utm_source = $utm_source;
								$newLead->utm_medium = $utm_medium;
								$newLead->utm_campaign = $utm_campaign;
								$newLead->referrer = $referrer;
								$newLead->source_id = $source;
								
								$newLead->save();
								$id = $newLead->id();
								
								if($id):
									$htmllink = 'edm/index.html';
									$message = file_get_contents($htmllink);
									$message = str_replace("{name}", $name, $message);
									$message = str_replace("{phone}", $mobile, $message);
									$message = str_replace("{email}", $email, $message);
									//$message = str_replace("{town}", $location, $message);
									$message = str_replace(chr(194),"", $message);
									//send email to admin
									sendEmail(EMAIL_FROM_ADDRESS,EMAIL_FROM_NAME,$message);
									
									//send email to agent
									sendEmail($agent_email,$agent_name,$message);
									
									//send sms to agent
									$sms = 'Hi '.$agent_name.', New Lead: '.$name.' - '.$mobile. '. Kindly act on this';
									sendSMS($agent_phone,$sms);
									
									//deactivate code
									deactivateCode($token);
									
									$error['code'] = '000';
									$error['id'] = $id;
									$error['desc'] = '<h2>Congratulations!</h2>';
								else:
									$error['code'] = '001';
									$error['desc'] = 'Sorry Try Again. Your details could not be saved at this time. Please try again later';
								endif;
								
							}catch(Exception $e){
								//print_r($e);
								$error['code'] = '001';
								$error['desc'] = 'The Email Address has already been used. Please try with another email';
							}
							
							
					
				}else{
					$error['code'] = '002';
					$error['desc'] = 'Please enter correct phone number';	
				}
			}else{
				$error['code'] = '002';
				$error['desc'] = 'Please enter correct email';	
			}
		}else{
			$error['code'] = '002';
			$error['desc'] = 'Please enter correct name';	
		}
	}else{
		$error['code'] = '001';
		$error['desc'] = 'Your security token has expired. Please try again later';
	}
	
	echo json_encode($error);
}

?>