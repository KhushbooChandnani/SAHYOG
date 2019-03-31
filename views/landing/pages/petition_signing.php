<?php

    require_once("../../includes/bootstrap.php");

    session_start();
    // $_SESSION['user_id'] = 1;
    if(isset($_GET['ID'])){
        $id = $_GET['ID'];

        $petitions = new Petitions();

        $sign = new SignedPetition();
        $res = $petitions->select($id);
        $res = mysqli_fetch_assoc($res);
    }else{
        die("Hii invaid URL please get valid URL");
    }
?>

<html>
    <body>
        <p>
            <?php 
                echo $res['petition_problem'];
                echo $res['petition_describe'];
            ?>
        </p>

        <?php
            if(!$sign->select($id , $_SESSION['user_id'])){
        ?>
            <form action="../helper/sign_petition.php" method="POST">
                <input type="text" value="<?php echo $id?>" name="petition_id" hidden>
                <input type="submit" name="petition_sign"></form>

                <?php
            }
        ?>

    </body>
</html>