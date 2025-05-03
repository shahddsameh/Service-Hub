<?php  
include 'connection.php';  
if(!$_SESSION['user_id']){
  header("location:login.php");
}
if (isset($_GET['icon'])) {  
  $user_id = $_GET['icon'];  
} 
// if(isset($_SESSION['details'])){
//     session_unset($_SESSION['details']);
// } 
if(isset($_GET['details'])){
 $_SESSION['details'] = $_GET['details'];
 header("location:services-details.php");
}

$select = "SELECT * FROM `user` 
           JOIN `services` ON `user`.`user_id` = `services`.`user_id` 
           WHERE services.user_id != {$_SESSION['user_id']}";
$runselect = mysqli_query($connect, $select); 
$array=mysqli_fetch_array($runselect);
$rows = $array['service_id'];
$select_type = "SELECT * FROM `types`";
$run_select_type = mysqli_query($connect, $select_type);

$select_rate = "SELECT service_id, AVG(rate) AS avg_rate FROM `rates` GROUP BY service_id";  
$run_select_rate = mysqli_query($connect, $select_rate);  

$average_rates = array(); 
while ($row = mysqli_fetch_assoc($run_select_rate)) { 
    $average_rates[$row['service_id']] = $row['avg_rate']; 
}

// Initialize $run_search to an empty array
$run_search = array();

if(isset($_POST['search_btn'])){
  $text = $_POST['text'];
  $search = "SELECT `services`.`image` AS `simg`, `services`.`service_name`, `services`.`price`, 
                    `services`.`currency`, `services`.`priceper`, `services`.`type_id`, 
                    `user`.`username`, `user`.`email`
             FROM `services` 
             JOIN `user` ON `services`.`user_id` = `user`.`user_id` 
             WHERE (`service_name` LIKE '%$text%') OR
                   (`price` LIKE '%$text%') OR (`currency` LIKE '%$text%') OR
                   (`priceper` LIKE '%$text%') OR (`type_id` LIKE '%$text%') AND 
                   services.user_id != {$_SESSION['user_id']}
                   ";
  $run_search = mysqli_query($connect, $search);
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Services - Service Hub</title>
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
    <link rel="stylesheet" href="./css/services.css" />

    <!-- ========== End Section ========== -->
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

  
  <!-- ========== Start services section ========== -->
  <section id="services" class="services">
    <div class="container py-5">
      <div class="title pt-4">
        <h2 class="text-center main-title h1">Surf Services.</h2>
      </div>
      <div class="group m-auto mb-3">
        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
            <g>
                <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
            </g>
        </svg>
        <form method="POST" class="d-flex">
          <button type="submit" class="submitbtn btn btn-primary mx-3" name="search_btn">GO</button>
          <input placeholder="Search" type="search" class="input" name="text">
        </form>
       <?php include 'filteration.php';?>
      </div>
        <ul
          class="nav nav-underline mb-3 py-3 d-flex justify-content-center"
          id="pills-tab"
          role="tablist"
        >
          <li class="nav-item" role="presentation">
            <a href="services.php">
              <button
                class="nav-link active"
                id="pills-All-tab"
                data-bs-toggle="pill"
                data-bs-target="#pills-All"
                type="button"
                role="tab"
                aria-controls="pills-All"
                aria-selected="true"
              >
                All
              </button>
            </a>
          </li>
          <?php foreach($run_select_type as $rows){ ?>
          <li class="nav-item" role="presentation">
            <a href="types.php?view=<?php echo $rows['type_id']; ?>">
              <button
                class="nav-link active"
                id="pills-All-tab"
                data-bs-toggle="pill"
                data-bs-target="#pills-All"
                type="button"
                role="tab"
                aria-controls="pills-All"
                aria-selected="true"
              >
              <?php echo $rows['type_name']; ?>
              </button>
            </a>
          </li>
          <?php } ?>
        </ul>



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
     
     <!-- <tbody> -->
         <?php foreach($run_search as $row){?>  
          <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="inner">
                  <div class="card">
                    <div class="card-image">
                      <img
                        class="card-img-top"
                        src="./imgs/<?php echo $row['simg']; ?>"
                        alt="Title"
                      />
                    </div>
                    <div class="box">
                      <div class="card-body fs-6">
                        <h4 class="card-title pt-2"><?php echo $row['service_name']; ?></h4>
                        <div class="icons d-flex py-2">
                          <span>  <i class="fa-solid fa-star fs-3"></i> <?php 
        $average_rate = isset($average_rates[$row['service_id']]) ? $average_rates[$row['service_id']] : 0; 
        ?> 
 
         <?php echo $average_rate; ?></p></span>
                          
                          
                        </div>
                        <p class="card-text">
                          <span class="card-span fs-4"><?php echo $row['currency']; ?> <?php echo $row['price']; ?> <?php echo $row['priceper']; ?> </span>
                        </p>
                      </div>
                      <div class="btn">  
            <a href="mailto:<?php echo $row['user_email']; ?>?icon<?php echo $row['user_email']; ?>" class="px-2">  
                <span><i class="fa-solid fa-message fa-beat fs-4"></i></span>  
            </a>  
            <a href="services.php?details=<?php echo $row['service_id']; ?>" class="btn btn-primary">View Details</a>  
        </div>
                    </div>
                  </div>
                </div>
              </div>
       
          
         
          
    
         <?php }  } else {  foreach ($runselect as $value) { ?>  
              <!-- loop this card -->
              <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="inner">
                  <div class="card">
                    <div class="card-image">
                      <img
                        class="card-img-top"
                        src="./imgs/<?php echo $value['image']; ?>"
                        alt="Title"
                      />
                    </div>
                    <div class="box">
                      <div class="card-body fs-6">
                        <h4 class="card-title pt-2"><?php echo $value['service_name']; ?></h4>
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
            <a href="mailto:<?php echo $value['user_email']; ?>?subject=Service%20Inquiry" class="px-2">
    <span><i class="fa-solid fa-message fa-beat fs-4"></i></span>
  
</a>
 
            <a href="services.php?details=<?php echo $value['service_id']; ?>" class="btn btn-primary">View Details</a> 
        </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>  
              <?php } ?>  
              <!-- end of card looped -->
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
    <!-- ========== End services section ========== -->

    <footer>
      <p class="text-center pt-5">
        <span> <i class="bi bi-c-circle"></i> </span> Copyright
        <strong>Service Hub</strong>
        All Rights Reserved <br />
        Designed by <a href="#">WebDesign-Team</a>
      </p>
    </footer>

    <!-- ========== Start bootstrap js link ========== -->
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- ========== End bootstrap js link ========== -->
  </body>
</html>
