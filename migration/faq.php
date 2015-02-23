<?php
//include header file
include('includes/header.php');

//security token
$token = generateToken();

//get refferring url
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

<div class="faq-page">
        <div class="dstv-logo"><img src="images/dstv-logo.png" alt=""></div>

        <div class="body-bg"></div>
        
        <div class="content-main">
            
            <div class="left-wing">

               <div class="menu">
                    <ul>
                      <li><a href="index.php">Zappa</a></li>
                      <li><a href="explora.php">Explora</a></li>
                      <li><a href="faq.php" class="current">FAQs</a></li>
                    </ul>
                    <br style="clear:left"/>
                </div>
                 
            <div class="cd-faq">
                <ul class="cd-faq-categories">
                  <li><a class="selected" href="#basics">Basics</a></li>
                  <li><a href="#account">Account</a></li>
                  <li><a href="#payments">Payments</a></li>
                  <li><a href="#privacy">Privacy</a></li>
                  <li><a href="#delivery">Delivery</a></li>
                </ul> <!-- cd-faq-categories -->

                <div class="cd-faq-items">
                  <ul id="basics" class="cd-faq-group">
                    <li class="cd-faq-title"><h2>Basics</h2></li>
                     

                    <li>
                      <a class="cd-faq-trigger" href="#0">How do I sign up?</a>
                      <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi cupiditate et laudantium esse adipisci consequatur modi possimus accusantium vero atque excepturi nobis in doloremque repudiandae soluta non minus dolore voluptatem enim reiciendis officia voluptates, fuga ullam? Voluptas reiciendis cumque molestiae unde numquam similique quas doloremque non, perferendis doloribus necessitatibus itaque dolorem quam officia atque perspiciatis dolore laudantium dolor voluptatem eligendi? Aliquam nulla unde voluptatum molestiae, eos fugit ullam, consequuntur, saepe voluptas quaerat deleniti. Repellendus magni sint temporibus, accusantium rem commodi?</p>
                      </div> <!-- cd-faq-content -->
                    </li>

                  </ul> <!-- cd-faq-group -->

                  <ul id="account" class="cd-faq-group">
                    <li class="cd-faq-title"><h2>Account</h2></li>
                    <li>
                      <a class="cd-faq-trigger" href="#0">How do I change my password?</a>
                      <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!</p>
                      </div> <!-- cd-faq-content -->
                    </li>

                     

                    <li>
                      <a class="cd-faq-trigger" href="#0">How do I change my account settings?</a>
                      <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                      </div> <!-- cd-faq-content -->
                    </li>

                   
                  </ul> <!-- cd-faq-group -->

                  <ul id="payments" class="cd-faq-group">
                    <li class="cd-faq-title"><h2>Payments</h2></li>
                    <li>
                      <a class="cd-faq-trigger" href="#0">Can I have an invoice for my subscription?</a>
                      <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
                      </div> <!-- cd-faq-content -->
                    </li>

                    <li>
                      <a class="cd-faq-trigger" href="#0">Why did my credit card or PayPal payment fail?</a>
                      <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur accusantium dolorem vel, ad, nostrum natus eos, nemo placeat quos nisi architecto rem dolorum amet consectetur molestiae reprehenderit cum harum commodi beatae necessitatibus. Mollitia a nostrum enim earum minima doloribus illum autem, provident vero et, aspernatur quae sunt illo dolorem. Corporis blanditiis, unde, neque, adipisci debitis quas ullam accusantium repudiandae eum nostrum quis! Velit esse harum qui, modi ratione debitis alias laboriosam minus eaque, quod, itaque labore illo totam aut quia fuga nemo. Perferendis ipsa laborum atque assumenda tempore aspernatur a eos harum non id commodi excepturi quaerat ullam, explicabo, incidunt ipsam, accusantium quo magni ut! Ratione, magnam. Delectus nesciunt impedit praesentium sed, aliquam architecto dolores quae, distinctio consectetur obcaecati esse, consequuntur vel sit quis blanditiis possimus dolorum. Eaque architecto doloremque aliquid quae cumque, vitae perferendis enim, iure fugiat, soluta aut!</p>
                      </div> <!-- cd-faq-content -->
                    </li>

                    <li>
                      <a class="cd-faq-trigger" href="#0">Why does my bank statement show multiple charges</a>
                      <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                      </div> <!-- cd-faq-content -->
                    </li>
                  </ul> <!-- cd-faq-group -->

                  <ul id="privacy" class="cd-faq-group">
                    <li class="cd-faq-title"><h2>Privacy</h2></li>
                    <li>
                      <a class="cd-faq-trigger" href="#0">Can I specify my own private key?</a>
                      <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
                      </div> <!-- cd-faq-content -->
                    </li>

                    <li>
                      <a class="cd-faq-trigger" href="#0">How can I access my account data?</a>
                      <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus magni vero deserunt enim et quia in aliquam, rem tempore voluptas illo nisi veritatis quas quod placeat ipsa! Error qui harum accusamus incidunt at libero ipsum, suscipit dolorum esse explicabo in eius voluptates quidem voluptatem inventore amet eaque deserunt veniam dignissimos excepturi? Dolore, quo amet nostrum autem nemo. Sit nam assumenda, corporis ea sunt distinctio nostrum doloribus alias, beatae nesciunt dolore saepe consequuntur minima eveniet porro dolor officiis maiores ab obcaecati officia enim aliquam. Itaque fuga molestiae hic accusantium atque corporis quia id sequi enim vero? Hic aperiam sint facilis aliquam quia, accusamus tenetur earum totam enim est, error. Iusto, reiciendis necessitatibus molestias. Voluptatibus eos explicabo repellat nesciunt nam vero minima.</p>
                      </div> <!-- cd-faq-content -->
                    </li>
                  </ul> <!-- cd-faq-group -->

                  <ul id="delivery" class="cd-faq-group">
                    <li class="cd-faq-title"><h2>Delivery</h2></li>
                    <li>
                      <a class="cd-faq-trigger" href="#0">What should I do if my order hasn't been delivered yet?</a>
                      <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
                      </div> <!-- cd-faq-content -->
                    </li>

                    <li>
                      <a class="cd-faq-trigger" href="#0">How do returns or refunds work?</a>
                      <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
                      </div> <!-- cd-faq-content -->
                    </li>

                    <li>
                      <a class="cd-faq-trigger" href="#0">How does your UK Next Day Delivery service work?</a>
                      <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                      </div> <!-- cd-faq-content -->
                    </li>

                    <li>
                      <a class="cd-faq-trigger" href="#0">When will my order arrive?</a>
                      <div class="cd-faq-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                      </div> <!-- cd-faq-content -->
                    </li>

                  </ul> <!-- cd-faq-group -->
                </div> <!-- cd-faq-items -->
                <a href="#0" class="cd-close-panel">Close</a>
              </div> <!-- cd-faq -->

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

</div>
      
<?php
 //include footer
 include('includes/footer.php');
 
 ?>