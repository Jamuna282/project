 <?php

 // Include the database configuration file
  include 'config.php';

  // Start the session
 session_start();

 // Remove all session variables
 session_unset();

 // Destroy the session completely(log out the user)
 session_destroy();

 // Redirect the user to the login page
 header('location:login.php');

 ?>
