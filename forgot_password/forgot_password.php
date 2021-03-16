<?php
include('../connection.php');
if(isset($_POST['submit']))
{
    $rmob = $_POST['rmob'];
    $result = mysqli_query($conn,"SELECT * FROM register where rmob='" . $_POST['rmob'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetchrmob=$row['rmob'];
	$email_id=$row['remail'];
	$rpass=$row['rpass'];
	if($rmob==$fetchrmob) {
				$to = $email_id;
                $subject = "Password";
                $txt = "Your password is : $rpass.";
                $headers = "From: mshah5225@gmail.com" . "\r\n" .
                "CC: .$remail.";
                mail($to,$subject,$txt,$headers);
			}
				else{
					echo 'invalid userid';
				}
}
?>