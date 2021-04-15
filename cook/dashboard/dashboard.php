<?php
include('../../connection.php');
session_start();
if(isset($_SESSION['is_cooklogin']))
{
    $cemail = $_SESSION['cemail'];
    $sql = "SELECT * FROM cook WHERE cemail = '$cemail'";
    $result = $conn->query($sql);
    $cook = $result->fetch_assoc();
    $cid = $cook['cid'];
    $cavailablity = $cook['available'];
    $img = "SELECT * FROM images WHERE mail='$cemail'";
    $res=$conn->query($img);
    $image=$res->fetch_assoc();
    $sql = "SELECT * FROM o_details WHERE cid = $cook[cid] AND completed = '0'";
    $resultorder=$conn->query($sql);
    $number = $resultorder->num_rows;
    $sql = "SELECT * FROM o_details WHERE cid = $cook[cid] AND completed = '1'";
    $result=$conn->query($sql);
    $completedorder = $result->num_rows;
}
else
{
    echo "<script> location.href='../login/login.php'</script>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Cook Panel
        </title>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="10">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet"  href="../../assets/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet"  href="../assets/css/custom.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="dashboard.css">
    </head> 
    <body>
        <nav class="navbar navbar-expand-lg " style="background-color:#22AFF1">
            <a class="navbar-brand" style="color:black;" href="../../landing/landing.html"><b>YCOC</b></a>
            <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
                <?php
                    echo '<img  style="border: 1px solid; border-radius:30px; white;height:50px;width:50px;" class="zoomA" src="data:image/jpeg;base64,'.base64_encode($image['img'] ).'" />';
                ?>
                </li>
                <li class="nav-item">
                <?php
                    echo '<a class="nav-link ml-1" href="../profile/profile.php" style="color:black;"><b> Hello, '.$cook['cname'].'</b></p>';
                ?>
                </li>
                <li class="nav-item">
                <?php
                date_default_timezone_set('Asia/Kolkata');
                    $current_hour = date("H");
                    $current_date = date("d");
                    if($resultorder->num_rows>0){
                        while($order = $resultorder->fetch_assoc())
                        {
                            $string = $order['date'];
                            $date = DateTime::createFromFormat("Y-m-d", $string);
                            $order_date = $date->format("d");
                            if($order_date==$current_date)
                            {   
                                $string2=strtotime($order['time']);
                                $order_time =  date('H',$string2);
                                $spare_time = $order_time-$current_hour;
                                if($spare_time<=1 && $spare_time>=0)
                                {
                                    $sql = "UPDATE `cook` SET `available` = '1' WHERE `cook`.`cid` = '$cid'";
                                    if($conn->query($sql)==TRUE)
                                    {
                                        
                                        $oid = $order['oid'];
                                    }
                                    else{
                                        echo "";
                                    }
                                }
                                else
                                {
                                    $sql = "UPDATE `cook` SET `available` = '0' WHERE `cook`.`cid` = '$cid'";
                                    if($conn->query($sql)==TRUE)
                                    {
                                        echo "";
                                        break;
                                    }
                                    else{
                                        echo "";
                                    }

                                }
                            }
                            else
                            {
                                
                            }
                        }
                    }
                    if($cavailablity==0)
                    {
                        echo '<p>You are Free</p>';
                    }
                    else{
                        echo '<p style="color:red;font-weight:bold;">You have to  order '.$oid.' </p>';
                    }
                ?>
                </li>
            </ul>
          </nav>
          <?php
          /*
          date_default_timezone_set('Asia/Kolkata');
          $current_month = date("m");
          $current_year = date("Y");
          echo $current_year;
          echo $current_month;
          $sql = "SELECT join_time FROM cook WHERE cid = '$cid'";
          $result=$conn->query($sql);
          $jdate = $result->fetch_assoc();
          $dateValue = DateTime::createFromFormat('Y-m-d',$jdate); 
          $yr = date("Y", $dateValue); 
          echo $yr;*/
          ?>
          <div class="container-fluid" style=""></div>
              <div class="row"><!-- start  row-->
                  <nav class="col-sm-2 sidebar" style="background-color:#D4E8FF"><!-- start side bar 1st column-->
                      <div class="sidebar-sticky">
                          <ul class="nav flex-column" style="font-weight: bold;">
                              <li class="nav-item" ><a class="nav-link bg-primary" style="color: white;" href="dashboard.php"><img src="https://img.icons8.com/metro/24/000000/dashboard.png"/> Dashboard </a></li>
                              <li class="nav-item"><a class="nav-link" style="color: black;" href="../profile/profile.php"><img src="https://img.icons8.com/small/24/000000/gender-neutral-user.png"/> Profile </a></li>
                              <li class="nav-item"><a class="nav-link" style="color:black;" href="../calls/calls.php"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/chef-hat.png"/> Calls </a></li>
                              <li class="nav-item"><a class="nav-link" href="workreport.php"><img src="https://img.icons8.com/material-rounded/24/000000/business-report.png"/> Work Report</a></li>
                              <li class="nav-item"><a class="nav-link" href="../changepassword.php"><img src="https://img.icons8.com/android/24/000000/key.png"/>Change Password</a></li>
                              <li class="nav-item"><a class="nav-link"  style="color: black;" href="../logout.php"><img src="https://img.icons8.com/metro/24/000000/export.png"/> Log Out</a></li>
                          </ul>
                      </div>
                  </nav><!-- end side bar 1st column-->
                  <div class="col-sm-9"><!-- start od dashboard-->
                      <div class="row text-center mx-5">
                          <div class="col-sm-4">
                              <div class="card text-white bg-warning mb-3">
                                  <div class="card-header"> Notifications </div>
                                  <div class="card-body"></div>
                                  <h4 class="card-title"><?php
                                  echo $number;
                                  ?></h4>
                                  <a class="btn text-white" href="../calls/calls.php">View</a>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <div class="card text-white bg-success mb-3">
                                  <div class="card-header">No. of Success Orders</div>
                                  <div class="card-body"></div>
                                  <h4 class="card-title"><?php echo $completedorder?></h4>
                                  <a class="btn text-white" href="../cook/cook.php">View</a>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <div class="card text-white bg-info mb-3">
                                  <div class="card-header">Happy months with YCOC</div>
                                  <div class="card-body"></div>
                                  <h4 class="card-title"><?php echo '2'?></h4>
                                  <a class="btn text-white" href="workorder.php">View</a>
                              </div>
                          </div>
                      </div>	
                      <div class="mx-5 mt-5 text-center">
                          <p class="bg-dark text-white">List of Calls</p>
                          <?php
                          if($resultorder->num_rows>0)
                          {
                            echo'<table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Dish Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Call Date</th>
                                    <th scope="col">Call Time</th>
                                </tr>
                            </thead>
                            <tbody>';
                            $sql = "SELECT * FROM o_details WHERE cid = $cook[cid]";
                            $result=$conn->query($sql);
                            while ($order = $result->fetch_assoc())
                             {
                            echo'<tr>';
                                    echo '<td>'.$order["oid"].'</td>';
                                    echo '<td>'.$order["dish_name"].'</td>';
                                    echo '<td>'.$order["address"].'</td>';
                                    echo '<td>'.$order["date"].'</td>';
                                    echo '<td>'.$order["time"].'</td>';
                            echo'</tr>';
                            }
                            echo '</tbody>
                        </table>';
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
          <script src="../../assets/js/jquery.min.js"></script>
          <script src="../../assets/js/popper.min.js"></script>
          <script src="../../assets/js/bootstrap.min.js"></script>
          <script src="../../assets/js/all.min.css"></script>
    </body>
</html>