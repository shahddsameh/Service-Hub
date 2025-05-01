<?php 
include("connection.php");
$emptyVal=false;
$IdentVal=false;
if(isset($_POST['LOGIN'])){
    $email = $_POST['EMAIL'];
    $pass = $_POST['PASSWORD'];

    $selectquery = "SELECT * FROM `user` WHERE `user_email`='$email'";
    $runselect = mysqli_query($connect, $selectquery);
    $rows = mysqli_num_rows($runselect);

    if(empty($email)){
        // echo"MAIL is required<br><br>";
        $emptyVal=True;
    } 
    elseif(empty($pass)){
        // echo"PASSWORD is required<br><br>";
        $emptyVal=True;
    } 
    elseif($rows > 0){
        $array = mysqli_fetch_assoc($runselect);
        $userid = $array['user_id'];
        $hashedPassword = $array['user_password'];

        if (password_verify($pass, $hashedPassword)) {
            $_SESSION['user_id'] = $userid;
            header("location:./home.php");
        } else {
$IdentVal=true;
// echo "Wrong password";
        }
    } else {
$IdentVal=true;
// echo "Incorrect Email or Password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
         <!-- ========== Start Google fonts ========== -->
         <link rel="preconnect" href="https://fonts.googleapis.com" />
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
         <link
           href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Oswald:wght@200;300;400;500;600;700&display=swap"
           rel="stylesheet"
         />
         <!-- ========== End Google fonts ========== -->
     
         <!-- ========== Start font awesome library ========== -->
         <link rel="stylesheet" href="./css/all.min.css" />
     
         <!-- ========== End font awesome library ========== -->
     
         <!-- ========== Start bootstrap css link ========== -->
         <link rel="stylesheet" href="./css/bootstrap.min.css" />
         <!-- ========== End bootstrap css link ========== -->
     
         <!-- ========== Start Section ========== -->
         <link rel="stylesheet" href="./css/GLOBAL.css" />
         <link rel="stylesheet" href="./css/login.css">
         <!-- ========== End Section ========== -->
    
</head>
<body>

  <div class="logo">
    <i class="fa-solid fa-franc-sign"></i>
  </div>


      <!-- start form -->

      <div class="loginn d-flex justify-content-center align-items-center py-4">
<div class="formholder">

    
    <form class="form" method="POST">
        <p class="form-title">Sign in to your account</p>
        <div class="input-container">
           <input type="EMAIL" name="EMAIL" placeholder="Enter email">
           <span>
           </span>
        </div>
        <div class="input-container">
            <input type="password" name="PASSWORD" placeholder="Enter password">
        </div>
        <button type="submit"  name="LOGIN" class="submit">
            Sign in
        </button>
        <?php 
        if($emptyVal){
            ?>
<p class="incorrect2">Please fill all the fields</p>

            <?php
        }
        if($IdentVal){
?>
<p class="incorrect2">Incorrect email or password</p>

<?php
        }
        ?>
        <p class="signup-link">
            No account?
            <a href="landingpage.php">Sign up</a>
        </p>
        <p class="signup-link">
          Forgot Your Password?
          <a href="ForgotPass.php"> Recover it</a>
        </p>
    </form>
</div>
</div>
<!-- end form -->




    <!-- footer start -->
    <footer class=" d-flex justify-content-center align-items-center">
        <p class="text-center pt-1">
          <span> <i class="bi bi-c-circle"></i> </span> Copyright
          <strong>Service Hub</strong>
          All Rights Reserved <br />
          Designed by <a href="#">WebDesign-Team</a>
        </p>
      </footer>
      <!-- footer end -->
      
      
  
    
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>