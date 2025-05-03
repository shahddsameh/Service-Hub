<?php
include 'connection.php';
if(!$_SESSION['user_id']){
  header("location:login.php");
}
// error_reporting(E_ALL & ~E_WARNING);

$uid=$_SESSION['user_id'];
$select_user="SELECT * FROM `user` WHERE `user_id`=$uid";
$runSelect=mysqli_query($connect,$select_user);
// echo $uid;



$session_id = $_SESSION['details'];
//echo $session_id;

// if(isset($_GET['details'])){
    
// $id=$_GET['details'];



$select="SELECT * , `services`.`image` as `ser_img` FROM `services` 
 JOIN `types` ON `services`.`type_id`= `types`.`type_id` 
JOIN `user` ON `services`.`user_id` = `user`.`user_id` 
WHERE `services`.`service_id`='$session_id'";
$run= mysqli_query($connect, $select);
// header("location: details.php");

// Check if the user has already left a comment for the current service
// $checkCommentQuery = "SELECT * FROM `rates` WHERE `user_id`='$uid' AND `service_id`='$session_id'";
// $checkCommentResult = mysqli_query($connect, $checkCommentQuery);

// if (mysqli_num_rows($checkCommentResult) > 0) {
//     // The user has already left a comment for this service
//     echo "You have already left a comment for this service.";
// } else {
//     // Allow the user to leave a comment
//     if (isset($_POST['submit'])) {
//         // Process the comment submission
//     }
// }



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OUR-DETAILS</title>
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
    <link rel="stylesheet" href="./css/services-details.css" />
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
          <a href="logout.php" class="btn btn-primary  mx-md-4 d-block d-md-inline " >Log Out</a>
        </div>
      </div>
    </nav>
    <?php } else{ ?>
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
    <?php foreach ($run as $value) { ?>
      <div class="container">
        <div class="row py-5">
          <div class="col-sm-12 col-lg-6">
            <div class="d-flex flex-wrap">
              <div class="about-image">
              
                <img
                  src="./imgs/<?php echo $value['ser_img'] ?>"
                  class="img-thumbnail"
                  alt="image in about-section"
                />
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <h4 class="fs-2 fw-semibold py-4">
            Service
            </h4>
            <div class="name-service d-flex gap-2">
              <label class="fw-bolder">Name of This Service :</label>
              <p class="">
                 <?php echo $value ['service_name'];?>
              </p>
  
            </div>


            
          <div class="name-service d-flex gap-2">
            <label class="fw-bolder">Service Provider:</label>
            <p>
            <?php echo $value ['firstname'];?> <?php echo $value ['lastname'];?>
            </p>
          </div>
           
          <Label class="fw-bold">Description for Our Course :</Label>
            <p>
            <?php echo $value ['description']?>
            </p>
            <div class="d-flex gap-3">
            <Label class="fw-bold pb-3">Price of the Course :</Label>

            <p><?php echo $value ['price'];?> <?php echo $value ['currency'];?> <?php echo $value ['priceper'];?></p>

          </div>
          
            <div class="d-flex gap-3 pt-3">
              <label class="fw-bold"> Our Location : </label>
              
              <p>  <?php echo $value ['service_type']?>  <?php echo $value ['location'];?></p>
            </div>
          
            <?php } ?>
  
          </div>
        </div>
      </div>
    </section>
    <!-- ========== End services-details section ========== -->

    

<?php
if(isset($_POST['submit'])) {
    
    $comments = $_POST['comments'];
    $rating = $_POST['star'];
    $insert="INSERT INTO `rates` VALUES (NULL, '$comments', '$rating','$uid','$session_id')";
    $run_insert=mysqli_query($connect,$insert);
    }
  
  
  if(isset($_GET['delete'])){
    
    $commentId = $_GET['delete'];
    $delete="DELETE FROM `rates` WHERE `comment_id`='$commentId'";
    $run_delete=mysqli_query($connect,$delete);
    header ('location: services-details.php');

    // $commentId=$_GET['delete'];
    // $get_userid="SELECT `user_id` FROM `rates` WHERE `comment_id`='$commentId' ";
    // $run_get=mysqli_query($connect,$get_userid);
    // $fetch=mysqli_fetch_assoc($run_get);
    // if($_SESSION['user_id']==$fetch['user_id']){
    // $delete="DELETE FROM `rates` WHERE `comment_id`='$commentId'";
    // $run_delete=mysqli_query($connect,$delete);
  }
  
  ?>

    <!-- comments section -->
    <div class="comment-container mb-5">
      <h1>Comments & Rates</h1>
      <div class="card">
        <span class="title">Leave a Comment</span>
        <form class="form" method="POST">
         

          <div class="rating">
            <input value="5" name="star" id="star-1" type="radio">
            <label for="star-1">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
            </label>
            <input value="4" name="star" id="star-2" type="radio">
            <label for="star-2">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
            </label>
            <input value="3" name="star" id="star-3" type="radio">
            <label for="star-3">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
            </label>
            <input value="2" name="star" id="star-4" type="radio">
            <label for="star-4">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
            </label>
            <input value="1" name="star" id="star-5" type="radio">
            <label for="star-5">
              <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path></svg>
            </label>
          </div>



      <div class="group">
          <textarea placeholder="‎" id="comment" name="comments" rows="5"></textarea>
          <label for="comment">Comment</label>
      </div>
          <button type="submit" name="submit">Submit Review</button>
        </form>
      </div>
      
        
    </div>
        
    <div class="viewOtherComments d-flex justify-content-center mx-5">
      <h2>Other Comments:</h2>
    </div>  
        <div class="other-comment-container mx-5">
          <!-- loop comment start -->
          <?php 

$select_rate = "SELECT *,`user`.`image` AS `mimg` FROM `rates` 
JOIN `user` ON `rates`.`user_id`= `user`.`user_id`
WHERE `rates`.`service_id`='$session_id'
ORDER BY `comment_id` DESC
LIMIT 10";
$run_select_rate=mysqli_query($connect,$select_rate);
  foreach($run_select_rate as $reviews){
    ?>

          <div class="commentitem">
          <?php foreach($run_select_rate as $info){?>
      <div class="profilepic-name">
        <p class="profilename"><?php echo $info['firstname']; echo $info['lastname'];?></p>
        <div class="profilepic">
          <img id="profilepicc" src="./imgs/<?php echo $info['mimg'];?>" width="48px" height="48px" alt="<?php echo $info['mimg'];?>">
          <?php } ?>
        </div>
      </div>
      <div class="commentcontent">
        <p><?php echo $reviews['comment'];?></p>
        <i id="ratecomment" class="fa-solid fa-star" style="color: #bfd610;"> <span><?php echo $reviews['rate'];?></span></i>
        <?php if($_SESSION['user_id']==$uid && $reviews['user_id']==$_SESSION['user_id']){?>
        <a class="btn btn-danger mx-4" href="services-details.php?delete=<?php echo $reviews['comment_id']; ?>">Delete</a>        <?php } ?>
      </div>
    </div>
          <!-- loop comment end -->
        </div>


<?php } ?>
        </div>

    <!-- end comments section -->

    <!-- footer -->

    <!-- ========== Start bootstrap js link ========== -->
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- ========== End bootstrap js link ========== -->
  </body>
</html>