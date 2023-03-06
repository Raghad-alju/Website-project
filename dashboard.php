<?php
 session_start();
 if(!isset($_SESSION['admin'])){
   header("Location: admin.php");
   exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
 <title>Admin Dashboard</title>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script  src="script1.js" defer> </script>
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<section class="header">
 
 <a href="home.php" class="logo">Candy Shop.</a>
 
 <nav class="navbar">
    
 </nav>
 
 <div id="menu-btn" class="fas fa-bars"></div>
 
 </section>
 <div class="booking">
    <h1 class="heading-title" >Admin Dashboard</h1>

        <form id="form" class="book-form">
      
         
            <div class="flex">
            <div class="btn">
                <a href="addProduct.php">Add Product</a>
            </div>
            <div class="btn">
                <a href="viewOrders.php">View Orders</a>
            </div>
         
            <div class="btn">
                <a href="logout.php">Logout</a>
            </div>
   
            </div>
        </form>
    </div>
    


</body>
</html>