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

        // Loop through each order ID to remove from the cart
        foreach ($orderIds as $orderId) {
            // Perform a delete query for each order ID
            $deleteQuery = "DELETE FROM my_cart WHERE orderid = $orderId AND email = '$email'";
            $conn->query($deleteQuery);
        }

        // Redirect back to my_cart page after removing items
        header("Location: my_cart.php?email=$email");
        exit();
    } else {
        // Handle the case when no items are selected
        echo "No items selected to remove.";
    }
}

$conn->close();
?>
