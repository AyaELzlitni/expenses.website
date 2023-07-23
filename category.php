<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-U-compatible" content="IE=edge">
   <link rel="stylesheet" href="category.css">
   <meta name="viewport"content="width=device-width ,initial-scale=1.0">
    <title>Expense Tracker</title>
</head> 
<body>

    <div class="container">
    <button class="btn btn-primary my-5"><a href="Add_category.php" class="text-light">Add category</a></button>
    
        <table class="table">
       <thead>
           <tr>
                <th scope="col">.N</th>
              <th scope="col">Type</th>
              <th scope="col">Category</th>
               <th scope="col">Amount</th>
               <th scope="col" >Action</th>
          </tr>
      </thead>
      <tbody>
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


$sql = "SELECT id_category, Type, name_category, Amount ,id FROM category WHERE  id=$id  ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $id_category=$row["id_category"];
    $Type = $row["Type"];
    $name_category = $row["name_category"];
    $Amount = $row["Amount"];
  
    echo '<tr>
    <td>'.$id_category.'</td>
<td>'.$Type.'</td>
<td>'.$name_category.'</td>
<td>'.$Amount.'</td>
<td >
<button class="btn btn-danger" ><a href="Add_exp.php?addexpid='.$id_category.'"class="text-light">addexpenses</a></button>

</td>
</tr>';
}


} else
 {
  echo "<tr><td colspan='3'>لا توجد بيانات</td></tr>";
}


mysqli_close($conn);
?>
        </tbody>
       </table>
      
       <button class="btn btn-primary my-5"><a href="homepage.php" class="text-light">logout</a></button>
    </div>
</body>
</html>