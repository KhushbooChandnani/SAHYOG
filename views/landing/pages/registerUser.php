<?php
require_once("../../includes/bootstrap.php");
?>

<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/details.css">
    <title>Sahyog</title>
</head>

<body>

    <div class="container">
        <h1>Details</h1>
        <hr style="background: #37abed">
        <form action="../helper/login_routing.php" method="post" name="add_user" enctype="multipart/form-data">
            <label>First Name</label>
            <input type="text" class="form-control" name="user_first_name" id="user_first_name">
            <label>Last Name</label>
            <input type="text" class="form-control" name="user_last_name" id="user_last_name">

            <label>Phone number</label>
            <input type="text" class="form-control" name="user_phone_number" id="user_phone_number">

            <br>

            <label>Address</label>
            <input type="text" class="form-control" name="user_address" id="user_address">



            <button type="submit" class="btn btn-primary" name="submit_user_details"
                id="submit_user_details">Submit</button>
        </form>
    </div>


</body>

</html>