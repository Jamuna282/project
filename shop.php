 <?php 

include 'config.php';

session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

 if(isset($_POST['add_to_cart'])){

   $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
    $book_price = mysqli_real_escape_string($conn, $_POST['book_price']);
    $book_image = mysqli_real_escape_string($conn, $_POST['book_image']);
    $book_quantity = mysqli_real_escape_string($conn, $_POST['book_quantity']); 

     $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$book_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart!';
    }else{
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$book_name', '$book_price', '$book_quantity', '$book_image')") or die('query failed');
        $message[] = 'book added to cart!';
    }
 }
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <!-- font awsome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awsome/6.0.0/css/all.min.css">

     <!-- custom css file link -->
      <link rel="stylesheet" href=style.css>

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
    <h3>OUR SHOP</h3>

     
<section class="books">

<h1 class="title">LATEST BOOKS</h1>

<div class="box-container">

<?php 
$select_books = mysqli_query($conn, "SELECT * FROM `books`")or die('query failed');
if(mysqli_num_rows($select_books) > 0){
   while($fetch_books = mysqli_fetch_assoc($select_books)){
?>
  <form action="" method="post" class="box">
  <img class="image" src="uploaded_img/<?php echo $fetch_books['image']; ?>" alt="">
  <div class="book-title"><?php echo $fetch_books['name']; ?></div>
  <div class="price"><?php echo $fetch_books['price']; ?>/-</div>
  <input type="number" min="1" name="book_quantity" value="1" class="qty">
  <input type="hidden" name="book_name" value="<?php echo $fetch_books['name']; ?>">
  <input type="hidden" name="book_price" value="<?php echo $fetch_books['price']; ?>">
  <input type="hidden" name="book_image" value="<?php echo $fetch_books['image']; ?>">
  <input type="submit" value="add to cart" name="add_to_cart" class="btn">
  </form>
 <?php 
  } 
}else{
    echo '<p class="empty">no books added yet!</p>';
}
 ?>
</div>
</div>
</section>
