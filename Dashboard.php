<?php
error_reporting(0);
session_start();
$semail = $_SESSION['email'];
$spass = $_SESSION['password'];

//Agar login nhi hai to y condition login p bhej degi aur dashboard nhi dikhega
if (empty($semail) && empty($spass)) {
    header("location:login.php");
} else {

    $k = trim("users/$semail");
    $fo = fopen("$k/detail.txt", "r");
    $mail = fgets($fo);
    $mainpassword = fgets($fo);
    $Name = fgets($fo);
    $Gender = fgets($fo);
    $age = fgets($fo);
    $ImagePAth = fgets($fo);
    // echo "<br>YESSS<BR>".$ImagePAth;

}

// echo $_SESSION['email'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body class="bg-light">
    <?php include('nav.php') ?>
    <!-- <div class="h1 text-warning ">DashBoard</div> -->

    <div class="row m-auto">
        <div class="col-3 bg-dark">
            <br><br> <img src="<?php echo $ImagePAth ?>" alt="" width="200px" height="200px" class="ml-5" style="border-radius:50%;">
            <br><br>
            <div class="card" style="width: auto;">
                <ul class="list-group ">
                    <li class="list-group-item">
                        <span>Email - </span>
                        <span><?php echo $mail ?></span>
                    </li>

                    <li class="list-group-item">
                        <span>Name - </span>
                        <span><?php echo $Name ?></span>
                    </li>

                    <li class="list-group-item">
                        <span>Gender - </span>
                        <span><?php echo $Gender ?></span>
                    </li>

                    <li class="list-group-item">
                        <span>Age - </span>
                        <span><?php echo $age ?></span>
                    </li>

                    <li class="list-group-item">
                        <span>Password - </span>
                        <span><?php echo $mainpassword ?></span>
                    </li>

                </ul>
            </div> <br>
        </div>


        <div class="col-9">
            <div class="m-5">
                <?php

                $p = $_GET['ans'];
                switch ($p) {
                    case 1:
                        include("changepass.php");
                        
                        break;
                    case 2:
                        include("Imagechange.php");
                        break;
                }
                ?>
            </div>

        </div>
    </div>
</body>

</html>