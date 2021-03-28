<?php
include('../../connection.php');
session_start();
if(isset($_SESSION['is_cooklogin']))
{
    $cemail = $_SESSION['cemail'];
}
else
{
    echo "<script> location.href='../login/login.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cook Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet"  href="../../assets/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet"  href="../../assets/css/custom.css">
	<link rel="stylesheet" href="updatecook.css">
	<script src="updatecook.js"></script>
</head>
<body>
<div class="container" style="margin-top: 10px;"></div>
<div class="row justify-content-center align-items-center">
		<div class="col-sm-5 jumbotron ">
			<h3 class="text-center">Chef Details</h3>
			<?php
			if(isset($_REQUEST['editc']))
			{ 	
				
				$sql = "SELECT * FROM cook WHERE cid = {$_REQUEST['id']}";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();	
				$img = "SELECT img FROM images WHERE id= {$_REQUEST['id']} ";
				$res = $conn->query($img);
				$col = $res->fetch_assoc();
				echo '<img style="border-radius:100px;" src="data:image/jpeg;base64,'.base64_encode($col['img'] ).'" height="200" width="200" class="img-thumnail" />  ';
			}
	?>
			<form action="updatecook.php" method="POST">
				<div>
					<label>Cook ID</label><br>
					<input type="text" name="cid" id="cid" class="form-control"  value="<?php if(isset($row['cid'])) echo $row['cid'];?>" readonly>
				</div>
				<div>
					<label>Name</label><br>
					<input type="text" name="cname" id="cname" class="form-control" required value="<?php if(isset($row['cname'])) echo $row['cname'];?>">
				</div>
				<div>
					<label>Number</label><br>
					<input type="text" name="cmob" id="cmob" onchange="varifymob()" class="form-control" required value="<?php if(isset($row['cmob'])) echo $row['cmob'];?>">
				</div>
				<div>
					<label>E-mail</label><br>
					<input type="email" name="cemail" id="cemail" class="form-control" required value="<?php if(isset($row['cemail'])) echo $row['cemail'];?>">
				</div>
				<div>
					<label>Working Area</label><br>
					<input type="text" name="carea" id="carea" class="form-control" required value="<?php if(isset($row['carea'])) echo $row['carea'];?>">
				</div>
				<div>
					<label>Address</label><br>
					<input type="text" name="carea" id="carea" class="form-control" required value="<?php if(isset($row['caddress'])) echo $row['carea'];?>">
				</div>
				<div>
					<label>Speciality</label><br>
					<input type="text" name="cspec" class="form-control" required value="<?php if(isset($row['cspec'])) echo $row['cspec'];?>">
				</div>
				<div class="mt-3">
					<button type="submit" class="btn btn-danger mr-3"  name="updatet" id="updatet">Update</button>
					<a href="../profile/profile.php" class="btn btn-dark">Close</a>
				</div>
			</form>
		</div>
		
		</div><!-- end row-->
		</div>
		</div><!-- end row-->
</div><!--end container-->
</body>
</html>