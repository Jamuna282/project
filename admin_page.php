<<<<<<< HEAD
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
=======
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
>>>>>>> cabe474b531ea5b263a35efce7734f05e4907fd1
 </html>





 <Tink rel="stylesheet" hret="css/admin_style.css*>
</head>
< body>
<?php include 'admin_header.php';
<section class="dashboard">

<h1 class="heading" ></h1>dashboard</h1>
<div class= "box-container>
<?php
$total_pending=0;
$select_pending =mysqli_query($conn "SELECT total_price FROM `orders` WHERE payment_status =`pending`") or die(`query failed`);

if(mysqli_num_rows($select_pending)>0){
while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
    $total_price = $fetch_pendings[`total_price`] 
    $total_pending +=$total_price;
};
};
?>
<h3><?php echo $fetch_pendings[]; ?></h3>
<p>total pending</p>
</div>
<div class ="box">
    <?php
$total_completed=0;
$select_completed =mysqli_query($conn "SELECT total_price FROM `orders` WHERE payment_status =`pending`") or die(`query failed`);
if(mysqli_num_rows($select_completed)>0){
while($fetch_completed = mysqli_fetch_assoc($select_completed)){
    $total_price = $fetch_completed[`total_price`] 
    $total_completed +=$total_price;
};
};
?>
<h3><?php echo $fetch_-$fetch_completed[]; ?></h3>
<p>completed payments</p>
</div>
<?php

</div>
</ section>