<?php
include 'mail.php';

if (isset($_POST['login'])) {
  
    $email = $_POST['email'];
    $randomCode = rand();

    $mail->setFrom('servicehub46@gmail.com', 'service hub');          //sender mail address , website name
    $mail->addAddress( $email);      //reciever mail address
    $mail->isHTML(true);                               
    $mail->Subject = 'verification code';             //mail subject
    $mail->Body = " Verification code: " . $randomCode;
    $mail->send();
    $_SESSION['randomCode'] = $randomCode;
    header("location:recieveCode.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
         <link rel="stylesheet" href="./css/ForgotPass.css">
         <!-- ========== End Section ========== -->

    
</head>
<body>

  <div class="logo">
    <i class="fa-solid fa-franc-sign"></i>
  </div>

          <!-- start form -->

          <div class="loginn d-flex justify-content-center align-items-center">
            <div class="formholder">
            
                
                <form class="form"  method="POST">
                    <p class="form-title">Recover Your Password</p>
                    <p class="instructions">Confirm your email & you will recieve a code to reset your password</p>
                    <div class="input-container">
                       <input type="email" name="email" placeholder="Enter email">
                    
                    </div>
                    <button type="submit" name="login" class="submit">
                        Send Code
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