<?php
include('../../connection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
	$aemail = $_SESSION['aemail'];
} else {
	echo "<script> location.href='../login/login.php'</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>
		Work Report
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/css/custom.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" href="../cook/cook.css">
</head>
<script>
    <link rel="stylesheet" href="dashboard.css">
    </head> 
    <script>
    function print(){
        var prtContent = document.getElementById("print");
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
    }
    </script>
<body>
	<nav class="navbar navbar-expand-lg">
		<a class="navbar-brand" style="color:white;" href="../../landing/landing.html">YCOC</a>
	</nav>
	<!-- start container -->
	<div class="container-fluid" style="margin-top: 40px;"></div>
	<div class="row">
		<!-- start  row-->
		<nav class="col-sm-2 bg-light sidebar py-2"><!-- start side bar 1st column-->
                      <div class="sidebar-sticky">
                          <ul class="nav flex-column" style="font-weight: bold;">
                              <li class="nav-item" ><a class="nav-link " style="color:black;" href="../dashboard/dashboard.php"><img src="https://img.icons8.com/metro/24/000000/dashboard.png"/> Dashboard </a></li>
                              <li class="nav-item"><a class="nav-link" style="color:black;" href="../requests/requests.php"><img src="https://img.icons8.com/material-sharp/24/000000/code-fork.png"/> Requests </a></li>
                              <li class="nav-item"><a class="nav-link" style="color:black;" href="../cook/cook.php"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/chef-hat.png"/> Chef </a></li>
                              <li class="nav-item"><a class="nav-link" style="color:black;" href="../dishesh/dish.php"><img src="https://img.icons8.com/wired/24/000000/paella.png"/> Dishesh </a></li>
                              <li class="nav-item"><a class="nav-link bg-danger" style="color: white;" href="../workreport/workreport.php"><img src="https://img.icons8.com/material-rounded/24/000000/business-report.png"/> Work Report</a></li>
                              <li class="nav-item"><a class="nav-link" style="color:black;" href="../changepassword.php"><img src="https://img.icons8.com/android/24/000000/key.png"/>Change Password</a></li>
                              <li class="nav-item"><a class="nav-link" style="color:black;" href="../logout.php"><img src="https://img.icons8.com/metro/24/000000/export.png"/> Log Out</a></li>
                          </ul>
                      </div>
                  </nav><!-- end side bar 1st column-->
                  <div class="col-sm-9 col-md-9 text-center">
                  <form action="" method="POST" class="d-print-none">
				<div class="form-row">
					<div class="form-group col-md-3">
						<input type="date" name="startdate" class="form-control" id="startdate">
					</div><span> to </span>
					<div class="form-group col-md-3">
						<input type="date" name="enddate" class="form-control" id="enddate">
					</div>
					<div class="form-group col-md-3">
						<input type="submit" name="searchsubmit" class="btn btn-secondary" value="Search">
					</div>
				</div>
			</form>
            <div id = "print">
            <?php
			if(isset($_REQUEST['searchsubmit']))
			{
					$startdate = $_REQUEST['startdate'];
					$enddate = $_REQUEST['enddate'];
					$sql = "SELECT * FROM o_details WHERE `date` BETWEEN '$startdate' AND '$enddate' AND completed='1'";
					$result = $conn->query($sql);
					if($result->num_rows > 0)
					{
                        echo '<p class="bg-dark text-white">Details</p>';
						echo '<table class="table">';
							echo '<thead>';
								echo '<tr>';
									echo '<th scope="col">Order ID</th>';
									echo '<th scope="col">Dish Name</th>';
                                    echo '<th scope="col">User Id</th>';
									echo '<th scope="col">Date</th>';
									echo '<th scope="col">Time</th>';
                                    echo '<th scope="col">Cook Id</th>';
                                    echo '<th scope="col">Cook Name</th>';
									echo '<th scope="col">Ratings</th>';
									echo '<th scope="col">Address</th>';
								echo '</tr>';
							echo '</thead>';
							echo '<tbody>';
							while($row=$result->fetch_assoc())
							{
								echo '<tr>';
									echo '<td>'.$row['oid'].'</td>';
									echo '<td>'.$row['dish_name'].'</td>';
                                    echo '<td>'.$row['uid'].'</td>';
									echo '<td>'.$row['date'].'</td>';
									echo '<td>'.$row['time'].'</td>';
                                    echo '<td>'.$row['cid'].'</td>';
                                    echo '<td>'.$row['cname'].'</td>';
									echo '<td>'.$row['ratings'].'</td>';
									echo '<td>'.$row['address'].'</td>';
								echo '</tr>';
							}
							echo '<tr>';
								echo '<td>';
									echo '<button  class="btn btn-danger d-print-none" onClick="print()">Print</button>';
								echo '</td>';
							echo '</tr>';
							echo '</tbody>';
						echo '</table>';
					}
					else
					{
						echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>No Resords Found</div>";
					}
			}
			?>
            </div>
            </div>
                  </div><!-- end row-->
	</div>
	<!--end container-->
</body>

</html>