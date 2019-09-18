<?php
	session_start();
	session_destroy();
	setcookie('remember',0,time()-1);
	setcookie('email',0,time()-1);
	header('location:index.php');
?>