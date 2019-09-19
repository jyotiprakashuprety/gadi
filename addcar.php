<?php
session_start();

include 'db_connection.php';
$conn = OpenCon();
$sql = "SELECT TABLE_NAME,TABLE_ROWS
 FROM INFORMATION_SCHEMA.TABLES
 WHERE TABLE_SCHEMA = 'db_motorgadi'
 GROUP BY TABLE_NAME;";
$result = $conn->query($sql);
$table = [];
while ($row = $result->fetch_assoc()) {
  array_push($table, $row);
}
//print_r($table);
$email = $_SESSION['admin_email'];
$adminsql = "SELECT * FROM `tbl_admin` WHERE email='$email'";
$adminresult = $conn->query($adminsql);
$admin = [];
while ($row = $adminresult->fetch_assoc()) {
  array_push($admin, $row);
}
//print_r($admin);
$adminusername = $admin[0]['name'];

?>
<?php
if (!isset($_SESSION['admin_email'])) {
  header('location:alogin.php?message=1');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php

  if (isset($_POST['submit'])) {
    $err = [];

    if (isset($_POST['model']) && !empty($_POST['model'])) {
      $model = $_POST['model'];
    } else {
      $err['required'] = ' ';
    }

    if (isset($_POST['price']) && !empty($_POST['price'])) {
      $price = $_POST['price'];
    } else {
      $err['required'] = ' ';
    }

    if (isset($_POST['mileage']) && !empty($_POST['mileage'])) {
      $mileage = $_POST['mileage'];
    } else {
      $err['required'] = ' ';
    }

    if (isset($_POST['no_of_seats']) && !empty($_POST['no_of_seats'])) {
      $no_of_seats = $_POST['no_of_seats'];
    } else {
      $err['required'] = ' ';
    }

    if (isset($_POST['air_bag']) && !empty($_POST['air_bag'])) {
      $air_bag = $_POST['air_bag'];
    } else {
      $err['required'] = ' ';
    }

    if (isset($_POST['ground_clearance']) && !empty($_POST['ground_clearance'])) {
      $ground_clearance = $_POST['ground_clearance'];
    } else {
      $err['required'] = ' ';
    }

    if (isset($_POST['height']) && !empty($_POST['height'])) {
      $height = $_POST['height'];
    } else {
      $err['required'] = ' ';
    }

    if (isset($_POST['width']) && !empty($_POST['width'])) {
      $width = $_POST['width'];
    } else {
      $err['required'] = ' ';
    }

    if (isset($_POST['length']) && !empty($_POST['length'])) {
      $length = $_POST['length'];
    } else {
      $err['required'] = ' ';
    }

    if (isset($_POST['weight']) && !empty($_POST['weight'])) {
      $weight = $_POST['weight'];
    } else {
      $err['required'] = ' ';
    }

    if (isset($_POST['power']) && !empty($_POST['power'])) {
      $power = $_POST['power'];
    } else {
      $err['required'] = ' ';
    }

    if (isset($_POST['color']) && !empty($_POST['color'])) {
      $color = $_POST['color'];
    } else {
      $err['required'] = ' ';
    }
    if (isset($_POST['year']) && !empty($_POST['year'])) {
      $year = $_POST['year'];
    } else {
      $err['required'] = ' ';
    }
    if (isset($err['required'])) {
      $err['required'] = '<p style="color:Red;font-size:15px;text-align:center;" >*Please fill up all Required information </p>';
      echo $err['required'];
    } else {
      ////image upload
      if (isset($_FILES['photo']['error']) && $_FILES['photo']['error'] == 0) {
        //file size validation
        if ($_FILES['photo']['size'] < 5 * 1048576) {
          $types = ['image/jpeg', 'image/gif', 'image/png', 'image/jpg'];
          $image_name = uniqid() . '_' . $_FILES['photo']['name'];
          if (in_array($_FILES['photo']['type'], $types)) {
            //move file to your folder
            if (move_uploaded_file(
              $_FILES['photo']['tmp_name'],
              'img/vehicleimages/' . $image_name
            )) { } else {
              $err['photo'] = 'File Upload Failed!!';
            }
          } else {
            $err['photo'] = 'File type not allowed';
          }
        } else {
          $err['photo'] = 'File size exceed, 5 MB allowed';
        }
      } else {
        $err['photo'] = 'File Upload Error';
      }
      $gear_type = $_POST['gear_type'];
      $reverse_sensing = $_POST['reverse_sensing'];
      $abs = $_POST['abs'];
      $adj_comfort = $_POST['adj_comfort'];
      $ac = $_POST['ac'];
      $shatter_res = $_POST['shatter_res'];
      $stability = $_POST['stability'];
      $pre_coll = $_POST['pre_coll'];
      $type = $_POST['type'];
      $music = $_POST['music'];
      $socket = $_POST['12Vsocket'];
      $traction = $_POST['traction'];
      $additional = $_POST['additional'];
      $status = $_POST['status'];
      $uploaded_at = date('Y-m-d H:i:s');
      //manual
      $brand_id = '9';
      $uploaded_by = '1';
      if (count($err) == 0) {
        $connect = new mysqli('localhost', 'root', '', 'db_motorgadi');
        if ($connect->connect_errno != 0) {
          die('database connection error');
        }
        $sql = "INSERT INTO `tbl_vehicle` (`v_id`, `brand_id`, `model`, `price`, `image`, `color`, `status`, `mileage`, `no_of_seats`, `air_bag`, `reverse_sensing`, `abs`, `adjustable_comfort`, `air_conditioning`, `shatter_resistance`, `stability_control`, `pre_collision`, `type`, `music _system`, `12v_socket`, `traction_control`, `ground_clearence`, `height`, `width`, `length`, `weight`, `gear_type`, `power`, `additional`, `uploaded_by`, `uploaded at`,`year`) VALUES(
        NULL,'$brand_id','$model','$price','$image_name','$color','$status','$mileage','$no_of_seats','$air_bag','$reverse_sensing','$abs','$adj_comfort','$ac','$shatter_res','$stability','$pre_coll','$type','$music','$socket','$traction','$ground_clearance','$height','$width','$length','$weight','$gear_type','$power','$additional','$uploaded_by','$uploaded_at','$year')";
        echo "$sql";
        $connect->query($sql);
        if ($connect->affected_rows == 1 && $connect->insert_id > 0) {
          echo "Insert Sucess";
        } else {
          echo "Insert Failed";
        }
      } else {
        echo "error haha";
      }
    }
  }
  ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user-secret"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MotorGadi </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="allcars.php">
          <i class="fas fa-fw fa-users"></i>
          <span>UserView</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Car-->
      <li class="nav-item">
        <a class="nav-link" href="addcar.php">
          <i class="fas fa-car"></i>
          <span>Car</span></a>
      </li>







      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <div class="sidebar-brand-text text-center mx-3">Welcome <?php echo $adminusername ?>.How are you doing today? </div>
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $adminusername ?></span>
                <img class="img-profile rounded-circle" src="img/user.jpeg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">



          <!-- Content Row -->
          <!-- <div class="row"> -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Car List</h1>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus"></i> Add New Car</button>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content bg-gradient-light">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Assign Batch</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <form class="user container" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                      <fieldset>
                        <div>
                          <div class="form-group">
                            <label class="form-check-label" for="model">Model *</label>
                            <input class="form-control" type="text" name="model"><br>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="price">Price(RS) *</label>
                            <input class="form-control" type="number" name="price"><br>
                            <?php
                            if (isset($err['price'])) {
                              echo $err['price'];
                            }
                            ?>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="mileage">Mileage (KM/ltr) *</label>
                            <input class="form-control" type="number" name="mileage"><br>
                            <?php
                            if (isset($err['mileage'])) {
                              echo $err['mileage'];
                            }
                            ?>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="no_of_seats">Number of Seats *</label>
                            <input class="form-control" type="number" name="no_of_seats"><br>
                            <?php
                            if (isset($err['no_of_seats'])) {
                              echo $err['no_of_seats'];
                            }
                            ?>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="air_bag">Number of Air Bag *</label>
                            <input class="form-control" type="number" name="air_bag"><br>
                            <?php
                            if (isset($err['air_bag'])) {
                              echo $err['air_bag'];
                            }
                            ?>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="ground_clearance">Ground Clearence (Inch)*</label>
                            <input class="form-control" type="number" name="ground_clearance"><br>
                            <?php
                            if (isset($err['ground_clearance'])) {
                              echo $err['ground_clearance'];
                            }
                            ?>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="height">Height (Ft)*</label>
                            <input class="form-control" type="number" name="height"><br>
                            <?php
                            if (isset($err['height'])) {
                              echo $err['height'];
                            }
                            ?>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="width">Width (Ft)*</label>
                            <input class="form-control" type="number" name="width"><br>
                            <?php
                            if (isset($err['width'])) {
                              echo $err['width'];
                            }
                            ?>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="length">Length (Ft)*</label>
                            <input class="form-control" type="text" name="length"><br>
                            <?php
                            if (isset($err['length'])) {
                              echo $err['length'];
                            }
                            ?>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="weight">Weight (Kg)*</label>
                            <input class="form-control" type="text" name="weight"><br>
                            <?php
                            if (isset($err['weight'])) {
                              echo $err['weight'];
                            }
                            ?>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="power">Power (HP)*</label>
                            <input class="form-control" type="number" name="power"><br>
                            <?php
                            if (isset($err['power'])) {
                              echo $err['power'];
                            }
                            ?>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="color">Available colour *</label>
                            <input class="form-control" type="text" name="color"><br>
                            <?php
                            if (isset($err['color'])) {
                              echo $err['color'];
                            }
                            ?>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="year">Make year *</label>
                            <input class="form-control" type="number" name="year" min="1900" max="2099" step="1" value="2016" />
                            <?php
                            if (isset($err['year'])) {
                              echo $err['year'];
                            }
                            ?>

                          </div>
                          <!-- radio-section -->
                          <div class="form-group">
                            <label class="form-check-label" for="image">Image</label>
                            <input class="form-control-file" type="file" name="photo"><br>
                            <?php
                            if (isset($err['photo'])) {
                              echo $err['photo'];
                            }
                            ?>
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="gear_type">Gear Type</label>
                            <input type="radio" name="gear_type" value="1"> Automatic
                            <input type="radio" name="gear_type" value="0" checked="">Manual
                          </div>

                          <div class="form-group">
                            <label class="form-check-label" for="reverse_sensing">Reverse Sensing</label>
                            <input type="radio" name="reverse_sensing" value="1"> Yes
                            <input type="radio" name="reverse_sensing" value="0" checked=""> No
                          </div>

                          <div class="form-group">
                            <label class="form-check-label" for="abs">ABS</label>
                            <input type="radio" name="abs" value="1"> Yes
                            <input type="radio" name="abs" value="0" checked=""> No
                          </div>

                          <div class="form-group">
                            <label class="form-check-label" for="adj_comfort">Adjustable Comfort</label>
                            <input type="radio" name="adj_comfort" value="1"> Yes
                            <input type="radio" name="adj_comfort" value="0" checked=""> No
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="ac">Air Conditioning</label>
                            <input type="radio" name="ac" value="1"> Yes
                            <input type="radio" name="ac" value="0" checked=""> No
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="shatter_res">Shatter Resistance</label>
                            <input type="radio" name="shatter_res" value="1"> Yes
                            <input type="radio" name="shatter_res" value="0" checked=""> No
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="stability">Stability Control</label>
                            <input type="radio" name="stability" value="1"> Yes
                            <input type="radio" name="stability" value="0" checked=""> No
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="pre_coll">Pre Collision</label>
                            <input type="radio" name="pre_coll" value="1"> Yes
                            <input type="radio" name="pre_coll" value="0" checked=""> No
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="type">Engine Type</label>
                            <input type="radio" name="type" value="0" checked> Petrol
                            <input type="radio" name="type" value="1"> Diesel
                            <input type="radio" name="type" value="2">Electric
                            <input type="radio" name="type" value="3"> Hybrid
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="music">Music System</label>
                            <input type="radio" name="music" value="1"> Yes
                            <input type="radio" name="music" value="0" checked=""> No
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="12Vsocket">12V Socket</label>
                            <input type="radio" name="12Vsocket" value="1"> Yes
                            <input type="radio" name="12Vsocket" value="0" checked=""> No
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="traction">Traction Control</label>
                            <input type="radio" name="traction" value="1"> Yes
                            <input type="radio" name="traction" value="0" checked=""> No
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="status">Status</label>
                            <input type="radio" name="status" value="1"> Active
                            <input type="radio" name="status" value="0" checked=""> De Active
                          </div>
                          <div class="form-group">
                            <label class="form-check-label" for="additional">Additional Features</label>
                            <textarea class="form-control" name="additional" id="additional"></textarea>
                          </div>


                          <div style="width: 45%;float: left;">
                            <p>*Required to filled</p>
                          </div>
                          <div ><input class="btn btn-primary" type="submit" name="submit" value="Upload"></div>
                        </div>
                      </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>


          <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MotorGadi 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="POST">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="alogout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>