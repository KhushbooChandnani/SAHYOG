<?php
require_once("../../includes/bootstrap.php");
require_once("../includes/header.php");
require_once("../includes/nav.php");
?>
<div class="col-md-8">
<?php
$obj = new Discussion();
$res = $obj->selectAll(); 
while($row = mysqli_fetch_assoc($res)){
    extract($row);

?>

	<div class="card mb-4">
		<img class="card-img-top img-fluid" src="" alt="<?php echo $discussion_title;?>">
		<div class="card-body">
			<h2 class="card-title"><?php echo $discussion_title;?></h2>
			<p class="card-text"><?php
				$post_body = $discussion_body; 
				echo substr($post_body, 0, strrpos(substr($post_body, 0, 300), " "))."...";		
			?></p>
			<a href="singleDiscussion.php?discussion_id=<?php echo $discussion_id?>" class="btn btn-primary">Read More &rarr;</a>
		</div>
	</div>
	<?php } ?>
</div>
<?php 
require_once("../includes/footer.php");
?>
