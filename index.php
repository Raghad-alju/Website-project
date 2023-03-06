<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <h1 class="heading-title" >Login Page</h1>
        <form id="form" onsubmit="validateloginInputs()" method="post" class="book-form" >
            
            <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

            <?php } ?>
            <div class="flex">
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
            
            <input type="submit" name="submit" id="submit" value="submit" class="btn">
            <div class="btn">
                <a style="color : white;" href="Register.php">Register</a>
            </div>
            </div>
        </form>
    </div>


</body>





</html>



<?php 

if(isset($_POST['submit'])){

include "config.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);

    if ($row['Email'] === $email && $row['Password'] === $password) {

        echo "Logged in!";

        $_SESSION['Email'] = $row['Email'];

        header("Location: home.php");

    }
}else{

    header("Location: index.php?error=Incorect User name or password");
    exit();

}

       
   

if (mysqli_query($conn, $sql)) {
   
} else {
echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
//mysqli_close($conn);
}
?>


