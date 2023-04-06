<?php

$con=new mysqli('localhost','root','','Divorce');

if(!$con){
  
    die(mysqli_error($con));
}
     
?>  