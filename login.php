<<<<<<< HEAD
 <?php

 // Include database connection file
include 'config.php';

// Start the session
session_start();

 // Check if the login form is submitted
if(isset($_POST['submit'])){

 // Get the email and password input, and sanitize them
    $email =mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

     // Check if the user exists in the database with matching email and password
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');

   // If user exists
   if(mysqli_num_rows($select_users) > 0){

    // Get user data
    $row = mysqli_fetch_assoc($select_users);

    // Check if the user is an admin
    if($row['user_type'] == 'admin'){

        // Set session variable for admin
     $_SESSION['admin_name'] = $row['name'];
     $_SESSION['admin_email'] = $row['email'];
     $_SESSION['admin_id'] = $row['id'];

     //Redirect to admin page
     header('location:admin_page.php');

     // If the user is a normal user
    }elseif($row['user_type'] == 'user'){

        // Set session variables for user
     $_SESSION['user_name'] = $row['name'];
     $_SESSION['user_email'] = $row['email'];
     $_SESSION['user_id'] = $row['id'];

     // Redirect to user home page
     header('location:home.php');

    }

   }else{
    // If no match is found, show error message
    $message[] = 'incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta and title setting -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <!-- font awesom cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
     <link rel="stylesheet" href="style.css">
</head>
<body>

  
<?php
if(isset($message)){
    foreach($message as $message){
      echo '
      <div class="message">
       <span>'.$message.'</span>
       <i class="fas fa-times" onclick="this.parentElement.remove()"></i>
</div>
      ';  
    }
}
?>

<div class="form-container">

<form action="" method="post">
    <h3>login now</h3>

    <!-- Email input -->
<input type="email" name="email" placeholder="enter your email" required class="box">

    <!-- Password input -->
<input type="password" name="password" placeholder="enter your password" required class="box">

    <!-- Submit button -->
<input type="submit" name="submit" value="login now" class="btn">

    <!-- Link to registration page -->
<p>don't have an account?<a href="register.php">register now</a></p>
</form>

</div>

</body>
 