<?php 
//database connection code
$connect = new mysqli('localhost','root','','db_motorgadi');
//check database connection error
if ($connect->connect_errno != 0 ) {
	die('Database connection error');
}
w