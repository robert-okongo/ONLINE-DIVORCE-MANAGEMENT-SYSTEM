<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
  //Add USer
  if(isset($_POST['update_lawyer']))
    {
            $l_id = $_GET['l_id'];
            $l_name=$_POST['l_name'];
            $l_reg_no = $_POST['l_reg_no'];
            $l_category=$_POST['l_gender'];
            //$l_dpic=$_POST['l_dpic'];
            $l_status=$_POST['l_status'];
            $v_driver=$_POST['v_driver'];
            $l_dpic=$_FILES["l_dpic"]["name"];
            move_uploaded_file($_FILES["l_dpic"]["tmp_name"],"../vendor/img/".$_FILES["l_dpic"]["name"]);
            $query="update tms_lawyer set l_name=?, l_reg_no=?, v_driver=?, l_gender=?, l_dpic=?, l_status=? where l_id = ?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssssi', $l_name, $l_reg_no, $v_driver, $l_category, $l_dpic, $l_status, $l_id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "lawyer Updated";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/head.php');?>

<body id="page-top">
 <!--Start Navigation Bar-->
  <?php include("vendor/inc/nav.php");?>
  <!--Navigation Bar-->

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("vendor/inc/sidebar.php");?>
    <!--End Sidebar-->
    <div id="content-wrapper">

      <div class="container-fluid">
      <?php if(isset($succ)) {?>
                        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Success!","<?php echo $succ;?>!","success");
                    },
                        100);
        </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Failed!","<?php echo $err;?>!","Failed");
                    },
                        100);
        </script>

        <?php } ?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">lawyers</a>
          </li>
          <li class="breadcrumb-item active">Update lawyer</li>
        </ol>
        <hr>
        <div class="card">
        <div class="card-header">
            Update lawyer
        </div>
        <div class="card-body">
          <!--Add User Form-->
          <?php
            $aid=$_GET['l_id'];
            $ret="select * from tms_lawyer where l_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
        {
        ?>
          <form method ="POST" enctype="multipart/form-data"> 
            <div class="form-group">
                <label for="exampleInputEmail1">lawyer Name</label>
                <input type="text" value="<?php echo $row->l_name;?>" required class="form-control" id="exampleInputEmail1" name="l_name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">lawyer Registration Number</label>
                <input type="text" value="<?php echo $row->l_reg_no;?>" class="form-control" id="exampleInputEmail1" name="l_reg_no">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">experience</label>
                <input type="text" value="<?php echo $row->v_driver;?>" class="form-control" id="exampleInputEmail1" name="v_driver">
            </div>
            
            <div class="form-group">
              <label for="exampleFormControlSelect1">Gender</label>
              <select class="form-control" name="l_gender" id="exampleFormControlSelect1">
                <option>Male</option>
                <option>Female</option>
                <option>Prefer not to say</option>

              </select>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">lawyer Status</label>
              <select class="form-control" name="l_status" id="exampleFormControlSelect1">
                <option>Booked</option>
                <option>Available</option>
              </select>
            </div>

            <div class="card form-group" style="width: 30rem">
            <img src="../vendor/img/<?php echo $row->l_dpic;?>" class="card-img-top" >
            <div class="card-body">
                <h5 class="card-title">lawyer Picture</h5>
                <input type="file" class="btn btn-success" id="exampleInputEmail1" name="l_dpic">
            </div>
            </div>
            <hr>
            <button type="submit" name="update_lawyer" class="btn btn-success">Update lawyer</button>
          </form>
          <!-- End Form-->
          <?php }?>
        </div>
      </div>
       
      <hr>
     

      <!-- Sticky Footer -->
      <?php include("vendor/inc/footer.php");?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-danger" href="admin-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="vendor/js/demo/datatables-demo.js"></script>
  <script src="vendor/js/demo/chart-area-demo.js"></script>
 <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>

</body>

</html>
