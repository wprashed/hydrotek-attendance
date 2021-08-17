<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_user_id']) && $role!="0"){
      header('Location: ../index.php?err=2');
    }
    else{
        $uid = $_SESSION['sess_user_id'];
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
  $address = mysqli_real_escape_string($db->link, $_POST['address']);
  $locality   = mysqli_real_escape_string($db->link, $_POST['locality']);
  $city  = mysqli_real_escape_string($db->link, $_POST['city']);
  $state  = mysqli_real_escape_string($db->link, $_POST['state']);
  $user_id  = mysqli_real_escape_string($db->link, $_POST['user_id']);
  $name  = mysqli_real_escape_string($db->link, $_POST['name']);
  if($address == '' || $locality == '' || $city == '' || $state == '' ){
    $error = "Field must not be Empty !!";
  } else {
   $query = "INSERT INTO attend (locality ,city , address, state, user_id, name) 
           Values('$locality','$city','$address','$state', '$user_id', '$name')";
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
                        <a class="nav-link" href="admin.php">
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

                            <h4 class="mb-4">Hydrotek Check In System</h4>
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Address</th>
                                            <th>DMC</th>
                                            <th>Floor</th>
                                            <th>Workers</th>
                                            <th>Comment</th>
                                            <th>Name</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Address</th>
                                            <th>DMC</th>
                                            <th>Floor</th>
                                            <th>Workers</th>
                                            <th>Comment</th>
                                            <th>Name</th>
                                            <th>Time</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                      $db = new Database();
                                       $query = "SELECT * FROM attend ORDER BY id DESC";
                                       $read = $db->select($query);
                                       if ($read) {
                                      
                                       

                                    while($row = $read->fetch_assoc()){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['dmc']; ?></td>
                                            <td><?php echo $row['floor']; ?></td>
                                            <td><?php echo $row['worker']; ?></td>
                                            <td><?php echo $row['comment']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['time']; ?></td>
                                        </tr>
                                        <?php }  ?>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>  
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