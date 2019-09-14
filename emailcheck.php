<?php 
//get username passed from ajax
$email = $_POST['email'];

//database connection code
$connect = new mysqli('localhost','root','','db_motorgadi');
//check database connection error
if ($connect->connect_errno != 0 ) {
	die('Database connection error');
}


//query to select data with username
$sql = "select email from tbl_user where email='$email'";
//execute
$result = $connect->query($sql);
//if username is taken num_rows will be 1
if ($result->num_rows == 1) {
	echo "This email is already assigned.";
}
 ?>