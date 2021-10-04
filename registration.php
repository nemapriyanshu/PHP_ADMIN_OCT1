<?php
include("cal.php");
if (isset($_POST['submit'])) {
    $error = '';
    $mail = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['conpassword'];
    $name = $_POST['Name'];
    $gen = @$_POST['gender'];
    $age = $_POST['Age'];

    //file data taken    
    $temp = $_FILES['Images']['tmp_name'];  //temp name
    $fname = $_FILES['Images']['name'];    //real file name

    $ext = pathinfo($fname, PATHINFO_EXTENSION); //check Extention of file
    $fn = "attach" . rand() . "_" . time() . ".$ext"; //create randome name of file



    if (!empty($mail) && !empty($pass) && !empty($cpass) && !empty($name) && !empty($gen) && !empty($age) && !empty($temp)) 
    { 
        if($_POST['cap'] == $_POST['capsum']){
        //password check
        if ($pass == $cpass) {
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                if (is_dir("users/" . $mail)) {
                    $error = "Folder to hai line-29";
                } else {
                    mkdir("users/" . $mail);   //creat mail folder in users
                    mkdir("users/" . $mail . "/" . $pass);  //create password folder in mail
                    $dest = "users/" . $mail . "/"; //yaah pr file save krna hai

                    if ((move_uploaded_file($temp, $dest . $fn))) {
                        $fo = fopen("users/" . $mail . "/detail.txt", "w");
                        fwrite($fo, $mail . "\n" . $pass . "\n" . $name . "\n" . $gen . "\n" . $age . "\n" . $dest . $fn);
                        header("location:login.php");
                    } else {
                        $error = "Image Uploading Error Try again";
                    }
                }
            } else {
                $error = "Only Jpeg,png,jpg file is allowed.";
            }
        } else {
            $error = "Password and confirm Password not matched";
        }
    }
    else{
        $error="Invalid CAPTCHA";
    }
}
 else {
        $error = ' Fill All Field';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="shortcut icon" href="Back2.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
</head>


<body class="bg-light">
    <?php include('nav.php') ?>
    <main>
        <form class="container border border-primary mt-4" style="width:700px;" method="POST" novalidate enctype="multipart/form-data">
            <br>
            <h1 class="display-4  text-center  ">Registration form</h1>
            <hr style="width: 20rem; height:.1rem" class="bg-primary">

            <?php
            if (!empty($error)) {
            ?>
                <div class="alert-danger alert" role="alert"> <?php echo $error ?> </div>
            <?php  }
            ?>

            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Password" name="password">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Confirm Password" name="conpassword">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Full Name" name="Name">
            </div>



            <div class="row">
                <div class="col-4">
                    <input type="radio" name="gender" value="Male"> Male <br>
                    <input type="radio" name="gender" value="Female"> Female
                </div>

                <div class="col-sm-2">
                    <input type="number" class="form-control" placeholder="Age" name="Age">
                </div>

                <div class="col-sm-6">
                    <input type="file" class="form-control" placeholder="FILE Upload" name="Images">
                </div>

            </div>
<br>
                <div class="row">

                    <div class="col-sm-2">
                    <label class="h4"><?php echo $pat;?></label> <br>
                    </div>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="CAPTCHA" name="cap">
                        <input type="hidden" name="capsum" value="<?php echo $sum; ?>">
                    </div>

                    <div class="col-sm-4 text-center">
                        <input type="submit" name='submit' value="Sign-up" class="btn btn-success mb-3" name="submmit">
                    </div>

                </div>
                <br>
              

                  
             
        </form>
    </main>
</body>





<!-- 

mail
password
Name
Gender
age
Image PAth

-->