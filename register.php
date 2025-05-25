<?php
 
 //Include the database configuration file(contains DB connection info)
include 'config.php';

//Check if the form is submitted
if(isset($_POST['submit'])){

    //Get the form input values safely to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email =mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password'])); // Encrypt password using md5
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword'])); // Encrypt confirm password
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

   // Check if a user with the same email and password already exists
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');

   // If user already exists, show message 
   if(mysqli_num_rows($select_users) > 0){
    $message[] = 'user already exist!';
   }else{
    // If password do not match, show error message
    if($password != $cpassword){
     $message[] = 'confirm password not matched!';
    }else{
        //Insert new user data into the database
    mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email',  '$password',  '$user_type' )") or die('query failed');
    $message[] = 'registered successfully!';
    // Redirect to login page
    header('location:login.php');
    } 
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

    <!-- font awesom cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
     <link rel="stylesheet" href="style.css">
</head>
<body>

  
<?php
// If any message are set (like error or success), show them
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
    <h3>register now</h3>
<input type="text" name="name" placeholder="enter your name" required class="box">
<input type="email" name="email" placeholder="enter your email" required class="box">
<input type="password" name="password" placeholder="enter your password" required class="box">
<input type="password" name="cpassword" placeholder="confirm your password" required class="box">
<select name="user_type" class="box">
    <option value="user">user</option>
    <option value="admin">admin</option>
</select>
<input type="submit" name="submit" value="register now" class="btn">
<p>already have an account?<a href="login.php">login now</a></p>
</form>
</div>

</body>
</html>
    