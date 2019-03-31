
<?php require_once('../../includes/bootstrap.php');?>

<?php require_once('../includes/header.php');?>
<?php require_once(BASELANDING.'includes/nav.php');?>

 
<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
	<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo BASEPLUGINS;?>images/landing/childrens1.jpg);">
		<div class="desc animate-box">
			<h2><strong>ADD EVENTS</strong></h2><br>
			<span><a class="btn btn-primary btn-lg" href="<?php echo BASELANDING;?>pages/events.php">VIEW EVENT</a></span>
		</div>
	</div>

</div>
    <section class="about-us-area">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 col-lg-6" style="padding-top:5%;">
                    <div class="about-text text-center mb-100">
                        <div class="section-heading text-center">
                            <div class="line-"></div>
                            <h2>EVENTS</h2>
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
    
    
<section class="pool-area section-padding-100 bg-img bg-fixed" style="background-image: url('<?php echo BASEPLUGINS;?>images/landing/childrens3.jpg');">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 col-lg-7 col-md-offset-6">
                <div class="pool-content text-center wow fadeInUp" data-wow-delay="300ms">
                    <div class="section-heading text-center white">
                        <div class="line-"></div>
                        <h2>About Events</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris sceleri sque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris sceleri sque, at rutrum nulla dictum.</p>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="pool-feature">
                                <i class="icon-cocktail-1"></i>
                                <p>Ongoing Events</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="pool-feature">
                                <i class="icon-swimming-pool"></i>
                                <p>Total Events</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="pool-feature">
                                <i class="icon-beach"></i>
                                <p>Remaining Events</p>
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
   
   
    <form action="<?php echo BASELANDING;?>helper/events_routing.php" method="POST" enctype="multipart/form-data">
     <div class="container" style="padding:20px;">
     <div class="row">
      <div class="form-group">
      <div class="col-md-12" style="border:2px solid #51A2EE;padding-bottom:20px;">
      
          <h2 class="don"><b>Add Event Details</b></h2>
       <hr class="coo">
       <div class="col-md-4">
           <label for="amount" class="labs">Event Title</label><br>
           <label for="events" class="lab">Event Description</label><br>
           <label for="events" class="lab">Event Moto</label><br>
           <label for="events" class="lab">Event Address</label><br>
           <label for="events" class="lab" style="margin-top:25%;">Event Timing</label><br>
           <label for="events" class="lab">Event Duration</label><br>
           <label for="events" class="lab">Event Image</label><br>
           <label for="events" class="lab">Event YouTube Link</label><br><br>
           
           <button type="submit" name="add_event" class="btn btn-primary" style="margin-top:20px;">Submit</button>
       </div>
       <div class="col-md-8">
           <input type="text" class="form-control" name="event_title" id="email"><br>
           <input type="text" class="form-control" name="event_desc" id="email"><br>
           <input type="text" class="form-control" name="event_moto" id="email"><br>
           <textarea class="form-control" rows="5" name="event_location" id="comment"></textarea><br>
           <input type="text" class="form-control" name="event_timing" id="email"><br>
           <input type="text" class="form-control" name="event_duration" id="email"><br>
           <input type="text" class="form-control" name="event_image" id="email"><br>
           <input type="text" class="form-control" name="event_video_link" id="email"><br>
           
    
  
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