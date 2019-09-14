<?php 
//get username passed from ajax
$username = $_POST['username'];

//database connection code
$connect = new mysqli('localhost','root','','db_motorgadi');
//check database connection error
if ($connect->connect_errno != 0 ) {
	die('Database connection error');
}


//query to select data with username
$sql = "select username from tbl_user where username='$username'";
//execute
$result = $connect->query($sql);
//if username is taken num_rows will be 1
if ($result->num_rows == 1) {
	echo "Username already taken";
}
 ?>