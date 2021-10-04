<?php

if (isset($_POST['submit'])) {
  $error = '';

  $temp=$_FILES['Images']['tmp_name'];  //temp name
  $fname=$_FILES['Images']['name'];    //real file name

  
  $ext=pathinfo($fname,PATHINFO_EXTENSION); //check Extention of file
  $fn="attach".rand()."_".time().".$ext";//create randome name of file


    $k = trim("users/$semail");
    $fo = fopen("$k/detail.txt", "r");
    $mail = trim(fgets($fo));
    $mainpassword = trim(fgets($fo));
    $Name = trim(fgets($fo));
    $Gender = trim(fgets($fo));
    $age = trim(fgets($fo));
    $ImagePAth = trim(fgets($fo));
    unlink($ImagePAth);
   
    $dest=$k."/";
    if((move_uploaded_file($temp,$dest.$fn))) 
    {
      echo $dest.$fn;
      $fo = fopen("$k/detail.txt", "w");
      fwrite($fo, $mail."\n" .$mainpassword."\n" .$Name."\n" .$Gender."\n". $age."\n".$dest.$fn );
      echo "  <script type=\"text/javascript\">
      location.replace('dashboard.php');
        </script>
        ";
    }
    else
    {
        $error="Image Uploading Error Try again";
    }

}


?>


<main>
  <form class=" border border-danger m-auto" style="width:700px;" method="POST" enctype="multipart/form-data">
    <h1 class="display-4 text-center">Change Image</h1>
    <hr style="width: 20rem; height:.1rem" class="bg-danger">

    <?php
    if (!empty($error)) {
    ?>
      <div class="alert-danger alert" role="alert"> <?php echo $error ?> </div>
    <?php  }
    ?>

    <div class="form-group">
      <input type="file" class="form-control" placeholder="FILE Upload" name="Images">
    </div>


    <div class="text-center">
      <input type="submit" class="btn btn-success mb-5" value="Change Image" name="submit">
    </div>

  </form>
</main>