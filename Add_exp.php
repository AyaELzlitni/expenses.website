<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_NUMBER_INT);
  $payment = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_NUMBER_INT);
  $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
  $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);


  if ($category && $payment && $price && $date && $comment) {

    $conn = new mysqli('localhost', 'root', '', 'expenses website');
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    session_start();
    $id = $_SESSION['id'];

    $query = "INSERT INTO expenses (id_category, id, price, Date, payment, comment) 
              VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iissss', $category, $id, $price, $date, $payment, $comment);
    if ($stmt->execute()) {
      header('Location: exp.php'); exit();
    } else {
      echo "Error while adding expense: " . $conn->error;
    }
    $stmt->close();

    $conn->close();
  } else {
    echo "Invalid input";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="addexp.css">

  <title>Add Expense</title>
</head>
<body>
  <h1>Add Expense</h1>
  <form method="post">
  <hr>
    <nav id="navbar">

    <img id="logo" src="images/logo.png" >

             <h1 class ="logo">Expenses Tracking</h1>

            <ul class="navcontent">
              <li><a href ="http://localhost/aa33a/homepage.php">HomePage</a></li>
              <li><a href="http://localhost/aa33a/siginup.php">Sign UP</a></li>
              <li><a href="http://localhost/aa33a/login.php ">login</a></li>
       
            </ul>
       </nav>
    <label>Category:</label>
    <select name="category">
      <?php
  
        $conn = new mysqli('localhost', 'root', '', 'expenses website');
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        session_start();
        $id = $_SESSION['id'];

    
        $query = "SELECT id_category, name_category FROM category WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

      
        while ($row = $result->fetch_assoc()) {
          echo "<option value=\"" . $row['id_category'] . "\">" . $row['name_category'] . "</option>";
        }

        $stmt->close();
        $conn->close();
      ?>
    </select><br>

    <label>Payment:</label>
    <select name="payment">
      <option value="1">Check</option>
      <option value="2">Card</option>
      <option value="3">Cash</option>
    </select><br>

    <label>Price:</label>
    <input type="number" name="price"><br>

    <label>Date:</label>
    <input type="date" name="date"><br>

    <label>Comment:</label>
    <input type="text" name="comment"><br>

    <input type="submit" value="Add">
  </form>
</body>
</html>