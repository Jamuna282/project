
 <?php

 // Include the database configuration file (for databaes connection)
include 'config.php';

 // Start the session to access session variables
session_start();

 // Get the logged-in user's ID from the session
$user_id = $_SESSION['user_id'];

 // Check if the user is not logged in (no user_id in session)
if(!isset($user_id)){

 // If not logged in, redirect the user to the login page
    header('location:login.php');
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- font awsome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awsome/6.0.0/css/all.min.css">

     <!-- custom css file link -->
      <link rel="stylesheet" href=style.css>

</head>
<body>

<?php include 'header.php'; ?>




<!-- custom js file link -->
 <script src="js/script.js"></script>
</body>
</html>
