<?php
$app_id		= 446971292049644;
$app_secret	= cb4e5de15e290e6c8ff8277021b1eb92;
$site_url	= https://www.hcs.harvard.edu/awk;

try{
	include_once "src/facebook.php";
}catch(Exception $e){
	error_log($e);
}
 
$facebook = new Facebook(array(
	'446971292049644' => $app_id,
	'cb4e5de15e290e6c8ff8277021b1eb92' => $app_secret,
	));
 
$user = $facebook->getUser();

if($user){
	try{
		// User logged in
		$user_profile = $facebook->api('/me');
	}catch(FacebookApiException $e){
		error_log($e);
		$user = NULL;
	}
}
		
if($user){
	// Get logout URL
	$logoutUrl = $facebook->getLogoutUrl(array(
		'next'	=> 'https://www.hcs.harvard.edu/awk', // URL to redirect logged-out user
		));
}else{
	// Get login URL
	$loginUrl = $facebook->getLoginUrl(array(
		'scope'	=> 'email, read_insights, read_friendlists, user_likes, user_interests, user_hometown, user_groups, user_events, user_location, user_relationships, user_relationship_details, user_religion_politics, user_subscriptions, user_work_history, user_education_history, user_activities, user_checkins, read_stream', // Request permissions from user
		'redirect_uri' => 'https://www.hcs.harvard.edu/awk', // URL to redirect logged-in user
		));
}

?>