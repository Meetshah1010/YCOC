<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>About us</title>
      <link rel="stylesheet" href="css/about.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script>
        $(function(){
  $('.profile_container').on('click', function(e){
    var $biginfo = $('#teamcontent');
    var $bigname = $('#bigname');
    var $bigjob  = $('#bigjob');
    var $bigdesc = $('#bigdesc');
    var $bigimg  = $('.bigimg');  
    
    var newimg  = $(this).find('.profilepic').attr('src');
    var newname = $(this).find('.profilepic').attr('alt');
    var newrole = $(this).siblings('.job').eq(0).html();
    var newdesc = $(this).siblings('.desc').eq(0).html();
    
    $bigimg.css('background-image', "url(" + newimg + ")");
    $bigname.html(newname);
    $bigjob.html(newrole);
    $bigdesc.html(newdesc);
    
    if($biginfo.css('display') == 'none') {
      $biginfo.slideDown(350);
    }
      
    $('html, body').animate({ scrollTop: $('.team_box').offset().top }, 'slow');  
  });
});
    
$(document).ready(function(){
  $("a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
        
      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        window.location.hash = hash;
      });
    } 
  });
});
</script>
   </head>
   <body><div id="wrapper_team">
  <div class="title_team">
    <h1>Meet the team</h1>
    <p>Click on the photo's for more information</p>
  </div>
  <div class="team_box">
    <div id="teamcontent">
      <div class="container-left">
        <div class="bigimg" height="260" width="225">&nbsp;</div>
      </div>

      <div class="container-right" id="teamdetails">
        <h2 id="bigname">Name</h2>
        <h3 id="bigjob">Title</h3>
        <p id="bigdesc">A brief description.</p>
      </div>
    </div>
  </div>

  <ul class="team clearfix">
    <li>
      <div class="profile_container">
        <img alt="Meet Shah" class="profilepic" src="images/meet.jpg" />
        <div class="bigimg-overlay">
          <div class="bigimg-text"><strong>Meet Shah</strong><br>Full Stack Devloper</div>
        </div>
      </div>
      <span class="hcontent job">Full Stack Devloper</span>
        <br /> Contact:
        <br /> Tel: <a href="tel:+xxxxxxxxxx">xx-xxxxxxxx</a><br /> E-mail: <a href="mailto:xxx@xxx.nl">xxx@xxx.nl</a></p>
    </li>
    <li>
      <div class="profile_container">
        <img alt="Krishna Shah" class="profilepic" src="images/krishna.jpg" />
        <div class="bigimg-overlay">
          <div class="bigimg-text"><strong>Krishna Shah</strong><br>Front End Devloper</div>
        </div>
      </div>
      <span class="hcontent job">Front End Devloper</span>
        <br /> Contact:
        <br /> Tel: <a href="tel:+xxxxxxxxxx">xx-xxxxxxxx</a><br /> E-mail: <a href="mailto:xxx@xxx.nl">xxx@xxx.nl</a></p>
    </li>
    <li>
      <div class="profile_container">
        <img alt="Binal Raiyani" class="profilepic" src="images/binal.jpg">
        <div class="bigimg-overlay">
          <div class="bigimg-text"><strong>Binal Raiyani</strong><br>Database Handler</div>
        </div>
      </div>
      <span class="hcontent job">Database Handler</span>
      
        <br /> Contact:
        <br /> Tel: <a href="tel:+xxxxxxxxxx">xx-xxxxxxxx</a><br /> E-mail: <a href="mailto:xxx@xxx.nl">xxx@xxx.nl</a></p>
    </li>
        <li>
      <div class="profile_container">
        <img alt="Ramprasad Sarkar" class="profilepic flipimg" src="images/ram.jpg" />
        <div class="bigimg-overlay">
          <div class="bigimg-text"><strong>Ramprasad Sarkar</strong><br>Php Devloper</div>
        </div>
      </div>
      <span class="hcontent job">Php Devloper</span>
      
        <br /> Contact:
        <br /> Tel: <a href="tel:+xxxxxxxxxx">xx-xxxxxxxx</a><br /> E-mail: <a href="mailto:xxx@xxx.nl">xxx@xxx.nl</a></p>
    </li>
  </ul>
</div>
</body>
</html>