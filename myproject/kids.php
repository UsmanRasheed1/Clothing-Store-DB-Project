<?php
require_once("db_connection.php");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $query = "SELECT first_name, last_name FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Fetching user's full name
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];
        $fullName = $firstName . " " . $lastName;
    } else {
        $fullName = "User Not Found";
    }

    // Fetching clothing items with prices for display
    $queryClothes = "SELECT clothesId, clothes_Name, picture, price FROM clothes WHERE category='kids'";
    $resultClothes = mysqli_query($conn, $queryClothes);
} else {
    // Redirect to the previous page or handle missing userId
    header("Location: previous_page.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Display Kids Clothing Items</title>
    <style>
        .item {
            display: inline-block;
            margin: 10px;
            text-align: center;
        }
        .item img {
            width: 200px;
            height: auto;
        }
        .item a {
            text-decoration: none;
            color: #333;
            display: block;
        }
        /* CSS Styles for Display Winter's Clothing Items page */

body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1 {
    text-align: center;
}

h2 {
    text-align: center;
}

.item {
    display: inline-block;
    margin: 10px;
    text-align: center;
    width: 220px; /* Width of each item block */
    border: 1px solid #ccc; /* Border for each item block */
    padding: 10px;
    border-radius: 8px;
    background-color: #f9f9f9; /* Background color for each item block */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow effect */
}

.item img {
    width: 150px; /* Width of the images */
    height: auto; /* Maintain aspect ratio */
    display: block;
    margin: 0 auto 10px; /* Center the images within the block */
}

.item a {
    text-decoration: none;
    color: #333;
    display: block;
}

.item h3 {
    font-size: 18px;
    margin: 5px 0;
}

.item p {
    font-size: 16px;
    margin: 5px 0;
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
        <a href="winter.php?email=<?php echo $email; ?>" target="_main" class="account"> Winter</a>
        &nbsp; &nbsp; &nbsp;
        <a href="proceed_to_cart.php?email=<?php echo $email; ?>" target="_main" class="account"> Cart</a>
        &nbsp; &nbsp; &nbsp;
        <a href="receipts.php?email=<?php echo $email; ?>" target="_main" class="account"> Receipts</a>
        &nbsp; &nbsp; &nbsp;
    </div> 
    <?php
    // Display the user's full name at the top of the page
    echo "<h1>Welcome, $fullName!</h1>";
    ?>
    <h2> Kids Catalogue </h2>  
    <?php
    if ($resultClothes && mysqli_num_rows($resultClothes) > 0) {
        while ($rowClothes = mysqli_fetch_assoc($resultClothes)) {
    ?>
            <div class="item">
                <a href="product_page.php?email=<?php echo $email; ?>&clothesId=<?php echo $rowClothes['clothesId']; ?>">
                    <img src="<?php echo $rowClothes['picture']; ?>" alt="<?php echo $rowClothes['clothes_Name']; ?>">
                    <h3><?php echo $rowClothes['clothes_Name']; ?></h3>
                    <p>Price: $<?php echo $rowClothes['price']; ?></p>
                    <p>Available in Colors: </p>
                    <?php
                    // Additional query based on clothesId
                    $colorquery = "SELECT color FROM colors WHERE clothesId = {$rowClothes['clothesId']}";
                    $colorresult = mysqli_query($conn, $colorquery);

                    // Check if the query was successful and display additional information
                    if ($colorresult && mysqli_num_rows($colorresult) > 0) {
                        while ($color = mysqli_fetch_assoc($colorresult)) {
                            echo $color['color'] . " ";
                        }
                    } else {
                        echo "Not specified";
                    }
                    ?>
                </a>
            </div>
    <?php
        }
    } else {
        echo "No items found.";
    }
    
    mysqli_close($conn);
    ?>
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
