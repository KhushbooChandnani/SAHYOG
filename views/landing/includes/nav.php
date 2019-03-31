<?php require_once('../../includes/constants.php');
session_start();
?>

<!-- Navigation Bar-->
<header id="fh5co-header-section" class="sticky-banner">
	<div class="container">
		<div class="nav-header">
			<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
			<h1 id="fh5co-logo"><a href="<?php echo BASELANDING;?>pages/index.php"><img src="<?php echo BASEPLUGINS;?>images/logo.png" alt="" width="60px" height="50px">SAHYOG</a></h1>
			<!-- START #fh5co-menu-wrap -->
			<nav id="fh5co-menu-wrap" role="navigation">
				<ul class="sf-menu" id="fh5co-primary-menu">
					<li class="active">
						<a href="<?php echo BASELANDING;?>pages/index.php">Home</a>
					</li>
					<li class="active"><a href="<?php echo BASELANDING;?>pages/about.php">About</a></li>
					<li class="active"><a href="<?php echo BASELANDING;?>pages/contact.php">Contact</a></li>
					<li class="active"><a href="<?php echo BASELANDING;?>pages/donate.php">Donate Now</a></li>
					<?php
						if(!isset($_SESSION['user_id'])){
//							echo $_SESSION['user_id'];
							?>
							<li class="active"><a href="<?php echo BASELANDING;?>pages/login.php">User Login</a></li>
							
							
					<li class="active"><a href="<?php echo BASEPAGES;?>parent-login.php">Parent Login</a></li>
					<li class="active"><a href="<?php echo BASEURL;?>admin/login">Employee Login</a></li>
							<?php
						}else{
							
								
							?>
							<li class="active"><a href="<?php echo BASELANDING;?>helper/login_routing.php?status=unset">Logout</a></li>
							<?
						}
							?>
						
					
					
				</ul>
			</nav>
		</div>
	</div>
</header>
