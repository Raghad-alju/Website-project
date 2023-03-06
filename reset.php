
<?php 
session_start();
include 'config.php';
if(!isset($_SESSION['admin'])){
    header("Location: admin.php");
    exit();
   }

?>
<?php 

		
		if(isset($_POST['re_password']))
		{
		$old_pass=$_POST['old_pass'];
		$new_pass=$_POST['new_pass'];
		$re_pass=$_POST['re_pass'];
        $chg_pwd=mysqli_query($conn,"SELECT * FROM `admin` WHERE  `admin_name`='admin'");
		$chg_pwd1=mysqli_fetch_array($chg_pwd);
		$data_pwd=$chg_pwd1['admin_password'];
		if($data_pwd==$old_pass){
        if ($new_pass == $re_pass) {
                $update_pwd = mysqli_query($conn, "UPDATE `admin` SET admin_password = '$new_pass' WHERE admin_name='admin'");
        }
	}}
		
	
	?>
    
<!DOCTYPE html>
<html>
	<head>
		<title>Reset Password</title>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <h1 class="heading-title" >Reset</h1>

        <form id="form" class="book-form" action="dashboard.php">
      
            <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

            <?php } ?>
            <div class="flex">
            <div class="inputBox">
                <label for="oldpass">Old Password</label>
				<input type="password" name="old_pass" placeholder="Enter Old Password..." value="" required />
                <div class="error"></div>
            </div>

            <div class="inputBox">
                <label for="newpass">new Password</label>
				<input type="password" name="new_pass" placeholder="Enter New Password..." value=""  required />
                <div class="error"></div>
            </div>
         
            <div class="inputBox">
                <label for="password">Retype New Password</label>
				<input type="password" name="re_pass" placeholder="Retype New Password..." value="" required />
                <div class="error"></div>
            </div>

            
            <input type="submit" name="submit" id="submit" value="Submit" class="btn"/>
            </div>
        </form>
    </div>
	</fieldset>




	<!-- Form Close -->
	
</body>
</html>