<?php
error_reporting(0);
if(isset($_POST['submit']))
{
  $error='';
  $mail=$_POST['email'];
  $pass=$_POST['password'];
  session_start();
  $_SESSION['email']=$mail;
  $_SESSION['password']=$pass; 
  if(!empty($mail) && !empty($pass))
  {
      if(is_dir("users/".$mail))
      {
        $fo = fopen("users/" . $mail . "/detail.txt", "r");
        $mail=fgets($fo);
        $mainpassword=fgets($fo);

        if(trim($mainpassword)==trim($pass))
        {
              if(isset($_POST['remember']))
              {
                // echo "set remember";
                setcookie("coemail",$mail,time()+3600*24*30);
                setcookie("copassword",$pass,time()+3600*24*30);
                $cc1=$_COOKIE['coemail'];
                $cc2=$_COOKIE['copassword'];

              }
              header("Location:dashboard.php");
        }
        else
        {
          $error="Wrong Password";
        }

      }
      else
      {
        $error="User Not Found";
      }
  }
  else
  {
    $error="Fill all Fields";
  }
  
}
error_reporting(0);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  

</head>


<body class="bg-light">


<?php
  $cc1=trim($_COOKIE['coemail']);
  $cc2=$_COOKIE['copassword'];
  echo $cc1;
  echo $cc2;
  ?>

<script type="text/javascript">
        function myFunction()
        {
                    
            if("<?php echo$cc1;?>" != undefined){
          
               if(document.getElementById("mailid").value=="<?php echo $cc1 ;?>"){
                  
                   document.getElementById("passwordid").value="<?php echo $cc2 ;?>";
               }
               else{
                   document.getElementById("passwordid").value='';
               }
           }
        }
    </script>


  <?php include('nav.php') ?>
  <main>
    <form class="container border border-danger mt-5" style="width:700px;" method="POST" enctype="multipart/form-data">
      <h1 class="display-1 text-center">Login</h1>
      <hr style="width: 20rem; height:.1rem" class="bg-danger">

      <?php
            if(!empty($error)){
                ?>
                <div class="alert-danger alert" role="alert"> <?php echo $error ?> </div>
          <?php  } 
            ?>


      <div class="form-group">
      <input type="email" name="email" class="form-control" placeholder="EMAIL" id='mailid' onblur="myFunction()">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" placeholder="Password" name="password" id='passwordid'>
      </div>

      <div class="">
        <input type="checkbox" name="remember">
        <label>Remember Password</label> <br>
        <div class="text-center">
          <input type="submit" class="btn btn-outline-success mb-5" value="Login" name="submit">
        </div>
      </div>
    </form>
  </main>

  

</body>