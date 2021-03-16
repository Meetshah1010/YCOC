<?php
include('../connection.php');
session_start();
if(isset($_SESSION['is_adminlogin']))
{
	$aemail = $_SESSION['aemail'];
}
else
{
	echo "<script> location.href='login/login.php'</script>";
}
$aemial = $_SESSION['aemail'];
if(isset($_REQUEST['update']))
{
	if($_REQUEST['apass'] == "")
	{
		$msg = '<div class="alert alert-warning col-sm-6 mt-3" role="alert">All fields are required</div>';
	}
	else
	{
	$rpass = $_REQUEST['apass'];
	$sql = "UPDATE adminlogin SET apass = '$rpass' WHERE  aemail  = '$aemial'";
		if($conn->query($sql) == TRUE)
		{
			$msg = '<div class="alert alert-success col-sm-6 mt-3"role="alert">Successfully updated </div>';
			echo '<script>location.href="login/login.php"</script>';
			session_destroy();
		}
		else
		{
			$msg = '<div class="alert alert-danger col-sm-6 mt-3"role="alert">Unable to  updated </div>';	
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet"  href="../css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
	<link rel="stylesheet"  href="../css/custom.css">
    <link rel="stylesheet" href="dashboard/dashboard.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" style="color:white;" href="../landing/landing.html">YCOC</a>
</nav>
<!-- start container -->
<div class="container-fluid" style="margin-top: 40px;"></div>
	<div class="row"><!-- start  row-->
		<nav class="col-sm-2 bg-light sidebar py-2"><!-- start side bar 1st column-->
			<div class="sidebar-sticky">
            <ul class="nav flex-column" style="font-weight: bold;">
                              <li class="nav-item" ><a class="nav-link" href="dashboard/dashboard.php"><img src="https://img.icons8.com/metro/24/000000/dashboard.png"/> Dashboard </a></li>
                              <li class="nav-item"><a class="nav-link" href="requests/requests.php"><img src="https://img.icons8.com/material-sharp/24/000000/code-fork.png"/> Requests </a></li>
                              <li class="nav-item"><a class="nav-link" href="cook/cook.php"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/chef-hat.png"/> Chef </a></li>
                              <li class="nav-item"><a class="nav-link" href="workreport.php"><img src="https://img.icons8.com/material-rounded/24/000000/business-report.png"/> Work Report</a></li>
                              <li class="nav-item"><a class="nav-link bg-danger" style="color: white;" href="#"><img src="https://img.icons8.com/android/24/000000/key.png"/>Change Password</a></li>
                              <li class="nav-item"><a class="nav-link" href="logout.php"><img src="https://img.icons8.com/metro/24/000000/export.png"/> Log Out</a></li>
                          </ul>
			</div>
		</nav><!-- end side bar 1st column-->
		<div class="col-sm-6"><!--  end profile area 2nd column-->
			<form action="" method="POST" style="margin-top: 2;" class="mx-5">
				<div class="form-group">
					<label>E-mail</label><br>
					<input type="email" name="aemail"  class="form-control" value="<?php echo $aemail ?>" readonly>
				</div>
				<div class="form-group">
					<label>New Password</label><br>
					<input type="password" name="apass" class="form-control" placeholder="New Password">
				</div>
				<button type="submit" name="update" class="btn btn-danger" >Update</button>
				<button class="btn btn-dark" type="submit" style="margin-left: 10px;">Reset</button>
				<?php 
				if(isset($msg))
				{
					echo $msg;
				}
				?>
			</form>

		</div>

	</div><!-- end row-->
</div><!--end container-->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.css"></script>
</body>
</html>