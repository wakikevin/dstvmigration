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
	$referrer = $_POST['referrer'];
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
								$newLead->referrer = $referrer;
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
									sendEmail($email,$name,$message);
									
									//send email to agent
									sendAgentEmail($agent_email,$agent_name,$message);
									
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
								
								$error['code'] = '001';
								$error['desc'] = 'Sorry Try Again. Your details could not be saved at this time. Please try again later';
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