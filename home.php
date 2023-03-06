<?php
session_start();
include 'config.php';
if(empty($_SESSION['Email'])){
   header("location:index.php");
   }
?>
<html>
 <head>
 <title>Home Page</title>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script  src="script1.js" defer> </script>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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


<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(images/candy.jpg) no-repeat">
            <div class="content">
              
            </div>
         </div>

        
   </div>

</section>




<?php
 require_once('config.php');
 if(empty($_SESSION['Email'])){
    exit;
    }
    $email=$_SESSION['Email'];
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);
    $name;
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $name = $row['Name'];
       
    
    echo "<h1 class=\"heading-title\" >welcome: $name</h1>";
 
    echo "</br>" ;
}
 $query2 = "SELECT * FROM users ";
 $result2 = mysqli_query($conn, $query2);
 
 echo "
 <section class=\"home-about\">
 
 <div class=\"image\">
    <img src=\"images/about.png\" alt=\"\">
 </div>
 
 <div class=\"content\">
    <h3>about us</h3>
    <p>We are a small business Candy Shop. We sell various types of candy and sugary goods. I hope you find our small business joyful and support it. Happy Candy shopping!</p>
 </div>
 
 </section>";
 

   


 mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


if(isset($_GET['id'])){
    $product_id =  intval($_GET['id']);

    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $price = $row['price'];
    $description = $row['description'];
    $image = $row['image'];
    $quantity = $row['quantity'];
    }
    }
 

 $query = "SELECT * FROM `product` ";
 $result = mysqli_query($conn, $query);
$link_address = "product.php";
echo    "<h1 class=\"heading-title\"> our products </h1>";

echo "<section class=\"home-packages\"> 
<div class=\"box-container\">";
$i=0;
while ($i<mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
    $product_id = $row['id'];
    $name = $row['name'];
    $quantity = $row['quantity'];
   
    if ($quantity >= 5) {
     
        echo "
       
    <div class=\"box\">
               <div class=\"image\">";
              echo '<img src = "',$row['photo'], '" />';
          echo "</div>" ;
           
    echo "<div class=\"content\"> <p>";
            ?>
            <a href="product.php?id=<?php echo $product_id ?>"> <?php echo $name."</a>";   
            echo "<br>", $row['description'];
            echo "<br>",$row['price'] ." SAR","</p>";
    echo "</div>" ;

     echo "</div>" ;
       

    } else if ( $quantity <= 5 && $quantity >0)
       {
        echo "       
        <div class=\"box\">
        <div class=\"image\">";
        echo '<img src = "',$row['photo'], '" />';
        echo "</div>" ;
           
            echo "<div class=\"content\"> <p>";
            ?>
            <a href="product.php?id=<?php echo $product_id ?>"> <?php echo $name."</a>";   
            echo  "<br>",$row['description'];
            echo  "<br>",$row['price'] ." SAR","</p>";
            echo "hurry there is ". $row['quantity'] ." left ";
            echo "</div>" ;
            echo "</div>" ;
           
        }
        $i++;
        
}
echo "</div>" ;
echo "</section>";

 
   

mysqli_close($conn);


?>


<section class="footer">

   <div class="box-container">

      <div class="box">
    
      </div>


   </div>


</section>

<!-- footer section ends -->





 </body>
</html>

