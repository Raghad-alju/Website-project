
<?php
require_once "session.php";
require_once "config.php";

$error = '';
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $res=mysqli_query($conn, "SELECT * FROM `admin` WHERE `admin_name`='admin'");
    $row = mysqli_fetch_assoc($res);

      
 
       if( ($row['admin_name'] == $username) && ($row['admin_password']==$password) && $password=='admin123') {
              $_SESSION['admin']=$username;
                header("location: reset.php");
        }
        else if(($row['admin_name'] == $username) && ($row['admin_password']==$password))
        
        {
            $_SESSION['admin']=$username;

            header("location: dashboard.php");
        }
        else {
            
            echo "WRONG INFORMATION";
        
           
        }
        
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script  src="script1.js" defer> </script>
    <link rel="stylesheet" href="css/style.css" /> 
        <title>Admin Login</title>
       
    </head>
    <section class="header">

<a href="home.php" class="logo">Candy Shop.</a>

<nav class="navbar">
   
</nav>

<div id="menu-btn" class="fas fa-bars"></div>

</section>



    <body>
        <div class="booking">          
                <h3 class="heading-title" >Admin Login Page</h3>
                    <?php echo $error; ?>
                    <form action="" method="post" class="book-form">
                    <div class="flex">
                        <div class="inputBox">
                            <label>Username </label>
                            <input type="username" name="username" class="form-control" required />
                        </div>    
                        <div class="inputBox">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="content">
                            <input type="submit" name="submit" class="btn" value="Sign In">
                        </div>
                    </div>
                    </form>
            
        </div>  
        

    </body>
</html>