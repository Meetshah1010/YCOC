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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Requests</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet"  href="../../css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="requests.css">
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
				<li class="nav-item" ><a class="nav-link " href="../dashboard/dashboard.php"><img src="https://img.icons8.com/metro/24/000000/dashboard.png"/> Dashboard</a></li>
            	<li class="nav-item"><a class="nav-link bg-danger" href="#"><img src="https://img.icons8.com/material-sharp/24/000000/code-fork.png"/>Requests</a></li>
                <li class="nav-item"><a class="nav-link" href="../cook/cook.php"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/chef-hat.png"/> Chef </a></li>
	            <li class="nav-item"><a class="nav-link" href="workreport.php"><img src="https://img.icons8.com/material-rounded/24/000000/business-report.png"/> Work Report</a></li>
        	    <li class="nav-item"><a class="nav-link" href="../changepassword.php"><img src="https://img.icons8.com/android/24/000000/key.png"/>Change Password</a></li>
    	        <li class="nav-item"><a class="nav-link" href="../logout.php"><img src="https://img.icons8.com/metro/24/000000/export.png"/> Log Out</a></li>
				</ul>
			</div>
		</nav><!-- end side bar 1st column-->
		<!--  stare  2nd column-->
		<div class="col-sm-10">
			<?php 
				$sql = "SELECT * FROM cook_request";
				$result = $conn->query($sql);
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$imgid = $row['crid'];
						echo '<div class="card mt-5 mx-5">';
							echo '<div class="card-header">';
								echo 'Request ID:'.$row['crid'];	
							echo '</div>';
						echo '<div class="row card-body">';
						echo '<div class="col-md-9">';
							echo '<h5 class="card-text">Cook name: '.$row['crname'];
							echo '</h5>';
							echo '<h5 class="card-text">Phone number: '.$row['crmob'];
							echo '</h5>';
							echo '<h5 class="card-text">Email: '.$row['cremail'];
							echo '</h5>';
                            echo '<h5 class="card-text">Working area: '.$row['crarea'];
							echo '</h5>';
                            echo '<h5 class="card-text">Gender: '.$row['crgender'];
							echo '</h5>';
                            echo '<h5 class="card-text">Speciality: '.$row['crspec'];
							echo '</h5>';
						echo '</div>';
						echo '<div class="col-md-3">';
						$img = "SELECT * FROM images WHERE id = '$imgid' ";
						$resu = $conn->query($img);
						if($resu->num_rows > 0)
						{
							while($col = $resu->fetch_assoc())
							{
							 echo '<img style="border-radius:100px;" src="data:image/jpeg;base64,'.base64_encode($col['img'] ).'" height="200" width="200" class="img-thumnail" />  ';
							echo '<div class="float-right">';
								echo '<form  method="POST">';
                                    echo '<input type="hidden" name="crid" value='.$row["crid"].'>';
									echo '<input type="hidden" name="crname" value='.$row["crname"].'>';
									echo '<input type="hidden" name="crmob" value='.$row["crmob"].'>';
                                    echo '<input type="hidden" name="cremail" value='.$row["cremail"].'>';
                                    echo '<input type="hidden" name="crarea" value='.$row["crarea"].'>';
									echo '<input type="hidden" name="craddress" value='.$row["craddress"].'>';
                                    echo '<input type="hidden" name="crgender" value='.$row["crgender"].'>';
                                    echo '<input type="hidden" name="crspec" value='.$row["crspec"].'>';
                                    echo '<input type="hidden" name="crpass" value='.$row["crpass"].'>';
									echo '<input type="submit" class="btn btn-danger mt-2 " value="Accept" name="Accept">'; 
									echo '<input type="submit" class="btn btn-dark mt-2 ml-2 mr-5" value="Delete" name="Delete">'; 
								echo '</form>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						echo '</div>';
					}
				}
				
					}
				}
                else{
                    echo"<h3 style='color:red;'>There is no new requests</h3>";
                }
			?>
		</div>
			</div>
		<!--  end  2nd column-->
		<?php
		if(isset($_POST['Accept']))
		{  
			$cid = $_REQUEST['crid'];
			$cname = $_REQUEST['crname'];
	        $cmob = $_REQUEST['crmob'];
	        $cemail = $_REQUEST['cremail'];
	        $carea = $_REQUEST['crarea'];
			$caddress = $_REQUEST['craddress'];
	        $cgender = $_REQUEST['crgender'];
	        $cspec = $_REQUEST['crspec'];
	        $cpass = $_REQUEST['crpass'];
		    $sql = "INSERT INTO cook(cname,cmob,cemail,carea,cgender,cspec,cpass,caddress) VALUES('$cname','$cmob','$cemail','$carea','$cgender','$cspec','$cpass','$caddress')";
		if($conn->query($sql)==TRUE)
		{
			$test = "SELECT cid FROM cook WHERE cemail='$cemail'";
			$result = $conn->query($test);
			if($result->num_rows>0)
			{
				while($col= $result->fetch_assoc())
				{
					$cid=$col['cid'];
					$test2="UPDATE images SET id = '$cid' WHERE mail = '$cemail'";
					if($conn->query($test2)==TRUE)
					{
						$del = "DELETE FROM cook_request WHERE crid = {$_REQUEST['crid']}";
						if($conn->query($del)==TRUE)
						{

							echo "<script>window.alert('Inserted successfully all');</script>";
						}
						else
						{
							echo "<script>window.alert('Inserted successfully but problem in set imageid')</script>";
						}
					}
					
				}
			}
		}else{
			echo "failed";
		}

		}
		if(isset($_REQUEST['Delete']))
		{
			$del = "DELETE FROM cook_request WHERE crid = {$_REQUEST['crid']}";
			$delimg = "DELETE FROM images WHERE id = {$_REQUEST['crid']} ";
			if(($conn->query($del)==TRUE) && ($conn->query($delimg)==TRUE))
			{
			echo '<meta http-equiv="refersh" content = "0;URL=?closed"/>';
			}
			else
			{
				echo "<script>window.alert('Unable to delete!')</script>";
			}
		} 
		
		?>
		
	</div><!-- end row-->
</div><!--end container-->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.css"></script>
</body>
</html>