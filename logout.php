<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script  src="script1.js" defer> </script>
    <link rel="stylesheet" href="style.css" /> 
        <title>Logout</title>
       
   
<body>
 
<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");  
 
?>
 
</body>
</html>