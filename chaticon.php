<?php
include 'connection.php';
// Redirect if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit(); // Always good to stop execution after redirect
}

// Check if service details are requested
if (isset($_GET['details'])) {
    $service_id = $_GET['details'];

    // Use lowercase variable for the query
    $select = "SELECT * FROM `user` JOIN `services` ON `user`.`user_id` = `services`.`user_id` WHERE `service_id` = $service_id";
    $runselect = mysqli_query($connect, $select); //

    // Check if result exists
    if ($runselect && mysqli_num_rows($runselect) > 0) {
        $user_data = mysqli_fetch_assoc($runselect);
        $user_email = $user_data['user_email'];
    } else {
        $user_email = "notfound@example.com"; // fallback
    }
} else {
    // Handle missing service ID
    $user_email = "notfound@example.com";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products page</title>
    <link rel="stylesheet" href="./css/all.min.css">
    </head>
    <body>

</body>
</html>