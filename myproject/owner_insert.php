<?php
//$email=true;
$email = $_GET['email'];
/*if (isset($_GET['email'])) {
    
    $email = $_GET['email'];
} else {
    header("Location: owner_insert.php?email=$email");
    exit();
}*/
$text = isset($_GET['text']) ? $_GET['text'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Clothes</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 20px;
    }
    .container {
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
    input[type="number"],
    select {
      width: calc(100% - 10px);
      padding: 8px;
      margin-bottom: 15px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    select {
      width: 100%;
    }
    button {
      padding: 10px 20px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background-color: #45a049;
    }
    .error {
        color: red;
        text-align: center;
    }
    </style>
  <script>
    function addColor() {
      const colorsDiv = document.getElementById('colorsDiv');
      const colorInput = document.createElement('input');
      colorInput.type = 'text';
      colorInput.name = 'colors[]';
      colorInput.placeholder = 'Enter Color';
      colorsDiv.appendChild(colorInput);

      const imagePathInput = document.createElement('input');
      imagePathInput.type = 'text';
      imagePathInput.name = 'colorPaths[]';
      imagePathInput.placeholder = 'Enter Image Path';
      colorsDiv.appendChild(imagePathInput);
      colorsDiv.appendChild(document.createElement('br'));
    }
  </script>
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
            <a href="owner_homepage.php?email=<?php echo $email; ?>" target="_main" class="home"> HomePage</a>
            &nbsp; &nbsp; &nbsp;
            <a href="owner_delete.php?email=<?php echo $email; ?>" target="_main" class="home"> Remove Clothes</a>
            &nbsp; &nbsp; &nbsp;
        </div>
<div class="container">

  <h1>Add Clothes</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?email=' . urlencode($email); ?>" method="post" enctype="multipart/form-data">
    <label for="clothesId">Clothes ID:</label>
    <input type="number" id="clothesId" name="clothesId" required><br><br>

    <label for="clothesName">Clothes Name:</label>
    <input type="text" id="clothesName" name="clothesName" required><br><br>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" required><br><br>

    <label for="category">Category:</label>
    <select id="category" name="category" required>
      <option value="Men">Men</option>
      <option value="Women">Women</option>
      <option value="Winter">Winter</option>
      <option value="Kids">Kids</option>
    </select><br><br>

    <!-- Colors and Image Paths -->
    <div id="colorsDiv">
      <label>Color:</label>
      <input type="text" name="colors[]" placeholder="Enter Color">
      <label>Image Path:</label>
      <input type="text" name="colorPaths[]" placeholder="Enter Image Path">
      <br>
    </div>

    <button type="button" onclick="addColor()">Add Another Color</button>

    <button type="submit" value="Submit">Submit </button>
  </form>
</div>

  <?php
  require_once("db_connection.php");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect all form data
    $clothesId = $_POST['clothesId'];
    $clothesName = $_POST['clothesName'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $colors = $_POST['colors'];
    $colorPaths = $_POST['colorPaths'];

    if (is_array($colors) && is_array($colorPaths) && count($colors) === count($colorPaths)) {
      // Establish your database connection here
      
      // Insert clothes information into the clothes table
      // Assuming other form fields like $clothesName, $price, $category are collected properly

      // Insert clothes data into the clothes table
      $insertClothesQuery = "INSERT INTO clothes (clothesid, clothes_name, category, price, picture) VALUES (?, ?, ?, ?, ?)";
      $stmt = mysqli_prepare($conn, $insertClothesQuery);
      mysqli_stmt_bind_param($stmt, "issis", $clothesId, $clothesName, $category, $price, $colorPaths[0]);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

      // Insert color information into the colors table
      $countColors = count($colors);
      for ($i = 0; $i < $countColors; $i++) {
        $insertColorQuery = "INSERT INTO colors (clothesid, color, picture) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertColorQuery);
        mysqli_stmt_bind_param($stmt, "iss", $clothesId, $colors[$i], $colorPaths[$i]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
      }
      mysqli_close($conn);
      exit();
    } else {
      
    }
  }
  if ($text !== null) {
    echo "<div class='error'>";
    echo "<p>$text</p>";
    echo "</div>";
  }
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
