<?php
require_once('../../includes/bootstrap.php');
require_once('../includes/header.php');
require_once('../includes/nav.php');

$events = new Events();
$event_id = $_REQUEST['view'];
$res = $events->select($event_id);
$res = mysqli_fetch_assoc($res);
?>

<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
	<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo BASEPLUGINS;?>images/landing/childrens2.jpg);">
		<div class="desc animate-box">
			<h2><strong>COMPLETE EVENT</strong></h2><br>
			<span><a class="btn btn-primary btn-lg" href="#">Event Details</a></span>
		</div>
	</div>

</div>
<form action="<?php echo BASELANDING.'helper/events_routing.php';?>" method="POST">
	<main id="main" class="main-page">
		<section id="speakers-details" class="wow fadeIn">
			<div class="container">


				<div class="row" style="padding:40px;">
					<div class="col-md-6">
						<img src="<?php echo BASEPLUGINS;?>images/landing/childrens1.jpg" style="width:900px;height:450px;" alt="Speaker 1" class="img-fluid">
					</div>

					<div class="col-md-6">
						<div class="details">
							<h2><?php echo $res['event_title']?></h2>
							<h5><b>Moto:</b> <?php echo $res['event_moto'];?></h5>
							<p><b>Event Scheduled at: </b><?php echo $res['event_timing'];?></p>
							
							<p style="margin-bottom: 50px;"><?php echo $res['event_desc']; ?></p>
							<input name="event_id" value="<?php echo $event_id;?>" hidden>
							
							<button type="submit" name="participate" class="btn btn-primary">Participate</button>
    						<a href="<?php echo BASELANDING.'pages/donate.php';?>" class="btn btn-success">Donate Now!</a>
						</div>
					</div>

				</div>
			</div>

		</section>

	</main>

</form>


<?php require_once('../includes/footer.php');?>
