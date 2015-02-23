<?php
//include header file
include('includes/header.php');

//security token
$token = generateToken();

$referrer = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'http://getdstv.co.ke' ;
$utm_source = isset($_REQUEST["utm_source"]) ? $_REQUEST["utm_source"] : '' ;
$utm_medium = isset($_REQUEST["utm_medium"]) ? $_REQUEST["utm_medium"] : '' ;
$utm_campaign = isset($_REQUEST["utm_campaign"]) ? $_REQUEST["utm_campaign"] : '' ;
$source = isset($_REQUEST["s"]) ? $_REQUEST["s"] : 2 ;

?>
<style type="text/css">
	.notification{margin-bottom:20px;padding:8px 10px;font-size:0.9em;-webkit-border-radius:3px;-moz-border-radius:3px;-ms-border-radius:3px;-o-border-radius:3px;border-radius:3px}.notification.error{background:#FFF7F9;border:#EC818E solid 1px;color:#F35252}.notification.loading{background:#E4F3D4;border:#86AA51 solid 1px;color:#62910F}
	.copy-text{
		width:250px;
		text-align:center;
		}
</style>
        <div class="dstv-logo"><img src="images/dstv-logo.png" alt=""></div>

        <div class="body-bg"></div>
        
        <div class="content-main">
            
            <div class="left-wing">
                 <div class="wrap">
                      <div class="menu">
                          <ul>
                            <li><a href="index.php"  data-rel="zappa">Zappa</a></li>
                            <li><a href="explora.php" class="current" data-rel="explora">Explora</a></li>
                            <li><a href="faq.php">FAQs</a></li>
                          </ul>
                          <br style="clear:left"/>
                      </div>
                      
                      <div class="tab-content">
                        <h3>The <span>DStv Explora</span> allows you to meet all the viewing needs of your family.</h3>
                        <ul>
                          <li>The DStv Explora</li>
                          <li>A world of viewing pleasure</li>
                          <li>Access to hundreds of extra titles via DStv Catch Up Plus</li>
                        </ul>
                      </div>
                      
                      <div class="banner">
                          <img src="images/dstv-hd-decoder.png" alt="">
                      </div>

                  </div>

                <div class="copyright-bar">
                    <div class="copy-text">&copy; 2014 MultiChoice (PTY) LTD. All rights reserved.</div>
                </div>
            </div>

            <div class="right-wing">
                <div class="display-table">
                    <div class="vertical-align">
                        <div class="fixer">
    <div class="wrap">
            <div class="counter-box">
            
            <div class="order-form"> 
            <h4>To get DStv installed in your home in 24 hours or less, fill in your details below:</h4>
            <div id="notify" class="notification error" style="display:none;">Error goes here</div>
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

      
<?php
 //include footer
 include('includes/footer.php');
 
 ?>