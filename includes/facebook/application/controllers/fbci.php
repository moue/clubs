<?php 
/* -----------------------------------------------------------------------------------------
   IdiotMinds - http://idiotminds.com
   -----------------------------------------------------------------------------------------
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include the facebook.php from libraries directory
require_once APPPATH.'libraries/facebook/facebook.php';

class Fbci extends CI_Controller {

   public function __construct(){
	    parent::__construct();
	    $this->load->library('session');  //Load the Session 
		$this->config->load('facebook'); //Load the facebook.php file which is located in config directory
    }
	public function index()
	{
	  $this->load->view('main'); //load the main.php file for view
	}
	
	function logout(){
		$base_url=$this->config->item('base_url'); //Read the baseurl from the config.php file
		$this->session->sess_destroy();  //session destroy
		header('Location: '.$base_url);  //redirect to the home page
		
	}
	function fblogin(){
		$base_url=$this->config->item('base_url'); //Read the baseurl from the config.php file
		//get the Facebook appId and app secret from facebook.php which located in config directory for the creating the object for Facebook class
    	$facebook = new Facebook(array(
		'appId'		=>  $this->config->item('446971292049644'), 
		'secret'	=> $this->config->item('cb4e5de15e290e6c8ff8277021b1eb92'),
		));
		
		$user = $facebook->getUser(); // Get the facebook user id 
		
		if($user){
			
			try{
				$user_profile = $facebook->api('/me');  //Get the facebook user profile data
				
				$params = array('next' => $base_url.'fbci/logout');
				
				$ses_user=array('User'=>$user_profile,
				   'logout' =>$facebook->getLogoutUrl($params)   //generating the logout url for facebook 
				);
		        $this->session->set_userdata($ses_user);
				header('Location: '.$base_url);
			}catch(FacebookApiException $e){
				error_log($e);
				$user = NULL;
			}		
		}	
		$this->load->view('main');
	}
	
}

/* End of file fbci.php */
/* Location: ./application/controllers/fbci.php */