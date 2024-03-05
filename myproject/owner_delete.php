<?php
require_once("db_connection.php");
$email = isset($_GET['email']) ? $_GET['email'] : '';
if ( isset($_GET['clothesid'])) {
    
    $clothesid = mysqli_real_escape_string($conn, $_GET['clothesid']);

    // Check if the clothesid exists
    $check_query = "SELECT * FROM clothes WHERE clothesid = '$clothesid'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // If clothesid exists, delete it
        $delete_query = "DELETE FROM clothes WHERE clothesid = '$clothesid'";
        $delete_result = mysqli_query($conn, $delete_query);

        if ($delete_result) {
            $message = "Clothes Deleted";
        } else {
            $message = "Error deleting clothes";
        }
    } else {
        // If clothesid doesn't exist, show a message
        $message = "ClothesID doesn't exist";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Clothes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 10px);
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
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
            <a href="owner_homepage.php?email=<?php echo $email; ?>" target="_main" class="home"> Home Page</a>
            &nbsp; &nbsp; &nbsp;
            <a href="owner_insert.php?email=<?php echo $email; ?>" target="_main" class="home"> Insert Clothes</a>
            &nbsp; &nbsp; &nbsp;
        </div>
<form method="GET" action="">
        <label for="clothesid">Enter Clothes ID:</label>
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="text" id="clothesid" name="clothesid">
        <input type="submit" value="Delete">
    </form>

    <?php if (isset($message)) { ?>
        <p><?php echo $message; ?></p>
    <?php } ?>
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
