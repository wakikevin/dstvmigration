<!--Include the header file-->
<?php 
include('includes/header.php'); 

?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php 
		echo setMenu(6);
	 ?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Manage Leads <small>manage leads</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Dashboard Leads</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
				</ul>
				<div class="page-toolbar">
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
						Actions <i class="fa fa-angle-down"></i>
						</button>
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Dashboard Leads Table
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<!--<a href="leadform.php"><button id="sample_editable_1_new" class="btn green">
											Add New <i class="fa fa-plus"></i>
											</button></a>-->'
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
										<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu pull-right">
											
											<li>
												<a href="export.php">
												Export to Excel </a>
											</li>
										</ul>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-bordered table-hover" id="leads">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#leads .checkboxes"/>
								</th>
                                
								<th>
									 Name
								</th>
                               
								<th>
									 Email
								</th>
								<th>
									 Phone
								</th>
								<th>
									 Location
								</th>
                                <th>
									 Assigned Agent
								</th>
                                <th>
									 Lead Source
								</th>
                                <th>
									 Submitted On
								</th>
                                <th>
									 Status
								</th>
                                <th>
									 Referrer
								</th>
								
							</tr>
							</thead>
                            <?php
								$sql = 'SELECT a.*, b.name as location,c.name as agent, d.name as source FROM dstv_leads a, dstv_locations b, dstv_agents c, dstv_leadsources d WHERE b.id = a.location_id AND c.id = a.agent_id AND d.id = a.source_id';
								$leads = getRawData('leads',$sql);
								//print_r($users);
							?>
							<tbody>
                            <?php 
							if(count($leads) >0 ){
									foreach($leads as $lead):
									
									if($agent->status == 1):
										$status = '<span class="label label-sm label-success">
                                        Solved </span>';
									else:
										$status = '<span class="label label-sm label-warning">
                                        Assigned/Pending </span>';
									endif;
							?>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1"/>
                                    </td>
                                    
                                    <td>
                                         <?php echo $lead->name; ?>
                                    </td>
                                   
                                    <td>
                                        <a href="mailto:<?php echo $lead->email; ?>">
                                        <?php echo $lead->email; ?></a>
                                    </td>
                                    <td>
                                         <?php echo $lead->mobile; ?>
                                    </td>
                                   <td>
                                         <?php echo $lead->location; ?>
                                    </td>
                                    <td>
                                         <?php echo $lead->agent; ?>
                                    </td>
                                    <td>
                                         <?php echo $lead->source; ?>
                                    </td>
                                    <td>
                                         <?php echo $lead->date_submitted; ?>
                                    </td>
                                    <td>
                                         <?php echo $status; ?>
                                    </td>
                                     <td>
                                         <?php echo $lead->referrer; ?>
                                    </td>
                                </tr>
                            <?php
								endforeach;
							}
							?>
							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
					
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->

<?php
include('includes/footer.php');
?>