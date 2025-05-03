<?php 
include ("connection.php");
if(!$_SESSION['user_id']){
  header("location:login.php");
}
$select = "SELECT *,`user`.`image` AS `uimg`  FROM `user` JOIN `services` ON `user`.`user_id` = `services`.`user_id` GROUP BY `user`.`user_id`";
$run_select = mysqli_query($connect, $select);
$select_rate = "SELECT service_id, AVG(rate) AS avg_rate FROM `rates` GROUP BY service_id";  
$run_select_rate = mysqli_query($connect, $select_rate);  

$average_rates = array(); 
while ($row = mysqli_fetch_assoc($run_select_rate)) { 
    $average_rates[$row['service_id']] = $row['avg_rate'];}

$run_search = array();

if(isset($_POST['search_btn'])){
  $text = $_POST['text'];
  $search = "SELECT *,`user`.`image` AS `uimg` FROM `services` JOIN `user` ON `services`.`user_id` = `user`.`user_id` WHERE (`firstname` LIKE '%$text%') OR
     (`lastname` LIKE '%$text%') OR (`user_email` LIKE '%$text%') OR (`phone_number` LIKE '%$text%') OR (`job_title` LIKE '%$text%') GROUP BY `user`.`user_id`";
  $run_search = mysqli_query($connect, $search);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profiles1</title>
     <!-- ========== Start Google fonts ========== -->
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <link
       href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Oswald:wght@200;300;400;500;600;700&display=swap"
       rel="stylesheet"
     />
     <!-- ========== End Google fonts ========== -->
     <link rel="stylesheet" href="./css/bootstrap.min.css">
     <link rel="stylesheet" href="./css/profiles1.css">
     <link rel="stylesheet" href="./css/all.min.css">
     <link rel="stylesheet" href="./css/media1.css">
   
</head>
<body>  
    

    <!-- ========== Start nav-bar ========== -->
  <header>
    <?php if(isset($_SESSION['user_id'])){ ?>
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


     <!-- for search -->
     <div class="group m-auto mb-3">
          
          <form method="POST" class="d-flex searchtestt">
            <input placeholder="Search" type="search" class="input" name="text">
            <button type="submit" class="submitbtn btn btn-primary" name="search_btn">GO</button>
          </form>

      </div>
        <div class="tab-content" id="pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="pills-All"
            role="tabpanel"
            aria-labelledby="pills-All-tab"
            tabindex="0"
            >
            <div class="row g-4">
            <?php if(isset($_POST['search_btn'])) { ?>
<!-- for first profile -->

<?php foreach($run_search as $values){?>  
 <div class="wrapper">
     <!-- left handside -->
     <div class="left">
        <img src="./imgs/<?php echo $values['uimg'];?>" alt="userPhoto">
        <h3><?php echo $values['job_title'];?></h3>
     </div>
     <!-- right handside  -->
     <div class="right">
         <!-- Information -->
      <div class="info">
         <h3><?php echo $values['firstname'];?> <?php echo $values['lastname'];?></h3>
        <div class="info_data">
            <div class="data">
            <h4><?php echo $values['user_email'];?></h4>
            <!-- <p>alex@gmail.com</p> -->
            <a href="<?php echo $values['user_email'];?><"><?php echo $values['user_email'];?></a>
           </div>
           <div class="data">
            <h4><?php echo $values['phone_number'];?></h4>
            <!-- <p>010-----</p> -->
            <a href="tel:+2234566"><?php echo $values['phone_number'];?></a>
           </div>
       </div>
     </div> 
      
      <!-- for social_media icons -->
   <div class="social_media">
    <ul>
        <li><a href="<?php echo $values['url1'];?>"><i class="fa-brands fa-square-instagram"></i></a></li>
        <li><a href="<?php echo $values['url2'];?>"><i class="fa-brands fa-square-facebook"></i></a></li>
        <li><a href="<?php echo $values['url3'];?>"><i class="fa-brands fa-linkedin"></i></a></li>
        <li><a href="mailto:<?php echo $values['user_email'];?>?icon<?php echo $value['user_email'];?>"><i class="fa-regular fa-comment-dots"></i></a></li>
    </ul>
  </div>
      <!-- for see more link -->
 <div class="see_more">
   <!-- <a href="#">see more</a> -->
   <a href="job applicant-details.php?view=<?php echo $values['user_id'];?>">View details </a>
 </div>    

     </div>
 </div>
           <!-- end first profile -->
<?php }  } else {  foreach ($run_select as $values) { ?>  
<!-- for first profile -->
 <div class="wrapper">
     <!-- left handside -->
     <div class="left">
        <img src="./imgs/<?php echo $values['uimg']; ?>" alt="userPhoto">
        <h3><?php echo $values['job_title']; ?></h3>
     </div>
     <!-- right handside  -->
     <div class="right">
         <!-- Information -->
      <div class="info">
         <h3><?php echo $values['firstname'];?> <?php echo $values['lastname'];?></h3>
        <div class="info_data">
            <div class="data">
            <h4><?php echo $values['user_email'];?></h4>
            <!-- <p>alex@gmail.com</p> -->
            <a href="<?php echo $values['user_email'];?><"><?php echo $values['user_email'];?></a>
           </div>
           <div class="data">
            <h4><?php echo $values['phone_number'];?></h4>
            <!-- <p>010-----</p> -->
            <a href="tel:+2234566"><?php echo $values['phone_number'];?></a>
           </div>
       </div>
     </div> 
      
      <!-- for social_media icons -->
   <div class="social_media">
    <ul>
        <li><a href="<?php echo $values['url1'];?>"><i class="fa-brands fa-square-instagram"></i></a></li>
        <li><a href="<?php echo $values['url2'];?>"><i class="fa-brands fa-square-facebook"></i></a></li>
        <li><a href="<?php echo $values['url3'];?>"><i class="fa-brands fa-linkedin"></i></a></li>
        <li><a href="mailto:<?php echo $values['user_email'];?>?icon<?php echo $value['user_email'];?>"><i class="fa-regular fa-comment-dots"></i></a></li>
    </ul>
  </div>
      <!-- for see more link -->
 <div class="see_more">
   <!-- <a href="#">see more</a> -->
   <a href="job applicant-details.php?view=<?php echo $values['user_id'];?>">View details </a>
 </div>    

     </div>
 </div>
 <?php } ?>  
<?php } ?>  
           <!-- end first profile -->

      </div>
    </div> 
            <!-- End profiles -->
                 <!-- start footer -->
            <footer>
              <p class="text-center pt-5">
                <span> <i class="bi bi-c-circle"></i> </span> Copyright
                <strong>Service Hub</strong>
                All Rights Reserved <br />
                Designed by <a href="#">WebDesign-Team</a>
              </p>
            </footer>
            <!-- ========== End footer ========== -->
        
            <!-- ========== Start bootstrap js link ========== -->
             <script src="./js/bootstrap.bundle.min.js"></script> 

    <script src="css/bootstrap-5.2.3-dist/js/bootstrap.bundle.js"></script>
</body>
</html>