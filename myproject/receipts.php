<?php
 $email = $_GET['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipts</title>
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
        <a href="receipts.php?email=<?php echo $email; ?>" target="_main" class="account"> Receipts</a>
       
    </div>
    </header>
    <div class="container">
        <h1>Your Receipts</h1>
        <?php
        require_once("db_connection.php");

        // Get the email parameter through GET
           

            // Prepare and execute your SQL query
            $sql = "SELECT receipttext, totalprice, DATE_FORMAT(deliverydate, '%d-%M-%Y') AS deliverydate FROM receipts WHERE email = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();

            // Display the results
            while ($row = $result->fetch_assoc()) {
                echo '<div class="receipt">';
                echo nl2br($row['receipttext']) . "<br>" ."Total Price: ". $row['totalprice'] . "<br>Delivery Date: " . $row['deliverydate'] . "<br>";

                echo '</div>';
            }

            $stmt->close();
        

        $conn->close();
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
