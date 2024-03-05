<?php
require_once("db_connection.php");

// Check if all necessary GET parameters are set
if (
    isset($_GET['email'], $_GET['clothesId'], $_GET['clothesName'], $_GET['quantity'], $_GET['size'], $_GET['color'], $_GET['clothesPrice'])
) {
    // Retrieve GET parameters
    $email = $_GET['email'];
    $clothesId = $_GET['clothesId'];
    $clothesName = $_GET['clothesName'];
    $quantity = intval($_GET['quantity']);
    $size = $_GET['size'];
    $color = $_GET['color'];
    $clothesPrice = intval($_GET['clothesPrice']);

    // Retrieve picture based on clothesId and color
    $queryselect = "SELECT picture FROM colors WHERE clothesid = ? AND color = ?";
    $stmtSelect = mysqli_prepare($conn, $queryselect);

    mysqli_stmt_bind_param($stmtSelect, 'is', $clothesId, $color);
    mysqli_stmt_execute($stmtSelect);
    mysqli_stmt_bind_result($stmtSelect, $picture);
    mysqli_stmt_fetch($stmtSelect);
    mysqli_stmt_close($stmtSelect);

    // Insert data into my_cart table
    $queryInsert = "INSERT INTO my_cart (email, clothesid, color, clothes_name, clothesize, quantity, price, Picture)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $queryInsert);
    mysqli_stmt_bind_param($stmt, 'sisssiis', $email, $clothesId, $color, $clothesName, $size, $quantity, $clothesPrice, $picture);

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
    // Handle if some GET parameters are missing
    echo "Incomplete data!";
}

mysqli_close($conn);
?>
