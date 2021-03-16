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
if(isset($_REQUEST['updatet']))
				{ 
                    $cid = $_REQUEST['cid'];
					$cname = $_REQUEST['cname'];
	        		$cmob = $_REQUEST['cmob'];
	        		$cemail = $_REQUEST['cemail'];
	        		$carea = $_REQUEST['carea'];
	        		$cspec = $_REQUEST['cspec'];
					$sql = "UPDATE cook SET cname='$cname' , cmob = '$cmob' , cemail='$cemail' , carea='$carea' , cspec='$cspec'  WHERE cid='$cid'";
				if($conn->query($sql) == TRUE)
				{
					echo '<script>window.alert("updated successfully")</script>';
					echo '<script>location.href="../cook/cook.php"</script>';
				}	
				else
				{
					echo '<script>window.alert("unable to updated")</script>';
					echo '<script>location.href="../cook/cook.php"</script>';
				}
				}
?>