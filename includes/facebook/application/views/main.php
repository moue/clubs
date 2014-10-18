<?php 
/* -----------------------------------------------------------------------------------------
   IdiotMinds - http://idiotminds.com
   -----------------------------------------------------------------------------------------
*/

 $this->load->helper('html');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login with Facebook</title>
<?php  $base_url=$this->config->item('base_url'); ?>
<script src="<?php echo $base_url;?>js/jquery.min.js" type="text/javascript"></script>
</head>

<body>
<?php 
$ses_user=$this->session->userdata('User');


if(empty($ses_user))   { 
echo img(array('src'=>$base_url.'images/facebook.png','id'=>'facebook','style'=>'cursor:pointer;float:left;margin-left:550px;'));

 }  else{
	
 echo '<img src="https://graph.facebook.com/'. $ses_user['id'] .'/picture" width="30" height="30"/><div>'.$ses_user['name'].'</div>';	
	echo '<a href="'.$this->session->userdata('logout').'">Logout</a>';

	
	
	
}
	?>

<div id="fb-root"></div>

   <script type="text/javascript">
  window.fbAsyncInit = function() {
	  //Initiallize the facebook using the facebook javascript sdk
     FB.init({ 
       appId:'<?php echo $this->config->item('appID'); ?>', // App ID 
	   cookie:true, // enable cookies to allow the server to access the session
       status:true, // check login status
	   xfbml:true, // parse XFBML
	   oauth : true //enable Oauth 
     });
   };
   //Read the baseurl from the config.php file
   (function(d){
           var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           ref.parentNode.insertBefore(js, ref);
         }(document));
	//Onclick for fb login
 $('#facebook').click(function(e) {
    FB.login(function(response) {
	  if(response.authResponse) {
		  parent.location ='<?php echo $base_url; ?>fbci/fblogin'; //redirect uri after closing the facebook popup
	  }
 },{scope: 'email, read_insights, read_friendlists, user_likes, user_interests, user_hometown, user_groups, user_events, user_location, user_relationships, user_relationship_details, user_religion_politics, user_subscriptions, user_work_history, user_education_history, user_activities, user_checkins, read_stream'}); //permissions for facebook
});

   </script>
</body>
</html>