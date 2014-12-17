<?php
//include header file
include('includes/header.php');

//security token
$token = generateToken();

//get refferring url
$referrer = $_SERVER["HTTP_REFERER"];


?>
        <div class="campaign-logo"> <img src="images/campaign-logo.png" alt=""> </div>

        <div class="dstv-logo"><img src="images/dstv-logo.png" alt=""></div>

        <div class="body-bg"></div>
        
        <div class="content-main">
            <div class="right-wing">
                <div class="display-table">
                    <div class="vertical-align">
                        <div class="fixer">
                            <div class="wrap">
                                    <div class="counter-box">
                                    <h3>The countdown to digital is on:</h3>
                                    <div class="clock"></div>
                                    <div class="message"></div>
                                    <div class="order-form"> 
                                    <h4>To get this special online offer fill in the form below:</h4>
                                   <form action="#" method="post" id="frmDetails">
                                        
                                        <input type="text" placeholder="Name" id="name" name="name">
                                        <input type="text" placeholder="Phone number" id="mobile" name="mobile">
                                        <input type="text" placeholder="Email" id="email" name="email">
                                       <div class="selectdiv">  
                                            <select class="selectboxdiv" name="location" id="location">
                                              <option value="">Area</option>
                                              <?php 
											  //get active locations
											  $where = array("status"=>1); 
											  $regions = getData('regions',$where);
											  if(count($regions) > 0){
												  foreach($regions as $region):
											  ?>
                                              		<optgroup label="<?php echo $region->name; ?>">
                                                    
                                                    <?php
													$wherer = array("region_id"=>$region->id,"status" => 1); 
													$locations = getData('locations',$wherer);
													  if(count($locations) > 0){
														  foreach($locations as $location):
													?>
                                                    <option value="<?php echo $location->id; ?>"><?php echo $location->name; ?></option>
                                                    <?php
														endforeach;
													  }
													  ?>
                                                     </optgroup>
                                                 
                                             <?php
												endforeach;
											  }
											  ?>
                                            </select>
                                            <div class="out">Area</div>
                                        </div>
                                        <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" class="textbox" />
                                        <input type="hidden" name="referrer" id="referrer" value="<?php echo $referrer; ?>" class="textbox" />
                                        <input type="hidden" name="action" id="action" value="save" class="textbox" />
                                        <input type="button" class="submit" id="submit" value="get a call back">
                                       </form>
                               </div>
                                </div>
                                <div class="disclaimer">By submiting this form you consent to DStv using your information as entered above.</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="left-wing">
                <div class="display-table">
                    <div class="vertical-align">
                        <div class="banner">
                            <img src="images/dstv-hd-decoder.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="copyright-bar">
                    <div class="copy-text">&copy; 2014 MultiChoice (PTY) LTD. All rights reserved.</div>
                </div>
            </div>

        </div>

        <div class="footer">
            &copy; 2014 MultiChoice (PTY) LTD. All rights reserved.
        </div>

      
<?php
 //include footer
 include('includes/footer.php');
 
 ?>