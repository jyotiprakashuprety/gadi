<!DOCTYPE html>
<html>
<head>
	<title>Motorgadi</title>
	<link rel="stylesheet" href="addvehicle.css">
</head>
<body>
		<h2><center>Add Vehicle</center></h2>
		<?php

			if (isset($_POST['submit'])){
				$err = [];

				if(isset($_POST['model']) && !empty($_POST['model'])){
					$model= $_POST['model'];
				}
				else {
					$err['required'] = ' ';
					}

				if(isset($_POST['price']) && !empty($_POST['price'])){
					$price= $_POST['price'];
				}
				else {
					$err['required'] = ' ';
					}

				if(isset($_POST['mileage']) && !empty($_POST['mileage'])){
					$mileage= $_POST['mileage'];
				}
				else {
					$err['required'] = ' ';
					}

				if(isset($_POST['no_of_seats']) && !empty($_POST['no_of_seats'])){
					$no_of_seats= $_POST['no_of_seats'];
				}
				else {
					$err['required'] = ' ';
					}

				if(isset($_POST['air_bag']) && !empty($_POST['air_bag'])){
					$air_bag= $_POST['air_bag'];
				}
				else {
					$err['required'] = ' ';
					}

				if(isset($_POST['ground_clearance']) && !empty($_POST['ground_clearance'])){
					$ground_clearance= $_POST['ground_clearance'];
				}
				else {
					$err['required'] = ' ';
					}

				if(isset($_POST['height']) && !empty($_POST['height'])){
					$height= $_POST['height'];
				}
				else {
					$err['required'] = ' ';
					}

				if(isset($_POST['width']) && !empty($_POST['width'])){
					$width= $_POST['width'];
				}
				else {
					$err['required'] = ' ';
					}

				if(isset($_POST['length']) && !empty($_POST['length'])){
					$length= $_POST['length'];
				}
				else {
					$err['required'] = ' ';
					}

				if(isset($_POST['weight']) && !empty($_POST['weight'])){
					$weight= $_POST['weight'];
				}
				else {
					$err['required'] = ' ';
					}

				if(isset($_POST['power']) && !empty($_POST['power'])){
					$power= $_POST['power'];
				}
				else {
					$err['required'] = ' ';
					}

				if(isset($_POST['color']) && !empty($_POST['color'])){
					$color= $_POST['color'];
				}
				else {
					$err['required'] = ' ';
					}
						if (isset($err['required'])){
				             $err['required'] = '<p style="color:Red;font-size:15px;text-align:center;" >*Please fill up all Required information </p>';
				             echo $err['required'];
				        }
						else{
						////image upload
						if (isset($_FILES['photo']['error']) && $_FILES['photo']['error'] == 0) {
							//file size validation
							if ($_FILES['photo']['size'] < 5*1048576) {
								$types = ['image/jpeg','image/gif','image/png','image/jpg'];
								$image_name = uniqid() . '_' . $_FILES['photo']['name'];
								if (in_array($_FILES['photo']['type'], $types)) {
									//move file to your folder
									if(move_uploaded_file($_FILES['photo']['tmp_name'],
										'images/' . $image_name)){
									}else {
										$err['photo'] = 'File Upload Failed!!';
									}
								} else {
									$err['photo'] = 'File type not allowed';
								}
							} else {
								$err['photo'] = 'File size exceed, 5 MB allowed';
							}
						}else {
							$err['photo'] = 'File Upload Error';
						}
				 	$gear_type=$_POST['gear_type'];
				 	$reverse_sensing=$_POST['reverse_sensing'];
				 	$abs=$_POST['abs'];
				 	$adj_comfort=$_POST['adj_comfort'];
				 	$ac=$_POST['ac'];
				 	$shatter_res=$_POST['shatter_res'];
				 	$stability=$_POST['stability'];
				 	$pre_coll=$_POST['pre_coll'];
				 	$fuel=$_POST['fuel'];
				 	$music=$_POST['music'];
				 	$socket=$_POST['12Vsocket'];
				 	$traction=$_POST['traction'];
				 	$additional=$_POST['additional'];
				 	$status=$_POST['status'];
				 	$uploaded_at=date('Y-m-d H:i:s');
				 	//manual
				 	$brand_id='9';
				 	$uploaded_by='5';
				if (count($err) == 0) {
				$connect = new mysqli('localhost','root','','db_motorgadi');
					if($connect->connect_errno !=0){
						die('database connection error');
					}
					$sql="INSERT INTO `tbl_vehicle` (`v_id`, `brand_id`, `model`, `price`, `image`, `color`, `status`, `mileage`, `no_of_seats`, `air_bag`, `reverse_sensing`, `abs`, `adjustable_comfort`, `air_conditioning`, `shatter_resistance`, `stability_control`, `pre_collision`, `remote_fuel`, `music _system`, `12v_socket`, `traction_control`, `ground_clearence`, `height`, `width`, `length`, `weight`, `gear_type`, `power`, `additional`, `uploaded_by`, `uploaded at`) VALUES(
					NULL,'$brand_id','$model','$price','$image_name','$color','$status','$mileage','$no_of_seats','$air_bag','$reverse_sensing','$abs','$adj_comfort','$ac','$shatter_res','$stability','$pre_coll','$fuel','$music','$socket','$traction','$ground_clearance','$height','$width','$length','$weight','$gear_type','$power','$additional','$uploaded_by','$uploaded_at')";
					echo "$sql";
					$connect->query($sql);
					if($connect->affected_rows == 1 && $connect->insert_id >0){
						echo "Insert Sucess";
					}else{
						echo "Insert Failed";
					}
				}
				else{
					echo"error haha";
				}
			}
		}
	?>

		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
			<fieldset>
			<div>
			<div style="width: 48%;float: left;" class="group">
			<label for="model">Model *</label>
			<input type="text" name="model"><br>

			<label for="price">Price(RS) *</label>
			<input type="number" name="price"><br>
			<?php
			if(isset($err['price'])){
			echo $err['price'];
			}
			?>


			<label for="mileage">Mileage (KM/ltr) *</label>
			<input type="number" name="mileage"><br>
			<?php
			if(isset($err['mileage'])){
			echo $err['mileage'];
			}
			?>

			<label for="no_of_seats">Number of Seats *</label>
			<input type="number" name="no_of_seats"><br>
			<?php
			if(isset($err['no_of_seats'])){
			echo $err['no_of_seats'];
			}
			?>

			<label for="air_bag">Number of Air Bag *</label>
			<input type="number" name="air_bag"><br>
			<?php
			if(isset($err['air_bag'])){
			echo $err['air_bag'];
			}
			?>
			<label for="ground_clearance">Ground Clearence (Inch)*</label>
			<input type="number" name="ground_clearance"><br>
			<?php
			if(isset($err['ground_clearance'])){
			echo $err['ground_clearance'];
			}
			?>

			<label for="height">Height (Ft)*</label>
			<input type="number" name="height"><br>
			<?php
			if(isset($err['height'])){
			echo $err['height'];
			}
			?>

			<label for="width">Width (Ft)*</label>
			<input type="number" name="width"><br>
			<?php
			if(isset($err['width'])){
			echo $err['width'];
			}
			?>
			<label for="length">Length (Ft)*</label>
			<input type="text" name="length"><br>
			<?php
			if(isset($err['length'])){
			echo $err['length'];
			}
			?>

			<label for="weight">Weight (Kg)*</label>
			<input type="text" name="weight"><br>
			<?php
			if(isset($err['weight'])){
			echo $err['weight'];
			}
			?>

			<label for="power">Power (HP)*</label>
			<input type="number" name="power"><br>
			<?php
			if(isset($err['power'])){
			echo $err['power'];
			}
			?>

			<label for="color">Available colour *</label>
			<input type="text" name="color"><br>
			<?php
			if(isset($err['color'])){
			echo $err['color'];
			}
			?>

		</div>
		<div style="width: 48%; float: left;" class="radio">
			<div class="box">
			<label for="image">Image</label>
			<input type="file" name="photo" ><br>
			<?php
			if(isset($err['photo'])){
			echo $err['photo'];
			}
			?>
		</div>
			<div class="box">
			<label for="gear_type">Gear Type</label>
			<input type="radio" name="gear_type" value="1" > Automatic
			<input type="radio" name="gear_type" value="0" checked="" >Manual
			</div>

			<div class="box">
			<label for="reverse_sensing">Reverse Sensing</label>
			<input type="radio" name="reverse_sensing" value="1" > Yes
			<input type="radio" name="reverse_sensing" value="0" checked="" > No
			</div>

			<div class="box">
			<label for="abs">ABS</label>
			<input type="radio" name="abs" value="1" > Yes
			<input type="radio" name="abs" value="0" checked="" > No
			</div>

			<div class="box">
			<label for="adj_comfort">Adjustable Comfort</label>
			<input type="radio" name="adj_comfort" value="1" > Yes
			<input type="radio" name="adj_comfort" value="0" checked="" > No
			</div>
			<div class="box">
			<label for="ac">Air Conditioning</label>
			<input type="radio" name="ac" value="1" > Yes
			<input type="radio" name="ac" value="0" checked="" > No
			</div>
			<div class="box">
			<label for="shatter_res">Shatter Resistance</label>
			<input type="radio" name="shatter_res" value="1" > Yes
			<input type="radio" name="shatter_res" value="0" checked="" > No
			</div>
			<div class="box">
			<label for="stability">Stability Control</label>
			<input type="radio" name="stability" value="1" > Yes
			<input type="radio" name="stability" value="0" checked="" > No
			</div>
			<div class="box">
			<label for="pre_coll">Pre Collision</label>
			<input type="radio" name="pre_coll" value="1" > Yes
			<input type="radio" name="pre_coll" value="0" checked="" > No
			</div>
			<div class="box">
			<label for="fuel">Remote Fuel</label>
			<input type="radio" name="fuel" value="1" > Yes
			<input type="radio" name="fuel" value="0" checked="" > No
			</div>
			<div class="box">
			<label for="music">Music System</label>
			<input type="radio" name="music" value="1" > Yes
			<input type="radio" name="music" value="0" checked="" > No
			</div>
			<div class="box">
			<label for="12Vsocket">12V Socket</label>
			<input type="radio" name="12Vsocket" value="1" > Yes
			<input type="radio" name="12Vsocket" value="0" checked="" > No
			</div>
			<div class="box">
			<label for="traction">Traction Control</label>
			<input type="radio" name="traction" value="1" > Yes
			<input type="radio" name="traction" value="0" checked="" > No
			</div>
			<div class="box">
			<label for="status">Status</label>
			<input type="radio" name="status" value="1" > Active
			<input type="radio" name="status" value="0" checked="" > De Active
			</div>
			<div class="box">
			<label for="additional">Additional Features</label>
			<textarea name="additional" id="additional"></textarea>
			</div>
		</div>
		<div style="width: 45%;float: left;"><p>*Required to filled</p></div>
		<div style="width: 55%;float: auto;"><input type="submit" name="submit" value="Upload"></div>
	</div>
	</fieldset>
	</form>
	</body>
</html>