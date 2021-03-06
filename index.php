<!DOCTYPE html>
  <meta charset="utf-8">
  <title>Join Harvard</title>
  
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
  <!-- enables scaling for mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <!-- The bootstrap  styles -->
  <link href="css/bootstrap.css" rel="stylesheet"/>
  <link href="css/bootstrap-responsive.css" rel="stylesheet"/>

  <!-- The global styles-->
  <link href="css/styles.css" rel="stylesheet"/>
  <link href="css/box-top.css" rel="stylesheet"/>
  
  <script src="http://code.jquery.com/jquery.js"></script>
  <!--<script src="js/randomizer.js"></script>-->
  
  
  <script>
  
  // Google analytics
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42888006-1', 'harvard.edu');
  ga('send', 'pageview');


  // trigger randomizer when user presses spacebar
  $(document).keydown(function(event){
    if(event.which == 32 || event.keycode == 32){
        // $("#index-randomizer").fadeOut(100).load('index-randomizer.php').fadeIn(100);
        // $("#index-randomizer").toggle('scale').load('index-randomizer.php').toggle('scale');
        $("#index-randomizer").toggle({ effect: "scale", origin: "middle" }).load('index-randomizer.php').delay().toggle({ effect: "scale", origin: "middle" });
      }
    });
    
  // sticky navbar
  var navbar = document.querySelector('.navbar');
  var origOffsetY = navbar.offsetTop;

  function onScroll(e) {
      window.scrollY >= origOffsetY ? navbar.classList.add('fixed') :
                                      navbar.classList.remove('fixed');
  }

  document.addEventListener('scroll', onScroll);
  </script>

<?php
  include 'includes/header.php';
  //include 'dump/main_page.php';
  //include 'includes/fb/fbaccess.php';
  //include 'includes/facebook/index.php';
?>

  <div style="padding-top: 15px;">
      <p class="lead" style="text-align: center;">press the [spacebar] to randomize</p>
  </div>
  
  <a href="http://www.quick-counter.net/" title="HTML hit counter - Quick-counter.net"><img src="http://www.quick-counter.net/aip.php?tp=bo&tz=America%2FNew_York" alt="HTML hit counter - Quick-counter.net" border="0" style="display:none;" /></a>
    
<?   
  include 'index-randomizer.php';
  include 'includes/footer.php'; 
?>
