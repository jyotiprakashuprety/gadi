
<?php
include 'db_connection.php';
$conn = OpenCon();
if(isset($_GET['a'])){
  $b=$_GET['a'];
  $sql="select * from tbl_vehicle where model like '%$b%'";
  $result = $conn->query($sql);
 if($result->num_rows==0){
  header('location:index.php?noresult=1');
}
}
else{
 $sql="SELECT v_id,image,model,price,type,power,year,status FROM `tbl_vehicle`";

    $result = $conn->query($sql);
  }
    $data = []; 
    while($row =$result->fetch_assoc())
     {
       
     	   array_push($data,$row);
     	      //  $cardetails[]=$cardata;
 		    
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>All Cars</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

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
          <?php if(isset($_SESSION['admin_email'])){ ?>
          <li class="nav-item">
             <a class="nav-link js-scroll-trigger" href="dashboard.php">Back To Dashboard</a>
          </li>
            <?php }
            else{ ?>
              <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
          </li>
          <?php } ?>
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
 <div class="container">

<div class="row">

 

  <div class="col-lg-12">

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
       
      
    </div>
    <br>
    <div class="row">
      <?php foreach($data as $index => $gadi){ ?>

      <div class="col-lg-4 col-md-6 mb-4">
        <a href="singlecar.php?v_id=<?php echo $gadi['v_id'];?>" >
        <div class="card h-100">
            <img style="height:250px;width: 348px;" class="card-img-top" src="img/vehicleimages/<?php echo $gadi['image'] ?>" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">    
            
            <?php
            $_SESSION['model']=$gadi['model']; 
            ?>
            <a href="singlecar.php?v_id=<?php echo $gadi['v_id'];?>">Model:<?php echo $gadi['model'];?> </a> 
            </h4>
            <h6>Available</h6>
          
          </div> 
          <div class="card-footer">
            <h5>Price:<?php echo $gadi['price']?></h5>
          </div>
        </div>
      </div>
      <?php } ?> 
  
    </div>
    <!-- /.row -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->
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
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
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