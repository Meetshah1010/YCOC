<?php 
include('../../connection.php');
session_start();
/*
$remail =   $_SESSION["remail"] ;
$sql = "SELECT rname,remail FROM register WHERE remail = '$remail'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$rname = $row['rname']; */
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Responsive Sticky Navbar</title>
	  <link rel="stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"integrity= "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"crossorigin="anonymous"> 
      <link rel="stylesheet" href="profile.css">
	  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;700&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <!-- bootstrap 5 css -->
	  <link rel="stylesheet"  href="../../css/bootstrap.min.css">
    <!-- BOX ICONS CSS-->
    <link
      href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css"
      rel="stylesheet"
    />
	<script src="profile.js"></script>
    <body>
	<!--Navbar-->
<nav class="navbar navbar-light amber lighten-4 mb-4">

<!-- Navbar brand -->
<a class="navbar-brand" href="#">Navbar</a>

<!-- Collapse button -->
<button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
  aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
  <div class="animated-icon1"><span></span><span></span><span></span></div>
</button>

<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="navbarSupportedContent20">

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
	<li class="nav-item active">
	  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="#">Features</a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="#">Pricing</a>
	</li>
  </ul>
  <!-- Links -->

</div>
<!-- Collapsible content -->

</nav>
<!--/.Navbar-->


    
	<section class="section-intro"> 
		<header> 
			<h1>YCOC</h1> 
		</header> 
		<div class="link-to-book-wrapper"> 
			<a class="link-to-book"
				href="#reservations">View Menu</a> 
		</div> 
	</section> 

	<section class="about-section"> 
		<article> 
			<h3> 
			</h3> 

			<p> We enable people to enjoy healthy <br>and tasty food that are resonable price.<br>WE belive good food offer great smile.<br>
				so,food the most precious thing ever.
			</p> 
		</article> 
	</section> 

	<!-- carousel section -->
	<div id="carouselExampleControls"
		class="carousel slide" data-ride="carousel"> 
		<div class="carousel-inner"> 
			<div class="carousel-item active"> 
				<img src="../../images/dish 1.jpg"
					class="d-block w-100" alt="food"> 
			</div> 
			<div class="carousel-item"> 
				<img src="../../images/dish 2.jpg"
					class="d-block w-100" alt="food"> 
			</div> 
			<div class="carousel-item"> 
				<img src="../../images/dish 3.jpg"
					class="d-block w-100" alt="food"> 
			</div> 
		</div> 
		<a class="carousel-control-prev"
			href="#carouselExampleControls"
			role="button" data-slide="prev"> 
			<span class="carousel-control-prev-icon"
				aria-hidden="true"> 
			</span> 
			<span class="sr-only">Previous</span> 
		</a> 
		<a class="carousel-control-next"
			href="#carouselExampleControls"
			role="button" data-slide="next"> 
			<span class="carousel-control-next-icon"
				aria-hidden="false"> 
			</span> 
			<span class="sr-only">Next</span> 
		</a> 
	</div> 

	<div class="container"> 
		<div class="row-flex"> 
			<div class="flex-column-form"> 
				<h3> 
					Hire Cook 
				</h3> 
				<form class="media-centered"> 
					<div class="form-group"> 
						<p> 
							Please leave your number we will 
							message and conform you. 
						</p> 
						
						<input type="name" class="form-control"
							id="exampleInputName1"
							aria-describedby="nameHelp"
							placeholder="Enter your name"> 
					</div> 
					<div class="form-group"> 
						<input type="number" class="form-control"
							id="exampleInputphoneNumber1"
							placeholder="Enter your phone number"> 
					</div> 
					<button type="submit" class="btn btn-primary"> 
						Submit 
					</button> 
				</form> 
			</div> 
			 
		</div> 
	</div> 
    
		
  
    <!-- Site footer -->
    <footer class="site-footer">
		<div class="container">
		  <div class="row">
			
  
			<div class="col-xs-6 col-md-3">
			  <h6>Quick Links</h6>
			  <ul class="footer-links">
				<li><a href="http://scanfcode.com/about/">About Us</a></li>
				<li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
				<li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
				<li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
				
			  </ul>
			</div>
		  </div>
		  <hr>
		</div>
		<div class="container">
		  <div class="row">
			<div class="col-md-8 col-sm-6 col-xs-12">
			  <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
		   <a href="#">YCOC</a>.
			  </p>
			</div>
  
			<div class="col-md-4 col-sm-6 col-xs-12">
			  <ul class="social-icons">
				<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
				<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
			  </ul>
			</div>
		  </div>
		</div>
  </footer>
  
  



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity= 
"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"> 
	</script> 
	
	<script src= 
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity= 
"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"> 
	</script> 
	
	<script src= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity= 
"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"> 
	</script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
</body> 
</html>