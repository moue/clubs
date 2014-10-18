<!-- THIS HEADER IS USED FOR ALL PAGES except HOMEPAGE included in index.php-->
<?
  require_once("includes/fb/src/facebook.php");

  $config = array();
  $config[‘appId’] = '446971292049644';
  $config[‘secret’] = 'cb4e5de15e290e6c8ff8277021b1eb92';
  $config[‘fileUpload’] = false; // optional

  $facebook = new Facebook($config);
?>

<body>
	
	<div id="fb-root"></div>
	
<!-- ********************************************************
DO NOT CHANGE DO NOT CHANGE DO NOT CHANGE DO NOT CHANGE 
******************************************************** -->	

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
      		<div class="container">      
        		<a class="btn btn-navbar" data-toggle="collapse" data-target="#nav-top">
          			<span class="icon-bar"></span>
          			<span class="icon-bar"></span>
          			<span class="icon-bar"></span>
        		</a>
        		
        		<!-- <a class="brand" href="index.php">Join Harvard</a> -->
        		<div id="nav-top" class="nav-collapse">
          
          			<ul class="nav pull-left">
          				<!-- add addtional navigation tabs here -->
            			<li><a href="index.php">Randomizer</a></li>
            			<li class="divider-vertical"></li>
           				<li><a href="clubs.php">Clubs</a></li>
            			<li class="divider-vertical"></li>
            			<li><a href="blog/index.php">Guides</a></li>
            			<li class="divider-vertical"></li>
            		</ul>
            		<ul class="nav pull-right">
<!-- ********************************************************
DO NOT CHANGE stops here DO NOT CHANGE stops here 
******************************************************** -->	
      			
            			<!-- display log in and log out depending on user's status -->
            			<? 
            				$uid = $facebook->getUser(); 
            				
            				// **FOR THE 0 on the bar** echo $uid;
            				
            				if($uid==0)
            					echo '<li><a href="#" onClick="login();"><img src="img/facebook-logo.jpg" width="20" height="20">&nbsp; Log In</a></li>';
        					else
        						echo '<li><a href="#">Log Out</a></li>';
            			?>
            	
<!-- ********************************************************
DO NOT CHANGE DO NOT CHANGE DO NOT CHANGE DO NOT CHANGE 
******************************************************** -->	
	        				
            			<li class="divider-vertical"></li>
            			<form class="navbar-search">
              			<input type="text" class="search-query" placeholder="Search"></form>
          			</ul>
        		</div> <!--/.nav-collapse -->
      		</div>
    	</div>
    </div>
	
	<div class="container" id="dummydiv" style="height:40px"></div>
	<div class="container">
	
<!-- ********************************************************
DO NOT CHANGE stops here DO NOT CHANGE stops here 
******************************************************** -->	