<<<<<<< HEAD
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



=======
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



>>>>>>> cabe474b531ea5b263a35efce7734f05e4907fd1
 ?>