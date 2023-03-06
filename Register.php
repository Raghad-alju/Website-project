<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <h1 class="heading-title" >Registration</h1>

        <form id="form"  onsubmit="validateInputs()" class="book-form">
      
            <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

            <?php } ?>
            <div class="flex">
            <div class="inputBox">
                <label for="Name">Full Name</label>
                <input id="Name" name="Name" type="text" placeholder="Name">
                <div class="error"></div>
            </div>

            <div class="inputBox">
                <label for="email">Email</label>
                <input id="email" name="email" type="text" placeholder="Email">
                <div class="error"></div>
            </div>
         
            <div class="inputBox">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Password">
                <div class="error"></div>
            </div>


            <div class="inputBox">
                <label for="password2">Confirm Password</label>
                <input id="password2"name="password2" type="password" placeholder="Confirm password">
                <div class="error"></div>
            </div>

            
            <input type="submit" name="submit" id="submit" value="Submit" class="btn"/>
            </div>
        </form>
    </div>

</body>


</html>

<?php 
 
include "config.php";
if(isset($_POST['submit'])){
$name = $_POST['Name'];
$name=mysqli_real_escape_string($conn,$name);
$email = $_POST['email'];
$email=mysqli_real_escape_string($conn,$email);
$password = $_POST['password'];
$password=mysqli_real_escape_string($conn,$password);
       
$result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    if(mysqli_fetch_assoc($result)) {
        header("Location: Register.php?error=Email has been used before");
        return false;
    };


$sql = "INSERT INTO `users`( `Name`, `Email`, `Password`) VALUES ('". $name ."', '". $email ."', '". $password ."')";
   

if (mysqli_query($conn, $sql)) {

} else {
echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
mysqli_close($conn);
header('location:index.php'); 
}
?>