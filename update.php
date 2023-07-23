<?php
include "dbcon1.php";
$id_expenses=$_GET['updateid'];


if(isset($_POST['submit']))
{
  $Type= $_POST['Type'];
  $category= $_POST['category'];
  $Description = $_POST['Description'];
  $Amount = $_POST['Amount'];
  $Date= $_POST['Date'];
    $sql ="UPDATE expenses set id_exp='$id_exp',Type='$Type',category='$category',Description='$Description',Amount='$Amount',Date='$Date'";

    if($result)
    {
        echo "Data update sussfully";
        header('location:expenses.php');
    }
    else
    {
        die(mysqli_error($con));
    }

} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-U-compatible" content="IE=edge">
   <meta name="viewport"content="width=device-width ,initial-scale=1.0">
   <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel='stylesheet'>
    <title>Expense Tracker</title>
 </head>  
<body>
  <div class="container my-5">
       <form  method="post" >
     <div class="form-group">
     <div class="form-group">
         <label >Type</label>
         <input type="text" class="form-control"  name="Type"  value=<?php echo $row['Type'] ?>>
      </div>
         <label >category</label>
         <input type="text" class="form-control" name="category" value=<?php echo $row['category'] ?>>
     </div>   
      <div class="form-group">
         <label >Description</label>
         <input type="text" class="form-control"placeholder="Enter your Description" name="Description" autocomplete="off"value=<?php echo $row['Description'] ?>>
       </div>
      <div class="form-group">
         <label >Amount</label>
         <input type="number" class="form-control"placeholder="Enter your Amount" name="Amount" autocomplete="off"value=<?php echo $row['Amount'] ?>>
     </div> 
     <div class="form-group">   
         <label >Date</label>
          <input type="date" class="form-control" name="Date" value=<?php echo $row['Date'] ?>>
      </div>
      <button type="submit" class="btn btn-primary" name="submit"> Update </button>
     </from>
  </div>

      
     
</body>
</html>