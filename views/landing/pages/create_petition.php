
<?php
    session_start();
    if(isset($_SESSION['petition_image_upload'])){
        unset($_SESSION['petition_image_upload']);
        echo "<b>Add image of less than 2 mb</b>";
    }
?>

<?php require_once('../../includes/bootstrap.php');?>

<?php require_once('../includes/header.php');?>
<?php require_once(BASELANDING.'includes/nav.php');?>

 
<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
	<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo BASEPLUGINS;?>images/landing/childrens1.jpg);">
		<div class="desc animate-box">
			<h2><strong>PETITION</strong></h2><br>
			<span><a class="btn btn-primary btn-lg" href="#">Petition Details</a></span>
		</div>
	</div>

</div>
<section>
   
   
    <form action="../helper/petition_routing.php" enctype="multipart/form-data" method="post">
     <div class="container" style="padding:20px;">
     <div class="row">
      <div class="form-group">
      <div class="col-md-12" style="border:2px solid #51A2EE;padding-bottom:20px;">
      
          <h2 class="don"><b>Add Petition Details</b></h2>
       <hr class="coo">
       <div class="col-md-4">
           <label for="amount" class="labs">Petition Problem</label><br>
           <label for="events" class="lab">Petition Description</label><br>
           <label for="events" class="lab" style="margin-top:25%;">Petition Responsible</label><br>
           <label for="events" class="lab">Petition Image</label><br>
<!--           <label for="events" class="lab" style="margin-top:25%;">Event Timing</label><br>-->
          
           
           <button type="submit" name="petition_submit" class="btn btn-primary" style="margin-top:20px;">Submit</button>
       </div>
       <div class="col-md-8">
           <input type="text" class="form-control" name="petition_problem" id="email"><br>
           
           <textarea class="form-control" rows="5" name="petition_describe" id="comment"></textarea><br>
           <input type="text" class="form-control" name="petition_responsible" id="email"><br>
           
           <input type="text" class="form-control" name="petition_image" id="email"><br>
           
           
    
  
       </div>
        <br>
    </div>
        
      
        </div>
         </div>
        </div>
    </form>
    
</section>



<?php require_once('../includes/footer.php');?>


