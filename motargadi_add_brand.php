<?php

			if (isset($_POST['submit'])){
				$err = [];
				if(isset($_POST['brand']) && !empty($_POST['brand'])){
					$brand= $_POST['brand'];
				}
				else {
					$err['brand'] = 'Enter brand';
					}
				
				if (count($err) == 0) {
				$connect = new mysqli('localhost','root','','db_motorgadi');
					if($connect->connect_errno !=0){
						die('database connection error');
					}
					$sql="insert into tbl_brand(b_name) values ('$brand')";
					$connect->query($sql);
					if($connect->affected_rows == 1 && $connect->insert_id >0){
						echo "Insert Sucess";
					}else{
						echo "Insert Failed!!";
					}
					//$sql="select b_id from tbl_brand where b_name='$brand'";
					//$connect->query($sql);
					//echo "Brand id is".$connect->insert_id;
				}
			}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Motorgadi</title>
</head>
<body>
		<h1>Add Brand</h1>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

			<label for="brand">Brand</label>
			<input type="text" name="brand"><br>
			<?php 
			if(isset($err['brand'])){
			echo $err['brand'];
			}
			?>

			<input type="submit" name="submit" value="Add">

		</form>
	</body>
</html>