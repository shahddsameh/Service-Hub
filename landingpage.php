<?php
include "mail.php";

$emptyVal=false;
$mailT = false;
$passM = false;
$character = false;

if(isset($_POST['creat'])){
    $FIRST_NAME = $_SESSION['FIRST_NAME'] = $_POST['FIRST_NAME'];
    $LAST_NAME = $_SESSION['LAST_NAME'] = $_POST['LAST_NAME'];
    $MAIL = $_SESSION['GMAIL'] = $_POST['GMAIL'];
    $PASSWORD = $_SESSION['PASSWORD'] = $_POST['PASSWORD'];
    $CONFIRM_PASSWORD = $_POST['CONFIRM_PASSWORD'];
    $GENDER = $_SESSION['GENDER'] = $_POST['GENDER'];
    $AGE = $_SESSION['AGE'] = $_POST['AGE'];
    $lowercase=preg_match('@[a-z]@',$PASSWORD);
    $uppercase=preg_match('@[A-Z]@',$PASSWORD);
    $number=preg_match('@[0-9]@',$PASSWORD);
    $specialcharacter=preg_match('@[^\w]@',$PASSWORD);
    $select="SELECT * FROM `user` WHERE  `user_email`='$MAIL' ";
    $run_select=mysqli_query($connect,$select);
    $rows=mysqli_num_rows($run_select);


    $PASSWORDHashing=password_hash($PASSWORD,PASSWORD_DEFAULT);


    if(empty($FIRST_NAME)){
      $emptyVal = true;
        // echo"FIRST_NAME is required <br><br>";    
    }
    elseif(empty($LAST_NAME)){
      $emptyVal = true;
        // echo"LAST_NAME is required<br><br>";
    }    
    elseif(empty($CONFIRM_PASSWORD)){
      $emptyVal = true;
        // echo"CONFIRM_PASSWORD is required<br><br>";
    }    
    elseif(empty($MAIL)){
      $emptyVal = true;
        // echo"MAIL is required<br><br>";
    }    
     elseif($rows>0){
      $mailT = true;
 }    
    elseif(empty($GENDER)){
      $emptyVal = true;
    }    
    elseif(empty($AGE)){
      $emptyVal = true;
    }    
    elseif(empty($PASSWORD)){
      $emptyVal = true;
    }    
    elseif(($PASSWORD!=$CONFIRM_PASSWORD)){
      $passM = true;
    } 
    elseif(($lowercase <1 || $uppercase <1 || $number <1 || $specialcharacter <1)){
      $character = true;
        // echo"PASSWORD is weak, must contains lowercase letters and uppercase and digits and special characters !<br><br>";
    }     
     
   
   
    else{
    $email = $_POST['GMAIL'];
    $randomCode = rand();

    $mail->setFrom('servicehub46@gmail.com', 'service hub');          //sender mail address , website name
    $mail->addAddress( $email);      //reciever mail address
    $mail->isHTML(true);                               
    $mail->Subject = 'Email Verification Code';
    $mail->Body = "Your verification code is: $randomCode";
    $mail->send();
    $_SESSION['randomCode'] = $randomCode;
    header("location:verfcode.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Hub</title>

         <!-- ========== Start Google fonts ========== -->
         <link rel="preconnect" href="https://fonts.googleapis.com" />
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
         <link
           href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Oswald:wght@200;300;400;500;600;700&display=swap"
           rel="stylesheet"
         />
         <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

         <!-- ========== End Google fonts ========== -->
     
         <!-- ========== Start font awesome library ========== -->
         <link rel="stylesheet" href="./css/all.min.css" />
     
         <!-- ========== End font awesome library ========== -->
     
         <!-- ========== Start bootstrap css link ========== -->
         <link rel="stylesheet" href="./css/bootstrap.min.css" />
         <!-- ========== End bootstrap css link ========== -->
         <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
         <!-- ========== Start Section ========== -->
         <link rel="stylesheet" href="./css/services.css" />
         <link rel="stylesheet" href="./css/landingPage.css">
         <!-- ========== End Section ========== -->
    
</head>
<body>
  <div class="logo">
    <i class="fa-solid fa-franc-sign"></i>
    <h4 class="zinddex">Service Hub</h4>
  </div>
  <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
    <div class="mainpage">
  
      <div class="description">
        <h1>Service Hub is a <span class="fade-down-right">freelancing</span> platform</h1>
        <p>That helps people connect with each other, sell & buy and view services. Sign Up Now  </p>
      </div>
  
  
      <div class="registerform">
        <!-- form start -->
  <div class="registerr d-flex justify-content-center align-items-center">
    <div class="formholder">
  
        <form class="form" method="POST">
            <p class="title">Register </p>
        <p class="message">Signup now and get full access to Service Hub ©. </p>
            <div class="flex">
            <label for="FirstName">
                <input class="input" type="text" placeholder=""  id="FirstName" name="FIRST_NAME">
                <span>Firstname</span>
            </label>
            
            <label for="LastName">
                <input class="input" type="text" placeholder=""  id="LastName" name="LAST_NAME">
                <span>Lastname</span>
            </label>
        </div>  
        
        <label for="email">
            <input class="input" type="email" placeholder=""  id="email" name="GMAIL">
            <span>Email</span>
        </label> 
            
        <label for="password">
            <input class="input" type="password" placeholder=""  id="password" name="PASSWORD">
            <span>Password</span>
        </label>
        <label for="confirmPassword">
            <input class="input" type="password" placeholder=""  id="confirmPassword" name="CONFIRM_PASSWORD">
            <span>Confirm password</span>
        </label>
        <label for="age">
          <input type="date" class="input" placeholder=""  id="age" name="AGE">
          <span></span>
        </label>
  
  
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="GENDER" id="Male" value="male">
          <label class="form-check-label" for="Male">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="GENDER" id="inlineRadio2" value="female">
          <label class="form-check-label" for="inlineRadio2">Female</label>
        </div>
  
        <?php 
        if($emptyVal){
            ?>
<p class="incorrect2">Please fill all the fields</p>

            <?php
        }
        if($mailT){
?>
<p class="incorrect2">Mail is already taken</p>

<?php
        }
        if($passM){
          ?>
<p class="incorrect2">Passwords don't match</p>

          <?php
      }
      if($character){
        ?>
<p class="incorrect2">PASSWORD is weak, must contains lowercase letters and uppercase and digits and special characters !</p>

        <?php
    }
        ?>
        <button class="submit" name="creat">Submit</button>
        <p class="signin">Already have an account ? <a class="loginBtn btn btn-primary" href="login.php">Log In</a> </p>
    </form>
  </div>
  
  </div>
  
  <!-- form end --> 
  
      </div>
    </div>
    
  <!-- </div> -->



     <!-- footer start -->
         <footer>
            <p class="text-center pt-5">
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
rgb(211, 91, 91)rgb(207, 12, 12)rgb(207, 12, 12)