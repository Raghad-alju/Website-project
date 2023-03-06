<?php
session_start();
include 'config.php';
if(empty($_SESSION['Email'])){
   header("location:index.php");
   }
?>

<!DOCTYPE html>
<html>
 <head>
 <title>Product Page</title>
 <link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>
 
 <section class="header">
 
<a href="home.php" class="logo">Candy Shop.</a>

<nav class="navbar">
   <a href="home.php">home</a>
   <a href="cart.php">cart</a>
   <a href="logout.php">logout</a>
</nav>

<div id="menu-btn" class="fas fa-bars"></div>

</section>
<section class="about">


 </section>

 
<?php

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $product_id =  intval($_GET['id']);
    $query = "SELECT * FROM `product` WHERE `id` = $product_id";
    $result = mysqli_query($conn, $query);
    $i=0;
    echo "<section class=\"about\">";
    echo "<div class=\"content\">";
    echo "<p>";
    while ($row = mysqli_fetch_assoc($result)){
			$product_name = $row['name'];
			$product_price = $row['price'];
			$product_description = $row['description'];
			$product_image = $row['photo'];
			$product_quantity = $row['quantity'];

        if ($product_quantity >= 5) {
            
            
            echo '<img src = "',$row['photo'], '" />';
        

            ?>
            
            <a href="product.php?id=<?php echo $product_id ?>"> <?php echo $product_name."</a>";
            echo "<br>";

            echo  $row['description'] ;
            echo "<br>";

            echo  $row['price'] . " SAR";
            echo "<br>";

    
        } else if ( $product_quantity <= 5 && $product_quantity >0)
           {

              echo '<img src = "',$row['photo'], '" />';
                ?>
                <a href="product.php?id=<?php echo $product_id ?>"> <?php echo $product_name."</a>"; 
                echo "<br>";

                echo  $row['description'] ;
                echo "<br>";
                echo  $row['price'] ." SAR";
                echo "<br>";
                echo "hurry there is ". $row['quantity'] ." left ";
             
               
            }
            echo ' <div class="content">';
			echo '
            <form method="post" action=>
                <input class = "product_class_quantity" type="number" min="1" max="10" name="quantity" value="1" placeholder="Enter Quantity"/>
                <br><br><br>
                <input type="hidden" name="product_id" value="'.$product_id.'">
                <input class = "btn" type="submit" name="add_to_cart" value="Add to Cart" >
            </form>';
            
    }
    echo "</p>";
    echo "</div>";
    echo "</section>";


    if(isset($_POST['add_to_cart'])){
        if($_POST['quantity'] > 0){

            if (isset($_SESSION['cart'])){
               $_SESSION['cart'][$product_id] = $_POST['quantity'];
                header("location:home.php");
            } else {
               $_SESSION['cart'] = array();
               $_SESSION['cart'][$product_id] = $_POST['quantity'];
               header("location:home.php");

           }
         
    }
    
     //if(array_key_exists($product_id, $_SESSION['cart'])){
     //	echo "Product Quantity Updated! <br>";
    //	 $_SESSION['cart'][$product_id]['quantity'] += 1;
     //}
    }


mysqli_close($conn);

?>


</body>
</html>