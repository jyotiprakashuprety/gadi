<?php 
    session_start();
    if(!isset($_SESSION['user_email'])){
   header('location:login.php?message=1');
      } 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>user page</title>
</head>
<body>
     <p>welcome!user</p>
     <div>
          <a class="btn btn-primary" href="logout.php">Logout</a>
     </div>      
</body>
</html>