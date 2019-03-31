<?php require_once('../../includes/bootstrap.php');?>

<?php require_once('../includes/header.php');?>
<?php require_once(BASELANDING.'includes/nav.php');?>

 
<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
	<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo BASEPLUGINS;?>images/landing/childrens1.jpg);">
		<div class="desc animate-box">
			<h2><strong>ADD DISCUSSION</strong></h2><br>
			<span><a class="btn btn-primary btn-lg" href="#">Discussion Details</a></span>
		</div>
	</div>

</div>
<section>
   
   
    <form action="../helper/discussion_routing.php" enctype="multipart/form-data" method="post">
     <div class="container" style="padding:20px;">
     <div class="row">
      <div class="form-group">
      <div class="col-md-12" style="border:2px solid #51A2EE;padding-bottom:20px;">
      
          <h2 class="don"><b>Add Discussion Details</b></h2>
       <hr class="coo">
       <div class="col-md-4">
           <label for="amount" class="labs">Discussion Detail</label><br>
           <label for="events" class="lab">Discussion Image</label><br>
           <label for="events" class="lab">Discussion Description</label><br>
           <label for="events" class="lab"  style="margin-top:25%;">Discussion Link</label><br><br>
<!--           <label for="events" class="lab" style="margin-top:25%;">Event Timing</label><br>-->
          
           
           <button type="submit" name="discussion_submit" class="btn btn-primary" style="margin-top:20px;">Submit</button>
       </div>
       <div class="col-md-8">
           <input type="text" class="form-control" name="discussion_title" id="email"><br>
           
           
           <input type="text" class="form-control" name="discussion_image" id="email"><br>
           <textarea class="form-control" rows="5" name="discussion_description" id="comment"></textarea><br>
           
           <input type="url" class="form-control" name="discussion_link" id="email"><br>
           
           
    
  
       </div>
        <br>
    </div>
        
      
        </div>
         </div>
        </div>
    </form>
    
</section>



<?php require_once('../includes/footer.php');?>



         

         
        