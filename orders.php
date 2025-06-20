<?php 

include 'config.php';

session_start();


$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders</title>

    <!-- font awsome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awsome/6.0.0/css/all.min.css">

     <!-- custom css file link -->
      <link rel="stylesheet" href="style.css">
 
</head>
<body>
     

<div class="heading">
    <h3>PLACED ORDERS</h3>


  <section class="placed-orders">

  <h1 class="title">placed orders</h1>

  <div class="box-container">

  <?php 
     $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');  
     if(mysqli_num_rows($order_query) > 0){
     while($fetch_orders = mysqli_fetch_assoc($order_query)){  
  ?>
  <div class="box">
  <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
  <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
  <p> number: <span><?php echo $fetch_orders['number']; ?></span> </p>
  <p>address : <span><?php echo $fetch_orders['address']; ?></span> </p>
  <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
  <p> your orders : <span><?php echo $fetch_orders['total_books']; ?></span> </p>
  <p> total price : <span>Rs<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
  <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){echo 'red'; }else{echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
  </div>
   <?php 
   }
     } else{
        echo '<p class="empty">no orders placed yet!</p>';
     } 
   ?>

  </div>

  </div>
  </section>