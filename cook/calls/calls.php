<?php
include('../../connection.php');
session_start();
if(isset($_SESSION['is_cooklogin']))
{
    $cemail = $_SESSION['cemail'];
    $sql = "SELECT * FROM cook WHERE cemail = '$cemail'";
    $result = $conn->query($sql);
    $cook = $result->fetch_assoc();
    $img = "SELECT * FROM images WHERE mail='$cemail'";
    $res=$conn->query($img);
    $image=$res->fetch_assoc();
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
            </ul>
          </nav>
          <div class="container-fluid" style=""></div>
              <div class="row"><!-- start  row-->
                  <nav class="col-sm-2 sidebar" style="background-color:#D4E8FF"><!-- start side bar 1st column-->
                      <div class="sidebar-sticky">
                          <ul class="nav flex-column" style="font-weight: bold;">
                              <li class="nav-item" ><a class="nav-link" style="color: black;" href="../dashboard/dashboard.php"><img src="https://img.icons8.com/metro/24/000000/dashboard.png"/> Dashboard </a></li>
                              <li class="nav-item"><a class="nav-link" style="color: black;" href="../profile/profile.php"><img src="https://img.icons8.com/small/24/000000/gender-neutral-user.png"/> Profile </a></li>
                              <li class="nav-item"><a class="nav-link  bg-primary" 
                              style="color: white;"href="../cook/cook.php"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/chef-hat.png"/> Calls </a></li>
                              <li class="nav-item"><a class="nav-link" href="workreport.php"><img src="https://img.icons8.com/material-rounded/24/000000/business-report.png"/> Work Report</a></li>
                              <li class="nav-item"><a class="nav-link" href="../changepassword.php"><img src="https://img.icons8.com/android/24/000000/key.png"/>Change Password</a></li>
                              <li class="nav-item"><a class="nav-link"  style="color: black;" href="../logout.php"><img src="https://img.icons8.com/metro/24/000000/export.png"/> Log Out</a></li>
                          </ul>
                      </div>
                  </nav><!-- end side bar 1st column-->
                  <div class="col-sm-9">
			<?php 
				$sql = "SELECT * FROM o_details WHERE cid = $cook[cid]";
                $result=$conn->query($sql);
				if($result->num_rows > 0)
				{
					while($order = $result->fetch_assoc())
					{
						echo '<div class="card mt-5 mx-5">';
							echo '<div class="card-header">';
								echo 'Order ID:'.$order['oid'];	
							echo '</div>';
						echo '<div class="row card-body">';
						echo '<div class="col-md-9">';
							echo '<h5 class="card-text">Dish name: '.$order['dish_name'];
							echo '</h5>';
							echo '<h5 class="card-text">Call Address: '.$order['address'];
							echo '</h5>';
							echo '<h5 class="card-text">Call Date: '.$order['date'];
							echo '</h5>';
                            echo '<h5 class="card-text">Call Time: '.$order['time'];
							echo '</h5>';
                            echo '<h5 class="card-text">Customer Name: '.$order['uname'];
							echo '</h5>';
                            echo '<h5 class="card-text">Customer Contact No: '.$order['umob'];
							echo '</h5>';
						echo '</div>';
						echo '<div class="col-md-3">';
							echo '<div class="float-right">';
								echo '<form  method="POST">';
                                    echo '<input type="hidden" name="pid" value='.$order["oid"].'>';
									echo '<input type="submit" class="btn btn-primary mt-2 " value="Completed" name="completed">';  
								echo '</form>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						echo '</div>';
				}
					}
				
                else{
                    echo"<h3 style='color:red;'>There is no new requests</h3>";
                }
			?>
		</div>
        
            </div><!-- end row-->
            </div><!--end container-->
                  <script src="../../assets/js/jquery.min.js"></script>
          <script src="../../assets/js/popper.min.js"></script>
          <script src="../../assets/js/bootstrap.min.js"></script>
          <script src="../../assets/js/all.min.css"></script>
    </body>
</html>