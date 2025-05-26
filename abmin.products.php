<<<<<<< HEAD
 <?php

 include 'config.php';

 session_start();

 $admin_id = $_SESSION['admin_id'];
  
 if(!isset($admin_id)){
    header('location:login.php');

 }

?>
  <!DOCTYPE html>
  <html lang ="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>admin panel</title>

        <!-- font awsome cdn link -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

         <!-- custom admin css file link -->
          <link rel="stylesheet" href="css/admin_style.css">

          </link>

    </head>
=======
 <?php

 include 'config.php';

 session_start();

 $admin_id = $_SESSION['admin_id'];
  
 if(!isset($admin_id)){
    header('location:login.php');

 }

?>
  <!DOCTYPE html>
  <html lang ="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>admin panel</title>

        <!-- font awsome cdn link -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

         <!-- custom admin css file link -->
          <link rel="stylesheet" href="css/admin_style.css">

          </link>

    </head>
>>>>>>> cabe474b531ea5b263a35efce7734f05e4907fd1
  </html>