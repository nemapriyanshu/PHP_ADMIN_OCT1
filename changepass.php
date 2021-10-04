<?php
if(isset($_POST['submit']))
{
    $error='';
    $opass=$_POST['oldpass'];
    $npass=$_POST['newpass'];
    $cpass=$_POST['conpassword'];

    if(!empty($opass) && !empty($npass) && !empty($cpass))
    {
        $k = trim("users/$semail");
        
        $fo = fopen("$k/detail.txt", "r");

// Data achive from files

        $mail = trim(fgets($fo));
        $mainpassword = trim(fgets($fo));
        $Name = trim(fgets($fo));
        $Gender = trim(fgets($fo));
        $age = trim(fgets($fo));
        $ImagePAth = trim(fgets($fo));
        
        if($opass==$mainpassword)
        {
                if($npass==$cpass)
                {
                    $fo = fopen("$k/detail.txt", "w");
                    fwrite($fo, $mail."\n" .$npass."\n" .$Name."\n" .$Gender."\n". $age."\n". $ImagePAth);
                   
                  echo "  <script type=\"text/javascript\">
                  location.replace('dashboard.php');
                    </script>
                    ";
                  rename("$k/$opass","$k/$npass");

                }
                else
                {
                    $error="Password and confirm password not matched";
                }
        }
        else
        {
            $error="Old Password not matched";
        }
    }
    else
    {
        $error="All Field Required";
    }
}


?>

  <main>
    <form class=" border border-danger m-auto" style="width:700px;" method="POST">
      <h1 class="display-4 text-center">Change Password</h1>
      <hr style="width: 20rem; height:.1rem" class="bg-danger">

      <?php
            if(!empty($error)){
                ?>
                <div class="alert-danger alert col-8 m-auto p-auto" role="alert"> <?php echo $error ?> </div>
          <?php  } 
            ?>

      <div class="form-group">
        <input type="text" class="form-control col-8 m-auto" placeholder="Old Password" name="oldpass">
      </div>

      <div class="form-group">
        <input type="text" class="form-control col-8 m-auto" placeholder="New Password" name="newpass">
      </div>
      
      <div class="form-group">
        <input type="text" class="form-control col-8 m-auto" placeholder="Confirm Password" name="conpassword">
      </div>

        <div class="text-center">
          <input type="submit" class="btn btn-success mb-5" value="Change Password" name="submit">
        </div>
      
    </form>
  </main>
