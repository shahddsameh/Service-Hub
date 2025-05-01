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
  <title>About us</title>
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
  <link rel="stylesheet" href="./css/aboutus.css">
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

  <!-- ========== Start services-details section ========== -->
  <section class="details" id="details">
    <div class="container">
      <div class="row"></div>
    </div>
  </section>
  <section id="about" class="main-padding">
    <div class="container">
      <div class="row py-5">
        <div class="col-sm-12 col-lg-6">
          <div class="d-flex flex-wrap">
            <div class="about-image">
              <img src="./imgs/about-photo.jpg" class="img-thumbnail" alt="image in about-section" />
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-lg-6">
          <h4 class="fs-2 fw-semibold py-4">
            About Us
          </h4>

          <div class="name-service d-flex gap-2">
            <label class="fw-bolder">Name of website :</label>
            <p class="">
              Service hub
            </p>

          </div>

          <Label class="fw-bold">Description for Our website :</Label>
          <p>
            Welcome to [Service hub], your premier destination for exceptional services. We take pride in offering a
            wide range of services designed to meet your every need by a team of highly skilled professionals and a
            commitment to excellence, we strive to deliver unparalleled customer satisfaction.
          </p>
          <!-- <div class="d-flex gap-3">
              <Label class="fw-bold pb-3">Price of the Course :</Label> -->


          <!-- <select class="form-select w-25">
              <option value="price">-----</option>
              <option value="price">EGP</option>
              <option value="price">Dllar</option>
            </select>
            
            <select class="form-select w-25">
              <option value="price">-----</option>
              <option value="price">Hour</option>
              <option value="price">Project</option>
            </select>
            </div>
            <div class="d-flex gap-3 pt-3">
              <label class="fw-bold"> Our Location : </label>

              <p>329 Maadi ST cairo, MA 02108</p>
            </div> -->



        </div>
      </div>
    </div>
  </section>
  <!-- ========== End services-details section ========== -->

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