<?php
require_once("db_connection.php");

// Function to safely get email
function getemail() {
    // Replace this with your method of obtaining user_id securely
    return isset($_GET['email']) ? $_GET['email'] : null;
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get email
$email = getemail();

if (!$email) {
    // Handle the case when email is not available or invalid
    die("Invalid Email!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['remove_from_cart'])) {
        if (!empty($_POST['selected_items'])) {
            // Prepare selected items
            $selectedItems = implode(',', $_POST['selected_items']);

            // Redirect to remove.php along with selected items and user ID for processing
            header("Location: remove.php?selectedItems=$selectedItems&email=$email");
            exit();
        } else {
            // Handle the case when no items are selected
            echo "Please select items to remove.";
        }
    }
}

$query = "SELECT orderid, clothes_name, color, clothesize, quantity, total_price, picture FROM my_cart WHERE email = '$email'";
$query2 = "select phonenum from checkout_details where email = '$email'";
$query3 = "select address from checkout_details where email = '$email'";
$query4 = "select comments from checkout_details where email = '$email'";

$result = $conn->query($query);
$result2 = $conn->query($query2);
$result3 = $conn->query($query3);
$result4 = $conn->query($query4);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="style.css">
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f3f3f3; /* Background color for the entire page */
    color: #333; /* Default text color */
}

h1, h2 {
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold; /* Make headings bold */
}

/* Styles for individual items displayed */

.item {
    display: inline-block;
    margin: 10px;
    text-align: center;
    width: 220px; /* Width of each item block */
    border: 1px solid #ccc; /* Border for each item block */
    padding: 10px;
    border-radius: 8px;
    background-color: #fff; /* Background color for each item block */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow effect */
}

.item img {
    width: 150px; /* Width of the images */
    height: auto; /* Maintain aspect ratio */
    display: block;
    margin: 0 auto 10px; /* Center the images within the block */
    border-radius: 6px;
}

.item a {
    text-decoration: none;
    color: #333;
    display: block;
}

.item h3 {
    font-size: 18px;
    margin: 5px 0;
    font-weight: bold; /* Make item names bold */
}

.item p {
    font-size: 16px;
    margin: 5px 0;
}

/* Styles for buttons */

.buttons-container {
    text-align: center;
    margin-top: 20px; /* Space from the above content */
}

.buttons-container button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin: 10px;
    font-weight: bold; /* Make buttons' text bold */
}

/* Styles for the form */

.form-container {
    margin-top: 20px; /* Space from the above content */
    text-align: center;
}

.form-container form {
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border: 1px solid #ccc; /* Border for form */
}

.form-container form input[type="text"] {
    width: 70%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.form-container form input[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    font-weight: bold; /* Make submit button text bold */
}
.button {
            /* Add your button styles here */
            /* Example styles */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #333;
            display: inline-block;
        }
        /* Additional styles can be added */
    </style>
    <!-- Add any necessary styles or scripts here -->
    <script>
        function removeFromCart() {
            var selectedItems = document.querySelectorAll('input[name="selected_items[]"]:checked');
            if (selectedItems.length > 0) {
                var selectedIds = [];
                selectedItems.forEach(function(item) {
                    selectedIds.push(item.value);
                });
                var email = "<?php echo $email; ?>";
                var selectedItemsStr = selectedIds.join(',');
                window.location.href = "remove.php?selectedItems=" + selectedItemsStr + "&email=" + email;
            } else {
                alert("Please select items to remove.");
            }
        }
        function proceedToCheckout() {
            var selectedItems = document.querySelectorAll('input[name="selected_items[]"]:checked');
            if (selectedItems.length > 0) {
                var selectedIds = [];
                selectedItems.forEach(function(item) {
                    selectedIds.push(item.value);
                });
                var email = "<?php echo $email; ?>";
                var selectedItemsStr = selectedIds.join(',');
                window.location.href = "proceed_to_checkout.php?selectedItems=" + selectedItemsStr + "&email=" + email;
            } else {
                alert("Please select items to proceed to checkout.");
            }
        }
    </script>
</head>
<body>
<header>
        <div class="navbar">
            <div class="nav-logo border">
                <div class="logo"></div>
            </div>
            <div class="nav-text">
                <h1 id="head">Clothing Store</h1>
            </div>
            <div class="nav-address border">
                <p class="add-first">Deliver to</p>
                <div class="add-icon">
                    <i class="fa-solid fa-location-dot"></i>
                    <p class="add-sec">Pakistan</p>
                </div>
            </div>
        </div>
        <div class="sec-div product-div">
        <a href="homepage.php?email=<?php echo $email; ?>" target="_main" class="home"> Home</a>
        &nbsp; &nbsp; &nbsp;
        <a href="men.php?email=<?php echo $email; ?>" target="_main" class="account"> Men</a>
        &nbsp; &nbsp; &nbsp;
        <a href="women.php?email=<?php echo $email; ?>" target="_main" class="account"> Women</a>
        &nbsp; &nbsp; &nbsp;
        <a href="kids.php?email=<?php echo $email; ?>" target="_main" class="account"> Kids</a>
        &nbsp; &nbsp; &nbsp;
        <a href="winter.php?email=<?php echo $email; ?>" target="_main" class="account"> Winter</a>
        &nbsp; &nbsp; &nbsp;
        <a href="receipts.php?email=<?php echo $email; ?>" target="_main" class="account"> Receipts</a>
       
    </div>
    </header>

<div style="text-align: center; margin-bottom: 20px;">
    <div style="border: 1px solid #ccc; padding: 10px; border-radius: 8px; background-color: #fff; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <p style="font-weight: bold;">Displaying your checkout details. Press the button below to update them:</p>
        <?php
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                echo "<p style='font-weight: bold;'>Phone Number: " . $row["phonenum"] . "</p>";
            }
        }

        if ($result3->num_rows > 0) {
            while ($row = $result3->fetch_assoc()) {
                echo "<p style='font-weight: bold;'>Address: " . $row["address"] . "</p>";
            }
        }

        if ($result4->num_rows > 0) {
            while ($row = $result4->fetch_assoc()) {
                echo "<p style='font-weight: bold;'>Comments: " . $row["comments"] . "</p>";
            }
        }
        ?>
        <a href="enter_checkout.php?email=<?php echo $email; ?>" class="button">Update checkout details</a>
    </div>
</div>

<div class="form-container">
    <form>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orderid = $row["orderid"];
                $clothes_name = $row["clothes_name"];
                $color = $row["color"];
                $clothesize = $row["clothesize"];
                $quantity = $row["quantity"];
                $total_price = $row["total_price"];
                $picture = $row["picture"];
                ?>
                <div class="item">
                    <!-- Set a fixed size for the images -->
                    <img src='<?php echo $picture; ?>' alt='<?php echo $clothes_name; ?>' style='width: 150px; height: 150px; object-fit: cover;'>
                    <p>Clothes Name: <?php echo $clothes_name; ?></p>
                    <p>Color: <?php echo $color; ?></p>
                    <p>Size: <?php echo $clothesize; ?></p>
                    <p>Quantity: <?php echo $quantity; ?></p>
                    <p>Total Price: <?php echo $total_price; ?></p>
                    <input type="checkbox" name="selected_items[]" value="<?php echo $orderid; ?>"> Select
                </div>
                <?php
            }
            ?>
            <div class="buttons-container">
                <input type="button" name="remove_from_cart" value="Remove from Cart" onclick="removeFromCart()" class="button">
                <input type="button" name="proceed_to_checkout" value="Proceed to Checkout" onclick="proceedToCheckout()" class="button">
            </div>
            <?php
        } else {
            echo "<p>No items in the cart.</p>";
        }
        ?>
    </form>
</div>
<footer>
    <div class="info">
        <div class="info-logo">
        </div>
        <div class="queries">
            <p>Send Queries at K214924@nu.edu.pk and K213225@nu.edu.pk</p>
            <br>
            <i class="fa-solid fa-phone"></i><p class="contact">Contact +92-111-567-567</p>
            
        </div>
        <div class="tag">
            <h2>Design For Fit, Loved To Style!</h2>
        </div>
        <div class="copyright">
            <p class="copy">&copy; 2023 All rights reserved</p>
        </div>
    </div>
    </footer>

</body>
</html>
