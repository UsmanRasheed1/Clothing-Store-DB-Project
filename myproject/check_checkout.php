<?php
require_once("db_connection.php");
$email = $_GET['email'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$comments = $_GET['comments'];

// Perform a query to check if the email exists in the database
// Replace this with your database connection logic and query
$query = "SELECT * FROM checkout_details WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$rowCount = mysqli_num_rows($result);

if ($rowCount == 0) {
    $queryInsert = "INSERT INTO checkout_details (email, phonenum, address ,comments)
            VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $queryInsert);
mysqli_stmt_bind_param($stmt, 'ssss', $email, $phone, $address ,$comments);

// Execute the prepared statement
if (mysqli_stmt_execute($stmt)) {
echo "Data inserted successfully!";

// Redirect to my_cart.php with email as a parameter
header("Location: my_cart.php?email=$email");
exit();
} else {
echo "Error executing statement: " . mysqli_stmt_error($stmt);
}

// Close the prepared statement
mysqli_stmt_close($stmt);
} else {
    $queryupdate = "update checkout_details set phonenum='$phone',address='$address', comments = '$comments'";
    $stmt = mysqli_prepare($conn, $queryupdate);
    mysqli_stmt_execute($stmt);
    // Redirect to my_cart.php with email as a parameter
header("Location: my_cart.php?email=$email");
}

mysqli_close($conn);

?>