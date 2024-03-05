<?php
require_once("db_connection.php");
if (isset($_GET['email'])) {
    
    $email = $_GET['email'];
} else {
    header("Location: owner_login.php");
    exit();
}

$queryclothescount = "SELECT count(*) as count from clothes";
$resultclothescount = mysqli_query($conn, $queryclothescount);
$querycolorscount = "SELECT count(*) as count from colors";
$resultcolorscount = mysqli_query($conn, $querycolorscount);
$queryavgprice = "SELECT avg(price) as avg from clothes";
$resultavgprice =  mysqli_query($conn, $queryavgprice);

$queryClothes = "SELECT clothesId, clothes_Name, picture, price FROM clothes order by price desc";
    $resultClothes = mysqli_query($conn, $queryClothes);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .receipt {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .total-price {
            font-weight: bold;
        }

        .delivery-date {
            color: #666;
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
<header >
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
        <div class="sec-div">
            <a href="owner_homepage.php?email=<?php echo $email; ?>" target="_main" class="home"> Home Page</a>
            &nbsp; &nbsp; &nbsp;
            <a href="owner_insert.php?email=<?php echo $email; ?>" target="_main" class="home"> Insert Page</a>
            &nbsp; &nbsp; &nbsp;
            <a href="owner_delete.php?email=<?php echo $email; ?>" target="_main" class="home"> Delete Page</a>
            &nbsp; &nbsp; &nbsp;
            
        </div>
    </header>
    <div class="container">
        <h1> Displaying Clothing Details </h1>
    <?php
    $sql = "SELECT count(*) as count from clothes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc(); // Fetch the result
    echo '<div class="receipt">';
    echo "Total Clothings (Not Including Colors) are " . $row['count'] . "<br>";
    echo '</div>';
    $sql = "SELECT count(*) as count from colors";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc(); // Fetch the result
    echo '<div class="receipt">';
    echo "Total Clothings (Including Colors) are " . $row['count'] . "<br>";
    echo '</div>';
    $sql = "SELECT round(avg(price),0) as avg from clothes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc(); // Fetch the result
    echo '<div class="receipt">';
    echo "Average Clothing Price is " . $row['avg'] . "<br>";
    echo '</div>';
    $sql = "SELECT clothes_name, price from clothes where price = (Select max(price) from clothes)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc(); // Fetch the result
    echo '<div class="receipt">';
    echo "Most Expensive clothing is " . $row['clothes_name'] ." With Price ".$row['price']. "<br>";
    echo '</div>';
    $sql = "SELECT clothes_name, price from clothes where price = (Select min(price) from clothes)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc(); // Fetch the result
    echo '<div class="receipt">';
    echo "Cheapest clothing is " . $row['clothes_name'] ." With Price ".$row['price']. "<br>";
    echo '</div>';
    
         
    ?>
</div>
    <div class="container">
        <h1> Displaying Clothing by Price in Descending Order </h1>
    <?php
    
    if ($resultClothes && mysqli_num_rows($resultClothes) > 0) {
        while ($rowClothes = mysqli_fetch_assoc($resultClothes)) {
    ?>
    
            <div class="item">
               
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
