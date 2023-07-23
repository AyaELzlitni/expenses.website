<?php
session_start();
?>
<?php
include 'dbcon1.php' ;
if(isset($_GET['deleteid']))
{
    $id=$_GET['deleteid'];
  
    $sql="DELETE FROM expenses WHERE   id=$id ";
    
    $result=mysqli_query($con,$sql);
    if($result)
    {
        //echo "Data Delete sussfully";
        header('location:category.php');
    }
    else
    {
        die(mysqli_error($con));
    }
}