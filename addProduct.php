
<?php
session_start();
include 'config.php';
if(!isset($_SESSION['admin'])){
    header("Location: admin.php");
    exit();
   }
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if (isset($_POST['submit'])) {
    $id = uniqid();
    $name = $_POST["name"];
    $photo = $_POST["photo"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

 


    $sql = "INSERT INTO `product`(`name`, `photo`, `price`, `description`, `quantity`) VALUES ('" . $name . "','" . $photo . "','" . $price . "','" . $description . "', '" . $quantity . "')";
 
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        echo "thanks for your request!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>


<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <script  src="script1.js" defer> </script>
    <link rel="stylesheet" href="css/style.css" /> 

    </head>
<body>
<section class="header">

   <a href="home.php" class="logo">Candy Shop.</a>

   <nav class="navbar">
     
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>


 <div class="booking">
    <h1 class="heading-title" >Add Product</h1>

        <form id="form" class="book-form" action="addProduct.php" method="post">
      
      
            <div class="flex">
           
            <div class="inputBox">
                <label for="name">Product name</label>
                <input id="name" name="name" type="text" placeholder="Product Name">
                <div class="error"></div>
            </div>
            <div class="inputBox">
                <label for="photo">photo</label>
                <input id="photo" name="photo" type="url" placeholder="url">
                <div class="error"></div>
            </div>

            <div class="inputBox">
                <label for="price">Price</label>
                <input id="price" name="price" type="text" placeholder="price">
                <div class="error"></div>
            </div>
         
            <div class="inputBox">
                <label for="description">Description</label>
                <input name="description" placeholder="Description" required></input>
                <div class="error"></div>
            </div>
            
    
            <div class="inputBox">
                <label for="Quantity">Quantity</label>
                <input type="text" name="quantity" placeholder="Quantity" required>
                <div class="error"></div>
            </div>

    
            
            <input type="submit" name="submit" id="submit" value="Submit" class="btn"/>
            </div>
        </form>
    </div>

    <section class="footer">

<div class="box-container">

   <div class="box">
 
   </div>


</div>


</section>
</body>
</html>