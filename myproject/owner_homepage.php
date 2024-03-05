<?php
if (isset($_GET['email'])) {
    
    $email = $_GET['email'];
} else {
    header("Location: owner_login.php");
    exit();
}
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
            <a href="owner_clothespage.php?email=<?php echo $email; ?>" target="_main" class="home"> Clothes Page</a>
            &nbsp; &nbsp; &nbsp;
            <a href="owner_insert.php?email=<?php echo $email; ?>" target="_main" class="home"> Insert Clothes</a>
            &nbsp; &nbsp; &nbsp;
            <a href="owner_delete.php?email=<?php echo $email; ?>" target="_main" class="home"> Remove Clothes</a>
            &nbsp; &nbsp; &nbsp;
        </div>
    </header>
    <div class="container">
        <h1>Customer Delivery Details</h1>
        <?php
        require_once("db_connection.php");
        // Get the email parameter through GET
        
            // Prepare and execute your SQL query
            $sql = "SELECT `Full Name` ,totalprice, DATE_FORMAT(deliverydate, '%d-%M-%Y') AS deliverydate FROM customer_receipts ";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->get_result();

            // Display the results
            while ($row = $result->fetch_assoc()) {
                echo '<div class="receipt">';
                echo "Customer Name: ".$row['Full Name'] . "<br>" ."Total Price: ". $row['totalprice'] . "<br>Delivery Date: " . $row['deliverydate'] . "<br>";

                echo '</div>';
            }
            $sql = "SELECT SUM(totalprice) AS Sum FROM customer_receipts";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc(); // Fetch the result
            echo '<div class="receipt">';
            echo "Total Revenue is: " . $row['Sum'] . "<br>";
            echo '</div>';
            $sql = "SELECT round(Avg(totalprice),0) AS Average FROM customer_receipts";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc(); // Fetch the result
            echo '<div class="receipt">';
            echo "Average Receipt Price is " . $row['Average'] . "<br>";
            echo '</div>';
            
            $sql = "SELECT count(*) AS Count FROM customer_receipts";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc(); // Fetch the result
            echo '<div class="receipt">';
            echo "Total Records are " . $row['Count'] . "<br>";
            echo '</div>';

        ?>
    </div>
    <div class="container">
        <h1>Highest Spending Customer(s) </h1>
        <?php
            $sql = "SELECT `Full Name` ,receipttext,totalprice, DATE_FORMAT(deliverydate, '%d-%M-%Y') AS deliverydate FROM customer_receipts where totalprice = (select max(totalprice) from customer_receipts)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            // Display the results
            while ($row = $result->fetch_assoc()) {
                echo '<div class="receipt">';
                echo "Customer Name: ".$row['Full Name'] . "<br>" ."Receipt: <br>".nl2br($row['receipttext']) ."Total Spending: ". $row['totalprice'] . "<br>Delivery Date: " . $row['deliverydate'] . "<br>";

                echo '</div>';
            }

        ?>
    </div>
    <div class="container">
        <h1>Highest Total Spending Customer(s) </h1>
        <?php
            $sql = "SELECT `Full Name`, SUM(totalprice) AS total_sum FROM `customer_receipts` GROUP BY `Full Name` HAVING total_sum = (
                SELECT MAX(sum_amount) FROM (
                 SELECT SUM(totalprice) AS sum_amount FROM `customer_receipts` GROUP BY `Full Name`) AS sums)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            // Display the results
            while ($row = $result->fetch_assoc()) {
                echo '<div class="receipt">';
                echo "Customer Name: ".$row['Full Name'] . "<br>" ."Highest Total Spending: ". $row['total_sum'] . "<br>";

                echo '</div>';
            }

        ?>
    </div>
    <div class="container">
        <h1>Most Frequent Customer(s) </h1>
        <?php
            $sql = "SELECT `full name`, COUNT(`full name`) AS `Frequency` FROM `customer_receipts` GROUP BY `full name` HAVING COUNT(`full name`) = (
                SELECT MAX(name_count) FROM (SELECT COUNT(`full name`) AS name_count FROM `customer_receipts` GROUP BY `full name`) AS counts
                )";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            // Display the results
            while ($row = $result->fetch_assoc()) {
                echo '<div class="receipt">';
                echo "Customer Name: ".$row['Full Name'] . "<br>" ."Frequency: ". $row['Frequency'] . "<br>";

                echo '</div>';
            }

        ?>
    </div>
    <div class="container">
    <h1>Orders yet to be delivered </h1>
        <?php
            $sql = "select receipttext,totalprice,DATE_FORMAT(deliverydate, '%d-%M-%Y') AS deliverydate from `customer_receipts` where deliverydate > now();";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            // Display the results
            while ($row = $result->fetch_assoc()) {
                echo '<div class="receipt">';
                echo nl2br($row['receipttext']) . "<br>" ."Total Price: ". $row['totalprice'] . "<br>Delivery Date: " . $row['deliverydate'] . "<br>";

                echo '</div>';
            }

        ?>
    </div>
    </div>
    <div class="container">
    <h1>Orders Succesfully delivered </h1>
        <?php
            $sql = "select receipttext,totalprice,DATE_FORMAT(deliverydate, '%d-%M-%Y') AS deliverydate from `customer_receipts` where deliverydate <= now();";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            // Display the results
            while ($row = $result->fetch_assoc()) {
                echo '<div class="receipt">';
                echo nl2br($row['receipttext']) . "<br>" ."Total Price: ". $row['totalprice'] . "<br>Delivery Date: " . $row['deliverydate'] . "<br>";
                echo '</div>';
            }

        ?>
    </div>
    </div>
    <div class="container">
    <h1>Customer Details </h1>
        <?php
            $sql = "select * from `user-view`;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            // Display the results
            while ($row = $result->fetch_assoc()) {
                echo '<div class="receipt">';
                echo "Customer Email: ".$row['email']." Customer Name: ".$row['Full Name'] . " Customer Address: ". $row['address'] . " Customer PhoneNumber: " . $row['phonenum'] . "<br>";
                echo '</div>';
            }

        ?>
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
