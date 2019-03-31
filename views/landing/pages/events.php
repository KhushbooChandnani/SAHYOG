<?php
require_once('../includes/header.php');
require_once('../includes/nav.php');

$events = new Events();
?>
<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
	<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo BASEPLUGINS;?>images/landing/childrens1.jpg);">
		<div class="desc animate-box">
			<h2><strong>VIEW AN EVENT</strong></h2><br>
			<span><a class="btn btn-primary btn-lg" href="<?php echo BASELANDING;?>pages/add-event.php">ADD EVENT</a></span>
		</div>
	</div>

</div>
<section>
	<div class="container">
		<div class="row">
            <?php
                $row = $events->selectAll();
                while($res = mysqli_fetch_assoc($row)){
            ?>
			<div class="col-md-4">
				<div class="card card-01" style="box-shadow:2px 2px 20px rgba(0,0,0,.3);border:none;margin-bottom:30px;position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem;">
					<div class="embed-responsive embed-responsive-16by9" style="position:relative;display:block;width:100%;padding:0;overflow:hidden;box-sizing:border-box;">
						<iframe class="embed-responsive-item" style=""></iframe>
					</div>
					<div class="card-body">
						<span class="badge-box"><i class="fa fa-check"></i></span>
						<h4 class="card-title" style="font-weight:bold;padding:10px;font-size:25px;">News title</h4>
						<p class="card-text" style="padding-left:10px;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<p class="card-text" style="padding-left:10px;">Timings: 22-2-2019 11:00 PM</p>
						<a href="<?php echo BASELANDING.'pages/complete-events.php?view='.$res['event_id'];?>" class="btn btn-default text-uppercase">Com</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>

<?php
require_once('../includes/footer.php');
?>