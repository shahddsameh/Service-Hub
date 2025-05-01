<?php
include("connection.php");
if(!$_SESSION['user_id']){
  header("location:login.php");
}
$urlV=false;
$pass = false;
$passM = false;
$EmailErr = false;
$user_id=$_SESSION['user_id'];

if(isset($_POST['update'])){
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$Email=$_POST ['Email'];
$user_password=$_POST['user_password'];
$confirm_password=$_POST['confirm_password'];
$job_title=$_POST['jobTitle'];
$phone_number=$_POST['phone_number'];
$url1=$_POST['url1'];
$url2=$_POST['url2'];
$url3=$_POST['url3'];
$about_me=$_POST['about_me'];
$lowercase=preg_match('@[a-z]@',$user_password);
$uppercase=preg_match('@[A-Z]@',$user_password);
$number=preg_match('@[0-9]@',$user_password);
$specialcharacter=preg_match('@[^\w]@',$user_password);

$ImageName=$_FILES['image']['name'];
print_r($ImageName);
$Uploadfile= move_uploaded_file($_FILES['image']['tmp_name'],"imgs/".$_FILES['image']['name']);


// valditions

if(filter_var($url1, FILTER_VALIDATE_URL) === false) {
  $urlV = true;

} elseif (filter_var($url2, FILTER_VALIDATE_URL) === false){
  $urlV = true;
}
elseif (filter_var($url3, FILTER_VALIDATE_URL) === false){
  $urlV = true;
}
elseif(strlen($phone_number)!=11){
  $phone = true;
}

elseif($lowercase<1|| $uppercase<1 ||  $number<1 ||  $specialcharacter<1){

  $pass = true;
    }

elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
  $EmailErr = true;
    }

elseif ($user_password != $confirm_password) {
    $passM = true;
    }



else{
  if(strlen($ImageName)>=1){
$update="UPDATE `user` SET `firstname`='$firstname' , `lastname`='$lastname',  `user_email`='$Email',`user_password`='$user_password' ,`job_title`='$job_title',`phone_number`='$phone_number', `url1`='$url1',`url2`='$url2',`url3`='$url3',`image`='$ImageName',`about me`='$about_me' ";
$run_update=mysqli_query($connect,$update);
if($run_update=== true) {
    echo "Profile Updated Successfully" ;
header("location:myprofile.php");
}
}else{
  $update="UPDATE `user` SET `firstname`='$firstname' , `lastname`='$lastname',  `user_email`='$Email',`user_password`='$user_password' ,`job_title`='$job_title',`phone_number`='$phone_number', `url1`='$url1',`url2`='$url2',`url3`='$url3',`about me`='$about_me' ";
$run_update=mysqli_query($connect,$update);
if($run_update=== true) {
    echo "Profile Updated Successfully" ;
header("location:myprofile.php");
}

}



}

}
$select="SELECT * FROM `user` WHERE `user_id`=$user_id ";
$run_select=mysqli_query($connect,$select);

$fetch=mysqli_fetch_assoc($run_select);
$user_id=$fetch['user_id'];
$firstname=$fetch['firstname'];
$lastname=$fetch['lastname'];
$user_email=$fetch['user_email'];
$user_password=$fetch['user_password'];
$job_title=$fetch['job_title'];
$phone_number=$fetch['phone_number'];
$url1=$fetch['url1'];
$url2=$fetch['url2'];
$url3=$fetch['url3'];
$image=$fetch['image'];
$about_me=$fetch['about me'];





?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Your Profile</title>
    <!-- ========== Start Google fonts ========== -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Oswald:wght@200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <!-- ========== End Google fonts ========== -->

    <!-- ========== Start font awesome library ========== -->
    <link rel="stylesheet" href="./css/all.min.css">

    <!-- ========== End font awesome library ========== -->

    <!-- ========== Start bootstrap css link ========== -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <!-- ========== End bootstrap css link ========== -->

    <!-- ========== Start Section ========== -->
    <link rel="stylesheet" href="./css/GLOBAL.css" />
    <link rel="stylesheet" href="./css/edit-myprofile.css">
    <!-- ========== End Section ========== -->
  </head>


  
  <body>
<!-- ========== Start nav-bar ========== -->
<header>
    <?php if(isset($_SESSION['user_id'])){ ?>
    <nav class="navbar navbar-expand-lg navbar-light" data-bs-theme="dark">
      <div class="container">
        <a class="navbar-brand fw-bold d-flex justify-content-center align-items-center gap-4" href="home.html">
          <i class="fa-solid fa-franc-sign fs-1"></i>
          <h2 class="fs-2">Service Hub</h2>
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="home.php" aria-current="page">Home <span
                  class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profiles1.php">Job applicant-profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="myprofile.php">My-Profile</a>
            </li>

          </ul>
          <a href="add-services.php" class="btn btn-primary mr-md-4 d-block d-md-inline " id="service-navBtn" >Add service</a>
          <a href="logout.php?id=logout" class="btn btn-primary  mx-md-4 d-block d-md-inline " >Log Out</a>
        </div>
      </div>
    </nav>
    <?php } else{ ?>
      <nav class="navbar navbar-expand-lg navbar-light" data-bs-theme="dark">
      <div class="container">
        <a class="navbar-brand fw-bold d-flex justify-content-center align-items-center gap-4" href="home.php">
          <i class="fa-solid fa-franc-sign fs-1"></i>
          <h2 class="fs-2">Service Hub</h2>
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="home.php" aria-current="page">Home <span
                  class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profiles1.php">Job applicant-profile</a>
            </li>

          </ul>
          <a href="login.php" class="btn btn-primary  mx-md-4 d-block d-md-inline " >Login</a>
          <?php } ?>
  </header>

  <!-- ========== End nav-bar ========== -->
    <div class="registerform">
      <!-- form start -->
<div class="registerr d-flex justify-content-center align-items-center">
  <div class="formholder">

  <form class="form" method="POST" enctype="multipart/form-data">
          <p class="title"> Edit Your Profile </p>
      <p class="message">Update your profile now! </p>   
      <label class="custum-file-upload" for="file">
              <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
              </div>
              <div class="text">
                 <span>Click to upload image</span>
                 </div>
                 <input type="file"   name="image"  id="file">
              </label>
          <div class="flex"> 
             
             <label for="FirstName">
              <input class="input"     name="firstname"  type="text" placeholder="" required="" id="FirstName"   value= "<?php  echo $firstname    ?>">
              <span>Firstname</span>
          </label>
          
          <label for="LastName">
              <input class="input"   name="lastname" type="text" placeholder="" required="" id="LastName"    value= "<?php  echo $lastname    ?>">
              <span>Lastname</span>
          </label>
      </div>  
      
      <label for="email">
          <input class="input"  name="Email"     type="email" placeholder="" required="" id="email"  value="<?php  echo $user_email    ?>"     >
          <span>Email</span>
      </label> 
      <div class="flex">
        <label for="password">
          <input class="input"   name="user_password"    type="password" placeholder="" required="" id="password"  value= "<?php  echo $user_password    ?>">
          <span>A New Password</span>
        </label>
        <label for="confirmPassword">
          <input class="input"   name="confirm_password"   type="password" placeholder="" required="" id="confirmPassword"    value= "<?php  echo $user_password  ?>">
          <span>Confirm password</span>
        </label>
      </div>     

      
      <label for="social-link 1">
        <input type="text"   name="url1"   class="input" placeholder="" id="social-links" value="<?php  echo $url1   ?>"   >
        <span>Facebook</span>
      </label>
      <label for="social-link 2">
        <input type="text"  name="url2"    class="input" placeholder=""  id="social-links" value= "<?php  echo $url2  ?>"   >
        <span>Instagram</span>
      </label>
      <label for="social-link 3">
        <input type="text"    name="url3"   class="input" placeholder=""  id="social-links" value= "<?php  echo $url3  ?>"  >
        <span>LinkedIn</span>
      </label>
      <label for="Phone-Num">
        <input type="text"     name="phone_number" class="input" placeholder=""  id="Phone-Num"  value= "<?php  echo $phone_number   ?>">
        <span>Phone Number</span>

        
      </label>
      <label for="jobTitle">
        
        <input class="input" name="jobTitle" type="text" value= "<?php  echo $job_title   ?>">
        <span>Add Your Job Title</span>  
      </label>
      <label for="Aboutme">
        <input type="text"    name="about_me"  class="input" placeholder=""  id="Aboutme"    value= "<?php  echo $about_me  ?>">
        <span>Add Your Description</span>
      </label>


      <?php 
        if($urlV){
            ?>
<p class="incorrect2">Please make sure to put a URL</p>

            <?php
        }
        if($pass){
?>
<p class="incorrect2">PASSWORD is weak, must contains lowercase letters and uppercase and digits and special characters !</p>

<?php
        }
        if($passM){
          ?>
<p class="incorrect2">Passwords don't match</p>

          <?php
      }
      if($EmailErr){
        ?>
<p class="incorrect2">Please enter a valid email</p>

        <?php
    }
        ?>
      <button type="submit" name="update" class="submit">Submit</button>

  </form>
</div>
  </div>
</div>

<!-- form end --> 
















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
    
    
    <!-- ========== Start bootstrap js link ========== -->
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- ========== End bootstrap js link ========== -->  
  </body>
</html>