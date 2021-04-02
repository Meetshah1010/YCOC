<!DOCTYPE html>
<html>
<head>


</head>
<body>
<?php
$name="Meet";
$id = "1";
$mail = "meetshah101020@gmail.com";
$mailbody = "Hello, ".$name." Welcome to YCOC society your Cook id is ".$id."  for log in as a cook go to this  url :  http://localhost/de/cook/login/login.php greetigs from YCOC team 😋";
echo '<script>location.href="mailto:'.$mail.'?body='.$mailbody.'&subject=jello"</script>';

?>

</body>
</html>