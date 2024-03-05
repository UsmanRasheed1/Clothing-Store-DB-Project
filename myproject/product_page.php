<?php
                require_once("db_connection.php");
                $email = $_GET['email'];
                $clothesId = $_GET['clothesId'];

                //Code to check if User has added checkout Details
                $query = "SELECT * FROM checkout_details WHERE email = '$email'";
                $result = mysqli_query($conn, $query);
                $rowCount = mysqli_num_rows($result);

            if ($rowCount == 0) {
            header("Location: proceed_to_cart.php?email=$email");
           exit();
            } 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.content {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: 20px auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}


.right-content {
    width: 40%;
    padding-left: 20px;
}

.item {
    margin-bottom: 20px;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
}

.left-content {
    width: 70%; /* Adjust the width to occupy more space */
    padding-right: 20px;
}

.colors-container {
    display: flex;
    flex-wrap: wrap;
    width: 100%; /* Make the container occupy the entire width */
    margin-top: 20px; /* Add some top margin for better spacing */
}

.colors-container .item {
    width: 200px;
    margin-right: 10px;
}

.colors-container img {
    width: 100%;
    height: auto;
    border-radius: 3px;
    border: 1px solid #ddd;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.input-container {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}


    </style>
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
        <a href="proceed_to_cart.php?email=<?php echo $email; ?>" target="_main" class="account"> Cart</a>
        &nbsp; &nbsp; &nbsp;
        <a href="receipts.php?email=<?php echo $email; ?>" target="_main" class="account"> Receipts</a>
        &nbsp; &nbsp; &nbsp;

    </div>
    </header>

    <div class="content">
        <div class="left-content">
            <div class="clothes-details">
                
                <?php
                $clothesquery = "SELECT clothes_name, price FROM clothes WHERE clothesid = ?";
                $stmt = $conn->prepare($clothesquery);
                $stmt->bind_param('i', $clothesId);
                $stmt->execute();
                $clothesresult = $stmt->get_result();
                
                if ($clothesrow = $clothesresult->fetch_assoc()) {
                    echo '<div class="item" style="width: 100%;">'; // Adding item class for the product container
                    $clothesName = ($clothesrow['clothes_name']);
                    $clothesPrice = ($clothesrow['price']);
                    echo '<h2>' . $clothesName . '</h2>';
                    echo '<p>Price: $' . $clothesPrice . '</p>';
                    echo '</div>';
                } else {
                    echo 'No clothes found.';
                }
                ?>
            </div>
            <div class="colors-container">
                <?php
                $colorsquery = "SELECT color, picture FROM colors WHERE clothesid = ?";
                $stmt = $conn->prepare($colorsquery);
                $stmt->bind_param('i', $clothesId);
                $stmt->execute();
                $colorsresult = $stmt->get_result();
                
                while ($colorsrow = $colorsresult->fetch_assoc()) {
                    echo '<div class="item">'; // Adding item class for the color container
                    echo '<p>Color: ' . htmlspecialchars($colorsrow['color']) . '</p>';
                    echo '<img src="' . htmlspecialchars($colorsrow['picture']) . '" alt="' . htmlspecialchars($colorsrow['color']) . '">';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="right-content">
            <form action="add_to_cart.php" method="get">
                <div class="input-container">
                    <label for="size">Select Size:</label>
                    <select id="size" name="size">
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                <div class="input-container">
                    <label for="color">Select Color:</label>
                    <select id="color" name="color">
                        <!-- Fetch and display colors dynamically using PHP -->
                        <?php
                        $color_query = "SELECT color FROM colors WHERE clothesid = ?";
                        $stmt = $conn->prepare($color_query);
                        $stmt->bind_param('i', $clothesId);
                        $stmt->execute();
                        $color_result = $stmt->get_result();

                        while ($color_row = $color_result->fetch_assoc()) {
                            echo '<option value="' . htmlspecialchars($color_row['color']) . '">' . htmlspecialchars($color_row['color']) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="input-container">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="100" value="1">
                </div>
                <div class="input-container">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="clothesId" value="<?php echo $clothesId; ?>">
                <input type="hidden" name="clothesName" value="<?php echo $clothesName; ?>">
                <input type="hidden" name="clothesPrice" value="<?php echo $clothesPrice; ?>">
                    <input type="submit" value="Add to Cart">
                </div>
            </form>
        </div>
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
