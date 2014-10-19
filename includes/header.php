<!--

<?
	
	require_once("includes/fb/src/facebook.php");

	// Read the cookie created by the JS API
	$cookie = preg_replace("/^\"|\"$/i", "", $_COOKIE['fbs_' . '446971292049644']);
	parse_str($cookie, $data);

	// Startup the Facebook object
	$fb = new Facebook(array(
	    'appId'  => '446971292049644',
	    'secret' => 'cb4e5de15e290e6c8ff8277021b1eb92'
	));

	// Say we are using the token from the JS
	$fb->setAccessToken($data['access_token']);

	// It should work now
	$uid = $fb->getUser();
	
	if($uid != 0) {
	$name = json_decode(file_get_contents("http://graph.facebook.com/$uid"))->name;
	}

?>

-->

<body>
	
	<!--<div id="fb-root"></div>-->

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
      		<div class="container">      
        		<a class="btn btn-navbar" data-toggle="collapse" data-target="#nav-top">
          			<span class="icon-bar"></span>
          			<span class="icon-bar"></span>
          			<span class="icon-bar"></span>
        		</a>
        		
        		<a class="brand" href="index.php">Join Harvard</a>
        		<div id="nav-top" class="nav-collapse">
          
          			<ul class="nav pull-right">
          				<!-- add addtional navigation tabs here -->
            			<li><a href="index.php">Randomizer</a></li>
            			<li class="divider-vertical"></li>
           				<li><a href="clubs.php">All Clubs</a></li>
            			<li class="divider-vertical"></li>
            			<li><a href="guides.php">Guide</a></li>
            			<li class="divider-vertical"></li>
            			
            			<!-- display log in and log out depending on user's status 
            			<? 
            				
            				if($uid==0)
            					echo '<li><a href="#" onClick="login();"><img src="img/facebook-logo.jpg" width="20" height="20">&nbsp; Log In</a></li>';
        					else
            					echo '<li><a href="#" onClick="login();"><img src="img/facebook-logo.jpg" width="20" height="20">&nbsp; Log Out</a></li>';
            			?>
            		        				
            			<li class="divider-vertical"></li>
            			-->
            			<!-- <form class="navbar-search">
              			<input type="text" class="search-query" placeholder="Search"></form> -->
          			</ul>
        		</div> <!--/.nav-collapse -->
      		</div>
    	</div>
    </div>
	
	<!--<div class="container" id="dummydiv" style="height:40px"></div>-->
	<div class="container" style="margin-top: 51px;">
