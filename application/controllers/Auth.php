<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	
	public function index()
	{
		$data['title'] = "Login";

		$this->load->view('layouts/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('layouts/auth_footer');
	}

	public function register()
	{
		$data['title'] = "Register";

		$this->load->view('layouts/auth_header', $data);
		$this->load->view('auth/register');
		$this->load->view('layouts/auth_footer');
	}
	
}
