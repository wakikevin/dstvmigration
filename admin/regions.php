<!--Include the header file-->
<?php 
include('includes/header.php'); 

?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php 
		echo setMenu(3);
	 ?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Manage Regions <small>manage dashboard regions</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Dashboard Regions</a>
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
								<i class="fa fa-globe"></i>Dashboard Regions Table
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
											<a href="regionform.php"><button id="sample_editable_1_new" class="btn green">
											Add New <i class="fa fa-plus"></i>
											</button></a>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
										<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
										</button>
										<ul class="dropdown-menu pull-right">
											<li>
												<a href="#">
												Print </a>
											</li>
											<li>
												<a href="#">
												Save as PDF </a>
											</li>
											<li>
												<a href="#">
												Export to Excel </a>
											</li>
										</ul>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-bordered table-hover" id="regions">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#regions .checkboxes"/>
								</th>
								<th>
									 Region Name
								</th>
								
								<th>
									 Status
								</th>
                                <th>
									 
								</th>
							</tr>
							</thead>
                            <?php
								$regions = getData('regions');
								//print_r($users);
							?>
							<tbody>
                            <?php 
							if(count($regions) >0 ){
									foreach($regions as $region):
									
									if($region->status == 1):
										$status = '<span class="label label-sm label-success">
                                        Active </span>';
									else:
										$status = '<span class="label label-sm label-warning">
                                        In - Active </span>';
									endif;
							?>
                                <tr class="odd gradeX">
                                    <td>
                                        <input type="checkbox" class="checkboxes" value="1"/>
                                    </td>
                                    <td>
                                         <?php echo $region->name; ?>
                                    </td>
                                    
                                    <td>
                                       <?php echo $status; ?> 
                                    </td>
                                     <td>
                                         <a href="regionform.php?id=<?php echo $region->id; ?>" class="btn btn-info" >Edit</a>
                                    </td>
                                </tr>
                            <?php
								endforeach;
							}else{
								
							?>
                           <!-- <tr class="odd gradeX">
                            	<td colspan="3">NO REGIONS TO DISPLAY</td>
                             </tr>-->
                             <?php
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