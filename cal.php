<?php
    $r1=range(0,9);
    $r2=range(0,9);
    $a=array_rand($r1);
    $b=array_rand($r2);
    $pat=$a ."+" . $b . "= ?" ;
    $sum=$a+$b;
    
?>