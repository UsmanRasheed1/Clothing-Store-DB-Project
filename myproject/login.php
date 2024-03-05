<?php
if (isset($_GET['text'])) {
    $text = $_GET['text'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
         .error-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100px; /* Adjust height based on your design */
    }

    .error {
        color: red;
        text-align: center;
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
            
            &nbsp; &nbsp; &nbsp;
            <a href="register.php" target="_main" class="account"> Create Account</a>
            &nbsp; &nbsp; &nbsp;
        </div>
    </header>
    <!-- ignore this -->
    <!-- <a href="/index.html" target="_main"> <img src="/LOGO.jpg" alt="logo" height="100" /></a> -->
    </header>
    <?php if (!empty($text)) : ?>
    <div class="error">
        <?php echo ($text); ?>
    </div>
<?php endif; ?>
    <h1 class="r-heading">Login</h1>
    <?php
    require_once("db_connection.php");
    // Assuming form is submitted via POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Replace these with your database connection details
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get input values
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        // Check if the email and password match in the database
        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // If login is successful, redirect to homepage.php with the email in GET parameter
            header("Location: homepage.php?email=$email");
            exit();
        } else {
            // If login fails, display an error message and keep the user on login.php
            echo "<p style='color: red;'>Email or password is incorrect.</p>";
        }

        $conn->close();
    }
    ?>
    
    <form class="r-whole" method="post" action="">
        <input type="text" placeholder="email address" class="fname" name="email">
        <br>
        <br>
        <input type="password" placeholder="password" class="password" name="password"> 
        <br>
        <br>
        <button type="submit" class="submit">login</button>
    </form>
</body>
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
</html>