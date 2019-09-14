<?php

				$connect = new mysqli('localhost','root','','db_motorgadi');
				//check database connection error
				if ($connect->connect_errno != 0 ) {
					die('Database connection error');
				}

				//sql query to select all  categories from database
				$sql = "select * from tbl_brand ";

				//execute query and get result object: incase of select
				$result = $connect->query($sql);

				//result object: mysqli_result Object ( [current_field] => 0 [field_count] => 2 [lengths] => [num_rows] => 3 [type] => 0 )

				$data = [];
				//for single data
				// $a = $result->fetch_assoc();
				// print_r($a);
				if ($result->num_rows > 0) {
					while ($category = $result->fetch_assoc()) {
						array_push($data, $category);
					}
				}




			if (isset($_POST['submit'])){
				$err = [];
				if(isset($_POST['email']) && !empty($_POST['email'])){
					$email= $_POST['email'];
				}
				else {
					$err['email'] = 'Enter email';
					}

				if(isset($_POST['password']) && !empty($_POST['password'])){
					$password= $_POST['password'];
				}
				else {
					$err['password'] = 'Enter password';
					}

				$Brand= $_POST['brand'];
				
				if (count($err) == 0) {
				$connect = new mysqli('localhost','root','','db_motorgadi');
					if($connect->connect_errno !=0){
						die('database connection error');
					}
					$sql="insert into tbl_admin(email,password,brand_id) values ('$email',MD5('$password'),'$Brand')";
					$connect->query($sql);
					if($connect->affected_rows == 1 && $connect->insert_id >0){
						echo "Insert Sucess";
					}else{
						echo "Insert Failed";
					}
				}
			}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Motorgadi</title>
</head>
<body>
		<h1>Signup</h1>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

			<label for="email">Email</label>
			<input type="text" name="email"><br>
			<?php 
			if(isset($err['email'])){
			echo $err['email'];
			}
			?>

			<label for="password">Password</label>
			<input type="text" name="password"><br>
			<?php 
			if(isset($err['password'])){
			echo $err['password'];
			}
			?>

			<label for="brand">Brand</label>
			<select name="brand">
				<option>Select Category</option>
				<?php foreach($data as $c)
					{ ?>
						<option value="<?php echo $c['b_id'] ?>"><?php echo $c['b_name'] ?></option>
					<?php } ?>
			</select>
			<?php 
			if (isset($err['brand']))
				{
					echo $err['brand'];
				}
			?>

			<input type="submit" name="submit" value="Signup">

		</form>
	</body>
</html>