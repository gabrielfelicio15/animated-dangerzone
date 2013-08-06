<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller
{
	function login()
	{
			$this->view_data['error'] = "false";		
			$this->theme_view = 'login';

		
		if($_POST)
		{
			$user = User::validate_login($_POST['username'], $_POST['password']);
			if($user){
				redirect('');
			}
			else {
				$this->view_data['error'] = "true";
				$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_login_incorrect'));
			}
		}
		
	}
	
	function logout()
	{
		User::logout();
			redirect('login');
	}
	
}
