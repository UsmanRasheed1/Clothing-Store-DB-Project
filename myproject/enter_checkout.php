<?php
// Check if the form is submitted

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
   
    }
    
    else{
        header("Location: homepage.php?");
            exit();
    }
    if (isset($_GET['text'])) {
        $text = $_GET['text'];


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<header>
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
        <div class="sec-div product-div">
            
        </div>
    </header>
</header>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        section {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
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
    <title>Checkout Page</title>
</head>
<body>

    <header>
        <h1>Checkout</h1>
    </header>
    
    <?php if (!empty($text)) : ?>
    <div class="error">
        <?php echo ($text); ?>
    </div>
<?php endif; ?>

    <section>
    <form action="check_checkout.php" method="GET">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
            
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{11,13}" placeholder="e.g. +923123456789 or 03123456789" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="comments">Comments:</label>
            <textarea id="comments" name="comments" rows="4"></textarea>

            <button type="submit">Enter Details</button>
        </form>
    </section>
    <script>
        function validateForm() {
            // Reset previous errors
            document.getElementById("nameError").innerHTML = "";
            document.getElementById("emailError").innerHTML = "";

            // Get form values
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;

            // Simple validation - check if name and email are not empty
            if (phone.trim() === "") {
                document.getElementById("phoneError").innerHTML = "Phone Number is required";
            }

            if (email.trim() === "") {
                document.getElementById("addressError").innerHTML = "Address is required";
            }

            // Additional validation logic can be added here

            // If all validations pass, submit the form
            if (name.trim() !== "" && email.trim() !== "") {
                alert("Form submitted successfully!");
                document.getElementById("checkoutForm").submit();
            }
        }
    </script>
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