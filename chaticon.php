<?php
include 'connection.php';
if(!$_SESSION['user_id']){
    header("location:login.php");
  }
if(isset($_GET['details'])){
    $service_id=$_GET['details'];

    
    

    $select="SELECT * FROM `user` JOIN `services` ON `user`.`user_id`=`services`.`user_id` WHERE `service_id` =$service_id";
    $runselect=mysqli_query($connect,$SELECT);
    $user_data=mysqli_fetch_assoc($runselect);
    $user_email=$user_data['user_email'];
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products page</title>
    <link rel="stylesheet" href="./css/all.min.css">
    </head>
    <body>

</body>
</html>