<?php 
include 'connection.php';
if(!$_SESSION['user_id']){
  header("location:login.php");
}
$name="";
$desc="";
$price="";
$currency="";
$pers="";
$servicetype="";
$location="";
$image_a="";
$category="";
$updated= false;


$userid=$_SESSION['user_id'];
$selected="SELECT * FROM `user` WHERE `user_id`=$userid";
$run= mysqli_query($connect , $selected);



if(isset($_GET['edit'])){

$id=$_GET['edit'];
$updated=true;
$select="SELECT * FROM `services` WHERE `service_id`= $id";
$run_select=mysqli_query($connect , $select);
$array=mysqli_fetch_assoc($run_select);
$image_a=$array['image'];
$name=$array['service_name'];
$desc=$array['description'];
$price=$array['price'];
$currency=$array['currency'];
$pers=$array['priceper'];
$servicetype=$array['service_type'];
$location=$array['location'];
$category=$array['type_id'];

}
error_reporting(0);

        if(isset($_POST['update'])){
          $image=$_FILES['image']['name'];
          $name=$_POST['service_name'];
          $desc=$_POST['description'];
          $price=$_POST['price'];
          $currencyy=$_POST['currencyy'];
          $perss=$_POST['priceperr'];
          $servicetypee=$_POST['service_type'];
          $location=$_POST['location'];
          $category=$_POST['type_id'];
        
            //  echo "$currencyy <br> $perss<br> $name<br>";
            //  echo "hello<br>";
            //  echo $currency;
              
              if(strlen($image)>= 1){
                move_uploaded_file($_FILES['./imgs']['tmp_name'],"image".$image);    
                $update="UPDATE `services` SET  `service_name`='$name',`description`='$desc',`price`='$price',
                `currency`='$currencyy', `priceper`='$perss', `service_type`='$servicetypee',`location`='$location',`image`='$image',`type_id`='$category' WHERE `service_id`=$id";
                
                 $run_update=mysqli_query($connect,$update);
                
                header("location:myprofile.php");
                } 

              else{
            //  move_uploaded_file($_FILES['./imgs']['tmp_name'],"image".$image);    
             $update="UPDATE `services` SET  `service_name`='$name',`description`='$desc',`price`='$price',
             `currency`='$currencyy', `priceper`='$perss', `service_type`='$servicetypee',`location`='$location',`type_id`='$category' WHERE`service_id`=$id";
             
              $run_update=mysqli_query($connect,$update);
             
             header("location:myprofile.php");
              }
            
              
           
}

$selection="SELECT * FROM types ";
$runselection=mysqli_query($connect , $selection);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
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
    <link rel="stylesheet" href="./css/add-services.css">
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

    <form  method="POST" enctype="multipart/form-data" class="form">
        <p class="title"> Edit Service </p>
    <p class="message"> Fill out Data</p>   
    <div class="kber" style="display: flex; flex-wrap: wrap;"> 
   
    <label class="custum-file-upload" for="file">
            <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
          </div>
            <div class="text">
               <span>Click to upload image</span>
              </div>
              <input type="file" id="file" name="image">
              
            </label>
            <div class="imgDisplay">
      <img src="<?php if(empty($image)){
        echo $image_a ; 
      } 
      else
      {
       
        echo $image ; 
      
      }
      ?>" name="imagge" alt="img" width="100px" height="100px">
      </div>
      </div>
           <label for="ServiceName">
            <input value="<?php echo $name; ?>"  name="service_name" class="input" type="text" placeholder="" required="" id="ServiceName">
            <span>Service Name</span>
        </label>
        
    
    
    <label for="ServDesc">
        <input  value="<?php echo $desc; ?>"  name="description" class="input" type="text" placeholder="" required="" id="ServDesc">
        <span>Description</span>
    </label> 
    <div class="flex">
      <label for="Price">
        <input value="<?php echo $price; ?>"  name="price" class="input" type="number" placeholder="" required="" id="Price">
        <span> Price</span>
      </label>
      <select name="currencyy"   class="form-select" aria-label="Default select example">

        <option  <?php if ($currency =="EGP"){ echo "selected"; } ?> value="EGP"  >EGP</option>
        <option  <?php if ($currency =="Dollar"){ echo "selected" ;}?> value="Dollar"  >Dollar</option>
      </select>
      <select  name="priceperr"  class="form-select" aria-label="Default select example">

        <option  <?php if ($currency =="Per Hour"){ echo "selected"; } ?> value="Per Hour" >Per Hour</option>
        <option  <?php if ($currency =="Per Project"){ echo "selected"; } ?> value="Per Project" >Per Project</option>
      </select>
    </div>     

    <p class="message" id="message2"> Type of Service:</p><span><?php echo $error ?> </span>
    
    <div class="locationradio">   
        <div class="form-check">
            <input class="form-check-input" id="online-radio" type="radio" name="service_type" id="flexRadioDefault1" value="on" <?php if ($servicetype =="on") { echo "checked";}?> >
            <label class="form-check-label" for="online-radio">
                Online
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="offlineRadio" name="service_type" id="flexRadioDefault2"  value="off"  <?php if ($servicetype =="off") {echo "checked";}?> >
            <label class="form-check-label" for="offline-Radio">
              Offline
              </label>
          </div>
    </div>

    <label for="ServLocation" id="location-dis" class="noDisappear">
        <input value="<?php echo $location; ?>" name="location" class="input" type="text" placeholder=""  id="ServLocation">
        <span>Location</span>
    </label> 

    <select name="type_id" class="form-select" aria-label="Default select example">
    <?php foreach ($runselection as $rows) { ?>
        <option value="<?php echo $rows['type_id']; ?>" <?php if ($category == $rows['type_id']) echo "selected"; ?>><?php echo $rows['type_name']; ?></option>
    <?php } ?>
       
      </select>



    <button class="submit" name="update">Submit</button>
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
  

    <script src="./js/bootstrap.bundle.min.js`"></script>
    <script src="./js/edit&add-services.js"></script>
</body>
</html>





<!-- 
    service name*
    service image*
    location
    description*    
    price   egp or dollar     per hour or project*


    type of service

    online or offline
    location

    categories

 -->