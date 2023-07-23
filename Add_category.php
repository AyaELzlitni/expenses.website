<?php
session_start();
?>
<?php


$id = $_SESSION['id'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expenses website";
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) {
    
    $Type = $_POST['Type'];
    $Amount = $_POST['Amount'];
    $name_category = $_POST['name_category'];

   
    $sql = "INSERT INTO category (Type, name_category, Amount, id) VALUES ('$Type', '$name_category', '$Amount', '$id')";
    
    if (mysqli_query($conn, $sql)) {
       
        header("Location: category.php");
        exit();
    } else {
        echo "حدث خطأ أثناء إضافة المصروف: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="addcatgory.css">

   <meta http-equiv="X-U-compatible" content="IE=edge">
   <meta name="viewport"content="width=device-width ,initial-scale=1.0">
   
 </head>  
<body>
  <div class="container my-5">
  
       <form  method="post" >
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

       <div class="form-group">
       <label >TYPE :</label>
       <select name="Type"  class="form-control" >
                  <option value="Income">Income</option>
                  <option value="Expense">Expense</option>
               </select>
      </div>
     <div class="form-group">
     <label >Category :</label>
     <select name="name_category"  class="form-control" >
                  <option value="Food">Food</option>
                  <option value="Sports">Sports</option>
                  <option value="Shopping">Shopping</option>
                  <option value="Transport">Transport</option>
                  <option value="Bills">Bills</option>
               </select>
     </div>   
      
      <div class="form-group">
         <label >Amount</label>
         <input type="number" class="form-control"placeholder="Enter your Amount" name="Amount" autocomplete="off">
     </div> 
    
      <button type="submit" class="btn btn-primary" name="submit"> ADD </button>
     </from>
  </div>
</body>
</html>