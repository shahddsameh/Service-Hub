<?php
include "connection.php";
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
$image="";
$category="";
$updated= false;


$userid=$_SESSION['user_id'];

$selected="SELECT * FROM `user` WHERE `user_id`=$userid";
$run= mysqli_query($connect , $selected);
$select4row="SELECT * FROM `user` JOIN `services` ON `user`.`user_id` = `services`.`user_id` WHERE `user`.`user_id`=$userid";
$forrowRun= mysqli_query($connect , $select4row);
$RowsNo=mysqli_num_rows($forrowRun);
// echo $userid;

if(isset($_POST['confirm'])){
  $img=$_FILES['image']['name'];
  $_SESSION['image']=$img;
  $_SESSION['imagetmp']=$_FILES['image']['tmp_name'];
 move_uploaded_file($_FILES['image']['tmp_name'] , "imgs/".$img);
//  $query = "INSERT INTO  `services`  (`image`) VALUES ('$img')";
//  $runinsert=mysqli_query($connect, $query);
// $selectionn="SELECT * FROM `services`";
// $runselectionnn=mysqli_query($connect , $selectionn);
}



if(isset($_POST['Add'])){
    $name=$_POST['service_name'];
    $desc=$_POST['description'];
    $price=$_POST['price'];
    $currency=$_POST['currency'];
    $pers=$_POST['priceper'];
    $servicetype=$_POST['service_type'];
    $location=$_POST['location'];
    //  $image=$_FILES['image']['name'];
     $image=$_SESSION['image'];
     $imgtmp=$_SESSION['imagetmp'];
    $category=$_POST['type_id'];
    
    // echo $image;
  
    // $selectt="SELECT * FROM `services` WHERE `service_name`='$name'";
    // $runselect=mysqli_query($connect , $selectt);
    // $rows= mysqli_num_rows($runselect);
    if(empty($name)){
        // echo "service name is required";
        echo '
        <script type="text/javascript">
        window.alert("all data must be filled!");
        </script>
        ';
    }elseif(empty($desc)){
        // echo "description is required";
        echo '
        <script type="text/javascript">
        window.alert("all data must be filled!");
        </script>
        ';
    }elseif(empty($price)){
        // echo "course price is required";
        echo '
        <script type="text/javascript">
        window.alert("all data must be filled!");
        </script>
        ';
        }elseif(empty($currency)){
        // echo "choose your currency";
        echo '
        <script type="text/javascript">
        window.alert("all data must be filled!");
        </script>
        ';
        }elseif(empty($pers)){
        // echo "choose your pers";
        echo '
        <script type="text/javascript">
        window.alert("all data must be filled!");
        </script>
        ';
    }elseif(empty($servicetype)){
        // echo "choose your service type";
        echo '
        <script type="text/javascript">
        window.alert("all data must be filled!");
        </script>
        ';
    }elseif(empty($image)){
        // echo "image is required";
        echo '
        <script type="text/javascript">
        window.alert("all data must be filled!");
        </script>
        ';
    }elseif(empty($category)){
        // echo "all data must be filled!";
        echo '
        <script type="text/javascript">
        window.alert("all data must be filled!");
        </script>
        ';
    }elseif($RowsNo>=10){
      echo '
      <script type="text/javascript">
      window.alert("number of services created for this account reached the limit(10)!");
      </script>
      ';
   }elseif($servicetype=="off"){
    $insert="INSERT INTO `services` 
    VALUES(NULL, '$name','$desc' , '$price', '$currency' , '$pers' , '$servicetype' , '$location','$image', '$category' , '$userid') LIMIT 10";
    $runinsert=mysqli_query($connect, $insert);
  
    move_uploaded_file($imgtmp, "./imgs/".$image);
   UNSET($imgtmp);
   UNSET($image);
header("location:services.php");// to page  services
echo "
name: $name <br>
desc: $desc <br>
price: $price <br>
currency: $currency <br>
pers: $pers <br>
servicetype: $servicetype <br>
location: $location <br>
image: $image <br> 
category: $category <br>
userid: $userid <br>
";
echo $_SESSION['user_id'];

    }else{
      $insert="INSERT INTO `services` 
    VALUES(NULL, '$name','$desc' , '$price', '$currency' , '$pers' , '$servicetype' , NULL,'$image', '$category' , '$userid') LIMIT 10";
    $runinsert=mysqli_query($connect, $insert);
    move_uploaded_file($imgtmp, "./imgs/".$image);
   UNSET($imgtmp);
   UNSET($image);
header("location:services.php");// to page  services
echo "
name: $name <br>
desc: $desc <br>
price: $price <br>
currency: $currency <br>
pers: $pers <br>
servicetype: $servicetype <br>
location: no location <br>
image: $image <br> 
category: $category <br>
userid: $userid <br>
";  
echo $_SESSION['user_id'];
}
}
if(isset($_GET['edit'])){
    $updated=true;
    $id=$_GET['edit'];
    $select="SELECT * FROM `services` WHERE `service_id`= $id";
    $run_select=mysqli_query($connect , $select);
    $array=mysqli_fetch_assoc($run_select);

    $name=$_POST['service_name'];
    $desc=$_POST['description'];
   $price=$_POST['price'];
   $currency=$_POST['currency'];
   $pers=$_POST['priceper'];
   $servicetype=$_POST['service_type'];
   $location=$_POST['location'];
   $image=$_FILES['image']['name'];
   $category=$_POST['type_id'];
    
}
if(isset($_POST['update'])){
    $name=$_POST['service_name'];
     $desc=$_POST['description'];
    $price=$_POST['price'];
    $img=$_SESSION['image'];
    $currency=$_POST['currency'];
    $pers=$_POST['priceper'];
    $servicetype=$_POST['service_type'];
    $location=$_POST['location'];
    $image=$_FILES['image']['name'];
    $category=$_POST['type_id'];

if(empty($image)){
        $update="UPDATE `services` SET `service_name`='$name' , `price`=$price ,
    `description`='$desc' , `type_id`=$category WHERE `type_id`= $id ";
        $runupdate=mysqli_query($connect, $update);
       
    }else {
        $update="UPDATE `services` SET `service_name`='$name' , `price`=$price ,
        `description`='$desc' , `type_id`=$category WHERE `type_id`= $id ";
        $runupdate=mysqli_query($connect, $update);
        move_uploaded_file($_FILES['image']['tmp_name'], "imgs/".$image);
      
    } 
} 

    $selection="SELECT * FROM `types` ORDER BY `type_name`";
    $runselection=mysqli_query($connect , $selection);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Service</title>
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
  
  <div class="registerform">
    <!-- form start -->
<div class="registerr d-flex justify-content-center align-items-center">
<div class="formholder">

    <form class="form form1" method="POST" enctype="multipart/form-data">
        <p class="title"> Add a New Service You Offer! </p>
    <p class="message"> Fill out Data</p>   
    <div class="flexdiv">

      <label class="custum-file-upload" for="file">
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0"          id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g>
        </svg>
            
            <!-- <div class="text"> -->
              <span>Click to upload image</span>
              <!-- </div> -->
              
              <input type="file" id="file" name="image">
              
              
            </div>
          </label>
          <div class="img-input"><img class="ml-5 img-border" width="150px" height="150px"  src="./imgs/<?php echo $img ;?>"></div> 
        </div>
            
           <button type="submit" class="submit" name="confirm"> confirm image </button>
 </form>  
           <form class="form form2" method="POST" enctype="multipart/form-data">
            
           <label for="ServiceName">
            <input class="input" type="text" placeholder="" required="" id="ServiceName"  name="service_name">
            <span>Service Name</span>
        </label>
    
    <label for="ServDesc">
        <input class="input" type="text" placeholder="" required="" id="ServDesc" name="description">
        <span>Description</span>
    </label> 
    <div class="flex">
      <label for="Price">
        <input class="input" type="number" placeholder="" required="" id="Price" name="price">
        <span> Price</span>
      </label>
      <select class="form-select" aria-label="Default select example" name="currency" value="<?php echo $currency ; ?>">
        <option selected>Choose the Currency</option>
        <option value="L.E"  name="1">Egp</option>
        <option value="$"  name="2">Dollar</option>
      </select>
      <select class="form-select" aria-label="Default select example" name="priceper"  value="<?php echo $pers ; ?>">
        <option selected>Choose the Rate of Pay</option>
        <option value="/hour" name="1">Per Hour</option>
        <option value="/project" name="2">Per Project</option>
      </select>
    </div>     

    <p class="message" id="message2"> Type of Service:</p>   
    
    <div class="locationradio">   
        <div class="form-check">
            <input class="form-check-input" id="online-radio" type="radio" value="on" name="service_type" id="flexRadioDefault1">
            <label class="form-check-label" for="online-radio">
                Online
            </label>
        </div>
      <div class="form-check">
          <input class="form-check-input" type="radio" id="offlineRadio" value="off" name="service_type" id="flexRadioDefault2">
          <label class="form-check-label" for="offlineRadio">
            Offline
            </label>
        </div>
    </div>

    <label for="ServLocation" id="location-dis" class="noDisappear">
        <input class="input" type="text" placeholder=""  id="ServLocation" name="location"> 
        <span>Location</span>
    </label> 

    <select class="form-select" aria-label="Default select example" name="type_id">
        <option selected>Choose The Category</option>
       <?php foreach($runselection as $rows) {?>
        <option value="<?php echo $rows['type_id']; ?>"><?php echo $rows['type_name']; ?></option>
        <?php } ?>
      </select>

      <?php if($updated==true){ ?>
        <button class="submit" type="submit" name="update">Edit</button>
    <?php } else { ?>
        <button class="submit" type="submit" name="Add">Add</button>
     <?php } ?>

    
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