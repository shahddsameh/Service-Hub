<?php
include("connection.php");
if(!$_SESSION['user_id']){
  header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home page</title>
  <!-- ========== Start Google fonts ========== -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Oswald:wght@200;300;400;500;600;700&display=swap"
    rel="stylesheet" />
  <!-- ========== End Google fonts ========== -->

  <!-- ========== Start font awesome library ========== -->
  <link rel="stylesheet" href="./css/all.min.css" />

  <!-- ========== End font awesome library ========== -->

  <!-- ========== Start bootstrap css link ========== -->
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <!-- ========== End bootstrap css link ========== -->

  <!-- ========== Start Section ========== -->
  <link rel="stylesheet" href="./css/home.css" />
  <link rel="stylesheet" href="./css/home-media.css">
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
              <a class="nav-link" href="profiles1.php">Service provider</a>
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

  <section id="home">
    <div class="home-h3 text-center">
      <h3>Service Hub is the biggest website for buying and selling services</h3>
      <h4>Get all your work done easily and safely</h4>
    </div>
  </section>

  <section id="home2">
    <h3>How Service Hub website works</h3>
    <div class="home2-container">
      <div class="div1">
        <i class="fa-regular fa-file-lines" id="file-line"></i>
        <h5 class="text-center">View services</h5>
        <p class="text-center lead">Find the service you need by clicking on "services" in nav-bar at the top</p>
      </div>
      <div class="div2">
        <i class="fa-regular fa-folder-open" id="file-line"></i>
        <h5 class="text-center">Ask for service</h5>
        <p class="text-center lead">Review service descriptions and buyer reviews, then request to open contact with the
          seller.</p>
      </div>
      <div class="div3">
        <i class="fa-solid fa-handshake" id="file-line"></i>
        <h5 class="text-center">Receive your service</h5>
        <p class="text-center lead">Contact the seller directly within the Fiverr website until receiving your complete
          order.</p>
      </div>
    </div>
  </section>

  <section id="home3">
    <h3>All creative and professional services to develop and grow your business</h3>
    <div class="home3-container">
      <div class="home3-div">

        <a href="services.php">
          <div class="layer">
            <h3>Marketing</h3>
          </div>
        </a>
        <a href="services.php"><img src="./imgs/bussiness-1.jpg" alt="image"></a>
      </div>
      <div class="home3-div">
        <a href="services.php">
          <div class="layer">
            <h3>Front-End</h3>
          </div>
        </a>
        <a href="services.php"><img src="./imgs/design2.jpg" alt="image"></a>
      </div>
      <div class="home3-div">
        <a href="services.php">
          <div class="layer">
            <h3>Software</h3>
          </div>
        </a>
        <a href="services.php"><img src="./imgs/development-2.jpg" alt="image"></a>
      </div>

    </div>
  </section>








  <!-- Start Animation   -->


  <!-- <div class="circles">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div> -->


  <!-- End Animation -->

















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