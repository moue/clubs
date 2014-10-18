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
	
	if($uid) {
		$name = json_decode(file_get_contents("http://graph.facebook.com/$uid"))->name;
	}

?>
