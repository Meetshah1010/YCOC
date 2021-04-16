<?php
include('../../connection.php');
session_start();
if(isset($_SESSION['is_adminlogin']))
{
    $aemail = $_SESSION['aemail'];
}
else
{
    echo "<script> location.href='../login/login.php'</script>";
}
$sql = "SELECT * FROM dish_data";
$result = $conn->query($sql);
$dish = $result->num_rows;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            admin
        </title>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="60">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet"  href="../../assets/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet"  href="../assets/css/custom.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="../dashboard/dashboard.css">
    </head> 
    <body>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" style="color:white;" href="../../landing/landing.html">YCOC</a>
          </nav>
          <!-- start container -->
          <div class="container-fluid" style="margin-top: 40px;"></div>
              <div class="row"><!-- start  row-->
              <nav class="col-sm-2 bg-light sidebar py-2"><!-- start side bar 1st column-->
                      <div class="sidebar-sticky">
                          <ul class="nav flex-column" style="font-weight: bold;">
                              <li class="nav-item" ><a class="nav-link " style="color:black;" href="../dashboard/dashboard.php"><img src="https://img.icons8.com/metro/24/000000/dashboard.png"/> Dashboard </a></li>
                              <li class="nav-item"><a class="nav-link" style="color:black;" href="../requests/requests.php"><img src="https://img.icons8.com/material-sharp/24/000000/code-fork.png"/> Requests </a></li>
                              <li class="nav-item"><a class="nav-link " style="color:black;" href="../cook/cook.php"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/chef-hat.png"/> Chef </a></li>
                              <li class="nav-item"><a class="nav-link bg-danger" style="color: white;" style="color:black;" href="../dishesh/dish.php"><img src="https://img.icons8.com/wired/24/000000/paella.png"/> Dishesh </a></li>
                              <li class="nav-item"><a class="nav-link " style="color:black;" href="../workreport/workreport.php"><img src="https://img.icons8.com/material-rounded/24/000000/business-report.png"/> Work Report</a></li>
                              <li class="nav-item"><a class="nav-link" style="color:black;" href="../changepassword.php"><img src="https://img.icons8.com/android/24/000000/key.png"/>Change Password</a></li>
                              <li class="nav-item"><a class="nav-link" style="color:black;" href="../logout.php"><img src="https://img.icons8.com/metro/24/000000/export.png"/> Log Out</a></li>
                          </ul>
                      </div>
                  </nav><!-- end side bar 1st column-->
                  <div class="col-sm-9 col-md-10"><!-- start od dashboard-->
                      <?php
                          $sql = "SELECT * FROM dish_data ";
                          $result = $conn->query($sql);
                          if($result->num_rows > 0)
                          {
                              echo'<table class="table">
                                  <thead>
                                      <tr>
                                          <th scope="col">Dish ID</th>
                                          <th scope="col">Dish Name</th>
                                          <th scope="col">Price</th>
                                          <th scope="col">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>';
                                  while ($row = $result->fetch_assoc())
                                   {
                                  echo'<tr>';
                                          echo '<td>'.$row["dish_id"].'</td>';
                                          echo '<td>'.$row["dish_name"].'</td>';
                                          echo '<td>'.$row["dish_price"].'</td>';
                                          echo '<td></td>';
                                  echo'</tr>';
                                  }
                                  echo '</tbody>
                              </table>';
                              echo '<a class="primary" href="#" data-toggle="modal" data-target="#exampleModal"><img style="float:right;" src="https://img.icons8.com/pastel-glyph/64/000000/plus--v1.png"/></a>';
                          }
                          else
                          {
                              echo '0 Results'; 
                          }
                      ?>
                      </div>		
                  </div>
                  <!--  end profile area 2nd column-->
              </div><!-- end row-->
          </div><!--end container-->   
          <!-- modal dialogbox -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add the Dish</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label class="control-label">Dish Name</label>
                            <input required type="text" class="form-control input-lg" name="dname">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Price</label>
                            <input required type="text" class="form-control input-lg" name="dprice">
                    </div>
                    <div class="form-group">
                        <button  name="add" type="submit">Add</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      if(isset($_REQUEST['add']))
      {
        $dname = $_REQUEST['dname'];  
        $dprice = $_REQUEST['dprice'];
        $sql ="INSERT INTO `dish_data` ( `dish_name`, `dish_price`) VALUES ('$dname', '$dprice');";
          if($conn->query($sql)==TRUE)
          {
            echo '<meta http-equiv="refresh" content="0">';
          }
          else{
              echo '<script>window.alert("Unable to update")</script>';
          }
      }
      ?>
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>
          <script src="../../assets/js/jquery.min.js"></script>
          <script src="../../assets/js/popper.min.js"></script>
          <script src="../../assets/js/bootstrap.min.js"></script>
          <script src="../../assets/js/all.min.css"></script>
    </body>
</html>