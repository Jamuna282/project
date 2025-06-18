<?php 
include 'config.php';
session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

if(isset($_POST['add_to_cart'])){
    $book_name = $_POST['book_name'];
    $book_price = $_POST['book_price'];
    $book_image = $_POST['book_image'];
    $book_quantity = $_POST['book_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$book_name' AND user_id = '$user_id'") or die(mysqli_error($conn));

    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$book_name', '$book_price', '$book_quantity', '$book_image')") or die(mysqli_error($conn));
        $message[] = 'book added to cart!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="heading">
    <h3>Search Page</h3>

<section class="search-form">
    <form action="" method="post">
        <input type="text" name="search" placeholder="search books..." class="box">
        <input type="submit" name="submit" value="search" class="btn">
    </form>
</section>

<section class="books" style="padding-top: 0;">
    <div class="box-container">
    <?php 
    if(isset($_POST['submit'])){
        $search_item = mysqli_real_escape_string($conn, $_POST['search']);
        $select_books = mysqli_query($conn, "SELECT * FROM `books` WHERE name LIKE '%$search_item%'") or die('query failed');
        
        if(mysqli_num_rows($select_books) > 0){
            while($fetch_books = mysqli_fetch_assoc($select_books)){   
    ?>
        <form action="" method="post" class="box">
            <img class="image" src="uploaded_img/<?php echo $fetch_books['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_books['name']; ?></div>
            <div class="price">Rs <?php echo $fetch_books['price']; ?>/-</div>
            <input type="number" min="1" name="book_quantity" value="1" class="qty">
            <input type="hidden" name="book_name" value="<?php echo $fetch_books['name']; ?>">
            <input type="hidden" name="book_price" value="<?php echo $fetch_books['price']; ?>">
            <input type="hidden" name="book_image" value="<?php echo $fetch_books['image']; ?>">
            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
        </form>
    <?php 
            }
        } else {
            echo '<p class="empty">No results found!</p>';
        }
    } else {
        echo '<p class="empty">Search something!</p>';
    }
    ?>
    </div>

    </div>
</section>

</body>
</html>
