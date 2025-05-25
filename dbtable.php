<?php

//Connecting to the database
$servername = "localhost";
$username = "root";
$password ="";
$database= "book_db";

//Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check if connection was  successful
if(!$conn){
    // If connection fails, stop and show error message
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}
else{
 // If connection is successful, show this message
    echo"Connection was successful <br>";
}
 //Create user table
$sql = "CREATE TABLE`users`(
`id`INT(100)PRIMARY KEY AUTO_INCREMENT,
`name` VARCHAR(100) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`password` VARCHAR(100) NOT NULL,
`user_type` VARCHAR(20) NOT NULL DEFAULT 'USER'
)";

$result = mysqli_query($conn, $sql);
if ($result){
    echo "Users table created sucessufully.<br>";
} else {
    echo "Error creating user table: " .mysqli_error($conn). "<br>";
}
 
  // Create cart table
$sql = "CREATE TABLE`cart`(
`id`INT(100)PRIMARY KEY AUTO_INCREMENT,
`user_id`INT(100) NOT NULL,
`name` VARCHAR(100) NOT NULL,
`price` INT(100) NOT NULL,
`quantity` INT(100) NOT NULL,
`image` VARCHAR(100) NOT NULL,
FOREIGN  KEY (`user_id`) REFERENCES `users`(`id`)
)";

$result = mysqli_query($conn,$sql);
if ($result) {
    echo "Users table created sucessufully.<br>";
} else {
    echo "Error creating user table: " .mysqli_error($conn). "<br>";
}
 // Create message table
$sql = "CREATE TABLE`message`(
`id` INT(100) PRIMARY KEY AUTO_INCREMENT,
`user_id` INT(100) NOT NULL,
`name` VARCHAR(100) NOT NULL,
`email`VARCHAR(100) NOT NULL,
`number` VARCHAR(12) NOT NULL,
`message` VARCHAR(500) NOT NULL,
FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
)";

$result = mysqli_query($conn, $sql);
if ($result) {
    echo "Users table created sucessufully.<br>";
} else { 
    echo "Error creating user table: " .mysqli_error($conn). "<br>";
}

 // Create orders table
$sql = "CREATE TABLE `orders`(
`id` INT(100)PRIMARY KEY AUTO_INCREMENT,
`user_id` INT(100) NOT NULL,
`name` VARCHAR(100) NOT NULL,
`number` VARCHAR(12) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`method` VARCHAR(50) NOT NULL,
`address` VARCHAR(500) NOT NULL,
`book` VARCHAR(100) NOT NULL,
`total_price` INT(100) NOT NULL,
`placed_on` VARCHAR(50) NOT NULL,
`payment_status` VARCHAR(20) NOT NULL DEFAULT 'pending',
FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
)";

$result = mysqli_query($conn, $sql);
if ($result) {
    echo "Users table created sucessufully.<br>";
} else {
    echo "Error creating user table: " .mysqli_error($conn). "<br>";
}

 // Create books table
 // Add pdf_path column to books
$sql = "CREATE TABLE `books`(
`id` INT(100) PRIMARY KEY AUTO_INCREMENT,
`name` VARCHAR(100) NOT NULL,
`price` INT(100) NOT NULL,
`image` VARCHAR(100) NOT NULL,
`category` VARCHAR(100) NOT NULL DEFAULT 'category',
`status` VARCHAR(50) NOT NULL DEFAULT 'available',
`pdf_path` VARCHAR(255)
)";

$result = mysqli_query($conn,$sql);
if ($result) {
    echo "Users table created sucessufully.<br>";
} else {
    echo "Error creating user table: " .mysqli_error($conn). "<br>";
}

?>


