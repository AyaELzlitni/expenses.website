<?php
$conn = new mysqli('localhost', 'root', '', 'expenses website');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT expenses.id_exp,  expenses.price,  expenses.date, expenses.comment, expenses.payment, category.name_category, category.type, category.amount, users.username
        FROM expenses
        INNER JOIN category ON expenses.id_category = category.id_category
        INNER JOIN users ON expenses.id = users.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table>
          <tr>
          
            <th>ID</th>
            <th>Price</th>
            <th>Date</th>
            <th>Comment</th>
            <th>Payment</th>
            <th>Category Name</th>
            <th>Category Type</th>
            <th>Category Amount</th>
           
          </tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
    
            <td>".$row["id_exp"]."</td>

            <td>".$row["price"]."</td>

            <td>".$row["date"]."</td>

           
            <td>".$row["comment"]."</td>
           
            <td>".$row["payment"]."</td>
           
            <td>".$row["name_category"]."</td>
           
            <td>".$row["type"]."</td>
           
            <td>".$row["amount"]."</td>
          
          </tr>";
  }
  echo "</table>";
} else {
  echo "No results found.";
}

$conn->close();
?>
