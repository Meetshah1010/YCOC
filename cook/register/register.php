<?php
include('../../connection.php');
if (isset($_POST["rsignup"])) { 
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));    
    
    $crname = $_REQUEST['crname'];
	$crmob = $_REQUEST['crmob'];
	$cremail = $_REQUEST['cremail'];
	$crarea = $_REQUEST['crarea'];
	$crgender = $_REQUEST['crgender'];
	$craddress = $_REQUEST['craddress'];
	$crspec = $_REQUEST['crspec'];
	$crpass = $_REQUEST['crpass'];
	$sql = "INSERT INTO cook_request(crname,crmob,cremail,crarea,crgender,crspec,crpass,craddress) VALUES('$crname','$crmob','$cremail','$crarea','$crgender','$crspec','$crpass','$craddress')";
		if($conn->query($sql) ==TRUE)
		{
			$test = "SELECT crid FROM cook_request WHERE cremail = '$cremail'";
			$result = $conn->query($test);
			if($result->num_rows>0)
			{
				while($row = $result->fetch_assoc())
				{
					$id=$row['crid'];
					$img = "INSERT INTO images (id,img,mail) VALUES('$id','$file','$cremail')";
					if($conn->query($img)==TRUE)
					{
						echo '<script>window.alert("Successfully Registreted")</script>';
						echo '<script>location.href="../login/login.php"</script>';
					}
					else 
					{
						$delete  = "DELETE FROM cook_request WHERE cremail = '$cremail'";
						echo "Failed";
					}
				}
			}
		}
}
?>