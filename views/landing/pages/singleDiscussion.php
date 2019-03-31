<?php
//require_once("../../includes/bootstrap.php");
require_once("../includes/header.php");
require_once("../includes/nav.php");

$discussion_id  = $_GET['discussion_id'];
Session::startSession();
$_SESSION['discussion_id'] = $discussion_id;
$obj = new Discussion();
$res = $obj->select($discussion_id);
$row = mysqli_fetch_assoc($res);
extract($row);
?>
<div class="col-lg-8">


	<!-- Title -->
	<h1 class="mt-4"><?php echo $discussion_title;?></h1>
	<hr>

	<hr>

	<!-- Preview Image -->
	<img class="img-fluid rounded" src="" alt="<?php echo $discussion_title;?>">

	<hr>

	<!-- Post Content -->
	<p class="lead"><?php echo $discussion_body;?></p>

	<hr>

	<!-- Comments Form -->
	<div class="card my-4">
		<h5 class="card-header">Leave a Comment:</h5>
		<div class="card-body">
			<form action="<?php echo BASELANDING;?>helper/discussion_routing.php" method="post">
				<div class="form-group">
					<textarea class="form-control" rows="3" name="comment_text"></textarea>
				</div>
				<button type="submit" class="btn btn-primary" name="submit_comment">Submit</button>
			</form>
		</div>
	</div>

	<!-- Single Comment -->
	
<?php
$obj = new Comments();
$res = $obj->getCommentUserName($discussion_id);
$obj2 = new Discussion();
$res2= $obj2->getDiscussionUserName($discussion_id);
$row2  = mysqli_fetch_assoc($res2);
//extract($row2);
while($row = mysqli_fetch_assoc($res)){
  extract($row);
?>
	<div class="media mb-4">
		<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
		<div class="media-body">
			<h5 class="mt-0"><?php echo $user_first_name." ".$user_last_name;?> to <?php echo $row2['user_first_name']." ".$row2['user_last_name'];?></h5>
			<p></p>
		</div>
	</div>

</div>
<?php  
}
require_once("../includes/footer.php");
?>