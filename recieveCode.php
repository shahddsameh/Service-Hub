<?php
include("mail.php");
$msg = false;
   
    if (isset($_POST['submit'])){
        $randomCode = $_SESSION['randomCode'] ;
    $verificationCode = $_POST['verification_code'];
    if ($verificationCode == $randomCode) {
        // Verification code is correct
        // Proceed with password reset or other actions
        header("location:resetpass.php");
    } else {
        // Verification code is incorrect
        // Display an error message
        $msg = true;
        echo $msg;
       
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password- recieve code</title>
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
         <link rel="stylesheet" href="./css/recieveCode.css">
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
                    <p class="form-title"> The code was sent to the email</p>
                    <p class="instructions">Confirm the code</p>
                    <div class="input-container">
                       <input type="text" placeholder="Enter the code you recieved" name="verification_code">
                    
                    </div>
                    <?php 
        if($msg){
            ?>
<p class="incorrect2">Invalid verification code, Please try again!</p>

            <?php
        }
        ?>
                    <button type="submit" name="submit" class="submit" onclick="newpassword.php">
                        Confirm
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