

<?php
// start session
session_start();

// check if user is logged in as admin
if(!isset($_SESSION['admin'])){
 header("Location: admin.php");
 exit();
}

// connect to database
include 'config.php';

// fetch and display orders from database
$query = "SELECT * FROM orders ORDER BY order_date DESC";
$result = mysqli_query($conn, $query);
echo' <div class="booking">

    <form id="form" class="book-form">';
echo '<table>';
echo '<tr>';
echo '<th>Order Date</th>';
echo '<th>Customer Email</th>';
echo '<th>Order Number</th>';
echo '<th>Total Price</th>';
echo '</tr>';

while($row = mysqli_fetch_assoc($result)){
 echo '<tr>';
 echo '<td>' . $row['order_date'] . '</td>';
 echo '<td>' . $row['customer_email'] . '</td>';
 echo '<td>' . $row['order_number'] . '</td>';
 echo '<td>' . $row['total_price'] . '</td>';
 echo '</tr>';
}

echo '</table>';
echo "</form>";
echo "</div>";
// close database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <title>Orders</title>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script  src="script1.js" defer> </script>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="css/style.css" /> 

 </head>
</html>