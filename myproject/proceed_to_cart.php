<?php
require_once("db_connection.php");
$email = $_GET['email'];

// Perform a query to check if the email exists in the database
// Replace this with your database connection logic and query
$query = "SELECT * FROM checkout_details WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$rowCount = mysqli_num_rows($result);

if ($rowCount == 0) {
    $text="You need to enter checkout details before entering cart or going to a product page!";
    header("Location: enter_checkout.php?email=$email&text=$text");
    exit();

} else {
    header("Location: my_cart.php?email=$email");
exit();
}



