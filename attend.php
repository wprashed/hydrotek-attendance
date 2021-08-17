<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_user_id']) && $role!="10"){
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
  $dmc  = mysqli_real_escape_string($db->link, $_POST['dmc']);
  $floor  = mysqli_real_escape_string($db->link, $_POST['floor']);
  $worker  = mysqli_real_escape_string($db->link, $_POST['worker']);
  $comment  = mysqli_real_escape_string($db->link, $_POST['comment']);
  $user_id  = mysqli_real_escape_string($db->link, $_POST['user_id']);
  $name  = mysqli_real_escape_string($db->link, $_POST['name']);
  if($address == ''){
    $error = "Field must not be Empty !!";
  } else {
   $query = "INSERT INTO attend (locality ,city , address, state, dmc, floor, worker, comment, user_id, name) 
           Values('$locality','$city','$address','$state', '$dmc', '$floor', '$worker', '$comment', '$user_id', '$name')";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
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
                            <div class="container">

                                <h4>Hydrotek Check In System</h4>

                                <p>You can click the button below to use your current location as your check in location</p>

                                <div id="map">
                                </div>

                                <p id="current_position"></p>

                                <button id="showMe" class="btn center-align">
                                    Use My Location
                                </button>

                                <form id="billingAddress" method="POST" action="">

                                    <div id="locationList"></div>
                                    <br>

                                    <div class="input-field">
                                        <input id="address" type="hidden" name="address" readonly>
                                    </div>

                                    <div class="input-field">
                                        <input id="locality" type="hidden" name="locality" readonly>
                                    </div>

                                    <div class="input-field">
                                        <input id="city" type="hidden" name="city" readonly>
                                    </div>

                                    <div class="input-field">
                                        <input id="state" type="hidden" name="state" readonly>
                                    </div>
                                    <div class="form-group">
                                        
                                    <label for="dmc">DMC</label>
                                        <select id="dmc" name="dmc" class="form-control">
                                        <option value="" disabled selected>Choose your option</option>
                                            <option value="Admin Building">Admin Building</option>
                                            <option value="Transfer Pump Station">Transfer Pump Station</option>
                                            <option value="New DMC Abdally">New DMC Abdally</option>
                                            <option value="Transformer House">Transformer House</option>
                                            <option value="Generator Building">Generator Building</option>
                                            <option value="Substation & Plant Room">Substation & Plant Room</option>
                                            <option value="Service Reservoirs">Service Reservoirs</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        
                                    <label for="dmc">Floor</label>
                                        <select id="floor" name="floor" class="form-control">
                                        <option value="" disabled selected>Choose your option</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                    <div class="input-field">
                                        <input id="worker" type="text" name="worker">
                                        <label class="" for="worker">How Many Workers Working</label>
                                    </div>
                                    <div class="input-field">
                                        <textarea id="comment" name="comment" class="materialize-textarea"></textarea>
                                        <label for="textarea1">Comment</label>
                                    </div>
                                    <?php
                                      $db = new Database();
                                       $query = "SELECT * FROM users WHERE id=$uid";
                                       $read = $db->select($query);
                                       if ($read) {
                                      
                                       

                                    while($row = $read->fetch_assoc()){
                                    ?>
                                    <input id="name" type="hidden" name="name" value="<?php echo $row['username']; ?>">
                                    <input id="user_id" type="hidden" name="user_id" value="<?php echo $row['userid']; ?>">
                                    <?php }  ?>
                                    <?php } ?>
                                    <button id="submit" type="submit" name="submit" class="btn center-align">
                                        Check In
                                    </button>

                                </form>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2YeMKniOp8PvU2qPj99m7LTedKOEGYUM"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>