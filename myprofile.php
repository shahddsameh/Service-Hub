<?php
include("connection.php");
if(!$_SESSION['user_id']){
  header("location:login.php");
}
$id=$_SESSION['user_id'];


$select="SELECT * FROM `user` WHERE `user_id` =$id ";
$run_select =mysqli_query($connect , $select);
$fetch=mysqli_fetch_assoc($run_select);
$name=$fetch['user_id'];
$desc =$fetch['job_title'];
$namee=$fetch['firstname'];
$dob=$fetch['dob'];
$phone=$fetch['phone_number'];
$name=$fetch['user_id'];
$email=$fetch['user_email'];
$gender=$fetch['gender'];

$sel_query= "SELECT * FROM `user` JOIN `services`
ON `user`.`user_id`=`services`.`user_id` WHERE `user`.`user_id`=$id";
$run_query=mysqli_query($connect,$sel_query);
$select_rate = "SELECT service_id, AVG(rate) AS avg_rate FROM `rates` GROUP BY service_id";  
$run_select_rate = mysqli_query($connect, $select_rate);  

$average_rates = array(); 
while ($row = mysqli_fetch_assoc($run_select_rate)) { 
    $average_rates[$row['service_id']] = $row['avg_rate'];
  }
    if(isset($_GET['delete'])){
      $id=$_GET['delete'];
      $delete="DELETE FROM `services` WHERE `service_id`=$id";
      $run_delete=mysqli_query($connect,$delete);
      header("location:myprofile.php");
    }

if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My profile</title>
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
    <link rel="stylesheet" href="./css/myprofile.css" />
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
<!-- <a href=""> hellooo</a> -->

    <!-- ============== Start portfolio ============== -->
    <div class="container" id="about">
        <section class="portfolio" >
        <?php foreach($run_select as $data) {?>
          <div class="portfolio-img">
            <img src="./imgs/<?php echo $data['image'];?>" alt="<?php echo $data['image'];?>">
            <div class="img-layer">
          <div class="links">
          <a href="<?php echo $data['url1']; ?>"><i class="fa-brands fa-facebook"></i></a>
          <a href="<?php echo $data['url2']; ?>"><i class="fa-brands fa-instagram"></i></a>
          <a href="<?php echo $data['url3']; ?>"><i class="fa-brands fa-linkedin"></i></a>
          <!-- <a href=""><i class="fa-brands fa-github"></i></a> -->
          </div>
              
            </div>
          </div>
          <div data-aos="fade-up" class="portfolio-content">
            <div class="portfolio-content-container">
              <h2 >HELLO, <?php echo $namee ?></h2>
              <p>
              <?php echo $desc ?> </p>
              <div class="info">
                <div class="info-group">
                  <ul>
                    <li><span>Name: </span><?php echo $namee ?> <?php echo $data['lastname']?></li>
                    <li><span>Date of Birth:</span><?php echo $dob ?>  </li>
                    <li><span>E-mail:</span><?php echo $email ?></li>
                  </ul>
                </div>
                <div class="info-group">
                  <ul>
                    <li><span>Job Title: </span><?php echo $desc?></li>
                    <li><span>Phone Number:</span><?php echo $phone?></li>
                    <li>
                       <span>Gender: </span><?php echo $gender?> </li>
                  </ul>
                </div>
                <div class="clr"></div>
              </div>
      
              <!-- <button>Hire Me <i class="fa fa-paper-plane"></i></button> -->
            </div>
          </div>
          <div class="clr"></div>
          <?php } ?>
          <a href="edit-myprofile.php" class="btn btn-primary" id="profile-button2">Edit Profile <i class="fa fa-download"></i></a>
          <!-- <a href=""> hello</a> -->
        </section>
      </div>
  
      <!-- ============== End portfolio ============== -->
      <div class="clear"></div>
      <div class="container position-relative " id="myServicesContaienr">
        <div class="pop-container d-none " id="pop-container">

        <div class="pop-icon">
          <i class="fa-solid fa-trash-can"></i>
        </div>
    
        <div class="pop-content">
          <h3>Are you sure?</h3>
          <p>Do you really want to delete these service? </p>
        </div>

        <div class="pop-buttons">
          <a href="#" class="btn btn-primary" id="cancel-popup">Cancel</a>
          <a href="myprofile.php" class=" btn  btn-danger" id="delete-popup">Delete</a>
        </div>
        </div>
        <div class="row testttt">
          <div class="row g-3">
            <div class="title">
              <h1>My Services</h1>
            </div>
            <?php foreach($run_query as $data) {?>
            <div class="col-sm-12 col-md-6 col-lg-4 ">
              <div class="inner">
                <div class="card">
                  <div class="card-image">
                    <img
                      class="card-img-top"
                      src="./imgs/<?php echo $data['image']; ?>" alt="<?php echo $data['image']; ?>" />
                  </div>
                  <div class="box">
                    <div class="card-body fs-6">
                      <h4 class="card-title pt-2"><?php echo $data['service_name'] ?></h4>
                      <div class="icons d-flex py-2">
                          <span>  <i class="fa-solid fa-star fs-3"></i> <?php 
                           $average_rate = isset($average_rates[$data['service_id']]) ? $average_rates[$data['service_id']] : 0; 
                           ?> 
                    
                          <?php echo $average_rate; ?></p></span>
                          
                          
                      </div>
                      <p class="card-text">
                        <span class="card-span fs-4"><?php echo $data['currency']; ?> <?php echo $data['price']; ?> <?php echo $data['priceper']; ?></span>
                      </p>
                    </div>
                    <div class="btn">
                      <!-- <a href="#" class="px-2"> -->
                        <!-- <span
                          ><i class="fa-solid fa-message fa-beat fs-4"></i
                        ></span> -->
                      <!-- </a> -->
                      <a href="edit-services.php?edit=<?php echo $data['service_id'] ?>" class="btn btn-primary">Edit</a>
                      <a onclick="return confirm('sure you want to delete?')" href="myprofile.php?delete=<?php echo $data['service_id'] ?>" class="btn btn-danger" id="deleteAler">Delete</a>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <?php } ?>

          </div>
        </div>
      </div>

    <!-- ========== Start bootstrap js link ========== -->
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- ========== End bootstrap js link ========== -->
    <script src="./js/myprofile.js"></script>
  </body>
</html>