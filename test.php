<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>testing php variable</title>
</head>
<body>

<form action="ram.php" method="post">
  <input type="text" name="fil" id="fil">
  <input type="submit" value="submit">
</form>


<?php
// $ram= "<script>document.writeln(p1);</script>";
// echo $ram;


$msg = "<script>var n=document.getElementById('fil').val; document.write(n);</script>";

echo $msg;
?>
</body>
</html>