 <?php

 // Include the database connection file
include 'config.php';

 // Start a session to use session variables
session_start();

 // Get the admin ID from the session
$admin_id = $_SESSION['admin_id'];

 //If admin ID is not set(admin not logged in), redirect to login page
if(!isset($admin_id)){
    header('location:login.php');

}

 ?>
  <!-- Start of the HTML document -->
 <!DOCTYPE htm>
 <html lang="en">
    <head>
        <!-- Meta information -->
        <meta charser="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, inital-scale=1.0">

        <!-- Title of the page -->
        <title>admin panel</title>

        <!-- Font awesom cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

     <!-- Custom admin css file link -->
     <link rel="stylesheet" href="admin_style.css">

    </head>
    <body>

     <!-- include the admin header file(usually contains navigation menu) -->
  <?php include 'admin_header.php'; ?>











 <!--custom admin js file link -->
<script src="js/admin_script.js"></script>

    </body>
 </html>