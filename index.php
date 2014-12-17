<?php
//include header file
include('includes/header.php');

//security token
$token = generateToken();

//get refferring url
$referrer = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '' ;
$utm_source = isset($_REQUEST["utm_source"]) ? $_REQUEST["utm_source"] : '' ;
$utm_medium = isset($_REQUEST["utm_medium"]) ? $_REQUEST["utm_medium"] : '' ;
$utm_campaign = isset($_REQUEST["utm_campaign"]) ? $_REQUEST["utm_campaign"] : '' ;
$source = isset($_REQUEST["s"]) ? $_REQUEST["s"] : 2 ;


?>
        <div class="campaign-logo"> 
        	<?php
			if($source == 1){
				?>
                <img src="images/scangroup_logo.png" alt="">
			<?php
			}
			else{
				?>
        <img src="images/campaign-logo.png" alt=""> 
        	<?php
			}
			?>
        </div>

        <div class="dstv-logo"><img src="images/dstv-logo.png" alt=""></div>

        <div class="body-bg"></div>
        
        <div class="content-main">
            
            <div class="left-wing">
                <div class="display-table">
                    <div class="vertical-align">
                        <div class="banner">
                            <img src="images/dstv-hd-decoder.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="copyright-bar">
                    <div class="copy-text">&copy; 2014 MultiChoice Africa Limited. All rights reserved.</div>
                    <div class="digital-sticker"><img src="images/digital_sticker.png" alt=""></div>
                </div>
            </div>

            <div class="right-wing">
                <div class="display-table">
                    <div class="vertical-align">
                        <div class="fixer">
                            <div class="wrap">
                                    <div class="counter-box">
                                    <h3>The countdown is on:</h3>
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
                                                    <option value="<?php echo $location->id; ?>"><?php echo ucfirst(strtolower($location->name)); ?></option>
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
                                        <input type="hidden" name="source" id="source" value="<?php echo $source; ?>" class="textbox" />
                                        <input type="hidden" name="referrer" id="referrer" value="<?php echo $referrer; ?>" class="textbox" />
                                        <input type="hidden" name="utm_source" id="utm_source" value="<?php echo $utm_source; ?>" class="textbox" />
                                        <input type="hidden" name="utm_medium" id="utm_medium" value="<?php echo $utm_medium; ?>" class="textbox" />
                                        <input type="hidden" name="utm_campaign" id="utm_campaign" value="<?php echo $utm_campaign; ?>" class="textbox" />
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

        </div>

        <div class="footer">
            &copy; MultiChoice Africa Limited. All rights reserved.
        </div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57764505-1', 'auto');
  ga('send', 'pageview');

</script>
      
<?php
 //include footer
 include('includes/footer.php');
 
 ?>