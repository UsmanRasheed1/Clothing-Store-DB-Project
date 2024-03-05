<?php
require_once("db_connection.php");

// Function to safely get user ID
function getemail() {
    // Replace this with your method of obtaining user_id securely
    return isset($_GET['email']) ? $_GET['email'] : null;
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = getemail();
if (!$email) {
    // Handle the case when user ID is not available or invalid
    die("Invalid Email");
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['selectedItems'])) {
        // Get the selected items array and explode it to have order IDs separately
        $selectedItems = $_GET['selectedItems'];
        $orderIds = explode(',', $selectedItems);
        $total_price = 0;
        $getprice = $conn->prepare("SELECT Total_Price FROM my_cart WHERE orderid = ?");
if ($getprice) {
    $Rcpttotal_price = 0;
    foreach ($orderIds as $orderId) {
        $getprice->bind_param("i", $orderId); // Bind parameter inside the loop

        $getprice->execute();

        $result = $getprice->get_result();
        $row = $result->fetch_assoc();
        if ($row) {
            $Rcpttotal_price += $row['Total_Price'];
        }
    }
}

    // Close the statement after use
    $getprice->close();
}
$fullnamequery = "SELECT CONCAT(first_name, ' ', last_name) AS full_name FROM user WHERE email='$email'";
$stmt = $conn->prepare($fullnamequery);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
        $fullname = $row['full_name'];

 $addressquery = "SELECT address FROM checkout_details WHERE email='$email'";
$stmt = $conn->prepare($addressquery);
  $stmt->execute();
 $result = $stmt->get_result();
 $row = $result->fetch_assoc();
 $address = $row['address'];
 echo  "". $address;


 $phonenumquery = "SELECT phonenum FROM checkout_details WHERE email='$email'";
$stmt = $conn->prepare($phonenumquery);
  $stmt->execute();
 $result = $stmt->get_result();
 $row = $result->fetch_assoc();
 $phonenum = $row['phonenum'];

 echo  "". $phonenum;

 $commentsquery = "SELECT comments FROM checkout_details WHERE email='$email'";
 $stmt = $conn->prepare($commentsquery);
   $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $comments = $row['comments'];
  echo  "". $comments;
  $stringResult = '';
  $counter = 1;
  foreach ($orderIds as $orderId) {
    $selectQuery = "SELECT clothes_name, color, clothesize, quantity, price, total_price, picture FROM my_cart WHERE orderid = ?";
    $stmt = $conn->prepare($selectQuery);

    if ($stmt) {
        $stmt->bind_param("i", $orderId); // Bind parameter inside the loop

        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $clothes_name = $row["clothes_name"];
            $color = $row["color"];
            $clothesize = $row["clothesize"]; // Corrected variable name
            $quantity = $row["quantity"];
            $price = $row["price"];
            $total_price = $row["total_price"];

            $stringResult .= "Item $counter\n $clothes_name";
            $stringResult .= " Color: $color";
            $stringResult .= " Clothes Size: $clothesize"; // Corrected variable name
            $stringResult .= " Quantity x Price = $quantity x $price = $total_price\n";
            $counter++;
        }
    }
}
$stringResult .= "Delivering to $fullname at Address: $address , PhoneNumber: $phonenum , Comments: $comments\n";
echo nl2br($stringResult);
echo  "". $Rcpttotal_price;
$queryInsert = "INSERT INTO receipts (email, ReceiptText,TotalPrice)
VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $queryInsert);
mysqli_stmt_bind_param($stmt, 'ssi', $email, $stringResult,$Rcpttotal_price);
mysqli_stmt_execute($stmt);

        // Loop through each order ID to remove from the cart
        foreach ($orderIds as $orderId) {
            // Perform a delete query for each order ID
            $deleteQuery = "DELETE FROM my_cart WHERE orderid = $orderId AND email = '$email'";
            $conn->query($deleteQuery);
        }

        
        header("Location: receipts.php?email=$email");
        exit();
    
}

$conn->close();
?>
