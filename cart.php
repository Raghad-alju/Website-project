<?php
      session_start();
      include 'config.php';
      if(empty($_SESSION['Email'])){
         header("location:index.php");
         exit;
         }
      ?>
<!DOCTYPE html>
<html>
  <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Cart</title>
     <link rel="stylesheet" href="css/style.css" /> 
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

    <?php
     
     
      if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['Update_quantity'])) {
     
          $product_id = $_POST['id'];
          $quantity = $_POST['quantity'];
  
          $_SESSION['cart'][$product_id] = $quantity;
        }


        if (isset($_POST['remove_from_cart'])) {
          $product_id = $_POST['id'];
          unset($_SESSION['cart'][$product_id]);
        }

        if (isset($_POST['submit_order'])) {
          $date = date("Y-m-d");
          $email = $_SESSION['Email'];
          $select = " SELECT * FROM users WHERE Email = '$email'";
          $result = mysqli_query($conn, $select);
          $row = mysqli_fetch_assoc($result);
          $name = $row['Name'];
          $total_cost = $_SESSION['total_cost'];
          
          $sql = "INSERT INTO orders (order_date, customer_email, total_price) VALUES ('$date','$email', '$total_cost')";
          $result = mysqli_query($conn, $sql);

          foreach ($_SESSION['cart'] as $id => $quantity) {


          $query = "SELECT * FROM `product` WHERE `id` = $id";
          $result = mysqli_query($conn, $query);
       
          $row = mysqli_fetch_assoc($result);
          $product_name = $row['name'];
          $product_quantity = $row['quantity'];
          $product_quantity=$product_quantity-$quantity;
          $query = "UPDATE product SET quantity = '$product_quantity' WHERE name = '$product_name'";
          mysqli_query($conn, $query);
          }
          unset($_SESSION['cart']);

          echo '<h1 class="heading-title">Order confirmed!</h1>';
        }
        
        $query = "DELETE FROM `product` WHERE `quantity` = 0";
        $result = mysqli_query($conn, $query);
      }
    ?>



  
  <section class="home-about">"
  <div class="content">
	<table>
    <tr style="font-size: 20px;">
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>

    <?php      
        
        $total_cost = 0;
        if(isset($_SESSION['cart'])){
          
          foreach ($_SESSION['cart'] as $id => $quantity) {
              $sql = "SELECT * FROM product WHERE id=$id";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              $product_name = $row['name'];
              $price = $row['price'];
              $total = $price * $quantity;
              $total_cost += $total;
              ?>
       

              <tr>
                <td><?php echo "<div style=font-size:20px;>",$product_name,"</div>"; ?></td>
                <td>
                  <form action="" method="post" class="home-packages">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <input type="text" name="quantity" value="<?php echo $quantity; ?>">
                    
                  </form>
                </td>
                <td><?php echo "<div style=font-size:20px;>",$price,"</div>"; ?></td>
              </tr>
          
              
              <?php 
              
          } 
        }
        $_SESSION['total_cost'] = $total_cost;

    
      ?>
  </table>
 
  <?php echo '<h3>'.$total_cost.'</h3>'; ?>
   <form action="" method="post">
                    <input type="submit" value="Submit Order" name="submit_order" class="btn">
                    </form>
  </div>
 </section>
 

	
  </body>

</html>