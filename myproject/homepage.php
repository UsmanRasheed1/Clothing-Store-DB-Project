<?php

//$email='usmanrasheed2002@gmail.com';
if (isset($_GET['email'])) {
    
    $email = $_GET['email'];
} else {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOTHING STORE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    

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
        <div class="h_sec_div">
    <a class="h_home" href="homepage.php" target="_blank">home</a>
    <a class="h_register" href="register.php" target="_blank">register</a>
    <a class="h_login" href="login.php" target="_blank">login</a>
    <a href="proceed_to_cart.php?email=<?php echo $email; ?>" target="_blank">cart</a>
    <a href="enter_checkout.php?email=<?php echo $email; ?>" target="_blank">Update Checkout Details</a>
    <a href="receipts.php?email=<?php echo $email; ?>" target="_blank">View Your Receipts</a>
    <div>
    <form action="search_results.php" method="GET">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input class="h_search" type="text" name="searchitem" placeholder="Search By Name">
        <button type="submit" class="h_s_button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
</div>
            
    </header>
    <div>
        <p>
            <<a href="winter.php?email=<?php echo $email; ?>" target="_blank">
            <img src="winter.webp">
            </a>
        </p>
    </div>
    <div>
        <p>
        <a href="kids.php?email=<?php echo $email; ?>" target="_blank">
            <img src="kids.webp">
            </a>
        </p>
    </div>
    <div class="mw">
        <div class="m" >
        <a href="men.php?email=<?php echo $email; ?>" target="_blank">
                <h2 class="mname">men</h2>
                <img src="men.webp" 
	        style="object-fit:cover; 
     		    object-position: right;
                width:500px;
                height:500px;
                border: solid 1px #CCC"/>
            </a>
        </div>
        <div class="m" >
        <a href="women.php?email=<?php echo $email; ?>" target="_blank">
                <h2 class="wname">women</h2>
                <img src="women.jpg" 
	        style="object-fit:cover; 
     		    object-position: right;
                width:500px;
                height:500px;
                border: solid 1px #CCC"/>
            </a>
        </div>
    </div>
    
    
</body>
<br><br>

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