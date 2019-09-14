<?php 
//get username passed from ajax
$username = $_POST['uname'];

//conection file
 if (count($err) == 0) {
   $connect = new mysqli('localhost','root','','db_motorgadi');

          if($connect->connect_errno !=0){
            die('database connection error');
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