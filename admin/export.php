<?php
//include functions.php
include('includes/functions.php');

error_reporting(E_ALL);
$action = $_REQUEST['action'];



if($action == 'today'){
	export('today');	
}else{
	export();
}

function export($date = ''){

	if($date != ''){
		$sql = 'SELECT a.*, b.name as location,c.name as agent, d.name as source FROM dstv_leads a, dstv_locations b, dstv_agents c, dstv_leadsources d WHERE b.id = a.location_id AND c.id = a.agent_id AND d.id = a.source_id';
		$leads = getRawData('leads',$sql);
	}else{
		$sql = 'SELECT a.*, b.name as location,c.name as agent, d.name as source FROM dstv_leads a, dstv_locations b, dstv_agents c, dstv_leadsources d WHERE b.id = a.location_id AND c.id = a.agent_id AND d.id = a.source_id';
		$leads = getRawData('leads',$sql);
	}
	$tbl = '<table><tr><th><strong>
									 Name</strong>
								</th>
                               
								<th>
									<strong> Email</strong>
								</th>
								<th>
									<strong> Phone</strong>
								</th>
								<th>
									 <strong>Location</strong>
								</th>
                                <th>
									 <strong>Assigned Agent</strong>
								</th>
                                <th>
									<strong> Lead Source</strong>
								</th>
                                <th>
									<strong> Submitted On</strong>
								</th>
                                <th>
									<strong> Status</strong>
								</th>
                                <th>
									<strong> Referrer</strong>
								</th></tr>';
	
							if(count($leads) >0 ){
								foreach($leads as $lead):
								
									if($agent->status == 1):
										$status = '<span class="label label-sm label-success">
										Solved </span>';
									else:
										$status = '<span class="label label-sm label-warning">
										Assigned/Pending </span>';
									endif;
									$tbl .= '<tr>';
									$tbl .=' <td>'.$lead->name.'</td>';
                                   
                                    $tbl .='<td>'. $lead->email.' </td>';
                                    $tbl .='<td>'.$lead->mobile.'</td>';
                                    $tbl .='<td>'.$lead->location.'</td>';
                                    $tbl .='<td>'.$lead->agent.'</td>';
                                    $tbl .='<td>'.$lead->source.'</td>';
                                    $tbl .='<td>'.$lead->date_submitted.'</td>';
                                    $tbl .='<td>'.$status.'</td>';
                                    $tbl .='<td>'.$lead->referrer.'</td>';
                                	$tbl .='</tr>';
									
								endforeach;
							}
				$tbl .= '</table>';
	
					$filename = "dstvleads" . date('dmY') . ".xls"; 
					$excel = new ExcelWriter($filename);
					$myArr = array($tbl);
					$excel->writeLine($myArr);
					
					//header("location:".$filename);
					
					echo '<script type="text/javascript">window.location.href="'.$filename.'"; </script>';
					
					echo '<a href="index.php">Back to homepage</a>';
					exit;
}
?>