<!--Server Side Scripting Language to inject login code-->
<?php
    session_start();
    include('vendor/inc/config.php');//get configuration file
    if(isset($_POST['lwr-login']))
    {
      $l_email=$_POST['l_email'];
      $l_pwd=($_POST['l_pwd']);//
      $stmt=$mysqli->prepare("SELECT l_email, l_pwd, l_id FROM tms_lawyer WHERE l_email=? and l_pwd=? ");//sql to log in lawyer
      $stmt->bind_param('ss',$l_email,$l_pwd);//bind fetched parameters
      $stmt->execute();//execute bind
      $stmt -> bind_result($l_email,$l_pwd,$l_id);//bind result
      $rs=$stmt->fetch();
      $_SESSION['l_id']=$l_id;//assaign session to lawyer id
      $_SESSION['login']=$l_email;
      $uip=$_SERVER['REMOTE_ADDR'];
      $ldate=date('d/m/Y h:i:s', time());
      if($rs) {
         header("Location: lawyer-dashboard.php");
         exit;
      }
      else
      {
        $error = "Access Denied Please Check Your Credentials";
      }
    }
?>

<!--End Server Side Script Injection-->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Split-smart|| - Lawyer Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Lawyer Login Panel</div>
      <div class="card-body">
        <!--INJECT SWEET ALERT-->
        <!--Trigger Sweet Alert-->
          <?php if(isset($error)) {?>
          <!--This code for injecting an alert-->
              <script>
                    setTimeout(function () 
                    { 
                      swal("Failed!","<?php echo $error;?>!","error");
                    },
                      100);
              </script>
                  
          <?php } ?>
        <form method ="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="l_email" id="inputEmail" class="form-control"  required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="l_pwd" id="inputPassword" class="form-control"  required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <input type="submit" name="lwr-login" class="btn btn-success btn-block" value="Login">
        </form>
        <div class="text-center">
          <a class="d-block small" href="lawyer-forgot-password.php">Forgot Password?</a>
          <a class="d-block small" href="../../index.php">Home</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>

</body>

</html>
