<?php require_once('../includes/header.php');?>
<?php require_once(BASELANDING.'includes/nav.php');?>
 
<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
		<li><a href="http://wowslider.net"><img src="<?php echo BASEPLUGINS;?>images/landing/childrens2.jpg" alt="slideshow javascript" title="custom – 1" id="wows1_0"/></a></li>
		<li><img src="<?php echo BASEPLUGINS;?>images/landing/childrens2.jpg" alt="puppy" title="puppy" id="wows1_1"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="custom – 1"><span><img src="<?php echo BASEPLUGINS;?>images/landing/childrens1.jpg" alt="custom – 1"/>1</span></a>
		<a href="#" title="puppy"><span><img src="<?php echo BASEPLUGINS;?>images/landing/childrens1.jpg" alt="puppy"/>2</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">javascript carousel</a> by WOWSlider.com v8.8</div>
<div class="ws_shadow"></div>
</div>	

<!-- End WOWSlider.com BODY section -->
    <section class="about-us-area">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 col-lg-6" style="padding-top:5%;">
                    <div class="about-text text-center mb-100">
                        <div class="section-heading text-center">
                            <div class="line-"></div>
                            <h2>Helping Donors</h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris sceleri sque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris sceleri sque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
                        
                        <a href="#" class="btn palatin-btn mt-50">Read More</a>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="about-thumbnail homepage mb-100">
                        <!-- First Img -->
                        <div class="first-img wow fadeInUp" data-wow-delay="100ms">
                            <img src="<?php echo BASEPLUGINS;?>images/landing/childrens1.jpg" alt="">
                        </div>
                        <!-- Second Img -->
                        <div class="second-img wow fadeInUp" data-wow-delay="300ms">
                            <img src="<?php echo BASEPLUGINS;?>images/landing/childrens2.jpg" alt="">
                        </div>
                        <!-- Third Img-->
                        <div class="third-img wow fadeInUp" data-wow-delay="500ms">
                            <img src="<?php echo BASEPLUGINS;?>images/landing/childrens3.jpg" alt="">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->
    
    
<section class="pool-area section-padding-100 bg-img bg-fixed" style="background-image: url('<?php echo BASEPLUGINS;?>images/landing/children1.jpg');">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 col-lg-7 col-md-offset-6">
                <div class="pool-content text-center wow fadeInUp" data-wow-delay="300ms">
                    <div class="section-heading text-center white">
                        <div class="line-"></div>
                        <h2>Donate with Love</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris sceleri sque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris sceleri sque, at rutrum nulla dictum.</p>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="pool-feature">
                                <i class="icon-cocktail-1"></i>
                                <p>Weekly Donations</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="pool-feature">
                                <i class="icon-swimming-pool"></i>
                                <p>Total Donations</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="pool-feature">
                                <i class="icon-beach"></i>
                                <p>Monthly Donations</p>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <a href="#" class="btn palatin-btn mt-50">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
   
   
    <form action="<?php echo BASELANDING;?>helper/donation_routing.php" method="post" enctype="multipart/form-data">
     <div class="container" style="padding:20px;">
     <div class="row">
      <div class="form-group">
      <div class="col-md-12" style="border:2px solid #51A2EE;padding-bottom:20px;">
      
          <h2 class="don"><b>Donation Details</b></h2>
       <hr class="coo">
       <div class="col-md-4">
           <label for="amount" class="labs">Donation amount</label><br>
           <label for="events" class="lab">Events</label><br>
           <label for="message" class="lab">Message</label><br>
           <label for="anonymous" class="labss" >Anonymous Donation</label><br><br>
           <button type="submit" name="submit_donation" class="btn btn-primary" style="margin-top:20px;">Submit</button>
       </div>
       <div class="col-md-8">
           <input type="text" class="form-control" name="donation_amount" id="email"><br>
           <select name="event_id" class="form-control">
              <option selected></option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <br>
           
    
  <textarea class="form-control" rows="5" name="donation_message" id="comment"></textarea><br>
      <input type="email" class="form-control" name="anonymous_donation" id="email"><br>
       </div>
        <br>
    </div>
        
      
        </div>
         </div>
        </div>
    </form>
    
</section>
<br>
<br>
<?php require_once(BASELANDING.'includes/footer.php');?>
