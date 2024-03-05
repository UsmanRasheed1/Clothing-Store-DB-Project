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
    <title>Registration</title>
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
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once("db_connection.php");

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check_query = "SELECT * FROM user WHERE email = ?";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            $text = "Email already exists. Please use a different email.";
                header("Location: register.php?text=$text");
                exit();
        } else {
            $email = strtolower($email);
            $insert_query = "INSERT INTO user (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param("ssss", $fname, $lname, $email, $password);

            if ($insert_stmt->execute()) {
                $text =  "Registration successful!";
                header("Location: login.php?text=$text");
                exit();
            }
        }

        $check_stmt->close();
        $insert_stmt->close();
        $conn->close();
    }
    ?>
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
        <div class="sec-div">
            <a href="login.php" target="_main" class="account"> Login</a>
        </div>
    </header>

    <?php if (!empty($text)) : ?>
    <div class="error">
        <?php echo ($text); ?>
    </div>
<?php endif; ?>
    <div class="container">
        <div class="header">
            <h2>Create Account</h2>
        </div>
        <form id="form" class="form" action="register.php" method="POST" onsubmit="return validateForm()">
            <div class="form-control">
                <label for="first_name">First Name</label>
                <input type="text" placeholder="First name" id="first_name" name="fname"/>
                <!-- Add icons and error messages if needed -->
            </div>
            <div class="form-control">
                <label for="last_name">Last Name</label>
                <input type="text" placeholder="Last name" id="last_name" name="lname" />
                <!-- Add icons and error messages if needed -->
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" placeholder="abc@gmail.com" id="email" name="email"/>
                <!-- Add icons and error messages if needed -->
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password" name="password"/>
                <!-- Add icons and error messages if needed -->
            </div>
            <div class="form-control">
                <label for="password2">Confirm Password</label>
                <input type="password" placeholder="Re-enter Password" id="password2"/>
                <!-- Add icons and error messages if needed -->
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <footer>
        <div class="info">
            <!-- Footer information -->
        </div>
    </footer>
    <script>
function validateForm() {
            const first_name = document.getElementById('first_name').value.trim();
            const last_name = document.getElementById('last_name').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const password2 = document.getElementById('password2').value.trim();

            if (first_name === '' || last_name === '' || email === '' || password === '' || password2 === '') {
                alert('Please fill in all fields');
                return false;
            }

            if (!isEmail(email)) {
                alert('Please enter a valid email address');
                return false;
            }

            if (password !== password2) {
                alert('Passwords do not match');
                return false;
            }

            return true;
        }

        function isEmail(email) {
            return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
        }    
    </script>
   
</body>
</html>
