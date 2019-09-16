<?php
include 'db_connection.php';
$conn = OpenCon();
 $sql="SELECT v_id,image,model,price,type,power,year,status FROM `tbl_vehicle` WHERE 1";
    $result = $conn->query($sql);
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php"><img style="width: 25%" src="img/motorgadi.png" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

 <!-- Page Content -->
 <div class="container">

<div class="row">

  <div class="col-lg-3">

    <h1 class="my-4">Shop Name</h1>
    <div class="list-group">
      <a href="#" class="list-group-item">Category 1</a>
      <a href="#" class="list-group-item">Category 2</a>
      <a href="#" class="list-group-item">Category 3</a>
    </div>

  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
       
      
    </div>

    <div class="row">
      <?php foreach($data as $index => $gadi){ ?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="img/vehicleimages/<?php echo $gadi['image'] ?>" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">    
            
            <?php
            $_SESSION['model']=$gadi['model']; 
            ?>
            <a href="singlecar.php?v_id=<?php echo $gadi['v_id'];?>"> <?php echo $gadi['model'];?> </a> 
            </h4>
            <h5><?php echo $gadi['price']?></h5>
            <p class="card-text">Brand</p>
          </div>
          
          <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
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