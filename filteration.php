<?php
//include 'connection.php';
        // if(isset($_POST['minimum_price']) AND isset($_POST['maximum_price'])){
        
            if(isset($_POST['filter'])){
            $maximum_price= $_POST['maximum_price'];
            $minimum_price= $_POST['minimum_price'];

            $select="SELECT *,`services`.`image` AS `simg` FROM `services` JOIN `user` ON `services`.`user_id` =`user`.`user_id`  WHERE `price` BETWEEN $minimum_price AND $maximum_price";
        }
        else
        {
            $select = "SELECT *,`services`.`image` AS `simg` FROM `user` JOIN `services` ON `user`.`user_id` = `services`.`user_id` ";
        }
        
        $runselect=mysqli_query($connect, $select);

        ?>

<html>
<head>
    <title>filter</title>
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
    <form method="POST" class="filterform">
        
        <input placeholder='from' type="text" class='w-50' name="minimum_price" value="<?php if(isset($_POST['minimum_price'])){echo $_POST['minimum_price'];} ?>">
        <input placeholder='to' type="text" class='w-50' name="maximum_price" value="<?php if(isset($_POST['maximum_price'])){echo $_POST['maximum_price'];}?>">
        <button class="btn btn-primary w-50" name="filter"type="submit">filter</button>

    </form>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>