<?php 
    session_start();
    if(isset($_SESSION['user_email'])){
   header('location:allcars.php');
      } 
  if(isset($_COOKIE['remember']) && $_COOKIE['remember']==1){
    $_SESSION['user_email'] = $_COOKIE['user_email'];
    header('location:allcars.php');
  }
 ?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MotorGadi</title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.css" rel="stylesheet">
  <style>
    input[type="text"]::placeholder {

      /* Firefox, Chrome, Opera */
      text-align: center;
    }

  </style>


</head>

<body id="page-top">
   <?php 
    if (isset($_POST['search'])){
      if(isset($_POST['model']) && !empty($_POST['model'])){
      $model='';
     $model= $_POST['model'];

       header("location:allcars.php?a=$model");
     }
          else{
        $err['failed']='Enter Vehicle Model';
      }
    }
    ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img style="width: 25%" src="img/motorgadi.png" /></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Brands</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
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

  <!--Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">A complete automobile solution</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">MotorGadi helps you compare and find a car that you
            desire.</p>
             <form class="user" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>"">
              <span class="text-danger">
            <?php 
                      if(isset($err['failed'])){
                      echo $err['failed'];
                      }
                    ?>
                    <?php 
                  if(isset($_GET['noresult']) && $_GET['noresult'] ==1){
                    echo 'No Match Found';
                  }
                 ?>
              </span>
          <div class="input-group mb-3">
            
              <input type="text" name="model" class="form-control" placeholder="Search for a Car" aria-label="Username" aria-describedby="basic-addon1">
            <button name="search" class="btn btn-primary">Search</button>
          </div>
        </form>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="allcars.php">Browse Cars</a>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">We've got what you need!</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">In just a few quick steps you can see all the similar cars to yours for sale in the market today!
            Start by entering Year, Make, Model in Browse Cars Section.MotorGadi also has everything you need to boost and run your dealership
            in no time.
          </p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">At Your Service</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-car text-primary mb-4"></i>
            <h3 class="h4 mb-2">All Under One</h3>
            <p class="text-muted mb-0">Research what car model is suitable for you.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
            <h3 class="h4 mb-2">Up to Date</h3>
            <p class="text-muted mb-0">All car details are kept current to keep things fresh.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-users text-primary mb-4"></i>
            <h3 class="h4 mb-2">For Everyone</h3>
            <p class="text-muted mb-0">See our lineup of vehicles and find the one that best fits you.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-headset text-primary mb-4"></i>
            <h3 class="h4 mb-2">All in one Experience</h3>
            <p class="text-muted mb-0">Helping you with every step of your car shopping.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box">
            <img class="img-fluid first">
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box">
            <img class="img-fluid second">
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box">
            <img class="img-fluid third">
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box">
            <img class="img-fluid fourth">
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box">
            <img class="img-fluid fifth">
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box">
            <img class="img-fluid sixth">
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <!--  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4">!</h2>
      <a class="btn btn-light btn-xl" href="#">!</a>
    </div>
  </section>
-->
  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Ready to add your brand? Give us a call or send us an email and we
            will get back to you as soon as possible!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>(977)9849328271</div>
          <div>(977)9824035434</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@motorgadi.com">contact@motorgadi.com</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - MotorGadi</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>
  <script type="text/javascript">
    var first = [
      "img/portfolio/thumbnails/datsun.png",
      "img/portfolio/thumbnails/ford.png",
      "img/portfolio/thumbnails/honda.png"
    ];
    var second = [
      "img/portfolio/thumbnails/hyundai.png",
      "img/portfolio/thumbnails/jeep.png",
      "img/portfolio/thumbnails/kia.png"
    ];
    var third = [
      "img/portfolio/thumbnails/mahindra.png",
      "img/portfolio/thumbnails/mazda.png",
      "img/portfolio/thumbnails/mitsubishi.png"
    ];
    var fourth = [
      "img/portfolio/thumbnails/nissan.png",
      "img/portfolio/thumbnails/renault.png",
      "img/portfolio/thumbnails/skoda.png"
    ];
    var fifth = [
      "img/portfolio/thumbnails/ssangyong.png",
      "img/portfolio/thumbnails/subaru.png",
      "img/portfolio/thumbnails/suzuki.png"
    ];
    var sixth = [
      "img/portfolio/thumbnails/tata.png",
      "img/portfolio/thumbnails/toyota.png",
      "img/portfolio/thumbnails/volkswagen.png"
    ];
    var size = first.length;

    var u = Math.floor(size * Math.random())
    var v = Math.floor(size * Math.random())
    var w = Math.floor(size * Math.random())
    var x = Math.floor(size * Math.random())
    var y = Math.floor(size * Math.random())
    var z = Math.floor(size * Math.random())

    $('.first').attr('src', first[u]);
    $('.second').attr('src', second[v]);
    $('.third').attr('src', third[w]);
    $('.fourth').attr('src', fourth[x]);
    $('.fifth').attr('src', fifth[y]);
    $('.sixth').attr('src', sixth[z]);
  </script>

</body>

</html>