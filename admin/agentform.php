<!--Include the header file-->
<?php 
include('includes/header.php'); 

//get post id\
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

if($id != ''){
		
		$agent = getRecord('agents',$id);
		
}

?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php 
		echo setMenu(5);
	 ?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Manage Agents <small>manage dashboard agents</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Dashboard Agents</a>
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
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>AGENT DETAILS
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
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="submit.php" method="post" id="frmAgents" class="form-horizontal">
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										sending....
									</div>
                                    <?php
										//get active regions
										$where = array('status'=>1);
										$locations = getData('locations',$where);
									?>
                                    <div class="form-group">
										<label class="control-label col-md-3">Location <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
                                        	<div class="input-icon right">
												<i class="fa"></i>
											<select class="form-control select2me" name="location">
												<option value="">Select location</option>
                                                <?php
												if(count($locations) >0 ){
													foreach($locations as $location):
													
													if(isset($agent->location_id) && $agent->location_id == $location->id ){
														$selected = 'selected="selected"';
													}else{
														$selected = '';
														}
												?>
													<option <?php echo $selected; ?> value="<?php echo $location->id; ?>"><?php echo $location->name; ?></option>
												<?php
													endforeach;
												}
												?>
												
											</select>
                                            </div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Name <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<div class="input-icon right">
												<i class="fa"></i>
												<input type="text" class="form-control" name="name" value="<?php echo isset($agent->name) ? $agent->name : ''; ?>"/>
											</div>
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="control-label col-md-3">Email <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
                                        	<div class="input-icon right">
												<i class="fa"></i>
											<input name="email" type="text" class="form-control" value="<?php echo isset($agent->email) ? $agent->email : ''; ?>"/>
                                            </div>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">Phone <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
                                        	<div class="input-icon right">
												<i class="fa"></i>
											<input name="phone" type="text" class="form-control" value="<?php echo isset($agent->phone) ? $agent->phone : ''; ?>"/>
                                            </div>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-3">Status <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
                                        <div class="input-icon right">
												<i class="fa"></i>
											<select class="form-control select2me" name="status">
												<option value="">Select Status</option>
												<option value="1" <?php echo isset($agent->status) && $agent->status == 1  ? 'selected="selected"' : ''; ?>>Active</option>
												<option value="0" <?php echo isset($agent->status) && $agent->status == 0  ? 'selected="selected"' : ''; ?>>In - Active</option>
												
											</select>
                                            </div>
										</div>
									</div>
									
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
                                        <input type="hidden" name="action" value="frmAgent" />
                                        <input type="hidden" name="id" value="<?php echo isset($agent->id)   ? $agent->id :0 ; ?>" />
                                        <input type="hidden" name="task" value="<?php echo isset($agent->id)   ? 'update' : 'save'; ?>" />
											<button type="submit" class="btn green">Submit</button>
											<button type="button" class="btn default">Cancel</button>
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END VALIDATION STATES-->
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