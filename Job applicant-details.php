<?php 
include ("connection.php");
if(!$_SESSION['user_id']){
  header("location:login.php");
}
if(isset($_GET['view'])){
$user_id = $_GET['view'];

$select3 = "SELECT * FROM `user` JOIN `services` ON `user`.`user_id` = `services`.`user_id` where `user`.`user_id`= $user_id";
$run_select3 = mysqli_query($connect, $select3);

$select="SELECT * FROM `user` WHERE `user_id` =$user_id ";
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
// $location = $fetch['location'];
$lastname = $fetch['lastname'];

$select_rate = "SELECT service_id, AVG(rate) AS avg_rate FROM `rates` GROUP BY service_id";  
$run_select_rate = mysqli_query($connect, $select_rate);  

$average_rates = array(); 
while ($row = mysqli_fetch_assoc($run_select_rate)) { 
    $average_rates[$row['service_id']] = $row['avg_rate']; 
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>view details</title>
    <!-- ========== Start Google fonts ========== -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Oswald:wght@200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="./imgs/development-1.jpg" type="image/x-icon">
    <!-- ========== End Google fonts ========== -->

    <!-- ========== Start font awesome library ========== -->
    <link rel="stylesheet" href="./css/all.min.css" />

    <!-- ========== End font awesome library ========== -->

    <!-- ========== Start bootstrap css link ========== -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <!-- ========== End bootstrap css link ========== -->

    <!-- ========== Start Section ========== -->
    <link rel="stylesheet" href="./css/veiw details.css" />
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


    <!-- ============== Start portfolio ============== -->
    <div class="container  over-flow " id="about">
        <section class="portfolio" >
        <?php foreach($run_select as $values) { ?>
          <div class="portfolio-img">
            <img src="./imgs/<?php echo $values['image'];?>" alt="image" />
            <div class="img-layer">
          <div class="links">
          <a href="<?php echo $values['url1'];?>"><i class="fa-brands fa-facebook"></i></a>
          <a href="<?php echo $values['url2'];?>"><i class="fa-brands fa-twitter"></i></a>
          <a href="<?php echo $values['url3'];?>"><i class="fa-brands fa-linkedin"></i></a>
          </div>
            </div>
          </div>
          <?php } ?>
         
          <div data-aos="fade-up" class="portfolio-content">
            
            <div class="portfolio-content-container">
              <!-- <div class="testProfileH"> -->

                <h2 data-aos="fade-up">HELLO, I'm <?php echo $namee;?></h2>
                <p>
                  <?php echo $desc; ?>
                </p>
              <!-- </div> -->
              <div class="info">
                <div class="info-group">
      
                  <ul>
                    <li><span>Name: </span><?php echo $namee;?><?php echo $lastname;?></li>
                    <li><span>Date of birth: </span><?php echo $dob;?></li>
                    <li><span>Freelance: </span>Available</li>
                  </ul>
                </div>
                <div class="info-group">
                  <ul>
                    <li><span>Job Title: </span><?php echo $desc;?></li>
                    <li><span>Location: </span>Online</li>
                    <li>
                      <span>E-mail: </span
                      ><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
                    </li>
                  </ul>
                </div>

                <div class="clr"></div>
              </div>
          
            </div>
          </div>
          <div class="clr"></div>
          
        </section>
      </div>
      <div class="clear"></div>


      <div class="container view-services">
        <div class="row g-3">
          <div class="title">
            <h1>View Services</h1>
          </div>
          <?php foreach($run_select3 as $value) { ?>
          <div class="col-sm-12 col-md-6 col-lg-4 ">
            <div class="inner">
              <div class="card">
                <div class="card-image">
                  <img
                    class="card-img-top"
                    src="./imgs/<?php  echo $value['image']; ?>"
                    alt="Title"
                  />
                </div>
                <div class="box">
                  <div class="card-body fs-6">
                    <h4 class="card-title pt-2"><?php  echo $value['service_name']; ?></h4>
                    <div class="icons d-flex py-2">
                          <span>  <i class="fa-solid fa-star fs-3"></i> <?php 
        $average_rate = isset($average_rates[$value['service_id']]) ? $average_rates[$value['service_id']] : 0; 
        ?> 
 
         <?php echo $average_rate; ?></p></span>
                          
                          
                        </div>
                        <p class="card-text">
                          <span class="card-span fs-4"><?php echo $value['currency']; ?> <?php echo $value['price']; ?> <?php echo $value['priceper']; ?> </span>
                        </p>
                      </div>
                      <div class="btn">  
            <a href="mailto:<?php echo $value['user_email']; ?>?icon<?php echo $value['user_email']; ?>" class="px-2">  
                <span><i class="fa-solid fa-message fa-beat fs-4"></i></span>  
            </a>  
            <a href="services-details.php?details=<?php echo $value['service_id']; ?>" class="btn btn-primary">View Details</a> 
        </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>


    <!-- ========== Start bootstrap js link ========== -->
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- ========== End bootstrap js link ========== -->
  </body>
</html>