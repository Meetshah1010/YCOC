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
        <title>
            Cook
        </title>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet"  href="../../css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet"  href="../css/custom.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="cook.css">
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
                              <li class="nav-item" ><a class="nav-link " href="../dashboard/dashboard.php"><img src="https://img.icons8.com/metro/24/000000/dashboard.png"/> Dashboard </a></li>
                              <li class="nav-item"><a class="nav-link" href="../requests/requests.php"><img src="https://img.icons8.com/material-sharp/24/000000/code-fork.png"/> Requests </a></li>
                              <li class="nav-item"><a class="nav-link bg-danger" style="color: white;" href="../cook/cook.php"><img src="https://img.icons8.com/fluent-systems-filled/24/000000/chef-hat.png"/> Chef </a></li>
                              <li class="nav-item"><a class="nav-link" href="workreport.php"><img src="https://img.icons8.com/material-rounded/24/000000/business-report.png"/> Work Report</a></li>
                              <li class="nav-item"><a class="nav-link" href="../changepassword.php"><img src="https://img.icons8.com/android/24/000000/key.png"/>Change Password</a></li>
                              <li class="nav-item"><a class="nav-link" href="../logout.php"><img src="https://img.icons8.com/metro/24/000000/export.png"/> Log Out</a></li>
                          </ul>
                      </div>
                  </nav><!-- end side bar 1st column-->
                  <div class="col-sm-10">
			<h3 class="text-center text-white bg-dark">List of Chefs</h3>
			<?php
			$sql = "SELECT * FROM cook";
			$result = $conn->query($sql);
			if($result->num_rows > 0)
			{
				echo '<table class="table text-center">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>Cook image</th>';
							echo '<th>Cook ID</th>';
							echo '<th>Name</th>';
							echo '<th>Phone number</th>';
							echo '<th>E-mail</th>';
							echo '<th>Working area</th>';
                            echo '<th>Speciality</th>';
							echo '<th>Action</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					while($row = $result->fetch_assoc())
					{
						echo '<tr>';
						$img = "SELECT img FROM images WHERE id= {$row['cid']} ";
						$res = $conn->query($img);
						$col = $res->fetch_assoc();
						echo '<td><img style="border:1px solid black;" class="zoomA" src="data:image/jpeg;base64,'.base64_encode($col['img'] ).'" />  </td>';
							echo '<td>'.$row['cid'].'</td>';
							echo '<td>'.$row['cname'].'</td>';
							echo '<td>'.$row['cmob'].'</td>';
							echo '<td>'.$row['cemail'].'</td>';
                            echo '<td>'.$row['carea'].'</td>';
                            echo '<td>'.$row['cspec'].'</td>';
						echo '<td>';
							echo '<form action="../updatecook/cookdetails.php" method="POST" class="d-inline mr-3">';
								echo '<input type="hidden" name="id" value='.$row['cid'].'><button class="btn btn-primary"name="editt" value="Edit"><img src="https://img.icons8.com/android/24/000000/pencil.png"/>';
							echo '</form>';
							echo '<form action="" method="POST">';
								echo '<input type="hidden" name="id" value='.$row['cid'].'><button class="btn btn-dark"name="deletet" value="Delete"><img src="https://img.icons8.com/material-outlined/24/000000/delete-trash.png"/>';
							echo '</form>';
						echo '</td>';
					echo '</tbody>';
					}
				echo '</table>';
			}
			else
			{
				echo "Result 0";
			}
			if(isset($_REQUEST['deletet']))
				{	
					$sql = "DELETE FROM cook WHERE cid={$_REQUEST['id']}";
					$img = "DELETE FROM images WHERE id={$_REQUEST['id']}";
					if(($conn->query($sql)==TRUE) && ($conn->query($img)==TRUE))
					{
						echo '<meta http-equiv="referesh" content="0;URL=?deleted"/>';
					}
					else
					{
						echo '<script>window.alert("Unable to Delete")';
					}
				}
			?>
		</div>
		<!--  end 2nd column-->
	</div><!-- end row-->
</div><!--end container-->      
    </body>
</html>