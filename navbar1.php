<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Responsive Sticky Navbar</title>
      <link rel="stylesheet" href="css/navbar1.css">
      <link rel="stylesheet" href="css/css1.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   </head>
   <body>
     <div class="wrapper">
         <header>
            <nav>
               <div class="logo">
                  <img id="LOGO" src="images/logo.png" alt="logo">
               </div>
               <div class="menu">
                  <ul>
                     <li><a href="index.php">Home</a></li>
                     <li><a href="about.php">About</a></li>
                     <li><a href="product.php">Explore</a></li>
                     <li><a href="contact.php">Contact</a></li>
                     <li><a href="login.php">Log in</a></li>
                  </ul>
                  <script>
                   $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      })
      </script>
               </div>
            </nav>
         </header>
      </div>
   </body>
</html>
