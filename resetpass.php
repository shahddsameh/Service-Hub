<?php
include("connection.php");
$emptyVal = false;
$passM = false;
$character = false;

if (isset($_POST['submit'])) {
    $newpass = $_POST["password"];
    $confirm_pass = $_POST["confirm_pass"];

    $lowercase = preg_match('@[a-z]@', $newpass);
    $uppercase = preg_match('@[A-Z]@', $newpass);
    $number = preg_match('@[0-9]@', $newpass);
    $specialcharacter = preg_match('@[^\w]@', $newpass);

    if (empty($newpass)) {
        $emptyVal = true;
    } elseif (empty($confirm_pass)) {
        $emptyVal = true;
    } elseif (($lowercase < 1 || $uppercase < 1 || $number < 1 || $specialcharacter < 1)) {
        $character = true;
    } elseif ($newpass !== $confirm_pass) {
        $passM = true;
    } else {
        $hashedPassword = password_hash($newpass, PASSWORD_DEFAULT);
        $email = $_POST['email'] = $_SESSION['email'];
        $update = "UPDATE `user` SET `user_password` = '$hashedPassword' WHERE `user_email` = '$email'";
        $run_update = mysqli_query($connect, $update);
        if ($run_update) {
            echo "Password reset successful.";
            header("Location: login.php");
            // exit();
        } else {
            echo "Password reset failed.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
         <link rel="stylesheet" href="./css/resetpass.css   ">
         <!-- ========== End Section ========== -->

    
</head>
<body>

  <div class="logo">
    <i class="fa-solid fa-franc-sign"></i>
  </div>


          <!-- start form -->

          <div class="loginn d-flex justify-content-center align-items-center">
            <div class="formholder">
            
                
                <form class="form" method="POST">
                    <p class="form-title">Reset Your Password</p>
                    <p class="instructions">Set your new password</p>
                    <div class="input-container">
                       <input type="password" name="password"  placeholder="New Password">
                    
                    </div>
                    <div class="input-container">
                       <input type="password" name="confirm_pass" placeholder="Confirm Password">
                    
                    </div>
                    <?php 
        if($emptyVal){
            ?>
<p class="incorrect2">Please fill all the fields</p>

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
                    <button type="submit" name="submit" class="submit">
                        Reset Password
                    </button>
                    
                </form>
            </div>
            </div>
            <!-- end form -->
            
            



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