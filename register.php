<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<?php

      if (isset($_POST['submit'])){
        $err = [];
         $p ='';
        if(isset($_POST['name']) && !empty($_POST['name'])){
          $checkname= $_POST['name'];
    // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]{6,30}$/",$checkname)) {
            $err['name']= "Invalid Name!!";
        }
        else{
          $name= $_POST['name'];
          }
        }
        else {
          $err['abc'] = ' ';
          }

        if(isset($_POST['email']) && !empty($_POST['email'])){
          $checkemail =($_POST["email"]);
          if (!filter_var($checkemail, FILTER_VALIDATE_EMAIL)) {
            $err['email'] ='Invalid email address!!';
          }
          else{
          $email= $_POST['email'];
          }
        }
        else {
          $err['abc'] = ' ';
          }

        if(isset($_POST['phone']) && !empty($_POST['phone'])){
          $checkphone= $_POST['phone'];
          if(!preg_match("/([0-9]{2,3})([0-9]{6,})$/",$checkphone)){
            $err['phone']= "Invalid phone number!!";
          }
          else{
          $phone= $_POST['phone'];
            }
          }
        else {
          $err['abc'] = ' ';
          }
        if(isset($_POST['address']) && !empty($_POST['address'])){
             $checkaddress= $_POST['address'];
        if (!preg_match("/^[a-zA-Z ,-]{3,30}$/",$checkaddress)) {
            $err['address']= "Invalid address!!";
        }
        else{
          $address= $_POST['address'];
        }
      }
        else {
          $err['abc'] = ' ';
          }

        if(isset($_POST['username']) && !empty($_POST['username'])){
          $checkusername= $_POST['username'];
          if (!preg_match("/^\@?[a-zA-Z0-9]{6,20}$/",$checkusername)) {
            $err['username']= "Invalid Username!!";
        }
        else{
          $username= $_POST['username'];
        }
      }
        else {
          $err['abc'] = ' ';
          }

        if(isset($_POST['password']) && !empty($_POST['password'])){
          $p= $_POST['password'];
        }
        else {
          $err['abc'] = ' ';
          }
        if(isset($_POST['rpassword']) && !empty($_POST['rpassword'])){
          $rp= $_POST['rpassword'];
          if ($p===$rp) {
            $checkpassword= $_POST['password'];
            // * contain at least (1) upper case letter
           // * contain at least (1) lower case letter
           // * contain at least (1) number or special character
           // * contain at least (8) characters in length
            if (!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/",$checkpassword)){
                $err['password']= "Invalid Password formate!!";
            }
            else{
          $password=$_POST['password'];
          }
        }
        else{
          $err['matchpassword']='<p style="color:Red;font-size:15px;text-align:center;" >Password does not match';
        }
       }
        else {
          $err['abc'] = ' ';
          }   

        if (isset($err['abc'])){
             $err['error'] = '<p style="color:Red;font-size:15px;text-align:center;" >*Please fill up all information before Registering</p>';
        }      
        if (count($err) == 0) {
        $connect = new mysqli('localhost','root','','db_motorgadi');

          if($connect->connect_errno !=0){
            die('database connection error');
          }
          $sql="insert into tbl_user(name,email,phone,address,username,password) values ('$name','$email','$phone','address','$username' ,MD5('$password'))";
          $connect->query($sql);
         // session_start();
           // $_SESSION['issignup']=0;
          if($connect->affected_rows == 1 && $connect->insert_id >0){
            //$_SESSION['issignup']=1;

            header('location:login.php?message=2');
       
          }else{
            $err['failed']='<p style="color:Red;font-size:15px;text-align:center;" >Signup Failed!,Try Again.</p>';
          }
        }
      }
  ?>
  <div class="container">

     <div class="row justify-content-center ">
              <div class="col-lg-5">
                <div class="p-4 card o-hidden border-0 shadow-lg my-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
                  <?php 
                      if(isset($err['failed'])){
                      echo $err['failed'];
                      }
                    ?>
                    <?php 
                      if(isset($err['error'])){
                      echo $err['error'];
                      }
                    ?>
              <form class="user" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <div class="form-group row">
                  
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="name" placeholder="Name" name="name">
                     <span class="span_name"></span>
                     <span class="text-danger">  
                  <?php 
                      if(isset($err['name'])){
                      echo $err['name'];
                      }
                    ?>
                 </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username">
                    <span class="span_username"></span>
                     <span class="text-danger">  
                  <?php 
                      if(isset($err['username'])){
                      echo $err['username'];
                      }
                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email">
                  <span class="span_email"></span>
                  <span class="text-danger">  
                  <?php 
                      if(isset($err['email'])){
                      echo $err['email'];
                      }
                    ?>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                    
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="rpassword">
                  </div>
                   <?php 
                      if(isset($err['matchpassword'])){
                      echo $err['matchpassword'];
                      }
                    ?>
                    <span class="span_password"></span>
                    <span class="text-danger">  
                     <?php 
                      if(isset($err['password'])){
                      echo $err['password'];
                      }
                    ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="phone" placeholder="PhoneNumber" name="phone">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="address" placeholder="Address" name="address">
                     <span class="span_address"></span>
                     <span class="text-danger">  
                  <?php 
                      if(isset($err['address'])){
                      echo $err['address'];
                      }
                    ?>
                  </div>
                  <span class="span_phone"></span>
                   <span class="text-danger">  
                  <?php 
                      if(isset($err['phone'])){
                      echo $err['phone'];
                      }
                    ?>
                </div>
                <button name="submit" class="btn btn-primary btn-user btn-block">Reigster</button>
                
              </form>
              <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
                <script type="text/javascript">
                  // asynchronus javascript and xml

                  $(document).ready(function(){
                    $('#username').keyup(function(){
                      var username = $('#username').val();
                      // var username = $(this).val();
                      if (username.length <3) {
                        $('.span_username').text('Symbols are not allowed except "@"');
                        $('.span_username').css({
                          'color': '#ff0000'
                        })
                      }
                      else if(username.length <6){
                        $('.span_username').text('Atleast 6 character required');
                        $('.span_username').css({
                          'color': '#ff0000'
                        })

                      }
                       else {
                        $('.span_username').text('');
                        //ajax: if username is greater then equals to 8
                        $.ajax({
                          url:'usernamecheck.php',
                          method:'post',
                          data:{'username': username},
                          dataType:'text',
                          success:function(resp){
                            $('.span_username').text(resp);
                          }
                        });
                      }
                    })
                  });
                  $(document).ready(function(){
                    $('#name').keyup(function(){
                      var name = $('#name').val();
                      // var username = $(this).val();
                      if (name.length <3) {
                        $('.span_name').text('Only characters and whitespace are allowed.');
                        $('.span_name').css({
                          'color': '#ff0000'
                        })
                      }
                      else if(name.length <6){
                        $('.span_name').text('Atleast 6 character required');
                        $('.span_name').css({
                          'color': '#ff0000'
                        })

                      }
                       else{
                        $('.span_name').text('');
                        
                      }
                    })
                  });
                  $(document).ready(function(){
                    $('#address').keyup(function(){
                      var address = $('#address').val();
                      // var username = $(this).val();
                      if (address.length <3) {
                        $('.span_address').text('Only characters,whitespace "-" and "," are allowed.');
                        $('.span_address').css({
                          'color': '#ff0000'
                        })
                        }
                       else{
                        $('.span_address').text('');
                        
                      }
                    })
                  });
                  $(document).ready(function(){
                    $('#password').keyup(function(){
                      var password = $('#password').val();
                      // var username = $(this).val();
                      if (password.length < 2) {
                        $('.span_password').text('Atleast 1 Uppercase and Lowercase letter is Required');
                        $('.span_password').css({
                          'color': '#ff0000'
                        })
                      }
                      else if(password.length <4){
                        $('.span_password').text('Atleast 1 Number or Special character is Required');
                        $('.span_password').css({
                          'color': '#ff0000'
                        })

                      }
                      else if(password.length < 8){
                        $('.span_password').text('At least 8 characters are required');
                        $('.span_password').css({
                          'color': '#ff0000'
                        })
                      }
                       else{
                        $('.span_password').text(''); 
                      }
                    })
                  });
                  $(document).ready(function(){
                    $('#email').keyup(function(){
                      var email = $('#email').val();
                      // var username = $(this).val();
                      if (email.length < 6) {
                        $('.span_email').text('');
                        $('.span_email').css({
                          'color': '#ff0000'
                        })
                      } else {
                        $('.span_email').text('');
                        //ajax: if username is greater then equals to 8
                        $.ajax({
                          url:'emailcheck.php',
                          method:'post',
                          data:{'email': email},
                          dataType:'text',
                          success:function(resp){
                            $('.span_email').text(resp);
                          }
                        });
                      }
                    })
                  });

                   $(document).ready(function(){
                    $('#phone').keyup(function(){
                      var phone = $('#phone').val();
                      // var username = $(this).val();
                      if (phone.length < 4) {
                        $('.span_phone').text('Only Number are allowed');
                        $('.span_phone').css({
                          'color': '#ff0000'
                        })
                      } 
                      else if(phone.length < 9){
                        $('.span_phone').text('Minimum 9 digit required');
                        $('.span_phone').css({
                         'color': '#ff0000'
                        })
                      }
                     else {
                        $('.span_phone').text('');
                        
                        //ajax: if username is greater then equals to 8
                        $.ajax({
                          url:'phonecheck.php',
                          method:'post',
                          data:{'phone': phone},
                          dataType:'text',
                          success:function(resp){
                            $('.span_phone').text(resp);
                          }
                        });
                      }
                    })
                  });
                </script>

              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
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

</body>

</html>
