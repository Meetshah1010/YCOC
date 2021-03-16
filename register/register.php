<?php
include('../connection.php');
if(isset($_REQUEST['rsignup']))
{
	
	$rname = $_REQUEST['rname'];
    $remail = $_REQUEST['remail'];
    $rmob = $_REQUEST['rmob'];
    $rlandmark = $_REQUEST['rlandmark'];
	$rpass  = $_REQUEST['rpass'];
	$check = "SELECT remail FROM register WHERE remail = '$remail'";
	$res = $conn->query($check);
	if($res->num_rows!=0)
	{
		echo "<script>window.alert('Sorry! Email id is already registreted');</script>";
		echo "<script>location.href='../index/index.html';</script>";
	}
	else
	{

		$sql = "INSERT INTO register(rname,remail,rmob,rlandmark,rpass) VALUES('$rname','$remail','$rmob','$rlandmark',
		'$rpass')";
		if($conn->query($sql)==TRUE)
		{
			
			echo "<script>location.href='../index/index.html';</script>";
		}
		else
		{
			echo "<script>window.alert('Sorry ! We are unable to accept your request');</script>";
		}
	}
}
?>