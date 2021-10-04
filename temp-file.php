<?php








// session_start();
// $semail=@$_SESSION['email'];
// $spass=$_SESSION['password'];
    
// $k=trim("users/$semail") ;

// echo $k;



//     $fo = fopen("$k/detail.txt", "r");
//     $mail=fgets($fo);
//     $mainpassword=fgets($fo);    
//     $Name=fgets($fo);
//     $Gender=fgets($fo);
//     $age=fgets($fo);
//     $ImagePAth=fgets($fo);
    
//     echo "<br>YESSS<BR>".$ImagePAth;
    


?>

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        console.log();
    </script>
</body>
</html> -->




// alert("SF");
            if("<?php echo $_COOKIE['coemail'] ;?>"!=undefined){
               
                if(document.getElementById("mailid").value=="<?php echo $_COOKIE['coemail'];?>"){
                    document.getElementById("passwordid").value="<?php echo $_COOKIE['copassword'];?>";
                }
                else{
                    document.getElementById("passwordid").value='';
                }
            }







