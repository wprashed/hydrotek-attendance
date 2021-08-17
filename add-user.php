<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_userid']) && $role!="0"){
      header('Location: ../index.php?err=2');
    }
    else{
        $uid = $_SESSION['sess_userid'];
      }
?>
<?php
include 'inc/config.php';
include 'inc/Database.php';
include_once 'dbconfig.php';
?>
<?php
  $db = new Database();
  if(isset($_POST['submit'])){
  $userid = mysqli_real_escape_string($db->link, $_POST['userid']);
  $username   = mysqli_real_escape_string($db->link, $_POST['username']);
  $password  = mysqli_real_escape_string($db->link, $_POST['password']);
  $UGroup  = mysqli_real_escape_string($db->link, $_POST['UGroup']);
  if($userid == '' || $username == '' || $city == '' ){
    $error = "Field must not be Empty !!";
  } else {
   $query = "INSERT INTO users (userid ,username , password, UGroup) 
           Values('$userid','$username','$password','$UGroup')";
  $create = $db->insert($query);
    $msg = "Successfully Submited";
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="attend.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Lougout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container py-5 my-5">
                    <div class="row">
                        <div class="col-lg-12">

                                <h4>Hydrotek Check In System</h4>

                                <form id="billingAddress" method="POST" action="">

                                    <div id="locationList"></div>
                                    <br>

                                    <div class="input-field">
                                        
                                        <input id="username" type="text" name="username">
                                        <label class="" for="username">User Full Name</label>
                                    </div>

                                    <div class="input-field">
                                        <input id="userid" type="text" name="userid">
                                        <label class="" for="userid">User Id</label>
                                    </div>

                                    <div class="input-field">
                                        <input id="password" type="password" name="password">
                                        <label class="" for="password">Password</label>
                                    </div>
                                    <input id="UGroup" type="hidden" name="UGroup" value="10">
                                    <button id="submit" type="submit" name="submit" class="btn center-align">
                                        Add Now
                                    </button>

                                </form>
                        </div>
                    </div>
                </div>

            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>