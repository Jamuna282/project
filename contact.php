 <?php 

include 'config.php';
session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;


if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT *FROM `message` WHERE  name = '$name' AND email = '$email' AND number ='$number' AND message ='$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
   $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
       $message[] = 'message sent successfully!'; 
      
   }
    
}

?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>

    <!-- font awsome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awsome/6.0.0/css/all.min.css">

     <!-- custom css file link -->
      <link rel="stylesheet" href="style.css">

</head>
<body>

 
<?php
    if(isset($message)){
      foreach ($message as $msg){
        echo '<div class="message"><span>' . $msg . '</span><span class="close-btn" onclick="this.parentElement.style.display=`none`;">&times;</span></div>' ;
      }
    }
    ?>

 <div class="heading">
    <h3>CONTACT US</h3>

 <section class="contact">


 <form action="" method="post">
    <h3>SAY SOMETHING!</h3>
    <input type="text" name="name" required placeholder="enter your name" class="box">
     <input type="email" name="email" required placeholder="enter your email" class="box">
    <input type="number" name="number" required placeholder="enter your number" class="box">
    <textarea name="message"  class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="send message" name="send" class="btn">
 </form>
      </div>
 </section>

