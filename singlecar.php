<?php
    $v_id = $_GET['v_id'];
  ?>
<?php
include 'db_connection.php';
$conn = OpenCon();
 $sql="SELECT * FROM (tbl_vehicle v INNER JOIN tbl_brand b ON v.brand_id=b.b_id)INNER JOIN tbl_admin WHERE v.v_id=$v_id;";
    $result = $conn->query($sql);
    $data = []; 
    $row =$result->fetch_assoc();
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Single Car</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
 <?php 
    session_start();
    if(!isset($_SESSION['user_email'])){
 ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img style="width: 25%" src="img/motorgadi.png" /></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php } 
else{
?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3">
        
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="#page-top"><img style="width: 25%" src="img/motorgadi.png" /></a>
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-1 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user_email'] ?></span>
                <img style="height:50px;width: 50px;" class="img-profile rounded-circle" src="img/user.jpeg"
                >
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
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" ></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>
</div>
        </nav>

<?php } ?>

  <!-- Page Content -->
  <br>
  <br>
  <center><h1><?php echo $row['model'] ?></h1></center>
  <div class="container">

    <div class="row  justify-content-center">
    <div class="col-lg-9 ">
      <div><img style="height: 400px;width: 825px;" class="card-img-top" src="img/vehicleimages/<?php echo $row['image'] ?>" alt=""> 
    </div>
<!-- /.card -->

        <div class="card" >
          <div class="card-header">
            <div style="width: 30%;float: right;"><h4>Brand:<?php echo $row['b_name'] ?></h4>
              <h5>Price:NRS <?php echo $row['price'] ?></h5>
            
          </div >
          <div style="width: 30%;float: right">
            <div style="width: 100%;"><small class="text-muted">Manufacture on:<?php echo $row['year'] ?></small></div>
            <?php if ($row['status']==1){?>
              <a  class="btn btn-success">Available</a>
            <?php }
            else{?>
              <a class="btn btn-danger">Not Available</a>
            <?php }?>

          </div>
            <div style="width: 30%;">
              <h5>Uploded by:<?php echo $row['name'] ?></h5>
              <small class="text-muted">Email:<?php echo $row['email'] ?></small>
              <small class="text-muted">Phone:<?php echo $row['phone'] ?></small>
            </div>
          </div>
          <div style="width: 100%;">
          <div class="card-body" style="width: 49%;float: left;">
            <p>Available Color: <?php echo $row['color'] ?></p>
            <p>Mileage: <?php echo $row['mileage'] ?></p>
            <p>Number of Seats: <?php echo $row['no_of_seats'] ?></p>
            <p>Number of Air Bag: <?php echo $row['air_bag'] ?></p>
            <p>Ground Clearence: <?php echo $row['ground_clearence'] ?> Inch</p>
            <p>Height: <?php echo $row['height'] ?> Ft</p>
            <p>Width: <?php echo $row['width'] ?> Ft</p>
            <p>Length: <?php echo $row['length'] ?> Ft</p>
            <p>Weight: <?php echo $row['weight'] ?> KG</p>
            <p>Power: <?php echo $row['power'] ?> HP</p>
            <p>Gear Type: <?php  ?></p>
            
           </div>
           <div class="card-body" style="width: 49%;float: right;">
           <p>Reverse Sensing</p>
           <p>ABS</p>
           <p>Adjustable Comfort</p>
           <p>Air Conditioning</p>
           <p>Shatter Resistance</p>
           <p>Stability Control</p>
           <p>Pre Collision</p>
           <p>Music System</p>
           <p>12v_Socket</p>
           <p>Traction Control</p>
           <p>Additional</p>
           
           </div>
         </div>
          <?php 
                if(isset($_SESSION['user_email'])){
             ?>
         <div class="card-footer">
            <center><a href="#" class="btn btn-success">Book Now</a></center>
          </div>
        <?php } else{
          ?>
            <center><a href="login.php" class="btn btn-success">Login to Book</a></center>
        <?php } ?>


          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
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

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; MotorGadi 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
